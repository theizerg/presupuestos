@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          <a href="{{ url('user') }}" class="btn blue darken-4 text-white"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>         
          <a href="{{ url('user/create') }}" class="btn blue darken-4 text-white"><i class="fa fa-plus-square"></i> Ingresar</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
         <div class="card-header  outline-primary blue-gradient-dark text-white">
              <h3 class="card-title text-white">Crear usuarios</h3>
             
            </div>
           {!!Form::open (['route'=>'user.store','id'=>'postulados_form','autocomplete' => 'off'])!!}
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
               <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                  </div>
                  <input class="form-control" placeholder="Nombres del usuario" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>
              </div>
               <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input class="form-control" placeholder="Apellidos del usuario" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus>
                </div>
              </div>
                <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sign-in-alt"></i></span>
                  </div>
                  <input class="form-control" placeholder="Usuario" type="text" name="username" value="{{ old('username') }}" required autofocus>
                </div>
              </div>
                <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-mailbox-open"></i></span>
                  </div>
                  <input class="form-control" placeholder="Correo electrónico" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label for="role">Tipo de usuario</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="role" value="Usuario" checked> Usuario&nbsp;&nbsp;
                    <input type="radio" name="role" value="Administrador"> Administrador
                   
                  </label>
                </div>
              </div>
              
             <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                  </div>
                  <input class="form-control" placeholder="Contraseña" type="password" name="password" value="{{ old('password') }}" required autofocus>
                </div>
              </div>
                <div class="form-group mb-3">
                <div class="input-group input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                  </div>
                  <input class="form-control" placeholder="Confirmación de Contraseña" id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label for="status_id">Acceso al sistema</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status" value="1" checked> Activo&nbsp;&nbsp;
                    <input type="radio" name="status" value="0"> Deshabilitado
                  </label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn blue darken-4 text-white ajax" id="submit">
                <i id="ajax-icon" class="fa fa-save"></i> Ingresar
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
    <script src="{{ asset('js/admin/user/create.js') }}"></script>
@endpush
