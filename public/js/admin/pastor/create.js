$(document).ready(function(){

  $('#pastor_form').submit(function(){

        $('.missing_alert').css('display', 'none');

        if ($('#pastor_form #tx_nombres').val() === '') {
            $('#pastor_form #tx_nombres_alert').text('Ingrese nombre de usuario').show();
            $('#pastor_form #tx_nombres').focus();
            return false;
        }

        if ($('#pastor_form #tx_apellidos').val() === '') {
            $('#pastor_form #tx_apellidos_alert').text('Ingrese apellido de usuario').show();
            $('#pastor_form #tx_apellidos').focus();
            return false;
        }

        if ($('#pastor_form #nu_cedula').val() === '') {
            $('#pastor_form #nu_cedula_alert').text('Ingrese el número de cédula').show();
            $('#pastor_form #nu_cedula').focus();
            return false;
        }

        if ($('#pastor_form #nu_edad').val() === '') {
            $('#pastor_form #nu_edad_alert').text('Ingrese la edad').show();
            $('#pastor_form #nu_edad').focus();
            return false;
        }

        if ($('#pastor_form #tx_direccion').val() === '') {
            $('#pastor_form #tx_direccion_alert').text('Ingrese la dirección').show();
            $('#pastor_form #tx_direccion').focus();
            return false;
        }

         if ($('#pastor_form #tx_nombres').val() === '') {
            $('#pastor_form #tx_nombres_alert').text('Ingrese nombre de usuario').show();
            $('#pastor_form #tx_nombres').focus();
            return false;
        }
        var data = $('#pastor_form').serialize();
        $('input').iCheck('disable');
        $('#pastor_form input, #pastor_form button').attr('disabled','true');
        $('#ajax-icon').removeClass('fa fa-save').addClass('fa fa-spin fa-refresh');

        Pace.track(function () {
            $.ajax({
              url: $('#pastor_form #_url').val(),
    		      headers: {'X-CSRF-TOKEN': $('#pastor_form #_token').val()},
    		      type: 'POST',
              cache: false,
    	        data: data,
              success: function (response) {
                var json = $.parseJSON(response);
                if(json.success){
                  $('#pastor_form #submit').hide();
                  $('#pastor_form #edit-button').attr('href', $('#pastor_form #_url').val() + '/' + json.user_id + '/edit');
                  $('#pastor_form #edit-button').removeClass('hide');
                  toastr.success('Datos ingresados satisfactoriamente');
                }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                  toastr.error(value);
                  return false;
                });
                $('input').iCheck('enable');
                $('#pastor_form input, #pastor_form button').removeAttr('disabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');
              }
           });
        });

       return false;

    });
});
