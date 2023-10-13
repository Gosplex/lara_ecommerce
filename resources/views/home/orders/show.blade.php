@extends('layouts.app')

@section('title', 'orders details')


@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart"></i> My Order Details
                            <a href="{{url('/orders')}}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                        </h4>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order ID: {{ $orders->id }}</h6>
                                <h6>Tracking ID/No: {{ $orders->tracking_no }}</h6>
                                <h6>Order Created Date: {{ $orders->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Payment Mode: {{ $orders->payment_mode }}</h6>
                                <h6 class="border mt-2 p-2 text-success">
                                    Order Status Message: <span class="text-uppercase">{{ $orders->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name: {{ $orders->fullname }}</h6>
                                <h6>Email ID: {{ $orders->email }}</h6>
                                <h6>Phone: {{ $orders->phone }}</h6>
                                <h6>Address: {{ $orders->address }}</h6>
                                <h6>Pincode: {{ $orders->pincode }}</h6>
                            </div>
                        </div>

                        <br>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($orders->OrderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">
                                                @if ($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[1]->image) }}"
                                                        style="width: 50px; height: 50px" alt="">
                                                @else
                                                    <img src="" alt="" style="width: 50px; height: 50px;">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}
                                                @if ($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        ({{ $orderItem->productColor->color->name }})
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">₹{{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%" class="fw-bold">₹{{ $orderItem->price * $orderItem->quantity }}</td>
                                            @php
                                                $total += $orderItem->price * $orderItem->quantity;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount: </td>
                                        <td colspan="1" class="fw-bold">₹{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
