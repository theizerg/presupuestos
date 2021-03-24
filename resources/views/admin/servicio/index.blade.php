@extends('layouts.admin')
@section('title', 'Servicios')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-6">
          <div class="btn-group">
           
            <a href="{{ url('servicios/nuevo') }}" class="btn blue darken-3 text-white mr-5"><i class="fa fa-plus-square"></i> Ingresar</a>
           
          </div>
        </div>
      </div><br>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de los Servicios</h4>
				</div>

				<div class="card-body">
					
					<ul class="list-inline">
						 <li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						 <li class="list-inline-item">
							<a href="/servicios" class="link_ruta">
								Servicios
							</a>
						</li>
					</ul>
				
					<div class="row">
						<div class="container">
							<div class="table-responsive ">
								<table id="example"  class="table table-hover">
									<thead>
									<tr>
										<th class="text-center" width="120px">Código</th>
										<th class="text-center" width="90px">Nombre</th>
										<th class="text-center" width="80px">Precio</th>
									                                         
									</tr>
									</thead>

									@foreach($servicios as $servicio)
										
									<tbody>
<tr>
											<td class="text-center"><a href="/productos/detalle/{{ $servicio->codigo}}">{{ $servicio->codigo}}</a></td>
											<td class="text-center" title="{{$servicio->nombre}}">
												@if(strlen($servicio->nombre) > 24)
													{{ substr($servicio->nombre, 0, 24) . "..."}}
												@else
													{{ $servicio->nombre }}
												@endif
											</td>
											
											<td>
												<span class="float-right">
													${{ $servicio->precio}}
												</span>
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
</div>
@endsection