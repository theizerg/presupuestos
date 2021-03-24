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

    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="btn-group">
           
            <a href="{{ url('user/create') }}" class="btn blue darken-3 text-white mr-5"><i class="fa fa-plus-square"></i> Ingresar</a>
           
          </div>
        </div>
      </div>
      <br>
      
        <div class="col-md-12">
          <div class="card">
            <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h3 class="card-title text-white">Listado de usuarios</h3>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
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
                <table id="example" class="table table-striped " style="width:100%">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Nombre completo</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr class="row{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->display_name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{!! $user->hasRole('Administrador') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                    <td>{{ $user->email  }}</td>
                    <td><span class="badge text-white {{ $user->status ? 'bg-green' : 'bg-red' }}">{{ $user->display_status }}</span></td>
                    <td>
                       
                       <a class="btn btn-round blue darken-4" href="{{ url('user', [$user->encode_id]) }}"><i class="material-icons" style="color: white;">person</i> </a>
                       
                       <a class="btn btn-round red darken-4" href="{{ url('user', [$user->encode_id,'edit']) }}"><i class="material-icons" style="color: white;">edit</i> </a>
                     
                       
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
   
    </section>


@endsection

@push('scripts')
  <script src="{{ asset('js/admin/user/index.js') }}"></script>
@endpush
