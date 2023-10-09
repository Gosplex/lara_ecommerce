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
                $this->dispatch('alert', [
                    'text' => 'Product already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            Wishlists::create([
                'user_id' => Auth::user()->id,
                'product_id' => $productId
            ]);
            $this->dispatch('alert', [
                'text' => 'Product added to wishlist',
                'type' => 'info',
                'status' => 200
            ]);
        } else {
            $this->dispatch('alert', [
                'text' => 'Please login to add product to wishlist',
                'type' => 'error',
                'status' => 401
            ]);
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
