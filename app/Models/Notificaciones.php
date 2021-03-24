<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notificaciones;
use App\Models\User;
use Auth;
use DB;

class Notificaciones extends Model
{

  protected $table = 'notificaciones';

    protected $fillable = [
        'titulo', 'texto', 'link', 'fecha'
    ];    

   
    public static function crearNotificacion($titulo, $texto, $link, $link_texto){
      

        $notificacion = new Notificaciones();
        $notificacion->titulo = $titulo;
        $notificacion->texto = $texto;
        $notificacion->link = $link;
        $notificacion->link_texto = $link_texto;
        $notificacion->fecha = date("Y-m-d H:i:s");
        $notificacion->save();
        
        Notificaciones::cargarNotificaciones();
    }


    public static function cargarNotificaciones(){
        $usuario = \Auth::user();
        $notificaciones = $usuario->notificaciones()->get();        
        session(['notificaciones' => null]);
        session(['notificaciones' => $notificaciones]);        
    }



     public function usuarios(){
        return $this->belongsToMany(User::class, 'notificacion_usuarios', 'notificacion_id', 'usuario_id');
    }

}
