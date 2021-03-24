<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

	protected $fillable = [
		'nombre', 'razon_social', 'rif', 'mail', 'direccion', 'telefono', 'web','usuario_id'
	];

	protected $dates = ['deleted_at'];

	public function comprobantes(){
		return $this->hasMany(App\Models\Comprobante::class);
	}

	public function vendedor(){
	return $this->belongsTo(App\Models\User::class);
	}

	// FILTROS
	public function scopeFiltrarPorNombre($query, $texto, $boolean = 'or'){
		return $query->where('nombre','like', '%'.$texto.'%', $boolean);
	}
	public function scopeFiltrarPorRazonSocial($query, $texto, $boolean = 'or'){
		return $query->where('razon_social','like', '%'.$texto.'%', $boolean);
	}
	public function scopeFiltrarPorRut($query, $texto, $boolean = 'or'){
		return $query->where('rif','like', '%'.$texto.'%', $boolean);
	}
	public function scopeFiltrarPorMail($query, $texto, $boolean = 'or'){
		return $query->where('mail','like', '%'.$texto.'%', $boolean);
	}

	// BUSQUEDA
	public function scopeBuscarPorRut($query, $rif){
		return $query->where('rif','=',$rif);
	}


	public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }

}
