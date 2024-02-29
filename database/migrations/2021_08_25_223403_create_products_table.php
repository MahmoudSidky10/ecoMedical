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
            $table->bigIncrements('id');
            $table->string("slug")->nullable();
            $table->string("name_ar")->nullable();
            $table->string("name_en")->nullable();
            $table->longText("description")->nullable();
            $table->string("model_number")->nullable();
            $table->double("price")->nullable();
            $table->double("price_sale")->nullable();
            $table->string("delivery_time")->nullable();
            $table->string("record_state")->default(1);
            $table->string("stock_quantity")->default(1);
            $table->string("warranty_years")->nullable();
            $table->string("is_hot_product")->default(0);
            $table->string("is_deal_product")->default(0);
            $table->string("brand_id")->nullable();
            $table->string("category_id")->nullable();
            $table->string("is_vat_included")->default(0)->nullable();
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
