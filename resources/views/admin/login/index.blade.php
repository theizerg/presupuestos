@extends('layouts.admin')

@section('title', 'Logins')
@section('page_title', 'Logins')
@section('page_subtitle', 'Registros')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li><a href="{{ url('login') }}">logins</a></li>
    <li class="active">Registros</li>
@endsection

@section('content')

    <section class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header blue-gradient-dark text-white">
              <h3 class="card-title text-white">Listado de inicio de sesión</h3>
          </div>
            <div class="card-body table-responsive table-striped">
               <ul class="list-inline">
                 <li class="list-inline-item">
                    <a href="/" class="link_ruta">
                      Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul><br>
              <table id="example" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Inicio</th>
                    <th>Cierre</th>
                    <th>IP</th>
                    <th>Cliente</th>
                </tr>
              </thead>
                @foreach ($logins as $login)
                <tr>
                  <td>{{ $login->user->full_name }}</td>
                  <td>{{ $login->login_at  }}</td>
                  <td>{{ $login->logout_at }}</td>
                  <td>{{ $login->ip_address }}</td>
                  <td>{{ $login->user_agent }}</td>
                </tr>
                @endforeach
              </table>
               </div>
            </div>
          </div>
        </div>
    </section>


@endsection
