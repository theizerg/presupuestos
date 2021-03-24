@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">datos</li>
@endsection

@section('content')
<div class="container">
  <div class="col-sm-12">
  <div class="card">
    <div class=" card-header blue-gradient-dark text-white"> 
      <h2 class="card-title text-white">
        <i class="fa fa-user text-white"></i> Datos de usuario
        <small class="pull-right text-white">{{ $user->display_name }}</small>
      </h2>
    </div>

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
    <div class="row">
      <div class="col-sm-4">
        <strong>Nombre</strong><br>
          {{ $user->full_name }}
      </div>
      <div class="col-sm-4">
          <strong>Correo electrónico</strong>
          <br>
          {{ $user->email }}
      </div>
       <div class="col-sm-4 mt-3">
          <strong>Usuario</strong>
          <br>
          {{ $user->username }}
        </div>
        <div class="col-sm-4 mt-3">
            <strong>Estatus</strong><br>
            <span class="badge text-white {{ $user->status ? 'green' : 'red' }}">{{ $user->display_status }}</span>
          </div>
          <div class="col-sm-4 mt-3">
              <strong>Tipo de usuario</strong><br>
             <b>{{ Auth::user()->hasrole('admin') ? 'Administrador' : 'Usuario' }}</b>
          </div>
      
     
          <div class="col-sm-4 mt-3 ">
             <strong>Contraseña</strong><br>
                ********
              </div>
              <div class="col-sm-4 mt-4">
                <strong>Creado</strong>
                <br>
                  {{ $user->created_at }}
                </div>
                <div class="col-sm-4 mt-4">
                  <strong>Actualizado</strong><br>
                  {{ $user->updated_at }}
                </div>
                <div class="col-sm-4 mt-4">
                  <strong>Logins</strong><br>
                  <i class="fa fa-eye"></i> <a href="{{ url('logins', [$user->encode_id]) }}">logins</a>
                </div>
            </div>
            </div>
            <div class="row card-body  ">
            </div>
            <br>
            <br>
            <div class="card-footer">
              <div class="col-md-6">
                <div class="btn-group">
                 
                  <a href="{{ url('user', [Auth::user()->encode_id,'edit']) }}" class="btn blue darken-4 text-white"><i class="fa fa-edit"></i> Editar</a>
                  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
