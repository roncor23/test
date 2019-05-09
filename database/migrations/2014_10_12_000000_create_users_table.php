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

            $table->integer('lot_area_width')->nullable();;
            $table->integer('lot_area_length')->nullable();;

            $table->integer('floor_area_width')->nullable();;
            $table->integer('floor_area_length')->nullable();;
            $table->integer('floor_area_height')->nullable();;

            $table->integer('ground_floor')->nullable();
            $table->integer('second_floor')->nullable();
            $table->integer('third_floor')->nullable();

            $table->integer('lower_level_bedrooms');
            $table->integer('walk_in_closet');

            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('add_designer_account_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('email');
            $table->string('verification_code');
            $table->integer('role');
            $table->boolean('verified')->default(0);
            $table->integer('admin_id')->unsigned();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
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
