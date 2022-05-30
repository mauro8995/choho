<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('id_order');
            $table->integer('total_pruductos');
            $table->integer('total_pedido');
            $table->integer('id_status');
            $table->foreign('id_status')->references('id_status')->on('statuses');
            $table->date('fecha_pago');
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clients');
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
        Schema::dropIfExists('orders');
    }
}
