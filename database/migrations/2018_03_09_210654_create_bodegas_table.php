<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->increments('id_bodega');
            $table->integer('num_pedido');
            $table->integer('cod_articulo');
            $table->string('desc_articulo');
            $table->integer('cantidad');
            $table->integer('cod_proveedor');
            $table->integer('cant_recibida');
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
        Schema::drop('bodegas');
    }
}
