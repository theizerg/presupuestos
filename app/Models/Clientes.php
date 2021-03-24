<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

	protected $fillable = [
		'nombre', 'apellido', 'empresa', 'rif', 'mail', 'direccion', 'telefono', 'tipo_documento_id', 'genero_id','usuario_id'
	];

	protected $dates = ['deleted_at'];

	public function comprobantes(){
		return $this->hasMany(Comprobante::class);
	}

	public function vendedor(){
	return $this->belongsTo(App\Models\User::class);
	}

	public function tipodoc(){
		return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
	}

	public function genero(){
		return $this->belongsTo(Genero::class, 'genero_id');
	}

	// FILTROS
	public function scopeFiltrarPorNombre($query, $texto, $boolean = 'or'){
		return $query->where('nombre','like', '%'.$texto.'%', $boolean);
	}
	public function scopeFiltrarPorApellido($query, $texto, $boolean = 'or'){
		return $query->where('apellido','like', '%'.$texto.'%', $boolean);
	}
	public function scopeFiltrarPorRut($query, $texto, $boolean = 'or'){
		return $query->where('rif','like', '%'.$texto.'%', $boolean);
	}
	public function scopeFiltrarPorMail($query, $texto, $boolean = 'or'){
		return $query->where('mail','like', '%'.$texto.'%', $boolean);
	}

	public function getSaldo(){
		$facturas_inpagas = Factura::buscarPorCliente($this->id)->where('deuda_actual', '>', 0)->get();

		$saldo_negativo = $facturas_inpagas->reduce(function ($saldo, $item) {
			return $saldo + $item->deuda_actual;
		});

		$saldo_positivo = 0;

		$total = $saldo_negativo - $saldo_positivo;
		return $total;
	}


	  public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }


}
