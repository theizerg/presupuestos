@extends('layouts.admin')

@section('title', 'Permisos')
@section('page_title', 'Permisos')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">permisos</li>
@endsection

@section('content')


      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="">
                <h2 class="title mt-2 mb-2 text-center">Permisos del rol <b>{{ $role->name }}</b></h2>
              </div>
              <div class="card-body table-responsive table-hover">
                <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>

                  </ul><br>
                <form role="form" id="main-form">
                  <input type="hidden" id="_url" value="{{ url('permission', $role->name) }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <table class="table table-responsive">
                    <tr>
                      <h3>{{ $role->name }}</h3>
                    </tr>
                    <tr>
                      <td>
                        Ver usuarios<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerUsuario" {{ $role->hasPermissionTo('VerUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarUsuario" {{ $role->hasPermissionTo('RegistrarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarUsuario" {{ $role->hasPermissionTo('EditarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarUsuario" {{ $role->hasPermissionTo('EliminarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Crear Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearRol" {{ $role->hasPermissionTo('CrearRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Ver roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerRol" {{ $role->hasPermissionTo('VerRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Editar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarRol" {{ $role->hasPermissionTo('EditarRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Eliminar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarRol" {{ $role->hasPermissionTo('EliminarRol') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        Agregar Deducciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearDeducciones" {{ $role->hasPermissionTo('CrearDeducciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Deducciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerDeducciones" {{ $role->hasPermissionTo('VerDeducciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar Deducciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarDeducciones" {{ $role->hasPermissionTo('EditarDeducciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Deducciones</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarDeducciones" {{ $role->hasPermissionTo('EliminarDeducciones') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver departamento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerDepartamento" {{ $role->hasPermissionTo('VerDepartamento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar departamento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearDepartamento" {{ $role->hasPermissionTo('CrearDepartamento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar departamento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarDepartamento" {{ $role->hasPermissionTo('EditarDepartamento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>


                      <td>
                        Eliminar departamento</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarDepartamento" {{ $role->hasPermissionTo('EliminarDepartamento') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                        </tr>

                      <td>
                        Ver División</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerDivision" {{ $role->hasPermissionTo('VerDivision') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar División</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearDivision" {{ $role->hasPermissionTo('CrearDivision') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar División</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarDivision" {{ $role->hasPermissionTo('EditarDivision') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar División</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarDivision" {{ $role->hasPermissionTo('EliminarDivision') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>

                        Ver Empleado</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerEmpleado" {{ $role->hasPermissionTo('VerEmpleado') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar Empleado</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearEmpleado" {{ $role->hasPermissionTo('CrearEmpleado') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>

                       <td>
                        Editar Empleado</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarEmpleado" {{ $role->hasPermissionTo('EditarEmpleado') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar Empleado</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarEmpleado" {{ $role->hasPermissionTo('EliminarEmpleado') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <tr>
                          <td>
                        Crear Sueldo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="CrearSueldo" {{ $role->hasPermissionTo('CrearSueldo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                          <td>
                        Editar Sueldo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarSueldo" {{ $role->hasPermissionTo('EditarSueldo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar Sueldo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarSueldo" {{ $role->hasPermissionTo('EditarSueldo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Eliminar Sueldo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarSueldo" {{ $role->hasPermissionTo('EliminarSueldo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                  </table><br>

                  
                    <button type="submit" class="btn blue darken-4 text-white ajax" id="submit">
                      <i id="ajax-icon" class="fa fa-edit"></i> Editar
                    </button>
                  </div>
                </form>
            </div>
          </div>
      </div>


@endsection

@push('scripts')
 <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
 </script>
  <script src="{{ asset('js/admin/permission/index.js') }}"></script>
@endpush
