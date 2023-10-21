<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function index()
    {
        $brandsCount = Brand::count();
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $usersCount = User::count();

        $data = [
            ['Data Type', 'Count'],
            ['Brands', $brandsCount],
            ['Categories', $categoriesCount],
            ['Products', $productsCount],
            ['Users', $usersCount],
        ];


        $completeOrders = Order::where('status_message', 'completed')->whereMonth('created_at', Carbon::now()->month)->get();

        $totalEarnings = 0;

        // Loop through complete orders and calculate earnings
        foreach ($completeOrders as $order) {
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            foreach ($orderItems as $orderItem) {
                $totalEarnings += $orderItem->quantity * $orderItem->price;
            }
        }

        // $messages = Message::orderBy('id', 'desc')->take(5)->get();
        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at', Carbon::today())->count();
        $thisMonthOrder = Order::whereMonth('created_at', Carbon::now()->month)->count();
        $thisYearOrder = Order::whereYear('created_at', Carbon::now()->year)->count();
        $orders = Order::orderBy('id', 'desc')->take(10)->get();
        return view('admin.dashboard', compact('totalOrder', 'todayOrder', 'thisMonthOrder', 'thisYearOrder', 'orders', 'totalEarnings', 'data'));
    }
}
