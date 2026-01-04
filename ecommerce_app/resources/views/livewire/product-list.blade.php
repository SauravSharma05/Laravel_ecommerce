<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
    @foreach($products as $product)
        <div class="border rounded-lg p-4 shadow bg-white">
            <h2 class="text-xl font-bold">{{ $product->name }}</h2>
            <p class="text-gray-600">${{ $product->price }}</p>
            <p class="text-sm {{ $product->stock_quantity < 5 ? 'text-red-500' : 'text-green-500' }}">
                Stock: {{ $product->stock_quantity }}
            </p>
            <button wire:click="addToCart({{ $product->id }})"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add to Cart
            </button>
        </div>
    @endforeach
</div>
