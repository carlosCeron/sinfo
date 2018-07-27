<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id_compra');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id_pedido')->on('pedidos');
            $table->string('cliente');
            $table->integer('cod_articulo');
            $table->string('desc_articulo');
            $table->integer('cantidad');
            $table->integer('proveedor');
            $table->integer('precio');
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
        Schema::drop('ventas');
    }
}
