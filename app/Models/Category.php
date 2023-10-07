<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories"; // table name

    protected $fillable = [
        'name',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'slug',
    ];

    function products()  {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    function brands()
    {
        return $this->hasMany(Brand::class, 'category_id', 'id')->where('status', '1');
    }
}
