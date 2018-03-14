<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryID')->unsigned();
            $table->string('brand');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->binary('image');
            $table->text('description');
            $table->string('material');
            $table->integer('size')->unsigned();
            $table->integer('stock')->unsigned();
            $table->timestamps();
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
