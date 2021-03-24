    @extends('layouts.admin')

    @section('title', 'Usuarios')
    @section('page_title', 'Usuarios')
    @section('page_subtitle', 'Listado')

    @section('breadcrumb')
        @parent
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('user') }}">usuarios</a></li>
        <li class="active">Listado</li>
    @endsection

    @section('content')

        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
               
                <a href="{{ url('user/create') }}" class="btn btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
                
                
                </div>
            </div>
            </div>
        <br>
        <div class="card card-primary card-outline">
                <div class=" card-header">
                <h3 class="card-title">Listado de usuario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                   
                    <th>Usuario</th>
                    <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rolelist as $rol)
                    <tr>
                    
                    <td>{{ $rol->name }}</td>
                    <td>
                    <td>
                        <a href="{{ url('roles/'.$role->id.'/permissions') }}" class="btn btn-warning" title="Asignar Permiso">
                            <i class="fa fa-id-card"></i>
                        </a>
                    </td>
                    @endif
                    @if(Auth::user()->hasPermissionTo('EditarRol'))
                    <td>
                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-primary" title="Editar Rol">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    @endif
                    @if(Auth::user()->hasPermissionTo('EliminarRol'))
                    <td>
                        <button class="btn btn-danger"
                                data-action="{{ url('/roles/'.$role->id) }}"
                                data-name="{{ $role->name }}"
                                data-toggle="modal" data-target="#confirm-delete" title="Eliminar Rol">
                            <i class="fa fa-trash fa-1x"></i>
                        </button>
                    </td>
                    @endif
                    </td>
                     </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        
        </div>




    @endsection