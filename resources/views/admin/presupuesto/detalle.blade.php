@extends('layouts.admin')
@section('title', 'Presupuestos')
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Detalle del comprobante</h4>
				</div>                
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-sm btn-success" href="/presupuestos/nuevo" class="btn btn-link">
							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo presupuesto
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/presupuestos" class="link_ruta">
								Prespuestos &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/presupuestos/detalle/{{$presupuestos->encode_id}}" class="link_ruta">
								Detalle
							</a>
						</li>
					</ul><br>
									
					<div class="row">
						<div class="col-md-4">							
							<div class="col-md-12 col-sm-12 col-xs-12">
								<legend>Detalle del presupuesto</legend>
							</div>
							<table class="table table-condensed table-striped table-bordered">
									<tr>
									<th class="text-center th-b" colspan="2">Información general</th>
									<tr>
									<td width="144px">Código del presupuesto</td>
									<td>{{ $presupuestos->codigo }}</td>						
								   </tr>
								   <tr>
									<td>Fecha de emisión</td>
									@if($presupuestos->fecha)
										<td>
											{{ ($presupuestos->fecha) }}
										</td>
									@else
										<td style="color: #aaa;">- - -</td>
									@endif
								</tr>
								<tr>
									<td>Cliente</td>
									@if($presupuestos->cliente)
										<td><a href="/clientes/detalle/{{ $presupuestos->cliente->encode_id }}">{{ $presupuestos->cliente->nombre }} {{ $presupuestos->cliente->apellido }}</a></td>
									@else
									   <td>{{ $presupuestos->nombre_cliente }}</td>
									@endif
								</tr>
								<tr>
									<td>Documento</td>
									   <td>{{ $presupuestos->cliente->documento }}</td>
								</tr>
								<tr>
									<td>Teléfono</td>
									   <td>{{ $presupuestos->cliente->telefono }}</td>
								</tr>
								<th class="text-center th-b" colspan="2">Información del vehículo</th>
								<tr>
									<td>Modelo del vehículo</td>
									   <td>{{ $presupuestos->marca_vehiculo }}</td>
								</tr>
								<tr>
									<td>Año del vehículo</td>
									   <td>{{ $presupuestos->ano_vehiculo }}</td>
								</tr>
								<tr>
									<td>Placa del vehículo</td>
									   <td>{{ $presupuestos->placa_vehiculo }}</td>
								</tr>
								</table>
								<a href="/presupuestos/imprimir/{{$presupuestos->encode_id}}" target="_blank" class="btn btn-block btn-primary">
								Imprimir
								<span class="float-right">
									<i class="fa fa-print" aria-hidden="true"></i>
								</span>
							</a>
							</div>	
							<div class="col-md-8">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<legend>Servicios</legend>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 pre-scrollable div-detalle-comprobante card">
								<table width="100%" class="table table-borderless table-responsive">
									<thead>
										<tr>											
											<th class="text-center">Servicios</th>
											<th class="text-center" width="100px">Precio</th>
											<th class="text-center" width="100px">Sub total</th>
											<th class="text-center" width="100px">Total</th>
										</tr>
									</thead> 
									<tbody id="tablaProductos">
										@foreach($lineapresupuesto as $l)
										<tr>											
											<td>
													{{ $l->servicio->nombre }}
												</a>
											</td>
											<td>
										
												<span class="float-right">
													${{ number_format($l->precioUnitario, 2, '.', ',') }}
												</span>
											</td>
											<td>
												
												<span class="float-right">
													${{ number_format($l->subTotal, 2, '.', ',') }}
												</span>
											</td>
											<td>
												
												<span class="float-right">
													${{ number_format($l->total, 2, '.', ',') }}
												</span>
											</td>
											
											
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>						
						</div>
					</div>                    
				</div>
			</div>
		</div>
	</div>
@endsection
