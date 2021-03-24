@extends('layouts.admin')
@section('title', 'productos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Detalle del servicio</h4>
				</div>
				<div class="card-body">
					<span class="float-right">
						<a class="btn btn-md btn-success" href="/servicios/nuevo" class="btn btn-link">
							<i class="fas fa-plus" aria-hidden="true"></i> Nuevo servicio
						</a>
					</span><br>
					<ul class="list-inline">
						 <li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						 <li class="list-inline-item">
							<a href="/servicios/nuevo" class="link_ruta">
								Servicio Nuevo &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						 <li class="list-inline-item">
							<a href="/servicios/detalle/{{$servicio->codigo}}" class="link_ruta">
								
							</a>
						</li>
					</ul><br>
					
					<div class="row">
							<div class="col-md-4">
								<legend>
									Detalle del servicio
									<span class="float-right">
										<a class="btn btn-link btn-sm" id="editCodigo" data-toggle="modal" data-target="#modalEditarProducto">
											<i class="fas fa-edit fa-lg" aria-hidden="true"></i>
										</a>
									</span>
								</legend>								
								<div class="form-group">
									<table class="table table-condensed table-striped table-bordered" width="100%">
										<tr>
											<th class="text-center th-b" colspan="2">Información general</th>
										</tr>
										<tr>
											<td width="30%">Código</td>
											<td width="70%">
												{{ $servicio->codigo }}
											</td>
										</tr>
										<tr>
											<td>Tipo de servicio</td>
											<td> 
												{{ $servicio->nombre }}
											</td>
										</tr>
									
										<tr>
											<td>Costo del servicio</td>
											<td>
												<!-- Se obtiene moneda predeterinada --> 
												${{ $servicio->precio }}
												<span class="float-right">
													<a href="#formStock" class="btn btn-sm" id="{{$servicio->codigo}}" data-toggle="modal" data-target="#modalHistoricoPrecios" onclick='$("#form_stock").attr("action", "/servicios/{{$servicio->codigo}}/ModificarStock");'  title="Histórico de precios de venta para este producto">
														<i class="fa fa-book" aria-hidden="true"></i>
													</a>
												</span>
											</td>												
										</tr>
										
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
<div class="modal fade" id="modalEditarProducto" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Editar datos del servicio
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<form id="form_editar_producto" class="form-horizontal" role="form" method="POST" action="/servicios/editar">
						{{ csrf_field() }}
							<input type="hidden" name="servicio_id" value="{{$servicio->id}}">
							<div class="form-group">
								<table class="table table-condensed table-striped table-bordered" width="100%">
									<tr>
										<th width="30%">Código</th>
										<td width="70%">									
											<input id="txtCodigo" type="text" class="form-control input-sm" name="codigo" placeholder="Código del producto" value="{{$servicio->codigo}}" hidden="true" required>
										</td>										
									</tr>
									<tr>
										<th>Tipo de servicio</th>
										<td>
											<div class="form-group">
												
												<input id="txtPrecio" class="form-control" name="nombre" placeholder="Nombre del servicio"  value="{{$servicio->nombre}} ">
											</div>
										</td>
									</tr>	
									<tr>
										<th>
											Precio del servicio $
										</th>
										<td>
											<!-- Se obtiene moneda predeterinada -->
											<input id="txtPrecio" class="form-control input-sm" name="precio" placeholder="Precio" value="{{$servicio->precio}}">
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
<div class="modal fade" id="modalHistoricoPrecios" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Histórico de precios de venta
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Precio ($)</th>
								<th>Usuario</th>
							</tr>
						</thead>
						<tbody>
							@foreach($precios_historico as $p)
							<tr>
								<td>
									{{ date_format( date_create($p->fecha), 'd/m/Y' ) }}								
								</td>
								<td>$ {{ $p->precio }}</td>
								<td>{{ App\Models\User::where('id', $p->usuario_id)->first()->name }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>					
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">	
	$(document).ready(function(){
		$('#form-borrar').on('submit', function(e) {			
			if(! confirm("¿Está seguro de que desea eliminar el producto?")){
				e.preventDefault();
			}
		});
	});

	
</script>
@endpush