<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("user_id")->nullable();
            $table->string("country_id")->nullable();
            $table->string("governorate_id")->nullable();
            $table->string("street")->nullable();
            $table->string("building_number")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("floor")->nullable();
            $table->string("room")->nullable();
            $table->string("landmark")->nullable();
            $table->longText("additional_information")->nullable();
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
        Schema::dropIfExists('client_addresses');
    }
}
