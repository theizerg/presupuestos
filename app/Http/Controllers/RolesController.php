<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!\Auth::user()->hasPermissionTo('VerRol'))
      {
      $notification = array(
          'message' => '¡Acceso denegado!',
          'alert-type' => 'danger'
      );
       return \Redirect::to('/')->with($notification);
     }
        $roles = Role::where('status_id',1)->get();
        //dd($roles);
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!\Auth::user()->hasPermissionTo('CrearRol'))
      {
      $notification = array(
          'message' => '¡Acceso denegado!',
          'alert-type' => 'danger'
      );
       return \Redirect::to('/')->with($notification);
     }
        $roles = Role::get();
        return view ('admin.roles.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $role = Role::create($request->all());
         $notification = array(
            'message' => '¡Rol creado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return \Redirect::to('/roles')->with($notification);
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
      if (!\Auth::user()->hasPermissionTo('EditarRol'))
      {
      $notification = array(
          'message' => '¡Acceso denegado!',
          'alert-type' => 'danger'
      );
       return \Redirect::to('/')->with($notification);
     }
        $role = Role::find($id);
        $roles = Role::get();
        return view('admin.roles.edit',compact('role','roles'));
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
            $role = Role::findOrFail($id);
            $role->update($request->all());
             $notification = array(
            'message' => '¡Rol creado satisfactoriamente!',
            'alert-type' => 'success'
        );
            return \Redirect::to('/roles')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
