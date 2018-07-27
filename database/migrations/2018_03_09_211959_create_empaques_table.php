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
            $table->integer('cod_articulo');
            $table->string('desc_articulo');
            $table->integer('cantidad');
            $table->integer('cantidad_estimada');
            $table->integer('cantidad_total');
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
