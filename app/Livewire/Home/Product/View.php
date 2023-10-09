<?php

namespace App\Livewire\Home\Product;

use App\Models\Product;
use App\Models\Wishlists;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    function addToWishlist($productId)
    {
        if (Auth::check()) {
            if (Wishlists::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('error', 'Product already added to wishlist');
                return false;
            }
            Wishlists::create([
                'user_id' => Auth::user()->id,
                'product_id' => $productId
            ]);
            session()->flash('success', 'Product added to wishlist');
        } else {
            session()->flash('error', 'Please login to add product to wishlist');
            return false;
        }
    }
    public $product, $category;
    function mount($category, $product)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.home.product.view', [
            'product' => $this->product,
            'category' => $this->category
        ]);
    }
}
