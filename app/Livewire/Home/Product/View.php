<?php

namespace App\Livewire\Home\Product;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlists;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class View extends Component
{

    public $product, $category, $quantityCount = 1;

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

    function decrementQuantity()
    {
        if ($this->quantityCount <= 1) {
            $this->quantityCount = 1;
            return false;
        } else {
            $this->quantityCount--;
        }
    }

    function incrementQuantity()
    {
        if ($this->quantityCount >= 10) {
            $this->quantityCount = 10;
            return false;
        } else {
            $this->quantityCount++;
        }
    }

    function addToCart(int $productId)
    {
        if (Auth::check()) {
            $product = Product::find($productId);
            if(Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                $this->dispatch('alert', [
                    'text' => 'Product already added to cart',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else {
                if ($product->quantity < $this->quantityCount) {
                    $this->dispatch('alert', [
                        'text' => 'Product quantity is not available',
                        'type' => 'warning',
                        'status' => 409
                    ]);
                    return false;
                }
                $cart = session()->get('cart');
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] += $this->quantityCount;
                    session()->put('cart', $cart);
                    $this->dispatch('alert', [
                        'text' => 'Product added to cart',
                        'type' => 'info',
                        'status' => 200
                    ]);
                    return true;
                }
                Cart::create([
                    "user_id" => Auth::user()->id,
                    "quantity" => $this->quantityCount,
                    "product_id" => $productId,
                ]);
                session()->put('cart', $cart);
                $this->dispatch('alert', [
                    'text' => 'Product added to cart',
                    'type' => 'info',
                    'status' => 200
                ]);
                return true;
            }
        } else {
            $this->dispatch('alert', [
                'text' => 'Please login to add product to cart',
                'type' => 'error',
                'status' => 401
            ]);
            return false;
        }
    }

    public function downloadPDF($filePath)
    {
        $file = public_path($filePath);

        if (file_exists($file)) {
            $randomString = Str::random(10);
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $newFileName = $randomString . '.' . $extension;

            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            return Response::download($file, $newFileName, $headers);
        } else {
            session()->flash('error', 'File not found.');
        }
    }

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
