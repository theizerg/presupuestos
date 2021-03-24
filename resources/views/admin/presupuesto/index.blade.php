@extends('layouts.admin')

@section('title', 'Presupuestos')
@section('page_title', 'Presupuestos')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">Presupuestos</a></li>
    <li class="active">Listado</li>
@endsection

@section('content')

    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="btn-group">
           
            <a href="{{ url('presupuestos/nuevo') }}" class="btn blue darken-3 text-white mr-5"><i class="fa fa-plus-square"></i> Ingresar</a>
           
          </div>
        </div>
      </div>
      <br>
      
        <div class="col-md-12">
          <div class="card">
            <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h3 class="card-title text-white">Listado de Presupuestos</h3>
             
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
                      <a href="/presupuestos" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/presupuestos/nuevo" class="link_ruta">
                        Nuevo
                      </a>
                    </li>
                  </ul><br>
                <table id="example" class="table table-striped " style="width:100%">
                    <thead>
                    <tr>
                    
                    <th>Cliente</th>
                    <th>Fecha de emisión</th>
                    <th>Modelo de Vehículo</th>
                    <th>Estado del presupuesto</th> 
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($presupuestos as $presupuesto)
                    <tr class="row{{ $presupuesto->id }}">
                    
                    <td>{{ $presupuesto->nombre_cliente }}</td>
                    <td>{{ $presupuesto->fecha  }}</td>
                    <td>{{ $presupuesto->marca_vehiculo  }}</td>
                    <td><span class="badge text-white {{ $presupuesto->status ? 'bg-green' : 'bg-red' }}">{{ $presupuesto->display_status }}</span></td>
                    <td>   
                     @if (\App\Models\Presupuesto::where('status',1)->where('id',$presupuesto->id))
                     <a class="btn btn-round blue darken-4" href="{{ url('ingreso', [$presupuesto->encode_id,'nuevo']) }}"><i class="mdi mdi-car-arrow-left" style="color: white;"></i> </a>
                     <a class="btn btn-round blue darken-4" href="{{ url('presupuestos', [$presupuesto->encode_id,'detalle']) }}"><i class="material-icons" style="color: white;">person</i> </a>
                     <a class="btn btn-round blue darken-4" href="{{ url('presupuestos', [$presupuesto->encode_id,'editar']) }}"><i class="material-icons" style="color: white;">edit</i> </a>   
                     @else
                    
                     <a class="btn btn-round blue darken-4" href="{{ url('presupuestos', [$presupuesto->encode_id,'detalle']) }}"><i class="material-icons" style="color: white;">person</i> </a>
                     <a class="btn btn-round blue darken-4" href="{{ url('presupuestos', [$presupuesto->encode_id,'editar']) }}"><i class="material-icons" style="color: white;">edit</i> </a>   
                     @endif
                     
                               
                     
                       
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
