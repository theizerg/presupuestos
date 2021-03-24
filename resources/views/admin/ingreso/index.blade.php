@extends('layouts.admin')
@section('title', 'Ingreso de vehículoss')
@section('content')
<div class="container">
    <div class="row">
    
    </div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-primary card-outline card-header">
                <h4>Vista general de los vehículos ingresados</h4>
            </div>

            <div class="card-body">
                
                <ul class="list-inline">
                     <li class="list-inline-item">
                        <a href="/" class="link_ruta">
                            Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                    </li>
                     <li class="list-inline-item">
                        <a href="/ingreso" class="link_ruta">
                            Vehículos ingresados
                        </a>
                    </li>
                </ul>
            
                <div class="row">
                    <div class="container">
                        <div class="table-responsive ">
                            <table id="example"  class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="120px">Cliente</th>
                                    <th class="text-center" width="90px">Código del presupuesto </th>
                                    <th class="text-center" width="80px">Modelo del vehículo</th>
                                    <th class="text-center" width="80px">Estado del vehículo</th> 
                                    <th class="text-center" width="80px">Descripción</th>                            
                                </tr>
                                </thead>

                                @foreach($ingresos as $ingreso)
                                    
                                <tbody>
                                   <tr>
                                    <td class="text-center">{{ $ingreso->cliente->nombre}}  {{$ingreso->cliente->apellido}} </td>
                                    <td class="text-center"><a href="{{ url('presupuestos', [$ingreso->presupuesto->encode_id,'detalle']) }}">{{ $ingreso->codigo_presupuesto}}</a></td>  
                                    <td class="text-center">{{ $ingreso->cliente->marca_vehiculo}}</td>
                                    <td><span class="badge text-white {{ $ingreso->status ? 'bg-green' : 'bg-red' }}">{{ $ingreso->display_status }}</span></td>
                                    <td class="text-center">
                                        <button id="btnAgregarCliente" class="btn btn-round blue darken-4 text-white" data-toggle="modal" data-target="#modalAgregarCliente">
                                            <i class="mdi mdi-folder"></i>
                                        </button>
                                    </td>
                                    </tr>
                                    </tbody>
                                @endforeach                   
                            </table>
                        </div>
                        <div class="text-center">
                        
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>
<div class="modal fade" id="modalAgregarCliente" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Descripción de las actividades realizadas al vehículo
				</h4>
			</div>
			<div class="modal-body">
				<textarea name="" id="" cols="80" rows="10" class="float-left">
                    {{$ingreso->descripcion}}
                </textarea>
				
			</div>

			<div class="modal-footer">				
				<button class="btn btn-primary" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
