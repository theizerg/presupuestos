@extends('layouts.admin')
@section('title', 'productos-movimiento')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="w3-card-4 w3-white">
                <div class="card-primary card-outline card-header">
                    <h4>Movimiento de productos</h4>
                </div>

                <div class="card-body">
                    <span class="float-right">
                        <a class="btn btn-md btn-success" href="/productos/nuevo" class="btn btn-link">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo producto
                        </a>
                    </span><br>
					<ul class="list-inline">
                       <li class="list-inline-item">
                            <a href="/" class="link_ruta">
                                Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </li>
                       <li class="list-inline-item">
                            <a href="/productos" class="link_ruta">
                                Productos &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </li>
                       <li class="list-inline-item">
                            <a href="/productos/movimientos" class="link_ruta">
                                Movimientos
                            </a>
                        </li>
                    </ul><br>
                	<a id="btnFiltrarCollapse" class="btn btn-sm" href="#" data-toggle="collapse" data-target="#collapseFiltrar">
                        Filtrar <i class="fa fa-filter" aria-hidden="true"></i>
                    </a>
                    
                    <div id="collapseFiltrar" class="collapse">
                        <form id="formFiltrarMovimientos" action="/productos/movimientos">
                            {{ csrf_field() }}
                            <div class="row">
                            	<div class="col-md-2 form-group text-center">
                                    <label class="form-label">Usuario</label>
                                    <select class="form-control input-sm">
                                        @foreach($usuarios as $u)
                                        	<option value="$u->id">{{$u->name}}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                                <div class="col-md-4 form-inline">
                                    <div class="col-md-6 text-center">
                                        <label class="form-label">Fecha</label>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <input class="form-control input-sm" type="date" name="fechaInicio">
                                         - 
                                        <input class="form-control input-sm" type="date" name="fechaFin">
                                    </div>
                                </div>                                
                                <div class="col-md-2 form-group text-center">
                                </div>
                                <div class="col-md-4 form-group text-center">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-block btn-sm btn-primary" type="button" name="btnFiltrar" >Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div> 
				</div>
				<div class="card-body">
                    <div class="row">
                    	<div class="container">
	                        <div class="table-responsive">
								<table width="97%" class="table table-hover">
									<tr>
										<th width="70px">Fecha</th>
										<th width="70px">Hora</th>
										<th width="200px">Producto</th>
										<th width="40px">Cant.</th>
										<th>Descripci??n</th>
										<th width="120px">Usuario</th>
										<th width="100px">Comprobante</th>
									</tr>

									@foreach($movimientos->sortByDesc('fecha') as $m)										
										<tr>
											<td>{{ date_format( date_create($m->fecha), 'd/m/Y' ) }}</td>		
											<td>{{ date_format( date_create($m->fecha), 'H:i:s' ) }}</td>		
											<td>
                                                <a href="/productos/detalle/{{ $m->producto->codigo }}">
                                                    @if(strlen($m->producto->nombre) > 24)
                                                        {{ substr($m->producto->nombre, 0, 24) . "..."}}
                                                    @else
                                                        {{ $m->producto->nombre }}
                                                    @endif                                                    
                                                </a>
                                            </td>
											<td align="center">{{ $m->cantidad}}</td>
											<td>{{ $m->descripcion}}</td>
											<td>{{$m->usuario->name}}</td>
											@if($m->comprobante)
												<td class="text-center">
                                                    <a href="/comprobantes/detalle/{{ $m->comprobante->id }}">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                </td>
											@else
												<td>---</td>
											@endif
										</tr>
									@endforeach							
								</table>
							</div><br>
							<div class="text-center">
								{{ $movimientos->links( "pagination::bootstrap-4") }}
							</div>
						</div>
                    </div>
                    @include('partials.movimiento_stock')
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">	
	//Auto focus al buscador
	$("#txtBusqueda").focus();
</script>
@endsection