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
            $table->string('code');
            $table->string('title_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->enum('role', ['ADMIN', 'STICKER SUPPLIER', 'T-SHIRT SUPPLIER', 'BLACK MEMBER', 'RED MEMBER' , 'WHITE MEMBER']);
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->date('birthday')->nullable();
            $table->string('telephone',20);
            $table->string('facebook')->nullable();
            $table->enum('line_id_type', ['LINE_ID', 'PHONE_NUMBER']);
            $table->string('line_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
