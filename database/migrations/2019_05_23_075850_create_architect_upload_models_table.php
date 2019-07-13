<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchitectUploadModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('architect_upload_models', function (Blueprint $table) {
                $table->increments('id');
                $table->string('user_name');
                $table->string('name');
                $table->string('type');
                $table->text('description');
                $table->string('extension');
                $table->integer('price');
                $table->string('floor_plan_code');
                $table->text('beds');
                $table->text('baths');
                $table->integer('lot_area_width')->nullable();
                $table->integer('lot_area_length')->nullable();
                $table->integer('floor_area_width')->nullable();
                $table->integer('floor_area_length')->nullable();
                $table->integer('floor_area_height')->nullable();
                $table->text('ground_floor')->nullable();
                $table->text('second_floor')->nullable();
                $table->text('third_floor')->nullable();
                $table->text('features')->nullable();
                $table->integer('user_id')->unsigned();
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('architect_upload_models');
    }
}
