<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $role = Role::findByName('Usuario');

        return view('admin.permission.index', ['role' => $role]);
    }


    public function show($id)
    {  if (!\Auth::user()->hasPermissionTo('VerPermisos'))
        {
        $notification = array(
            'message' => '¡Acceso denegado!',
            'alert-type' => 'danger'
        );
         return \Redirect::to('/')->with($notification);
       }
        $roles = Role::get();
        $role = Role::findByName($id);
        $name = $role->name;

        return view('admin.permission.index',compact('name','role','roles'));
    }




    public function update(UpdatePermission $request, $id)
    {
        $role = Role::findByName($id);

        if(! empty($request->permissions))
        {
            $role->syncPermissions($request->permissions);
        }
        else
        {
            $permissions =  Permission::all();

            foreach ($permissions as $permission)
            {
                $role->revokePermissionTo($permission->name);
            }
        }

        return json_encode(['success' => true]);
    }


}
