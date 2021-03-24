@extends('layouts.admin')
@section('title', 'Presupuestos')
@push('scripts')		
	<script type="text/javascript">
		var buscar_cliente_url = "{{ url('clientes/buscar?texto=') }}";
		var buscar_prodcto_url = "{{ url('servicios/buscar?texto=') }}";
		var comprobante_vistaprevia_url = "{{ url('servicios/vistaPrevia') }}";
	</script>
	<script src="{{ asset('js/forms/comprobantes.js') }}"></script>
	<script>
		    
		$(document).ready(function (){
		   
		    //Define la cantidad de numeros aleatorios.
		var cantidadNumeros = 8;
		var myArray = []
		while(myArray.length < cantidadNumeros ){
		  var numeroAleatorio = Math.ceil(Math.random()*cantidadNumeros);
		  var existe = false;
		  for(var i=0;i<myArray.length;i++){
		    if(myArray [i] == numeroAleatorio){
		        existe = true;
		        break;
		    }
		  }
		  if(!existe){
		    myArray[myArray.length] = numeroAleatorio;
		  }

		}
		$('#txtNumeroComprobante').val(myArray.join(""));
		  });
</script>
@endpush
@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
				<h4>Ingreso de comprobante</h4> 
				
				</div>                
				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/presupuestos" class="link_ruta">
								Presupuestos &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/presupuestos/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					
					</ul>
					
					
					<form id="formNuevoComprobante" action="/presupuestos/nuevo" method="post">
					{{ csrf_field() }}
						<div class="modal fade" id="modalDescripcion" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										
										
										<legend>Agregar información</legend>
									</div>

									<input type="hidden" name="usuario_id" id="usuario_id" value="{{Auth::user()->id}}">

									<div class="modal-body">
										<div class="form-group">
											<input maxlength="60" class="form-control" type="text" name="descripcion_1" placeholder="Línea 1">
											<input maxlength="60" class="form-control" type="text" name="descripcion_2" placeholder="Línea 2">
											<input maxlength="60" class="form-control" type="text" name="descripcion_3" placeholder="Línea 3">
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Confirmar</button>
									</div>        
								</div>
							</div>
						</div>
						<input id="hiddenListado" type="hidden" name="listadoArticulos">
						<div class="row">
							<div class="col-md-4">
								<fieldset>
									<div class="form-group col-md-12">
									<legend>Datos del presupuesto</legend><br>
									<div class="form-group col-md-12 form_venta_contado form_factura_credito form_devolucion_contado">
										<label  for="txtNumeroComprobante">Código del presupuesto</label>
										<input name="codigo" type="text" class="form-control input-sm" id="txtNumeroComprobante" placeholder="N° de Comprobante" tabindex="3">
									</div>
										<label  for="txtFecha">Fecha de emisión</label>
										<input id="txtFecha" type="date" name="fecha_emision" class="form-control input-sm">
									</div>									
									<div class="form-group col-md-12 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<label  for="txtCotizacion">Cotización</label>
										<input name="cotizacion" type="text" class="form-control input-sm" id="txtCotizacion" placeholder="Cotización" tabindex="5">
									</div>
									
									<!-- CLIENTE -->
									<div class="form-group col-md-12 form_venta_contado form_factura_credito form_devolucion_contado">
										<legend for="txtCliente">Datos del cliente</legend>
										<label  for="txtCliente">Nombre o razón social</label>
										<div class="input-group">
											<input id="hiddenCliente" type="hidden" name="cliente_id">
											<input name="cliente" type="text" class="form-control input-sm required cliente-required" id="txtCliente" placeholder="Nombre o razón social" oninvalid="this.setCustomValidity('Debe ingresar el nombre o la razón social del cliente')" required oninput="setCustomValidity('')" tabindex="6">
											<div class="input-group-btn">
											<button id="btnAgregarCliente" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalAgregarCliente">
													<i class="fas fa-address-book"></i>
												</button>
											</div>
										</div>
									</div>

									<!-- PROVEEDOR -->
									<div class="form-group col-md-12 form_compra_contado">
										<legend for="txtProveedor">Datos del Proveedor</legend>
										<label  for="txtProveedor">Nombre o razón social</label>
										<div class="input-group">
											<input id="hiddenProveedor" type="hidden" name="proveedor_id">
											<input name="proveedor" type="text" class="form-control input-sm required proveedor-required" id="txtProveedor" placeholder="Nombre o razón social" oninvalid="this.setCustomValidity('Debe ingresar el nombre o la razón social del proveedor')" required oninput="setCustomValidity('')" tabindex="6">
											<div class="input-group-btn">
											<button id="btnAgregarProveedor" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalAgregarProveedor">
													<i class="fa fa-address-book-o" aria-hidden="true"></i>
												</button>
											</div>
										</div>
									</div>									

									<!-- DATOS DE FACTURA -->
									<div class="form-group col-md-12 form_factura_credito">
										<legend>Datos de la factura</legend>
										<label for="txtFechaVencimiento">Vencimiento</label>
										<input class="form-control input-sm factura-required" type="date" name="fecha_vencimiento" placeholder="Vencimiento de la factura">
									</div>
									<div class="form-group col-md-12 form_factura_credito">
										<label >Plazo</label>
										<input class="form-control input-sm" type="number" name="plazo" value="3" placeholder="Plazo (en días)">
									</div>
									<div class="form-group col-md-12 form_factura_credito">
										<label >Pago inicial</label>
										<input class="form-control input-sm" type="number" name="pago_inicial" placeholder="Pago inicial">
									</div>


									<div class="form-group col-md-12 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<a href="#modalDescripcion" class="btn btn-block" data-toggle="modal" data-target="#modalDescripcion">
											Agregar datos extra
										</a>
									</div>
								</fieldset>
							</div>
							<div class="col-md-8 ">
								<fieldset>
									<legend>
									<div class="row container form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<div class="col-md-6">
											Buscar artículos <i class="fas fa-arrow-right ml-5 fa-2x"></i>
										</div>
										<div class="col-md-6">
											<div class="input-group float-right">
												<form>
													<input type="text" class="form-control input-sm" id="txtAgregarArticulo" list="listaBusquedaProducto" placeholder="Agregar un artículo..." onkeydown="if (event.keyCode == 13) return false;" tabindex="1">
													<div class="input-group-btn">
														<button id="btnAgregarArticulo" class="btn btn-primary btn-sm">
															<i class="fa fa-cart-plus" aria-hidden="true"></i>
														</button>
													</div>
												</form>
											</div>
										</div>										 
										<datalist id="listaBusquedaProducto">
											<!--
											<option value="a"/>
											<option value="b"/>
											<option value="c"/>
											-->
										</datalist>
									</div>
									</legend>
									<div class="col-md-12 pre-scrollable div-detalle-comprobante form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<table width="100%" class="table table-responsive table-hover">
											<thead>
												<tr>
													<th class="text-center" width="100px">Código</th>
													<th class="text-center">Servicio</th>
													<th class="text-center" width="80px">Precio</th>
													<th class="text-center" width="80px">Subtotal</th>
													<th class="text-center" width="80px">Total</th>
													<th class="text-center" width="30px"></th>
												</tr>
											</thead> 
											<tbody id="tablaProductos">
												
											</tbody>
										</table><br><br><br><br><br>	
									
									<div class="col-md-12 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<table class="table-condensed float-right table-striped">
											<thead id="tablaResumen">
												
											</thead>
										</table>
									</div>		
									<div class="col-md-6 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<button id="btnGuardarComprobante" class="btn btn-block btn-primary" tabindex="9">
											Confirmar
										</button>
									</div>
								</fieldset>                                
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAgregarPorducto" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<legend>Agregar artículo</legend>
			</div>

			<div class="modal-body">
				
			</div>

			<div class="modal-footer">
				
			</div>        
		</div>
	</div>
</div>

<div class="modal fade" id="modalAgregarCliente" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Buscar cliente
					<span class="float-right">
						<a class="btn btn-success btn-sm ml-5" href="/cliente/nuevo" target="_blank" >
							<i class="fa fa-user-plus" aria-hidden="true"></i>
						</a>
					</span>
				</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label >Buscar cliente</label>
						<div class="row">
							<div class="col-md-10">
								<input id="txtBuscadorCliente" class="form-control" type="text" name="BuscadorCliente" placeholder="Buscar cliente...">
							</div>
							<div class="col-md-2">
								<button id="btnBuscarCliente" type="submit" class="btn btn-primary btn-block">
									<i class="fa fa-search" aria-hidden="true"></i>									
								</button>
							</div>
						</div>						
						<hr/>
						<table width="100%" class="table table-responsive table-hover">
							<thead>
								<tr>
									<th width="5%">ID</th>
									<th width="20%">Nombre</th>
									<th width="60%">Modelo de vehículo</th>
									<th width="70%">Año de vehículo</th>
									<th width="40%">Placa de vehículo</th>
									<th width="40%">Teléfono</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody id="tablaClientes">
								
							</tbody>
						</table>						
					</div>
				</form>
			</div>

			<div class="modal-footer">				
				<button id="btnOkModalAgregarCliente" class="btn btn-block btn-primary" data-dismiss="modal">
					Confirmar
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAgregarProveedor" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
					Buscar Proveedor
					<span class="float-right">
						<a class="btn btn-success btn-sm text-center" href="/proveedores/nuevo" target="_blank" >
							<i class="fa fa-user-plus" aria-hidden="true"></i>
						</a>
					</span>
				</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label >Buscar Proveedor</label>
						<div class="row">
							<div class="col-md-10">
								<input id="txtBuscadorProveedor" class="form-control" type="text" name="BuscadorProveedor" placeholder="Buscar proveedor...">
							</div>
							<div class="col-md-2">
								<button id="btnBuscarProveedor" type="submit" class="btn btn-primary btn-block">
									<i class="fa fa-search" aria-hidden="true"></i>									
								</button>
							</div>
						</div>						
						<hr/>
						<table width="100%" class="table-condensed table-striped table-bordered">
							<thead>
								<tr>
									<th width="5%">ID</th>
									<th width="20%">Razón Social</th>
									<th width="20%">RIF</th>
									<th width="20%">Mail</th>
									<th width="20%">Dirección</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody id="tablaProveedores">
								
							</tbody>
						</table>						
					</div>
				</form>
			</div>

			<div class="modal-footer">				
				<button id="btnOkModalAgregarProveedor" class="btn btn-block btn-primary" data-dismiss="modal">
					Confirmar
				</button>
			</div>
		</div>
	</div>
</div>

@endsection