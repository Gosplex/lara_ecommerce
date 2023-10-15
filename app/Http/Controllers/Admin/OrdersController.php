<?php

namespace App\Http\Controllers\Admin;

use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

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

    function update($orderId, Request $request)
    {
        $orders = Order::where('id', $orderId)->first();

        if (!$orders) {
            return redirect('admin/orders/' . $orderId)->with('message', 'Order not found');
        } else {
            $orders->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'Order Status Updated Successfully');
        }
    }

    function viewInvoice($orderId)
    {
        $orders = Order::findOrfail($orderId);
        return view('admin.invoice.generate-invoice', compact('orders'));
    }

    function generateInvoice($orderId)
    {
        $orders = Order::findOrfail($orderId);
        $data = ['orders' => $orders];

        $todayDate = Carbon::now()->format('d-m-Y');

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('invoice - ' . $orders->id . '-' . $todayDate . '.pdf');
    }

    function sendInvoice($orderId)
    {
        try {
            $orders = Order::findOrfail($orderId);
            Mail::to("$orders->email")->send(new InvoiceOrderMailable($orders));
            return redirect()->back()->with('message', 'Order sent to ' . $orders->email . 'successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong');
        }

    }
}
