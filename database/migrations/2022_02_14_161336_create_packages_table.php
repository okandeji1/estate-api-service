<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('package_category_id');
            $table->string('name')->nullable();
            $table->integer('price')->default(0);
            $table->integer('percentage_save')->default(0);
            $table->integer('number_of_listing')->default(0);
            $table->integer('limit_purchase')->default(0);
            $table->integer('month')->default(3);
            $table->string('description');
            $table->tinyInteger('is_default')->default(0);
            $table->tinyInteger('is_enabled')->default(0);
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
        Schema::dropIfExists('packages');
    }
}
