<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $todaysDate = Carbon::now()->format('d-m-Y');
        $orders = Order::when($request->date != null, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todaysDate) {
            return $q->whereDate('created_at', $todaysDate);
        })
            ->when($request->status != null, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })
            ->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $orders = Order::where('id', $orderId)->first();

        if (!$orders) {
            return redirect('admin/orders')->with('error', 'Order not found');
        } else {
            return view('admin.orders.show', compact('orders'));
        }
    }
}
