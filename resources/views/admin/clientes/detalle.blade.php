 @extends('layouts.admin')
@section('title', 'Clientes')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Detalle de cliente</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success" href="/cliente/nuevo" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo cliente
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/cliente/nuevo" class="link_ruta">
								Cliente Nuevo &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/cliente/detalle/{{$cliente->encode_id}}" class="link_ruta">
								{{$cliente->nombre}} {{$cliente->apellido}}
							</a>
						</li>
					</ul><br>
					
					<div class="row">
						
							<div class="col-md-4"><br>
								<legend>
									Datos del cliente
									<span class="float-right">
										<a class="btn btn-primary btn-sm" id="editCodigo" data-toggle="modal" data-target="#modalEditarCliente">
											<i class="fas fa-edit fa-lg text-white" aria-hidden="true"></i>
										</a>
									</span>
								</legend>								
								<div class="form-group">
									<table class="table table-condensed table-striped table-bordered" width="100%">
										<tr>
											<th class="text-center th-b" colspan="2">Información general</th>
										</tr>
										<tr>
											<td width="30%">Tipo de cliente</td>
											<td width="70%">
												@if($cliente->empresa)
													Empresa
												@else
													Persona
												@endif
											</td>												
										</tr>
										<tr>
											@if($cliente->empresa)
												<td>
													Razón social
												</td>
												<td>
													{{$cliente->nombre}}
												</td>
											@else
												<td>
													Nombre
												</td>
												<td>
													{{$cliente->nombre}} {{$cliente->apellido}}
												</td>
											</tr>
													<tr>
													<td>
														Documento
													</td>
													<td>
														
														{{$cliente->documento}}
													</td>												
												</tr>
											@endif												
										</tr>
										<tr>
											<td>
												Mail
											</td>
											<td>
												{{$cliente->mail}}
											</td>												
										</tr>
										<tr>
											<td>
												Dirección
											</td>
											<td>
												{{$cliente->direccion}}
											</td>												
										</tr>
										<tr>
											<td>
												Teléfono
											</td>
											<td>
												{{$cliente->telefono}}
											</td>												
										</tr>
										@if($cliente->empresa)
											<tr>
												<td>
													RUT
												</td>
												<td>
													{{$cliente->rif}}
												</td>												
											</tr>
										@endif
										
									</table>
								</div>								
							</div><br>
							<div class="col-md-8">
								<legend>Actividad del cliente</legend>
								<div class="col-md-12">
									<div class="table-responsive">
										<table width="100%" class="table table-condensed table-striped table-bordered">
											<thead>
												<tr>
													<th class="text-center" width="120px">Fecha</th>
													<th class="text-center" width="230px">Estado del presupuesto</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												@foreach($presupuestos as $c)
													<tr>
														<td>{{$c->fecha }}</td>
														<td><span class="badge text-white text-capitalize text-center {{ $c->status ? 'bg-green' : 'bg-red' }}">{{ $c->display_status }}</span></td>
														<td class="text-center">
															<a href="/presupuestos/{{$c->encode_id}}/detalle">
																<i class="fas fa-external-link-alt"></i>
															</a>
														</td>
													</tr>													
												@endforeach
											</tbody>
										</table>
									</div>
									<div class="text-center">
										{{ $presupuestos->links() }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalEditarCliente" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Editar datos del cliente
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<form id="form_editar_cliente" class="form-horizontal" role="form" method="POST" action="/cliente/guardar">
						{{ csrf_field() }}
							<input type="hidden" name="cliente_id" value="{{$cliente->encode_id}}">
							<div class="form-group">
								<table class="table table-condensed table-striped table-bordered" width="100%">
									<tr>
										<th width="40%">Tipo de cliente</th>
										<td width="50%">
											@if($cliente->empresa)
												<input class="form-control input-sm" type="text" name="tipo_cliente" value="Emnpresa" disabled="true">
											@else
												<input class="form-control input-sm" type="text" name="tipo_cliente" value="Persona" disabled="true">
											@endif
										</td>												
									</tr>
									<tr>
										@if($cliente->empresa)
											<th>
												Razón social
											</th>
											<td>
												<input class="form-control input-sm" type="text" name="razonSocial" value="{{$cliente->nombre}}">
											</td>
										@else
											<th>
												Nombre
											</th>
											<td>
												<input class="form-control input-sm" type="text" name="nombre" value="{{$cliente->nombre}}">
											</td>
										</tr>
										<tr>
											<th>
												Apellido
											</th>
											<td>
												<input class="form-control input-sm" type="text" name="apellido" value="{{$cliente->apellido}}">
											</td>										
										@endif												
									</tr>
									@if($cliente->empresa)
									<tr>
										<th>
											RUT
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="rut" value="{{$cliente->rut}}">
										</td>												
									</tr>
									@endif
									<tr>
										<th>
											Mail
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="mail" value="{{$cliente->mail}}">
										</td>												
									</tr>
									<tr>
										<th>
											Dirección
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="direccion" value="{{$cliente->direccion}}">
										</td>												
									</tr>
									<tr>
										<th>
											Teléfono
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="telefono" value="{{$cliente->telefono}}">
										</td>												
									</tr>
									<tr>
										<th>
											Género
										</th>
										<td>
										<select id="select_tipo_cliente" class="form-control" name="genero_id">
																			
											@foreach($generos as $genero)
													<option value="{{ $genero->id }}">{{ $genero->nb_genero }}</option>
												@endforeach
										</select>
										</td>
									</tr>
									<tr>
										<th>
											Modelo de vehículo
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="marca_vehiculo" value="{{$cliente->marca_vehiculo}}">
										</td>												
									</tr>
									<tr>
										<th>
											Año de vehículo
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="ano_vehiculo" value="{{$cliente->ano_vehiculo}}">
										</td>												
									</tr>
									<tr>
										<th>
											Placa de vehículo
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="placa_vehiculo" value="{{$cliente->placa_vehiculo}}">
										</td>												
									</tr>
								</table>
								<input type="submit" name="" value="Guardar cambios" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				
			</div>        
		</div>
	</div>
</div>
@endsection
