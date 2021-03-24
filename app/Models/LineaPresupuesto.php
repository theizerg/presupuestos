<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaPresupuesto extends Model
{
    protected $table = 'linea_presupuestos';

    protected $fillable = [
        'presupuesto_id', 'usuario_id', 'servicio_id', 'fecha','precio','subTotal','total'
    ];

    public $timestamps = false;

    public function presupuesto(){
    	return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }

    public function usuario(){
    	return $this->belongsTo(User::class, 'usuario_id');
    }

    public function servicio(){
        return $this->belongsTo(Servicios::class, 'servicio_id');
    }


     public function getEncodeIDAttribute()
    {
    return \Hashids::encode($this->id);
    }

    
}
