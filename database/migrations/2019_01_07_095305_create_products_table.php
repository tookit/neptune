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
            $table->string('name')->unique()->comment('Product Name');
            $table->string('description')->nullable()->comment('Product Short Description');
            $table->json('content')->nullable()->comment('Product Long Description');
            $table->json('attribute_list')->nullable()->comment('format|attr_id:value_id');
            $table->text('features')->nullable()->comment('Product features');
            $table->text('specs')->nullable()->comment('Product specs');
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_description')->nullable();
            $table->tinyInteger('flag')->default(0);
            $table->string('featured_img')->nullable();
            $table->string('reference_url')->nullable();
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
