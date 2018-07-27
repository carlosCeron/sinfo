<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empaques', function (Blueprint $table) {
            $table->increments('id_empaque');
            $table->integer('articulo_id')->unsigned();
            $table->foreign('articulo_id')->references('codigo_articulo')->on('articulos');
            $table->integer('numero_pedido');
            $table->integer('cantidad');
            $table->integer('unidades');
            $table->integer('cantidad_estimada');
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
        Schema::drop('empaques');
    }
}
