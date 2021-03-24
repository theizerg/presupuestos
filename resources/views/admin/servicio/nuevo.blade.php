	@extends('layouts.admin')
@section('title', 'Servicios')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Creación de los servicios </h4>
				</div>

				<div class="card-body">                
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/servicios/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>
					</ul><br>
				
					<div class="row">
						
							<div class="col-md-4">
								<legend>Registro del servicio</legend>
								<form id="form_nuevo_producto" role="form" method="POST" action="/servicios/nuevo">
									{{ csrf_field() }}
									<div class="form-group">
										<label for="txtCodigo" class="control-label ">Código</label>
										<input id="txtCodigo" type="text" class="form-control" name="codigo" placeholder="Código de producto"  value="{!! old('codigo') !!}">
									</div>
									<div class="form-group">
										<label>Nombre del servicio</label>
										<input id="txtPrecio" class="form-control" name="nombre" placeholder="Nombre del servicio">
									</div>
									<div class="form-group">
										<label for="txtPrecio" class="control-label ">Precio del servicio</label>
										<input id="txtPrecio" class="form-control" name="precio" placeholder="Precio en $">
									</div>							
									
									<div class="form-group text-center">
										<input type="submit" class="btn btn-primary btn-block" value="Guardar">
									</div>		                    		
								</form>   

							</div>
		
							<div class="col-md-6 col-md-offset-1">
								<legend>Últimos servicios registrados</legend>
								<div class="table-responsive">
									<table width="97%" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Código</th>
												<th>Nombre</th>
												<th>Fecha</th>
											</tr>	                						
										</thead>
										<tbody>
											@foreach($servicios->sortByDesc('id')->take(8) as $p)
												<tr>
													<td><a href="/servicios/detalle/{{ $p->codigo}}">{{ $p->codigo}}</a></td>
													<td>{{ $p->nombre }}</td>
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
	$("#txtCodigo").focus();
	
</script>
<script>
    
$(document).ready(function (){
   
    //Define la cantidad de numeros aleatorios.
var cantidadNumeros = 5;
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
$('#txtCodigo').val('000' + myArray.join(""));
  });
</script>
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
$('#txtCodigoDeBarras').val(myArray.join(""));
  });
</script>
@endpush