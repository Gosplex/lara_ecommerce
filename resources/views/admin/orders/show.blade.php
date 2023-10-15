@extends('layouts.admin')


@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif (Session::has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart"></i> Customer's Order Details
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger text-white btn-sm float-end mx-1">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </a>
                            <a href="{{ url('admin/invoice/' . $orders->id . '/generate') }}"
                                class="btn btn-primary text-white btn-sm float-end mx-1">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                Download Invoice
                            </a>
                            <a href="{{ url('admin/invoice/' . $orders->id) }}"
                                class="btn btn-warning text-white btn-sm float-end mx-1" target="_blank">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View Invoice
                            </a>
                            <a href="{{ url('admin/invoice/' . $orders->id . '/mail') }}"
                                class="btn btn-info text-white btn-sm float-end mx-1">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                Send Invoice
                            </a>
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
                                @if ($orders->status_message == 'cancelled')
                                    <h6 class="border mt-2 p-2 text-danger">
                                        Order Status Message: <span
                                            class="text-uppercase">{{ $orders->status_message }}</span>
                                    </h6>
                                @else
                                    <h6 class="border mt-2 p-2 text-success">
                                        Order Status Message: <span
                                            class="text-uppercase">{{ $orders->status_message }}</span>
                                    </h6>
                                @endif
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
                                            <td width="10%" class="fw-bold">
                                                ₹{{ $orderItem->price * $orderItem->quantity }}</td>
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

                    <div class="card mt-3 shadow bg-white ">
                        <div class="card-body">
                            <h4>Order Process (Order Status)</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{ url('admin/orders/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label>Update Customer Order Status</label>
                                        <div class="input-group">
                                            <select name="order_status" class="form-select m-2">
                                                <option value="">Select Order Status</option>
                                                <option value="in progress"
                                                    {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In
                                                    Progress</option>
                                                <option value="completed"
                                                    {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed
                                                </option>
                                                <option value="pending"
                                                    {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="out for delivery"
                                                    {{ Request::get('status') == 'out for delivery' ? 'selected' : '' }}>
                                                    Out
                                                    for delivery</option>
                                                <option value="cancelled"
                                                    {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                            </select>
                                            <button type="submit" class="btn btn-primary text-white">Update Status</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br>
                                    <h4 class="mt-3">Current Order Status: <span
                                            class="text-uppercase">{{ $orders->status_message }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
