<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVendorsTable extends Migration
{


    protected $table = 'vendors';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('is_active')->default(0);
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->timestamps();
        });
        Schema::create('product_has_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('vendor_id');
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
        Schema::dropIfExists('product_has_vendors');
    }
}
