<!-- Modal alerts -->
<div class="modal fade" id="NotificacionesStock" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              
                <h4 class="modal-title">Notificaciones</h4>
            </div>

            <div class="list-group">
               
                    <div class="list-group">
                    @foreach($descripNot     as $notificacion)
                        <div class="list-group-item list-group-item-action">
                            <div class="row">                               
                                <div class="col-md-8 col-md-offset-1">
                                    <h5>{{$notificacion->fecha}}</h5>
                                    <h4>
                                        <i class="fas fa-envelope-open" aria-hidden="true"></i>
                                        <a class="btn-link" target="_blank" href="{{$notificacion->link}}">
                                            <small>{{$notificacion->titulo}}</small>

                                        </a>
                                    </h4>
                                    <p class="mb-1">{{$notificacion->texto}}</p>
                                </div>
                                <div class="col-md-1 col-md-offset-1">
                                    <h4 align="">
                                        {!! Form::open(['route' => ['borrarNotificacion', $notificacion->id], 'method' => 'DELETE', 'class' => 'form-borrar' ]) !!}
                                            <a class="btn btn-link btn-borrar-mensaje" type="submit" value=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        {!! Form::close() !!}
                                    </h4>
                                </div>
                                <div class="col-sm-12">
                                    <h4>
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        <a class="btn-link" target="_blank" href="{{$notificacion->link_2}}">
                                            <small>Editar Actividad</small>

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div id="sin-mensajes" class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 nuevas text-center">
                                    <h4>No hay notificaciones que mostrar</h4>
                                </div>
                            </div>
                        </div>
                    </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		if($(".form-borrar").length > 0){
			$("#sin-mensajes").hide();
		}
		$('.form-borrar').on('click', function(e) {
			e.preventDefault();
			var form = this;
			var data = $(this).serialize();
			var url = $(this).attr('action');

			$.ajax({
			    url: url,
			    data: data,
			    type: 'DELETE',
			    success: function(result) {
					var row = $(form).parents('.list-group-item');
					//row.fadeOut().remove();
					row.fadeOut().remove();
					$("#total_notificaciones").html(result.total);
					if(result.total == 0){
						$("#sin-mensajes").fadeIn();
					}
			    },
			    error: function(result) {

			    }
			});
		});
	});
</script>
