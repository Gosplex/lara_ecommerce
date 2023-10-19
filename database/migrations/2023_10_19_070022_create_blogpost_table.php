<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogpost', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title');
            $table->unsignedBigInteger('blog_category');
            $table->string('headline_image');
            $table->string('blog_image_1');
            $table->string('blog_image_2');
            $table->string('author_image');
            $table->string('author_name');
            $table->string('blog_heading_1');
            $table->string('blog_heading_2');
            $table->string('blog_post_text_1');
            $table->string('blog_post_text_2');
            $table->string('blog_post_text_3');
            $table->tinyInteger('breaking_news')->default('1')->comment('0=Inactive, 1=Active');
            $table->tinyInteger('featured_news')->default('1')->comment('0=Inactive, 1=Active');
            $table->tinyInteger('latest_news')->default('1')->comment('0=Inactive, 1=Active');
            $table->tinyInteger('trending_news')->default('1')->comment('0=Inactive, 1=Active');
            $table->tinyInteger('status')->default('1')->comment('0=Inactive, 1=Active');
            $table->foreign('blog_category')->references('id')->on('blog_category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogpost');
    }
};
