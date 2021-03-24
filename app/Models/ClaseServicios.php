<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaseServicios extends Model
{
     protected $table = 'clase_servicios';

	protected $fillable = [
		'nombre'
	];











 public function getEncodeIDAttribute()
	{
	return \Hashids::encode($this->id);
	}


}
