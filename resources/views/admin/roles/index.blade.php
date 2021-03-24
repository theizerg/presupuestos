    @extends('layouts.admin')

    @section('title', 'Roles')
    @section('page_title', 'Roles')
    @section('page_subtitle', 'Listado')

    @section('breadcrumb')
        @parent
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('user') }}">usuarios</a></li>
        <li class="active">Listado</li>
    @endsection

    @section('content')
     <div class="container">
        @can('CrearRol')
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">

                <a href="{{ url('roles/create') }}" class="btn text-white  blue darken-4 "><i class="fa fa-plus-square"></i> Ingresar</a>


                </div>
            </div>
            </div>
             @endcan
        <br>
        <div class="card card-danger ">
          <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h3 class="card-title">Listado de roles</h3>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul><br>
                  <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                    <th width="40px">ID</th>
                    <th width="120px">Nombre</th>
                    <th width="15%">RIF</th>
                    <th>Dirección</th>
                    <th width="15%">Telefono</th>
                    <th width="15%">Mail</th>
                    <th width="25px"></th>
                     </tr>
                    </thead>
                    <tbody>
                    <tr>
                   @foreach($roles as $proveedor)
                    <tr>
                        <td>
                            <a href="/proveedores/detalle/{{ $proveedor->encode_id}}">
                                {{ $proveedor->id}}
                            </a>
                        </td>
                        <td>
                            <a href="/proveedores/detalle/{{ $proveedor->encode_id}}">
                                {{ $proveedor->name }}
                            </a>
                        </td>
                        <td>{{ $proveedor->rif}}</td>
                        <td>{{ $proveedor->direccion}}</td>
                        <td>{{ $proveedor->telefono}}</td>
                        <td>{{ $proveedor->mail}}</td>
                    </tr>
                    @endforeach         
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

</div>
<div class="modal fade" id="confirm-delete" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea eliminar este
                        registro?</p>
                    <p class="nombre"></p>
                </div>
                <div class="modal-footer">
                    <form class="form-inline form-delete"
                          role="form"
                          method="POST"
                          action="">
                        {!! method_field('DELETE') !!}
                        {!! csrf_field() !!}
                        <button type="button"
                                class="btn btn-default"
                                data-dismiss="modal">Cancelar
                        </button>

                            <button id="delete-btn"
                                    class="btn btn-danger"
                                    title="Eliminar">Eliminar
                            </button>

                    </form>
                </div>
            </div>
        </div>
    </div>



    @endsection
