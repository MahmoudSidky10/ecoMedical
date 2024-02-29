<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('record_state')->default(1);
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
