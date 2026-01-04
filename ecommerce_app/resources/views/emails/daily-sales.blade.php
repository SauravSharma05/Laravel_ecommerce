<!DOCTYPE html>
<html>
<head><title>Daily Sales Report</title></head>
<body style="font-family: Arial, sans-serif;">
    <h2>Daily Sales Report</h2>
    <p>Date: {{ now()->toFormattedDateString() }}</p>

    @if($sales->isEmpty())
        <p>No sales were recorded today.</p>
    @else
        <table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price Sold At</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($sales as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
                    @php $total += ($item->price * $item->quantity); @endphp
                @endforeach
            </tbody>
        </table>
        <h3>Total Revenue: ${{ number_format($total, 2) }}</h3>
    @endif
</body>
</html>
