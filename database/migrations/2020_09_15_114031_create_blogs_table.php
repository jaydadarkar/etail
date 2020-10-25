<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id');
            $table->string('post_status');
            $table->string('post_title');
            $table->string('post_category');
            $table->string('post_slug')->unique();
            $table->string('post_image')->nullable();
            $table->longText('post_content');
            $table->string('post_tags')->nullable();
            $table->string('post_featured_image')->nullable();
            $table->string('post_meta_keywords')->nullable();
            $table->string('post_meta_desc')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
