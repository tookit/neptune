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
            $table->string('title');
            $table->integer('order')->default(0)->comment('排序');
            $table->string('uri')->comment('链接')->unique();
            $table->string('icon')->nullable()->comment('排序');
            $table->tinyInteger('is_active')->default(0)->comment('0:激活|1:激活');
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
