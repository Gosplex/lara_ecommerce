<?php

namespace App\Livewire\Home\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutShow extends Component
{
    public $carts, $totalAmount = 0;

    public $fullname, $email, $phone, $address, $pincode, $payment_mode = null, $payment_id = null;

    protected $listeners = ['ValidatedForAll'];

    public function ValidatedForAll()
    {
        $this->validate();
    }
    function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'address' => 'required|string|max:500',
            'pincode' => 'required|max:6|min:6',
        ];
    }

    function placeOrder()
    {
        $validatedDate = $this->validate();
        $order = Order::create([
            'user_id' => Auth::id(),
            'tracking_no' => 'TRK' . rand(100000, 999999),
            'fullname' => $validatedDate['fullname'],
            'email' => $validatedDate['email'],
            'phone' => $validatedDate['phone'],
            'address' => $validatedDate['address'],
            'pincode' => $validatedDate['pincode'],
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
            'status_message' => 'in Progress...',
        ]);

        foreach ($this->carts as $cart) {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'products_id' => $cart->product_id,
                'product_color_id' => $cart->product_color_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->selling_price,
            ]);

            if ($cart->product_color_id != NULL) {
                $cart->productColor()->where('id', $cart->product_color_id)->decrement('quantity', $cart->quantity);
            } else {
                $cart->product()->where('id', $cart->product_id)->decrement('quantity', $cart->quantity);
            }
        }

        return $order;
    }
    function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            Cart::where('user_id', Auth::id())->delete();
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Order Placed Successfully!'
            ]);
            return redirect('/thank-you');
        } else {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Something went wrong!'
            ]);
            return redirect()->to('thank-you');
        }
    }
    function tottalProductAmount()
    {
        $this->carts = Cart::where('user_id', Auth::id())->get();
        $this->totalAmount = 0;
        foreach ($this->carts as $cart) {
            $this->totalAmount += $cart->product->selling_price * $cart->quantity;
        }
        return $this->totalAmount;
    }
    public function render()
    {
        $this->totalAmount = $this->tottalProductAmount();
        $this->fullname = Auth::user()->name;
        $this->email = Auth::user()->email;
        return view('livewire.home.checkout.checkout-show', [
            'totalAmount' => $this->totalAmount
        ]);
    }
}
