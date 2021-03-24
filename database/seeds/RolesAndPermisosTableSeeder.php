<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermisosTableSeeder extends Seeder
{
   private $permissions , $user_permissions;


    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                /* Usuarios */
                                'VerUsuario',
                                'RegistrarUsuario',
                                'EditarUsuario',
                                'EliminarUsuario',
                                'VerNotificaciones',
                               
                                'VerPermisos',
                                'CrearPermisos',
                                'EditarPermisos',
                                'EliminarPermisos',

                                'VerRol',
                                'CrearRol',
                                'EditarRol',
                                'EliminarRol',

                                'VerDeducciones',
                                'CrearDeducciones',
                                'EditarDeducciones',
                                'EliminarDeducciones',

                                'VerDepartamento',
                                'CrearDepartamento',
                                'EditarDepartamento',
                                'EliminarDepartamento',

                                'VerDivision',
                                'CrearDivision',
                                'EditarDivision',
                                'EliminarDivision',

                                'VerEmpleado',
                                'CrearEmpleado',
                                'EditarEmpleado',
                                'EliminarEmpleado',


                                'VerSueldo',
                                'CrearSueldo',
                                'EditarSueldo',
                                'EliminarSueldo',
                              ];


        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->user_permissions = [
                                    'VerDeducciones',
                                    'VerDepartamento',
                                    'VerDivision',
                                    'VerEmpleado',
                                    'VerSueldo',

                                    ];
        
    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'Usuario']);
        $role->givePermissionTo($this->user_permissions);

    }
}
