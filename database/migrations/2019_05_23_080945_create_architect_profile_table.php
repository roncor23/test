<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchitectProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senebu.architect_profile_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('username');
            $table->string('phone');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('city_town');
            $table->string('state_country_province');
            $table->string('postcode');
            $table->string('country');
            $table->string('birthday');
            $table->integer('admin_id')->unsigned();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senebu.architect_profile_models');
    }
}
