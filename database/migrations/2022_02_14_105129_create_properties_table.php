<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('property_category_id');
            $table->text('title');
            $table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('Nigeria');
            $table->string('landmark')->nullable();
            $table->integer('click_counts')->default(0);
            $table->integer('number_of_bedrooms')->default(1);
            $table->integer('number_of_floors')->default(0);
            $table->integer('number_of_bathrooms')->default(1);
            $table->integer('price')->default(0);
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->integer('square_metre')->default(0);
            $table->text('image')->nullable();
            $table->string('video_url')->nullable();
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_expired')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
