@extends('layouts.admin')

@section('title', 'Roles')
@section('page_title', 'Roles')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">Roles</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')
 <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('CrearRol')
          <a href="{{ url('roles') }}" class="btn blue darken-4 text-white"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
          @endcan
          @can('CrearRol')
          <a href="{{ url('roles/create') }}" class="btn blue darken-4 text-white"><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
 
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
              <h3 class="card-title">Crear de rol</h3>
          </div>

           {{ Form::open(array('url' => 'roles')) }}       
        
            <div class="card-body">
              @include('admin.roles.partials.form')
            </div>
            <div class="card-footer">
              <button type="submit" class="btn blue darken-4 text-white ajax" id="submit">
                <i id="ajax-icon" class="fas fa-save"></i> Ingresar
              </button>
            </div>
           {{ Form::close() }}
        </div>
      </div>
    </div>
</div>

@endsection
