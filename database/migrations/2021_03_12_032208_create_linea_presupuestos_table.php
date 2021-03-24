<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaPresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_presupuestos', function (Blueprint $table) {
            $table->increments('id');
            // Usuario asociado
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            // Cinoribante asociado : NULLABLE
            $table->integer('presupuesto_id')->unsigned()->nullable();
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');

            $table->integer('servicio_id')->unsigned()->nullable();
            $table->foreign('servicio_id')->references('id')->on('servicios');
                     
            $table->DateTime('fecha')->default(date("Y-m-d H:i:s"));
            
            $table->double('precioUnitario')->nullable();

            $table->double('subTotal')->nullable();
            $table->double('total')->nullable();

            $table->index(['fecha']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_presupuestos');
    }
}
