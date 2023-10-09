<?php

namespace App\Livewire\Home;

use App\Models\Wishlists;
use Livewire\Component;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlists::where('user_id', auth()->user()->id)->get();
        return view('livewire.home.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
