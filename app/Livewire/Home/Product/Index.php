<?php

namespace App\Livewire\Home\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{

    public $products, $category, $priceInputs, $brandInputs = [], $productCount;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInputs' => ['except' => '', 'as' => 'price']
    ];
    function mount($category)
    {
        $this->category = $category;
        $this->productCount = Product::where('category_id', $this->category->id)->count();
    }

    public function applyFilter()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($q) {
                $q->whereIn('brand', $this->brandInputs);
            })
            ->get();
    }

    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($query) {
                $query->whereIn('brand', $this->brandInputs);
            })
            ->when($this->priceInputs, function ($query) {
                $query->when($this->priceInputs == 'high-to-low', function ($q) {
                    $q->orderBy('selling_price', 'desc');
                })->when($this->priceInputs == 'low-to-high', function ($q) {
                    $q->orderBy('selling_price', 'asc');
                });
            })
            ->where('status', '1')
            ->get();
        return view('livewire.home.product.index', [
            'products' => $this->products,
            'category' => $this->category,
            'productCount' => $this->productCount
        ]);
    }
}
