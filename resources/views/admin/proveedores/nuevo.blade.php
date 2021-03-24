@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class=" card-primary card-outline card-header">
					<h4>Alta de proveedor</h4>
				</div>

				<div class="card-body">                
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
							<a href="/proveedores/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					<div class="row">
							<div class="col-md-4">
								<legend>Datos del proveedor</legend>
								<form method="post" action="/proveedores/guardar">
									{{ csrf_field() }}
									<div class="form-group">
										<label>Tipo de proveedor</label>
										<select id="select_tipo_cliente" class="form-control" name="tipo_cliente">
											<option>Tipo de proveedor</option>
											<option value="persona">Persona</option>
											<option value="empresa">Empresa</option>
										</select>
									</div>
									
									<div class="form-group input-group pull-right form-persona">
										<label class="sr-only">Documento</label>
										<div style="width: 50%;" class="input-group-btn">
											<select name="tipo_documento_id" id="btnAgregarArticulo" class="form-control form-persona-required" oninvalid="this.setCustomValidity('Debe ingresar un tipo de documento')" required="true" oninput="setCustomValidity('')">
												<option value="" disabled selected hidden>Tipo de documento</option>
												@foreach($tipos_documento as $tipo_documento)
													<option value="{{ $tipo_documento->id }}">{{ $tipo_documento->tipo_documento }}</option>
												@endforeach
											</select>
										</div>
										<input class="form-control form-persona-required" type="text" name="documento" placeholder="N° documento" oninvalid="this.setCustomValidity('Debe ingresar un número de documento')" required="true" oninput="setCustomValidity('')">
									</div>
									<div class="form-group form-persona">
										<label>Género</label>
										<select id="select_tipo_cliente" class="form-control " name="genero_id">
											<option>Géneros</option>
											
											@foreach($generos as $genero)
													<option value="{{ $genero->id }}">{{ $genero->nb_genero }}</option>
												@endforeach
										</select>
									</div>
									<div class="form-group form-persona">
										<label class="sr-only">Nombre</label>
										<input class="form-control form-persona-required" type="text" name="nombre" placeholder="Nombre" required="true" oninvalid="this.setCustomValidity('Debe ingresar un nombre de cliente')" oninput="setCustomValidity('')">
									</div>
									<div class="form-group form-persona">
										<label class="sr-only">Apellido</label>
										<input class="form-control" type="text" name="apellido" placeholder="Apellido">
									</div>

									<div class="form-group form-empresa">
										<label class="sr-only">Razón social</label>
										<input class="form-control form-empresa-required" type="text" name="razonSocial" placeholder="Razón social" oninvalid="this.setCustomValidity('Debe ingresar una razón social para el cliente')" oninput="setCustomValidity('')">
									</div>
									<div class="form-group form-empresa">
										<label class="sr-only">RIF</label>
										<input class="form-control form-empresa-required" type="text" name="rif" placeholder="RIF" oninvalid="this.setCustomValidity('Debe ingresar un RIF para el cliente')" oninput="setCustomValidity('')">
									</div>
									<input type="hidden" name="usuario_id" id="usuario_id" value="{{Auth::user()->id}}">

									<div class="form-group form-persona form-empresa" >
										<label class="sr-only">Mail</label>
										<input class="form-control" type="text" name="mail" placeholder="E-mail">
									</div>
									<div class="form-group form-persona form-empresa" >
										<label class="sr-only">Dirección</label>
										<input class="form-control" type="text" name="direccion" placeholder="Dirección">
									</div>
									<div class="form-group form-persona form-empresa" >
										<label class="sr-only">Teléfono</label>
										<input class="form-control" type="text" name="telefono" placeholder="Teléfono">
									</div>

									<div class="form-group form-persona form-empresa" >
										<button type="submit" class="btn btn-block btn-primary">Guardar</button>
									</div>
								</form>
							</div>
							<div class="col-md-6 col-md-offset-1"><br>
                				<legend>Últimos Proveedores registrados</legend>
                				<div class="table-responsive">
	                				<table width="97%" class="table table-striped table-bordered">
	                					<thead>
	                						<tr>
	                							<th>Nombre</th>
	                							<th>Fecha de registro</th>
	                						</tr>	                						
	                					</thead>
	                					<tbody>
	                						@foreach($proveedores->sortByDesc('created_at')->take(8) as $p)
	                							<tr>
	                								<td>
	                									<a href="/cliente/detalle/{{ $p->encode_id}}">
	                										@if($p->empresa)
	                											<i style="width: 20px;" class="fa fa-briefcase text-center" aria-hidden="true"></i>
	                										@else
	                											<i style="width: 20px;" class="fa fa-user text-center" aria-hidden="true"></i>
	                										@endif
                											{{ $p->nombre }} {{ $p->apellido }}
	                									</a>
	                								</td>
	                								@if($p->created_at != null)
	                									<td>{{ date_format( $p->created_at, 'd/m/Y H:i:s' ) }}</td>
	                								@else
	                									<td></td>
	                								@endif
	                							</tr>
	                						@endforeach
	                					</tbody>
	                				</table>
	                			</div>
                			</div>
							<div class="col-md-5 col-md-offset-2">                				

                			</div>
						</div>
					</div>                        
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">	
	//Auto focus al buscador
	$("#txtNombre").focus();

	
</script>

<script type="text/javascript">

		$(document).ready(function(){
			$("#select_tipo_cliente").on('change', function(){
				if($("#select_tipo_cliente").val() == "persona"){
					$(".form-empresa-required").prop('required',false);
					$(".form-empresa").hide();
					
					$(".form-persona-required").prop('required',true);
					$(".form-persona").show();

				}else if($("#select_tipo_cliente").val() == "empresa"){

					$(".form-persona-required").prop('required',false);
					$(".form-persona").hide();
					
					$(".form-empresa-required").prop('required',true);
					$(".form-empresa").show();
				}
			});
		});
	</script>
@endpush