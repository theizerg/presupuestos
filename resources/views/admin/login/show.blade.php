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
            <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h3 class="card-title">Listado de inicio de sesión</h3>
          </div>
            <div class="card-body table-responsive table-striped">
              <table id="example2" class="table table-bordered table-hover">
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
              <div class="card-footer clearfix">
                  <p class="text-muted">Mostrando <strong>{{ $logins->count() }}</strong> registros de <strong>{{ $logins->count() }}</strong> totales</p>
              </div>
         </div>
            </div>
          </div>
        </div>
    </section>


@endsection

@push('scripts')
  <script src="{{ asset('js/DataTables.js') }}"></script>
    <script src="{{ asset('js/DataTablesBootstrap.js') }}"></script>

    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endpush
