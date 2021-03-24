<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoSangre extends Model
{
      protected $table = 'tipo_sangre';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nb_tipo_sangre'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'create_at',
    ];
}
