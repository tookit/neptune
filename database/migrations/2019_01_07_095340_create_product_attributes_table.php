<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name');
            $table->enum('type',['sku','spu','other'])->default('spu');
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->timestamps();
        });
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_attribute_id');
            $table->string('value');
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->timestamps();
        });
        Schema::create('product_has_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_attribute_id');
            $table->integer('product_attribute_value_id');
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
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
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('product_attribute_values');
        Schema::dropIfExists('product_has_attributes');
    }
}
