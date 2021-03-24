<?php

namespace App\Http\Controllers;

use App\Models\ClaseServicios;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class ClaseServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = ClaseServicios::get();
        $roles  = Role::get();

        return view ('admin.clase.index', compact('clases','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roles  = Role::get();
         $clases  = ClaseServicios::get();
        return view ('admin.clase.create', compact('clases','roles','clases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $servicio = new ClaseServicios();

         $servicio->nombre = $request->nombre;

         $servicio->save();

         $notification = array(
            'message' => 'Datos Ingresados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/clase/create')->with($notification);       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClaseServicios  $claseServicios
     * @return \Illuminate\Http\Response
     */
    public function show(ClaseServicios $claseServicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClaseServicios  $claseServicios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $clase = ClaseServicios::find(\Hashids::decode($id)[0]);
         $roles = Role::get();
        return view('admin.clase.edit', compact('roles','clase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClaseServicios  $claseServicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clase = ClaseServicios::find(\Hashids::decode($id)[0]);
         $clase->update($request->all());

         $notification = array(
            'message' => 'Datos Ingresados!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/clase/create')->with($notification);      
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClaseServicios  $claseServicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClaseServicios $claseServicios)
    {
        //
    }
}
