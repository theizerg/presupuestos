@extends('layouts.admin')
@section('title', 'Ingreso de vehículos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class=" card-primary card-outline card-header">
					<h4>Alta de ingreso vehicular <i class="mdi mdi-car-arrow-left text-blue float-right"></i></h4>
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
								Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/ingreso/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
					<div class="row">
							<div class="col-md-4">
								<legend>Datos del Vehículo</legend>
								<form method="post" action="/ingreso/guardar">
									{{ csrf_field() }}
									<div class="form-group form-persona form-empresa mt-4 " >
										<label>Código del presupuesto</label>
										<input class="form-control" type="text" name="codigo_presupuesto" placeholder="Teléfono" value="{{$presupuesto->codigo}} ">
									</div>
									<div class="form-group">
										<label>Cliente</label>									
										
										<input class="form-control" type="text" name="cliente_id" disabled placeholder="Teléfono" value=" {{$presupuesto->cliente->nombre}} {{$presupuesto->cliente->apellido}} ">
									</div>
									<div class="form-group form-persona form-empresa mt-4 " >
										<label>Código del presupuesto</label>
										<input class="form-control" type="text" name="telefono" disabled placeholder="Teléfono" value=" {{$presupuesto->cliente->marca_vehiculo}} ">
									</div>
									<div class="form-group form-persona form-empresa mt-4 " >
										<label>Código del presupuesto</label>
										<input class="form-control" type="text" name="telefono" disabled placeholder="Teléfono" value="{{$presupuesto->cliente->ano_vehiculo}} ">
									</div>
									<div class="form-group form-persona form-empresa mt-4 " >
										<label>Código del presupuesto</label>
										<input class="form-control" type="text" name="placa_vehiculo" disabled placeholder="Teléfono" value="{{$presupuesto->cliente->placa_vehiculo}} ">
									</div>
									<div class="form-group form-persona form-empresa mt-4" >
										<label>Historia del vehículo </label>
									<textarea name="descripcion" id="" cols="34" rows="10"></textarea>
									</div>
									<div class="form-group">
										<label for="status_id">Acceso al sistema</label>
										<div class="checkbox icheck">
										  <label>
											<input type="radio" name="status" value="1" checked> Entregado&nbsp;&nbsp;
											<input type="radio" name="status" value="0"> En reparación
										  </label>
										</div>
									  </div>
									  <input type="hidden" name="presupuesto_id" id="presupuesto_id" value="{{$presupuesto->id}}">
									  <input type="hidden" name="cliente_id" id="cliente_id" value="{{$presupuesto->cliente->id}}">
									  
									 
									  {{-- <input type="hidden" name="ingreso_id" id="ingreso_id" value="{{$presupuesto->id}}"> --}}
									<div class="form-group form-persona form-empresa" >
										<button type="submit" class="btn btn-block btn-primary">Guardar</button>
									</div>
								</form>
								
							</div>						
							<div class="col-md-6 col-md-offset-1"><br>
                				<legend>Últimos Vehículos ingresados</legend>
                				<div class="table-responsive">
	                				<table width="97%" class="table table-striped table-bordered">
	                					<thead>
	                						<tr>
	                							<th>Nombre</th>
	                							<th>Fecha de registro</th>
	                						</tr>	                						
	                					</thead>
	                					<tbody>
											@foreach ($ingresos as $ingreso)
												
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
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script src="{{ asset('js/admin/user/create.js') }}"></script>
@endpush