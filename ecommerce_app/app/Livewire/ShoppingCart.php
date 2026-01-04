<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\CheckLowStock;

class ShoppingCart extends Component
{
    public $cartItems;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function updateQuantity($itemId, $quantity)
    {
        $quantity = (int) $quantity;

        if ($quantity > 0) {
            CartItem::where('id', $itemId)->where('user_id', Auth::id())
                ->update(['quantity' => $quantity]);
        }
        $this->loadCart();
    }

    public function removeItem($itemId)
    {
        CartItem::where('id', $itemId)->where('user_id', Auth::id())->delete();
        $this->loadCart();
        $this->dispatch('cart-updated');
    }

    public function checkout()
    {
        $this->loadCart();

        if ($this->cartItems->isEmpty()) return;

        DB::transaction(function () {

            $total = $this->cartItems->sum(fn($item) => $item->product->price * $item->quantity);

            // 1. Create Order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total
            ]);

            foreach ($this->cartItems as $item) {
                // 2. Create Order Items
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);

                // 3. Decrement Stock
                $item->product->decrement('stock_quantity', $item->quantity);

                // 4. Trigger Low Stock Job
                CheckLowStock::dispatch($item->product);
            }

            // 5. Clear Cart
            CartItem::where('user_id', Auth::id())->delete();
        });

        return redirect()->route('dashboard')->with('success-order', 'Order placed successfully!');
    }

    public function render()
    {
        return view('livewire.shopping-cart', [
            'total' => $this->cartItems->sum(fn($item) => $item->product->price * $item->quantity)
        ])->layout('layouts.app');;
    }
}
