<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdesc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('descID')->unsigned();
            $table->integer('size')->unsigned();
            $table->integer('stock')->unsigned();
            $table->timestamps();
            $table->foreign('descID')->references('id')->on('product_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productdesc');
    }
}
