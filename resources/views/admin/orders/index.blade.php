@extends('layouts.admin')


@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">Today's Orders</h4>
                        <hr>
                        <form method="GET" action="">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label>Filter By Date</label>
                                    <input type="date" name="date" value="{{ date('d-m-Y') }}" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Filter By Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="in progress" {{Request::get('status') == 'in progress' ? 'selected': ''}}>In Progress</option>
                                        <option value="completed" {{Request::get('status') == 'completed' ? 'selected': ''}}>Completed</option>
                                        <option value="pending" {{Request::get('status') == 'pending' ? 'selected': ''}}>Pending</option>
                                        <option value="out for delivery" {{Request::get('status') == 'out for delivery' ? 'selected': ''}}>Out for delivery</option>
                                        <option value="cancelled" {{Request::get('status') == 'cancelled' ? 'selected': ''}}>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <button type="submit" class="btn text-white btn-primary">Filter Orders</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Order ID</th>
                                    <th>Tracking No</th>
                                    <th>Fullname</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_no }}</td>
                                            <td>{{ $order->fullname }}</td>
                                            <td>{{ $order->payment_mode }}</td>
                                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $order->status_message }}</td>
                                            <td>
                                                <a href="{{ url('admin/orders', $order->id) }}"
                                                    class="btn btn-sm  text-white btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
