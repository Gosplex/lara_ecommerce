<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
