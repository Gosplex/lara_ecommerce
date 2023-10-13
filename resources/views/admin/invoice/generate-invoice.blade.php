<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{ $orders->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Majestic Stores</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $orders->id }}</span> <br>
                    <span>Date: {{ $orders->created_at->format('d / m / y') }}</span> <br>
                    <span>Zip code : {{ $orders->pincode }}</span> <br>
                    <span>Address: {{ $orders->address }}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $orders->id }}</td>

                <td>Full Name:</td>
                <td>{{ $orders->fullname }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{ $orders->tracking_no }}</td>

                <td>Email Id:</td>
                <td>{{ $orders->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $orders->created_at->format('d-m-Y A') }}</td>

                <td>Phone:</td>
                <td>{{ $orders->phone }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{ $orders->payment_mode }}</td>

                <td>Address:</td>
                <td>{{ $orders->address }}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td class="text-uppercase">{{ $orders->status_message }}</td>

                <td>Pin code:</td>
                <td>{{ $orders->pincode }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($orders->orderItems as $order)
                <tr>
                    <td width="10%">{{ $order->id }}</td>
                    <td>
                        {{ $order->product->name }}
                    </td>
                    <td width="10%">INR {{ $order->product->selling_price }}</td>
                    <td width="10%">{{ $order->quantity }}</td>
                    <td width="15%" class="fw-bold">
                        INR {{ $order->price * $order->quantity }}</td>
                    @php
                        $total += $order->price * $order->quantity;
                    @endphp
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">INR {{ $total }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with us.
    </p>

</body>

</html>
