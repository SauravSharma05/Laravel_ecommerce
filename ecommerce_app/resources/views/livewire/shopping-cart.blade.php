<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-white">Your Cart</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p class="text-white">Your cart is empty.</p>
    @else
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">Product</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Quantity</th>
                        <th class="p-4">Total</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr class="border-t">
                            <td class="p-4">{{ $item->product->name }}</td>
                            <td class="p-4">${{ $item->product->price }}</td>
                            <td class="p-4">
                                <input type="number" min="1"
                                       wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                       value="{{ $item->quantity }}" class="w-16 border rounded p-1">
                            </td>
                            <td class="p-4">${{ $item->product->price * $item->quantity }}</td>
                            <td class="p-4">
                                <button wire:click="removeItem({{ $item->id }})" class="text-red-500 hover:text-red-700">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4 bg-gray-50 flex justify-between items-center">
                <span class="text-xl font-bold">Total: ${{ $total }}</span>
                <button wire:click="checkout" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Checkout
                </button>
            </div>
        </div>
    @endif
</div>
