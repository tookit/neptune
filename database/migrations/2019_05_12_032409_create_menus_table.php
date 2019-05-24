<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->nestedSet();
            $table->string('name');
            $table->integer('sort_number')->default(0)->comment('Sort Number');
            $table->string('uri')->comment('Front uri')->unique();
            $table->string('icon')->nullable()->comment('Menu icon ');
            $table->tinyInteger('is_active')->default(0)->comment('0:active|1:inactive');
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
        Schema::dropIfExists('menus');
    }
}
