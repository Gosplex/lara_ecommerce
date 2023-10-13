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
                session()->flash('error', 'Quantity cannot be below 1!');
                return;
            } else {
                $cartData->decrement('quantity');
                session()->set('success', 'Cart updated successfully!');
            }
        } else {
            session()->flash('error', 'Cart not found!');
        }
    }

    function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->increment('quantity');
                $this->dispatch('alert', [
                    'type' => 'success',
                    'message' => 'Cart updated successfully!',
                    'status' => 200
                ]);
            } else {
                $cartData->quantity = $cartData->product->quantity;
                $cartData->save();
                $this->dispatch('alert', [
                    'type' => 'error',
                    'message' => 'Quantity cannot be more than ' . $cartData->product->quantity . '!',
                    'status' => 400
                ]);
                return;
            }
        } else {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Cart not found!',
                'status' => 404
            ]);
        }
    }

    function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartRemoveData) {
            $cartRemoveData->delete();
            // $this->emit('cartUpdated');
            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Item removed successfully!',
                'status' => 200
            ]);
        } else {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Something went wrong!',
                'status' => 404
            ]);
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
