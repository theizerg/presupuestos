$(document).ready(function(){

  $('#pastor_form').submit(function(){

        $('.missing_alert').css('display', 'none');

       
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
                  toastr.success('Datos ingresados');
                }
              },error: function (data) {
                var errors = data.responseJSON;
                $.each( errors.errors, function( key, value ) {
                  toastr.error(value);
                  return false;
                });
                $('input').iCheck('enable');
                $('#pastor_form input, #pastor_form button').removeAttr('enabled');
                $('#ajax-icon').removeClass('fa fa-spin fa-refresh').addClass('fa fa-save');
              }
           });
        });

       return false;

    });
});
