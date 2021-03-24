<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    
 protected $table = 'servicios';





    public function tiposervicios(){
		return $this->belongsTo(ClaseServicios::class, 'clase_servicio_id');
	}

	 public function registrarCambioPrecio(){
        \DB::table('servicio_precio')->insert([
            'servicio_id' => $this->id,
            'usuario_id' => \Auth::user()->id,
            'fecha' => date("Y-m-d H:i:s"),
            'precio' => $this->precio
        ]);
    }

    public function preciosHistorico(){
        return\ DB::table('servicio_precio')->select(
            'fecha',
            'usuario_id',
            'precio'
        )->where('servicio_id', $this->id)
        ->orderBy('fecha', 'desc')->get();
    }


    public function scopeBuscarPorCodigo($query, $codigo){
        return $query->where('codigo','=',$codigo);
    }

     public function scopeBuscarPorServicio($query, $texto){
        return $query->where('nombre','=',$texto);
    }

    public function scopeFiltrarPorCodigo($query, $codigo, $boolean = 'or'){
        return $query->where('codigo', 'like', '%'.$codigo.'%', $boolean);
    }

     public function scopeFiltrarPorNombre($query, $texto, $boolean = 'or'){
        return $query->where('nombre', 'like', '%'.$texto.'%', $boolean);
    }
      public function iva(){
        return $this->belongsTo(TasaIva::class, 'tasa_iva_id');
    }
}
