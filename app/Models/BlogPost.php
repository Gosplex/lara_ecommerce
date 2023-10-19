<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = "blogpost";


    protected $fillable = [
        'blog_title',
        'blog_category',
        'headline_image',
        'blog_image_1',
        'blog_image_2',
        'author_image',
        'author_name',
        'blog_heading_1',
        'blog_heading_2',
        'blog_post_text_1',
        'blog_post_text_2',
        'blog_post_text_3',
        'breaking_news',
        'featured_news',
        'latest_news',
        'trending_news',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category', 'id');
    }
}
