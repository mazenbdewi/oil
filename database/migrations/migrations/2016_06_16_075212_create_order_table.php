<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('orderType');
            $table->date('orderDate');
            $table->string('orderShipperName')->ablenull();
            $table->date('orderShipperDate')->ablenull();
            $table->decimal('orderShipperPrice')->ablenull();
            $table->string('orderPaymentType');
            $table->decimal('orderDiscount')->ablenull();
            $table->string('orderNote')->ablenull();
            $table->integer('employee_id');
            $table->integer('customer_id')->ablenull();
            $table->integer('provider')->ablenull();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
