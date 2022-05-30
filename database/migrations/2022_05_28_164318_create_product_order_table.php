<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id('id_producto_order');
            $table->integer('id_order');
            $table->foreign('id_order')->references('id_order')->on('orders');
            $table->integer('id_product');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->integer('cantidad');
            $table->integer('valor_unitario');
            $table->integer('total');
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
