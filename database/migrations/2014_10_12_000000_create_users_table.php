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
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('role_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phoneNumber')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_verified')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
