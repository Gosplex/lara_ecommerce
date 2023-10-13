<?php

namespace App\Http\Controllers\Home;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('home.orders.index', compact('orders'));
    }

    public function show($orderId) {
        $orders = Order::where('user_id', Auth::user()->id)->where('id', $orderId)->first();
        if ($orders) {
            return view('home.orders.show', compact('orders'));
        } else {
            return redirect()->back()->with('message', 'Order not found!');
        }
    }
}
