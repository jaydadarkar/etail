<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_sku')->unique();
            $table->string('product_slug')->unique();
            $table->string('product_category');
            $table->string('product_variation')->nullable();
            $table->string('product_short_desc');
            $table->string('product_long_desc');
            $table->integer('product_mrp')->nullable();
            $table->integer('product_price');
            $table->string('product_primary_image');
            $table->string('product_other_images')->nullable();
            $table->string('product_meta_keywords')->nullable();
            $table->string('product_meta_desc')->nullable();
            $table->integer('product_featured')->nullable();
            $table->string('product_tags')->nullable();
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
        Schema::dropIfExists('products');
    }
}