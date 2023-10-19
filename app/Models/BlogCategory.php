<?php

namespace App\Models;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_category';


    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    function post()
    {
        return $this->hasMany(BlogPost::class, 'blog_category', 'id');
    }
}
