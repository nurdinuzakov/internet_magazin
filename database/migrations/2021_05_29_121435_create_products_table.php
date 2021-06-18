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
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->integer('quantity')->default(0);
            $table->date('expire_date')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')
                ->cascadeOnUpdate()->nullOnDelete();
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
