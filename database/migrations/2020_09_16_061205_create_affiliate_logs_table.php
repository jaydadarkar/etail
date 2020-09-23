<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('affiliate_id')->unique();
            $table->integer('order_total');
            $table->integer('settlement_amount')->default(0);
            $table->string('settlement_status')->default('unsettled');
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
        Schema::dropIfExists('affiliate_logs');
    }
}
