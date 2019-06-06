<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckOutModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_out_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('billing_name');
            $table->string('billing_address_country');
            $table->string('billing_address_country_code');
            $table->string('billing_address_zip');
            $table->string('billing_address_line1');
            $table->string('design_code');
            $table->string('designer_name');
            $table->boolean('noti_user');
            $table->boolean('noti_architect')->default(0);
            $table->boolean('noti_admin');
            $table->boolean('noti_interior')->default(0);
            $table->string('reference_number');
            $table->integer('user_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('check_out_models');
    }
}
