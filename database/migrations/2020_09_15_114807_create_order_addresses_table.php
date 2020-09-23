<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('user_billing_name');
            $table->string('user_billing_address_line_1');
            $table->string('user_billing_address_line_2')->nullable();
            $table->string('user_billing_city');
            $table->string('user_billing_state');
            $table->string('user_billing_country');
            $table->string('user_billing_postal');
            $table->string('user_billing_phone');
            $table->string('user_shipping_name');
            $table->string('user_shipping_address_line_1');
            $table->string('user_shipping_address_line_2')->nullable();
            $table->string('user_shipping_city');
            $table->string('user_shipping_state');
            $table->string('user_shipping_country');
            $table->string('user_shipping_postal');
            $table->string('user_shipping_phone');
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
        Schema::dropIfExists('order_addresses');
    }
}
