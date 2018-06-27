<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('main_car_generation', ['YARIS_ATIV', 'YARIS']);
            $table->enum('secondary_car_generation', ['S', 'G', 'E', 'J', 'J_ECO']);
            $table->enum('color',['BLACK', 'BLUE', 'GREY', 'SILVER', 'BROWN', 'WHITE', 'RED']);
            $table->string('manufacture_year');
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cars');
    }
}
