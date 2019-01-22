<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * SPU table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->comment('Product Name');
            $table->json('description')->comment('Product Short Description');
            $table->json('body')->comment('Product Long Description');
            $table->json('attribute_list')->comment('format|attr_id:value_id');
            $table->json('features')->comment('Product features');
            $table->json('specs')->comment('Product specs');
            $table->json('ordering')->comment('Product ordering info');
            $table->boolean('is_hot')->default(false)->comment('Product is hot or not');
            $table->boolean('active')->default(false);
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->softDeletes();
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
