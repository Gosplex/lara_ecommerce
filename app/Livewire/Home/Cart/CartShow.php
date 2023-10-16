<?php

namespace App\Livewire\Home\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{
    public $cart;

    function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->quantity == 1) {
                $cartData->quantity = 1;
                session()->flash('message', 'Quantity cannot be below 1!');
                return;
            } else {
                $cartData->decrement('quantity');
                session()->set('message', 'Cart updated successfully!');
            }
        } else {
            session()->flash('message', 'Cart not found!');
        }
    }

    function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->increment('quantity');
                session()->flash('message', 'Cart updated successfully!');
            } else {
                $cartData->quantity = $cartData->product->quantity;
                $cartData->save();
                session()->flash('message', 'Quantity cannot be more than ' . $cartData->product->quantity . '!');
                return;
            }
        } else {
            session()->flash('message', 'Cart not found!');
        }
    }

    function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartRemoveData) {
            $cartRemoveData->delete();
            session()->flash('message', 'Cart item removed successfully!');
        } else {
            session()->flash('message', 'Cart not found!');
        }
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', Auth::id())->get();
        return view('livewire.home.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
