<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('code')->nullable();
            $table->integer('number');
            $table->string('note')->nullable();
            $table->enum('status', ['WAITING_PAYMENT', 'WAITING_CONFIRM','CONFIRM','WAITING_PRODUCTION','FINISHED_PRODUCTION']);
            $table->dateTime('payment_date')->nullable();
            $table->enum('bank', ['KASIKORN', 'SCB','BANGKOK','KRUNGTHAI','GSB','KRUNGSRI'])->nullable();
            $table->integer('temp_address_id');
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
        Schema::dropIfExists('orders');
    }
}
