 <div class="form-group">
        {{ Form::label('name', 'Nombre del rol') }}
        {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'Ingresa el nombre')) }}
 </div>
 <input type="hidden" name="guard_name" value="web">