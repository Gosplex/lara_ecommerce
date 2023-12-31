<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $table   = 'order_items';

    protected $fillable = [
        'order_id',
        'products_id',
        'product_color_id',
        'quantity',
        'price',
    ];

    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
