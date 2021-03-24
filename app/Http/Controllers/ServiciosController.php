<?php

namespace App\Http\Controllers;

use App\Models\ClaseServicios;
use App\Models\Servicios;
use App\Models\Moneda;
use App\Models\TasaIva;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        $servicios = Servicios::get();

        return view('admin.servicio.index', compact('roles','servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevo()
    {
        $roles = Role::get();
        $servicios = Servicios::get();
        $tipoS = ClaseServicios::get();
        $iva = TasaIva::get();


        return view('admin.servicio.nuevo', compact('roles','servicios','tipoS','iva'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        
           // dd($request);        

            //Acá se hace el alta
            $servicio = new Servicios();
            $servicio->codigo  = $request->codigo;
            $servicio->nombre = $request->nombre;
           

            if($request->precio!='' || $request->precio>0){
                $servicio->precio  = floatval(str_replace(',', '.', str_replace('.', '', $request->precio)));
            }else{
                $servicio->precio  = 0;
            }
            
            $servicio->save();
            $servicio->registrarCambioPrecio();
            $notification = array(
            'message' => '¡Servicio creado satisfactoriamente!',
            'alert-type' => 'success'
            );
            return \Redirect::to('servicios/nuevo/')->with($notification);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function detalle($servicios_codigo)
    {
        $servicio = Servicios::BuscarPorCodigo($servicios_codigo)->firstOrFail();
        $precios_historico = $servicio->preciosHistorico();
        $tiposervicio = ClaseServicios::get();
        $tasas_iva = TasaIva::all();

        return view('admin.servicio.detalle')->with(compact('servicio','precios_historico', 'tasas_iva','tiposervicio'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function editar(Request $request)
    {//dd($request);
        $servicio = Servicios::find($request->servicio_id);

        if(is_null($servicio)){
            $notification = array(
            'message' => '¡El servicio no existe!',
            'alert-type' => 'danger'
        );
            return \Redirect::back()->with($notification);

     }else{

        if($servicio->codigo != $request->codigo){
                $servicio->codigo  = $request->codigo;
            }
            if($servicio->nombre != $request->nombre){
                $servicio->nombre  = $request->nombre;
            }
            $servicio->nombre  = $request->nombre;
            //$servicio->tasa_iva_id          = $request->tasa_iva;

            if($request->precio!='' || $request->precio>0){
                if($request->precio != $servicio->precio){
                    $servicio->precio  = floatval(str_replace(',', '.', str_replace('.', '', $request->precio)));
                    $servicio->registrarCambioPrecio();
                }
            }else{
                $servicio->precio  = 0;
            }           
            
            $servicio->save();            
            $notification = array(
            'message' => '¡El servicio editado!',
            'alert-type' => 'danger'
        );
            return\Redirect::to('servicios/detalle/'.$servicio->codigo)->with($notification);
        }

    }

    public function buscar(Request $request){
        $texto = $request->texto;
        $servicios = Servicios::BuscarPorCodigo($texto)->with('iva')
        ->BuscarPorServicio($texto)
        ->with('tiposervicios')
        ->get();
        if(count($servicios) == 0){         
            $servicios = Servicios::FiltrarPorCodigo($texto)
                            ->FiltrarPorNombre($texto)
                            ->with('iva')
                            ->with('tiposervicios')
                            ->get();
        }
        return Response()->json([
            'productos' => $servicios
        ]);
    }
}
