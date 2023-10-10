<?php

namespace App\Http\Controllers\Home;

use App\Models\Wishlists;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        return view('home.wishlist.index');
    }

    public function delete($product)
    {
        $wishlist = Wishlists::where('user_id', auth()->user()->id)->where('product_id', $product)->first();
        $wishlist->delete();
        session()->flash('success', 'Product removed from wishlist successfully.');
        return redirect('/wishlist');
    }
}
