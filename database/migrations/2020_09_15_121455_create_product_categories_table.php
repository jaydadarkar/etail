<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_name')->unique();
            $table->string('product_category_slug')->unique();
            $table->string('product_category_desc')->nullable();
            $table->string('product_cat_meta_keywords')->nullable();
            $table->string('product_cat_meta_desc')->nullable();
            $table->string('product_cat_featured_image')->nullable();
            $table->integer('product_cat_parent_id')->nullable();
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
        Schema::dropIfExists('product_categories');
    }
}
