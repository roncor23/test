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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('role')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('senebu.check_out_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('billing_name');
            $table->string('billing_address_country');
            $table->string('billing_address_country_code');
            $table->string('billing_address_zip');
            $table->string('billing_address_line1');
            $table->string('design_code');
            $table->string('designer_name');
            $table->boolean('noti_user')->unsigned();
            $table->boolean('noti_architect')->default(0);
            $table->boolean('noti_admin')->unsigned();
            $table->boolean('noti_interior')->default(0);
            $table->integer('user_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        
        Schema::create('architect_upload_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('name');
            $table->string('type');
            $table->text('description');
            $table->string('extension');
            $table->integer('price');
            $table->string('floor_plan_code');
            $table->integer('beds');
            $table->integer('baths');
            $table->integer('floors');
            $table->integer('garage');
            $table->integer('lot_size');

            $table->string('depth')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('main_floor_area')->nullable();
            $table->string('lower_floor_area')->nullable();
            $table->string('garage_area')->nullable();
            $table->string('deck_area')->nullable();

            $table->string('lower_ceiling')->nullable();
            $table->string('garage_ceiling')->nullable();
            $table->string('main_ceiling')->nullable();


            $table->string('roof');
            $table->string('master_bedroom')->nullable();
            $table->string('bedrooms')->nullable();
            $table->integer('lower_level_bedrooms');
            $table->integer('walk_in_closet');

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
        Schema::dropIfExists('users');
    }
}
