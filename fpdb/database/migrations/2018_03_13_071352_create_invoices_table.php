<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userID')->unsigned();
            $table->integer('orderID')->unsigned();
            $table->integer('totalPrice')->unsigned();;
            $table->date('orderDate');
            $table->string('paymentType');
            $table->string('paymentStatus');
            $table->string('orderStatus');
            $table->timestamps();
            $table->foreign('orderID')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
