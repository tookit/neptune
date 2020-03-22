<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{


    protected $table = 'mall_products';

    /**
     * Run the migrations.
     * SPU table
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('name')->unique()->comment('Product name');
            $table->text('description')->nullable()->comment('Product Short Description');
            $table->text('body')->nullable()->comment('Product Long Description');
            $table->json('props')->nullable()->comment('duplicated for properties relations -  format|attr_id:value_id');
            $table->text('apps')->nullable()->comment(' duplicated for applications relations - Product applications');
            $table->text('features')->nullable()->comment('Product features Description');
            $table->text('specs')->nullable()->comment('Product specs');
            $table->text('packaging')->nullable()->comment('Product package info');
            $table->tinyInteger('flag')->unsigned()->default(0)->comment('1:hot|2:featrued|3:Home page');
            $table->string('featured_img')->nullable()->comment('Featured Image');
            $table->string('reference_url')->nullable();
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists($this->table);
    }
}
