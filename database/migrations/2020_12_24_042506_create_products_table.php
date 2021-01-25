<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('pk');
            $table->string('id')->unique();
            $table->string('sellerId');
            $table->bigInteger('itemId')->unsigned();
            $table->bigInteger('supplierId')->unsigned();
            $table->string('name');
            $table->string('long_description');
            $table->string('short_description');
            $table->double('SRP');
            $table->double('price');
            $table->string('primary');
            $table->double('commission');
            $table->string('primary_cat');
            $table->string('sub_cat')->nullable();
            $table->integer('status')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
