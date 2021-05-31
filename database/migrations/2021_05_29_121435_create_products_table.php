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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('category_id');
            //$table->integer('quantity');
            $table->integer('price');
            //$table->integer('available_size');
            //$table->string('available_colors');
            $table->integer('quantity_in_order');
            $table->integer('date_of_expire')->nullable();
            $table->string('images');
            $table->string('notes')->nullable();
            $table->integer('ranking');
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
        Schema::dropIfExists('products');
    }
}
