    @extends('layouts.admin')

    @section('title', 'Clase de servicio')
    @section('page_title', 'Clase de servicio')
    @section('page_subtitle', 'Listado')

    @section('breadcrumb')
        @parent
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('asistencia') }}">asistencia</a></li>
        <li class="active">Listado</li>
    @endsection

    @section('content')
    <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                <a href="{{ url('clase/create') }}" class="btn blue darken-4 text-white"><i class="fa fa-plus-square"></i> Ingresar</a>
                
                
                </div>
            </div>
            </div>
        <br>
        <div class="card card-primary card-outline">
                
                <!-- /.card-header -->
                <div class="card-header">
                <h3 class="card-title">Listado de clases de servicios</h3>
                </div>
                <div class="card-body table-responsive ">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clases as $value)
                    <tr>
                    <td>{{$value->id}} </td>
                    <td>{{$value->nombre}}</td>
                    <td>
                    <div class="dropdown">
                            <button class="btn blue darken-4 text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i> Opciones<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                    <a class="dropdown-item" href="{{ url('clase', [$value->encode_id, 'edit']) }}"><i class="fa fa-edit"></i> Editar datos</a>
                                </div>
                            </ul>
                            </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        @endsection


