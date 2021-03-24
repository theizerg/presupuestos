<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    
    public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }


 		public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Entregado ' : 'Ingresado';
    }

     public function presupuesto(){
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }



     public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }    

     public function scopeBuscarPorCodigo($query, $codigo){
        return $query->where('codigo','=',$codigo);
    }
}
