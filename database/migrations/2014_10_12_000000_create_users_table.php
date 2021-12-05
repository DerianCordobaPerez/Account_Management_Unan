<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('names');
            $table->string('lastnames');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('sex', ['male', 'feminine']);
            $table->string('identification');
            $table->enum('maritalStatus', ['single', 'married', 'divorced']);
            $table->string('phone');
            $table->string('nationality');
            $table->string('municipality');
            $table->string('address');
            $table->string('neighborhood');
            $table->dateTime('birthday');
            $table->string('password');
            $table->softDeletes();
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
