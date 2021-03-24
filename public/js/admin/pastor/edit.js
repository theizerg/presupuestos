$("#pastor_button").on( "click", function()
{
   var data = $('#pastor_form').serialize();
        $('input').iCheck('disable');
        $('#pastor_form input, #pastor_form button').attr('disabled','true');
        $('#ajax-icon').removeClass('fa fa-save').addClass('fa fa-spin fa-refresh');

            $.ajax({
              url: $('#pastor_form').attr('action'),
              type: 'PUT',
              data: data,
              success: function (response) {
                var json = $.parseJSON(response);
                if(json.success){
                  $('#pastor_form #submit').hide();
                  $('#pastor_form #edit-button').removeClass('hide');
                   $('#main-form #edit-button').attr('href', $('#main-form #_url'));
                  toastr.success('Usuario ingresado exitosamente');
                }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                  toastr.error(value);
                  return false;
                });
                $('input').iCheck('enable');
                $('#pastor_form input, #pastor_form button').removeAttr('disabled');
                $('#pastor_form input, #pastor_form ').reset('enable');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');
              }
           });
       
        
       return false;

    });
//***************************************fin de la funcion*******************************

