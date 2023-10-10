<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\Wishlists;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishlistCount;

    function checkWishlistCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount = Wishlists::where('user_id', Auth::id())->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }
    public function render()
    {
        return view('livewire.home.wishlist-count', [
            'wishlistCount' => $this->wishlistCount = $this->checkWishlistCount()
        ]);
    }
}
