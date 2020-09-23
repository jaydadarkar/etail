<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->integer('user_id');
            $table->integer('address_line_id');
            $table->integer('product_line_id');
            $table->string('order_status');
            $table->string('order_sub_total');
            $table->string('order_total');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('coupon_code')->nullable();
            $table->string('affiliate_code')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
