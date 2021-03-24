@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Editar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')

 
   <div class="container">
      <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          
          <a href="{{ url('user') }}" class="btn blue darken-4 text-white mr-2"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          
         
          <a href="{{ url('user/create') }}" class="btn blue darken-4 text-white mr-2"><i class="fa fa-plus-square"></i> Ingresar</a>
         
          <a href="{{ url('user', [Auth::user()->encode_id]) }}" class="btn blue darken-4 text-white mr-2"><i class="fa fa-eye"></i> Datos</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
       <div class="card ">
        <div class="card-header blue-gradient-dark">
              <h3 class="card-title text-white">Editar usuarios</h3>
             
            </div>
          {!! Form::model($user, ['route' => ['user.update',$user->encode_id],'method' => 'PUT']) !!}      
            <div class="card-body">
               <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user/create" class="link_ruta">
                        Nuevo
                      </a>
                    </li>
                  </ul><br>
              <div class="form-group pading">
                <label for="name">Nombres</label>
                <input class="form-control" id="name" name="name" value="{{ $user->name }}" >
                <span class="missing_alert text-danger" id="name_alert"></span>
              </div>
              <div class="form-group pading">
                <label for="name">Usuario</label>
                <input class="form-control" id="username" name="username" value="{{ $user->username }}" >
                <span class="missing_alert text-danger" id="username_alert"></span>
              </div>
              <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Apellidos">
                <span class="missing_alert text-danger" id="last_name_alert"></span>
              </div>
              <div class="form-group">
                <label for="last_name">Zona</label>
                <input class="form-control" id="nu_zona" name="nu_zona" value="{{ $user->nu_zona }}" placeholder="Apellidos">
                <span class="missing_alert text-danger" id="nu_zona_alert"></span>
              </div>
             
              <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Correo electrónico">
                <span class="missing_alert text-danger" id="email_alert"></span>
              </div>
              @if(Auth::user()->hasrole('Administrador'))
              <div class="form-group">
                <label for="role">Tipo de usuario</label>
                <div class="checkbox icheck">
                   <label>
                    @foreach ($roles as $role)
                    <input type="radio" name="role" value="{{ $role->name }}"> {{ $role->name }}

                    @endforeach

                  </label>
                </div>
                 </div>
              @endif
              <div class="form-group">
                <label for="password">Nueva Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_alert"></span>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Contraseña">
                <span class="missing_alert text-danger" id="password_confirmation_alert"></span>
              </div>
              @if(Auth::user()->hasrole('Administrador') && Auth::user()->id != $user->id)
              <div class="form-group">
                <label for="status">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status" value="1" {{ $user->status == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0" {{ $user->status == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
                  </label>
                </div>
              </div>
              @endif
              <br>
              <div class="form-group">
                <label for="password">Contraseña actual ({{ Auth::user()->display_name }})</label>
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Contraseña actual">
                <span class="missing_alert text-danger" id="current_password_alert"></span>
              </div>
              <div class="card-footer">
              <button type="submit" class="btn blue darken-4 text-white ajax" id="submit">
                <i id="ajax-icon" class="fa fa-edit"></i> Editar
              </button>
            </div>
          {!! Form::close()!!}
        </div>
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
    
@endpush
