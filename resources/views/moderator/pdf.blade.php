<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF File</title>
</head>
<body>
    <h1>Order Details</h1> <br>
    <img height="200px" width="200px" src="product/{{ $order->image }}" alt=""> <br>
    <h3>Customer Name:<br> {{ $order->name }}</h3>
    <h3>Customer Email:<br> {{ $order->email }}</h3>
    <h3>Customer Phone:<br> {{ $order->phone }}</h3>
    <h3>Customer Address:<br> {{ $order->address }}</h3>
    <h3>Customer ID:<br> {{ $order->user_id }}</h3>
    <h3>Product Title:<br> {{ $order->product_title }}</h3>
    <h3>Product Price:<br> {{ $order->price }}</h3>
    <h3>Product Quantity:<br> {{ $order->quantity }}</h3>
    <h3>Product ID:<br> {{ $order->product_id }}</h3>
    <h3>Payment Status:<br> {{ $order->payment_status }}</h3>
    <h3>Delivery Status:<br> {{ $order->delivery_status }}</h3>
</body>
</html>
