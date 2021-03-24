@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Detalle de proveedor</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-sm btn-success" href="/proveedores/nuevo" class="btn btn-link">
							<i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo proveedor
						</a>
					</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/proveedores" class="link_ruta">
								Proveedores &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/proveedores/detalle/{{$proveedor->id}}" class="link_ruta">
								{{$proveedor->nombre}} {{$proveedor->apellido}}
							</a>
						</li>
					</ul><br>
					<div class="row">
							<div class="col-md-4"><br>
								<legend>
									Datos del proveedor
									<span class="float-right">
										<a class="btn btn-link btn-sm" id="editCodigo" data-toggle="modal" data-target="#modalEditarProveedor">
											<i class="fa fa-edit fa-lg" aria-hidden="true"></i>
										</a>
									</span>
								</legend>								
								<div class="form-group">
									<table class="table table-condensed table-striped table-bordered" width="100%">
										<tr>
											<th class="text-center th-b" colspan="2">Información general</th>
										</tr>
										<tr>
											<td width="30%">Tipo de proveedor</td>
											<td width="70%">
												@if($proveedor->empresa)
													Empresa
												@else
													Persona
												@endif
											</td>												
										</tr>
										<tr>
											@if($proveedor->empresa)
												<td>
													Razón social
												</td>
												<td>
													{{$proveedor->nombre}}
												</td>
											@else
												<td>
													Nombre
												</td>
												<td>
													{{$proveedor->nombre}} {{$proveedor->apellido}}
												</td>
											</tr>
													<tr>
													<td>
														Documento
													</td>
													<td>
														( {{$proveedor->tipoDocumento->tipo_documento}} )
														{{$proveedor->documento}}
													</td>												
												</tr>
											@endif												
										</tr>
										<tr>
											<td>
												Mail
											</td>
											<td>
												{{$proveedor->mail}}
											</td>												
										</tr>
										<tr>
											<td>
												Dirección
											</td>
											<td>
												{{$proveedor->direccion}}
											</td>												
										</tr>
										<tr>
											<td>
												Teléfono
											</td>
											<td>
												{{$proveedor->telefono}}
											</td>												
										</tr>
										@if($proveedor->empresa)
											<tr>
												<td>
													RUT
												</td>
												<td>
													{{$proveedor->rif}}
												</td>												
											</tr>
										@endif
									</table>
								</div>								
							</div><br>
							<div class="col-md-8"><br>
								<legend>Actividad del proveedor</legend>
								<div class="col-md-12">
									<div class="table-responsive">
										<table width="100%" class="table table-condensed table-striped table-bordered">
											<thead>
												<tr>
													<th class="text-center" width="60px">Comprobante</th>
													<th class="text-center" width="120px">Fecha</th>
													<th class="text-center">Producto</th>
													<th class="text-center" width="60px">Cant.</th>
													<th class="text-center" width="100px">Total</th>
												</tr>
											</thead>
											<tbody>
												
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
	</div>
</div>
<div class="modal fade" id="modalEditarProveedor" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Editar datos del proveedor
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<form id="form_editar_proveedor" class="form-horizontal" role="form" method="POST" action="/proveedores/guardar">
						{{ csrf_field() }}
							<input type="hidden" name="proveedor_id" value="{{$proveedor->id}}">
							<div class="form-group">
								<table class="table table-condensed table-striped table-bordered" width="100%">
									<tr>
										<th width="40%">Nombre del proveedor</th>
										<td width="50%">											
											<input class="form-control input-sm" type="text" name="nombre" value="{{$proveedor->nombre}}">
										</td>												
									</tr>
									<tr>
										<th width="40%">Razón Social</th>
										<td width="50%">											
											<input class="form-control input-sm" type="text" name="razon_social" value="{{$proveedor->razon_social}}">
										</td>												
									</tr>
									<tr>
										<th>
											RIF
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="rif" value="{{$proveedor->rif}}">
										</td>												
									</tr>									
									<tr>
										<th>
											Mail
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="mail" value="{{$proveedor->mail}}">
										</td>												
									</tr>
									<tr>
										<th>
											Dirección
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="direccion" value="{{$proveedor->direccion}}">
										</td>												
									</tr>
									<tr>
										<th>
											Teléfono
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="telefono" value="{{$proveedor->telefono}}">
										</td>												
									</tr>
									<tr>
										<th>
											Sitio web
										</th>
										<td>
											<input class="form-control input-sm" type="text" name="telefono" value="{{$proveedor->web}}">
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
