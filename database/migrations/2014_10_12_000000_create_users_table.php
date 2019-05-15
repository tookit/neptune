<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->comment('Username');
            $table->string('email')->unique();
            $table->string('mobile')->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //extend
            $table->enum('gender', \App\Models\User::GENDER)->default(\App\Models\User::GENDER_DEFAULT);
            $table->string('avatar')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->boolean('active')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
