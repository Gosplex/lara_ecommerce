@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>{{ session()->has('message') ? session('message') : 'Admin Dashboard' }}</h2>
                        <p class="mb-md-0">Your analytics dashboard.</p>
                    </div>
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Analytics</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                        <i class="mdi mdi-download text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-clock-outline text-muted"></i>
                    </button>
                    <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                        <i class="mdi mdi-plus text-muted"></i>
                    </button>
                    <button class="btn btn-primary mt-2 mt-xl-0 text-white">Generate report</button>
                </div>
            </div>

            <div class="cardBox">
                <a href="{{ url('admin/orders') }}">
                    <div class="card card-admin">
                        <div>
                            <div class="numbers">{{ $totalOrder }}</div>
                            <div class="cardName">Total Orders</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon class="admin-icon" name="list"></ion-icon>
                        </div>
                    </div>
                </a>

                <a href="{{ url('admin/orders') }}">
                    <div class="card card-admin">
                        <div>
                            <div class="numbers">{{ $todayOrder }}</div>
                            <div class="cardName">Today Orders</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon class="admin-icon" name="cart-outline"></ion-icon>
                        </div>
                    </div>
                </a>

                <a href="{{ url('admin/orders') }}">
                    <div class="card card-admin">
                        <div>
                            <div class="numbers">{{ $thisMonthOrder }}</div>
                            <div class="cardName">Monthly Orders</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon class="admin-icon" name="pricetags"></ion-icon>
                        </div>
                    </div>
                </a>

                <a href="{{ url('admin/orders') }}">
                    <div class="card card-admin">
                        <div>
                            <div class="numbers">₹{{ $totalEarnings }}</div>
                            <div class="cardName">Monthly Earnings</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon class="admin-icon" name="cash-outline"></ion-icon>
                        </div>
                    </div>
                </a>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="{{ url('admin/orders') }}" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Customer Name</td>
                                <td>Payment</td>
                                <td>Tracking No</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="text-uppercase">{{ $order->fullname }}</td>
                                    <td>
                                        @if ($order->status_message == 'cancelled')
                                            <span>Reversed</span>
                                        @elseif ($order->status_message == 'in Progress...')
                                            <span>Due</span>
                                        @elseif ($order->status_message == 'pending')
                                            <span>Due</span>
                                        @elseif ($order->status_message == 'processing')
                                            <span>Due</span>
                                        @else
                                            <span>Paid</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>
                                        @if ($order->status_message == 'cancelled')
                                            <span class="status cancelled">Cancelled</span>
                                        @elseif ($order->status_message == 'in Progress...')
                                            <span class="status inProgress">In Progress</span>
                                        @elseif ($order->status_message == 'pending')
                                            <span class="status pending">Pending</span>
                                        @elseif ($order->status_message == 'processing')
                                            <span class="status processing">Processing</span>
                                        @else
                                            <span class="status delivered">Delivered</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        @php
                            $name = '';
                            $result = [];
                        @endphp

                        @foreach ($orders as $order)
                            @php
                                $name = explode(' ', $order->fullname, 2);
                                $result = $name[0];
                                $random = rand(1, 3);
                            @endphp
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="{{ asset('images/' . $random . '.jpg') }}"
                                            alt="">
                                    </div>
                                </td>
                                <td>
                                    <h4>{{ $result }} <br> <span>Italy</span></h4>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div id="chartContainer" style="border-radius: 10px;">
                <div id="donutchart" style="width: 1500px; height: 500px;" class="rounded-3"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Include Google Charts and render the chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(@json($data));

            var options = {
                title: 'Data Statistics',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);

            // Add border-radius to the chart container
            var chartContainer = document.getElementById('donutchart');
            chartContainer.style.borderRadius = '10px';
        }
    </script>
@endpush
