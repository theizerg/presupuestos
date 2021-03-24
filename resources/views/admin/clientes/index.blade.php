@extends('layouts.admin')
@section('title', 'Clientes')
@section('content')
<div class="container">
        <div class="row">
	            <div class="col-md-6">
	                <div class="btn-group">
	                <a href="{{ url('cliente/nuevo') }}" class="btn text-white  blue darken-4 "><i class="fa fa-plus-square"></i> Ingresar</a>
	                </div>
	            </div>
            </div>
        <br>
	<div class="row">    
		<div class="col-md-12">
			<div class="card">
				<div class="card-primary card-outline card-header">
					<h4>Vista general de clientes</h4>
				</div>
				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/clientes" class="link_ruta">
								Clientes
							</a>
						</li>						
					</ul><br>
					 <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                      <th width="100px" class="text-center" colspan="2">ID</th>   
	                  <th width="200px" class="text-center">Nombre</th>
	                  <th class="text-center">Dirección</th>
	                  <th width="120px" class="text-center">Teléfono</th>
	                  <th class="text-center">E-Mail</th>
	                  <th width="120px" class="text-center">Saldo</th>
	                 </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($clientes as $cliente)
                    <td>{{$cliente->id}}</td>                               
	                    @if($cliente->empresa)
	                    <td>
	                        <i style="width: 20px;" class="fa fa-briefcase text-center" aria-hidden="true"></i>
	                    </td>
	                    <td>
	                        <a href="/cliente/detalle/{{$cliente->encode_id}}">
	                            {{$cliente->nombre}}
	                        </a>
	                    </td>
	                    @else
	                    <td width="40px">
	                        <i style="width: 20px;" class="fa fa-user text-center" aria-hidden="true"></i>
	                    </td>
	                    <td>
	                        <a href="/cliente/detalle/{{$cliente->encode_id}}">       
	                            {{$cliente->nombre}} {{$cliente->apellido}}
	                        </a>
	                    </td>
	                    @endif                              
	                    <td>{{$cliente->direccion}}</td>
	                    <td>{{$cliente->telefono}}</td>                             
	                    <td>{{$cliente->mail}}</td>
	                    <td class="text-center">
	                       $
	                        {{ $cliente->getSaldo() }}
	                    </td>
                     @endforeach
                     </tr>
                    </tbody>

                </table>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

