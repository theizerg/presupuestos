@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-primary card-outline card-header">
                    <h4>Proveedores</h4>
                </div>
				<br>

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
                    	<div class="card-body"><br>
	                        <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                    <th width="40px">ID</th>
                    <th width="120px">Nombre</th>
                    <th width="15%">RIF</th>
                    <th>Dirección</th>
                    <th width="15%">Telefono</th>
                    <th width="15%">Mail</th>
                    <th width="25px"></th>
                     </tr>
                    </thead>
                    <tbody>
                    <tr>
                   @foreach($proveedores as $proveedor)
                    <tr>
                        <td>
                            <a href="/proveedores/detalle/{{ $proveedor->encode_id}}">
                                {{ $proveedor->id}}
                            </a>
                        </td>
                        <td>
                            <a href="/proveedores/detalle/{{ $proveedor->encode_id}}">
                                {{ $proveedor->nombre }}
                            </a>
                        </td>
                        <td>{{ $proveedor->rif}}</td>
                        <td>{{ $proveedor->direccion}}</td>
                        <td>{{ $proveedor->telefono}}</td>
                        <td>{{ $proveedor->mail}}</td>
                        <td>
                            <a href="#">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach         
                    </tbody>
                    </table>
							<div class="text-center">
								{{ $proveedores->links( "pagination::bootstrap-4") }}
							</div>
						</div>
                    </div>                    
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

