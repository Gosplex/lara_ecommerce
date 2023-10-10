<?php

namespace App\Livewire\Home\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount;

    protected $listeners = [
        'checkCartCount'
    ];

    public function checkCartCount()
    {
        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            return $this->cartCount = 0;
        }
    }
    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.home.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
