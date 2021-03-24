<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado_Instruccion extends Model
{
   protected $table = 'grado_instruccion';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nb_grado_instruccion'
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
