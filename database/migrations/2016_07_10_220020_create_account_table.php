<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accountName');
            $table->date('accountDate');
            $table->decimal('accountSub');
            $table->decimal('accountSum');
            $table->string('bankName');
            $table->integer('checkNo');
            $table->date('checkDate');
            $table->string('accountNote');
            $table->integer('employee_id');
            $table->integer('provider_id');

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
        Schema::drop('accounts');
    }
}
