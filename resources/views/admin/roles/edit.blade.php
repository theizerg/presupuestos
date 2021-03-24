@extends('layouts.admin')

@section('title', 'Roles')
@section('page_title', 'Roles')
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
      <div class="col-sm-6">
        <div class="btn-group">
          @can('VerUsuario')
          <a href="{{ url('roles') }}" class="btn  blue darken-4 text-white "><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
          @endcan
          @can('RegistrarUsuario')
          <a href="{{ url('roles/create') }}" class="btn  blue darken-4 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12">
       <div class="card">
        <div class="card-header blue-gradient-dark text-white outline-primary ">
          <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/roles" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul><br>
              <h3 class="card-title">Editar de rol</h3>
          </div>
          <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/roles/'.$role->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name" class="col-sm-4 control-label">Nombre</label>

                  <div class="col-sm-12">
                      <input id="name" type="text" class="form-control" name="name"
                             value="{{ $role->name }}" autofocus>
                      @if($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
                <div class="form-group">
                <label for="status">Estado del rol</label>
                <div class="checkbox icheck">
                  <label>
                    <input type="radio" name="status_id" value="1" {{ $role->status_id == 1 ? 'checked' : '' }}> Activo&nbsp;&nbsp;
                    <input type="radio" name="status_id" value="0" {{ $role->status_id == 0 ? 'checked' : '' }}> Deshabilitado&nbsp;&nbsp;
                  </label>
                </div>
              </div>
              
               <input type="hidden" name="guard_name" value="web">
   
             
          
        </div>
        <div class="card-footer">
              <button type="submit" class=" btn blue darken-4 text-white  ajax" id="submit">
                <i id="ajax-icon" class="fa fa-edit"></i> Editar
              </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
