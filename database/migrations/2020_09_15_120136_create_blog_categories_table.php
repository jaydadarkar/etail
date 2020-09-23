<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('blog_category_name')->unique();
            $table->string('blog_category_slug')->unique();
            $table->string('blog_category_desc')->nullable();
            $table->string('blog_meta_keywords')->nullable();
            $table->string('blog_meta_desc')->nullable();
            $table->string('blog_featured_image')->nullable();
            $table->integer('blog_category_parent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
}
