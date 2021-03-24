<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresos;
use App\Models\Presupuesto;
class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingresos::get();
        return view('admin.ingreso.index',compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
     $presupuesto = Presupuesto::find(\Hashids::decode($id)[0]) ;
     $ingresos = Ingresos::get();
     return view('admin.ingreso.create',compact('presupuesto','ingresos')); 
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        
        $ingreso = new Ingresos();
        if($request->ingreso_id){
            $ingreso = Ingresos::find($request->ingreso_id);
            $ingreso->usuario_id = \Auth::user()->id;
            $ingreso->cliente_id = $request->cliente_id;
            $ingreso->codigo_presupuesto = $request->codigo_presupuesto;
            $ingreso->presupuesto_id = $request->presupuesto_id;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->status = $request->status;
            $ingreso->save();

            
            $cliente->save();
            $notification = array(
            'message' => 'Datos Modificados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/ingreso')->with($notification);
        }else{

            $ingreso->usuario_id = \Auth::user()->id;
            $ingreso->cliente_id = $request->cliente_id;
            $ingreso->codigo_presupuesto = $request->codigo_presupuesto;
            $ingreso->presupuesto_id = $request->presupuesto_id;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->status = $request->status;
            $ingreso->save();

            $notification = array(
                'message' => 'Datos Ingresados!',
                'alert-type' => 'success'
            );
    
            return \Redirect::to('/ingreso')->with($notification);
            
         
        }
       



}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
