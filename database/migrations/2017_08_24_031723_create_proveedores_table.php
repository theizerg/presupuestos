<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->boolean('empresa')->default(0);
            $table->string('rif')->nullable();
            $table->string('telefono')->nullable();
            $table->string('documento')->nullable();
            $table->string('mail')->nullable();
            $table->string('direccion')->nullable(); 
            $table->integer('genero_id')->unsigned()->unsigned();
            $table->foreign('genero_id')->references('id')->on('genero'); 

            // Razon social por defecto
            $table->string('razon_social')->nullable();

            // Usuario asociado
            $table->integer('usuario_id')->unsigned()->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->integer('tipo_documento_id')->unsigned()->unsigned();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');

            $table->softDeletes();
            $table->timestamps();

            $table->index(['mail', 'rif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
