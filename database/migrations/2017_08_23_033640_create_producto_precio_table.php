<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoPrecioTable extends Migration
{
    public function up()
    {
        Schema::create('servicio_precio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');

            // Usuario asociado
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            
            $table->DateTime('fecha');
            
            $table->double('precio')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_precio');
    }
}
