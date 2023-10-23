<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'website_name',
        'website_url',
        'title',
        'logo',
        'meta_keywords',
        'meta_description',
        'company_address',
        'phone_1',
        'phone_2',
        'email_1',
        'email_2',
        'about_text_1',
        'about_text_2',
        'about_text_3',
        'about_img_1',
        'about_img_2',
        'about_img_3',
        'long_text_1',
        'long_text_2',
        'long_text_3',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'map',
        'color_code',
        'favicon_image',
        'heading_font',
        'body_font',
    ];
}
