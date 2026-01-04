<!DOCTYPE html>
<html>
<head>
    <title>Low Stock Alert</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>Low Stock Warning</h2>
    <p>The following product is running low on stock:</p>

    <ul>
        <li><strong>Product Name:</strong> {{ $product->name }}</li>
        <li><strong>Current Stock:</strong> {{ $product->stock_quantity }}</li>
        <li><strong>Price:</strong> ${{ $product->price }}</li>
    </ul>

    <p>Please restock immediately.</p>
</body>
</html>
