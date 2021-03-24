<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    








      public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }


 		public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Aceptado ' : 'Pendiente';
    }


     public function servicio(){
        return $this->belongsTo(Servicios::class, 'servicio_id');
    }



     public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }


    public function linea(){
        return $this->hasMany(LineaPresupuesto::class, 'presupuesto_id');
    }
    

     public function scopeBuscarPorCodigo($query, $codigo){
        return $query->where('codigo','=',$codigo);
    }

}
