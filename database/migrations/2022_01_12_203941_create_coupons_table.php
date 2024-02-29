<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar', 191)->nullable();
            $table->string('name_en', 191)->nullable();
            $table->string('code', 191)->nullable();
            $table->string('discount', 191)->nullable();
            $table->string('max_using', 191)->nullable();
            $table->string('user_max_using', 191)->nullable();
            $table->string('is_fixed', 191)->default('0')->comment('1 for discount is price  0 discount is  percentage');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->tinyInteger('record_state')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
