<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_Civil extends Model
{
     protected $table = 'estado_civil';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nb_estado_civil'
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
