<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('house_number');
            $table->string('village_number');
            $table->string('alley');
            $table->string('road');
            $table->string('sub_district');
            $table->string('district');
            $table->string('province');
            $table->string('country');
            $table->string('postal_code');
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
        Schema::dropIfExists('temp_addresses');
    }
}
