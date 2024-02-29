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
            $table->bigIncrements('id');
            $table->string("guid")->nullable();
            $table->string("user_id")->nullable();
            $table->string("governorate_id")->nullable();
            $table->string("subtotal")->nullable();
            $table->string("total")->nullable();
            $table->string("delivery_cost")->nullable();
            $table->string("coupon_id")->nullable();
            $table->string("coupon_discount")->nullable();
            $table->string("status")->default(0);
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
