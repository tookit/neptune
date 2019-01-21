<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->comment('Application Name');
            $table->json('description')->comment('Application Description');
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('product_has_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('product_application_id');
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
        Schema::dropIfExists('product_applications');
        Schema::dropIfExists('product_has_applications');
    }
}
