<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice #{{ $order->id }}</title>
<style>
    body {
        color: #333;
        margin: 0;
        padding: 0;
            font-family: 'DejaVu Sans', sans-serif;
        /* background-color: #f4f6f8; */
    }

    .invoice-container {
        max-width: 800px;
        margin: 10px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    /* Header */
    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #26aa5f;
        /* padding-bottom: 15px;
        margin-bottom: 25px; */
    }

    .invoice-header .logo {
        display: flex;
        align-items: center;
    }

    .invoice-header img {
        height: 60px;
        margin-right: 15px;
    }

    .invoice-header h2 {
        margin: 0;
        font-size: 20px;
        color: #145A32;
    }

    .invoice-header small {
        display: block;
        color: #555;
        margin-top: 2px;
        font-size: 12px;
    }

    .invoice-title {
        text-align: right;
    }

    .invoice-title h3 {
        margin: 0;
        color: #145A32;
        font-size: 22px;
    }

    .invoice-title small {
        display: block;
        color: #555;
        font-size: 12px;
    }

    /* Sections */
    .section {
        margin-bottom: 30px;
    }

    .section h4 {
        color: #145A32;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .billing-details dt,
    .payment-info dt {
        text-align: left!important;
        width: 30%!important;
        font-weight: bold;
    }

    .billing-details dd,
    .payment-info dd {
        float: left;
        width: 70%;
        margin: 0 0 5px 0;
    }

    .clear { clear: both; }

    /* Tables */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left!important;
        vertical-align: middle;
    }

    table th {
        background-color: #26aa5f;
        color: #fff;
        font-weight: bold;
    }

    .total-row td {
        background-color: #145A32;
        color: #fff;
        font-weight: bold;
        text-align: right;
    }

    .footer {
        text-align: center;
        font-size: 12px;
        color: #555;
        margin-top: 30px;
    }

</style>
</head>
<body>
<div class="invoice-container">

    <!-- Header -->
    <div class="invoice-header">
        <div class="logo">

            {{-- <img src="https://dev-testing.stepforenvironment.com/assets/img/logo/logo4.png" alt="logo"> --}}
            <div>
                <h2>Step For Environment</h2>
                <small>Eco-friendly • Sustainable • Reusable</small>
            </div>
        </div>
        <div class="invoice-title">
            <h3>Invoice</h3>
            <small>#{{ $order->id }}</small>
            <small>Date: {{ $order->created_at->format('d M Y') }}</small>
        </div>
    </div>

    <!-- Billing Details -->
    <div class="section">
        <h4>Billing Details</h4>
        <dl class="billing-details">
            <dt>Name:</dt><dd>{{ $order->user->first_name }} {{ $order->user->last_name }}</dd>
            <dt>Email:</dt><dd>{{ $order->user->email }}</dd>
            <dt>Phone:</dt><dd>{{ $order->user->mobile ?? $order->user->phone }}</dd>
            <dt>Address:</dt><dd>{{ $order->shipping_address }}</dd>
        </dl>
        <div class="clear"></div>
    </div>

    <!-- Payment & Donation -->
    <div class="section">
        <h4>Payment & Donation</h4>
        <dl class="payment-info">
            <dt>Payment Method:</dt>
            <dd>{{ ucfirst(str_replace('_',' ',$order->payment_method)) }}</dd>

            @if($order->donations->first() && $order->donations->first()->id)
            <dt>Donation:</dt>
            <dd>&#8377;{{ number_format($order->donations->first()->amount,2) }}</dd>
            @endif
        </dl>
        <div class="clear"></div>
    </div>

    <!-- Order Items -->
    <div class="section">
        <h4>Order Items</h4>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>&#8377;{{ number_format($item->product->price,2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>&#8377;{{ number_format($item->product->price * $item->quantity,2) }}</td>
                </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3">Total</td>
                    <td>&#8377; {{ number_format($order->total,2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        Thank you for shopping with <b>Step For Environment</b>.<br>
        Together, we are building a sustainable and eco-friendly future 🌍💚
    </div>

</div>
</body>
</html>
