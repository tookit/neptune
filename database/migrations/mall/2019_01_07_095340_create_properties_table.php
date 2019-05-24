<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('type')->default('text');
            $table->string('unit')->default('');
            $table->json('options')->comment('duplicate for property_values');
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->timestamps();
        });

        Schema::create('product_has_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('property_id');
            $table->json('values')->comment('property values');
            $table->timestamps();
        });

        Schema::create('category_has_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('property_id');
            $table->json('values')->comment('property values');
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
        Schema::dropIfExists('properties');
        Schema::dropIfExists('product_has_properties');
        Schema::dropIfExists('category_has_properties');
    }
}
