@extends('layouts.admin')
@section('title', 'Clase de servicios')
@section('page_title', 'Clase de servicios')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('postulados') }}">postulados</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
         
          <a href="{{ url('clase') }}" class="btn btn-primary"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
         
          
          <a href="{{ url('clase/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
         
        </div>
      </div>
    </div>
    <br>
    <div class="row">
              <div class="col-md-4">
                <legend>Datos del proveedor</legend>
                  {!!Form::open (['route'=>'clase.store','autocomplete'=>'off','enctype' => 'multipart/form-data'])!!}
                  {{ csrf_field() }}
                  @include('admin.clase.partials.form')
                  <div class="form-group form-persona form-empresa" >
                    <button type="submit" class="btn btn-block btn-primary">Guardar</button>
                  </div>
                </form>
              </div>
              <div class="col-md-6 col-md-offset-1"><br>
                        <legend>Tipo de servicios registrados</legend>
                        <div class="table-responsive">
                          <table id="example" width="97%" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Fecha de registro</th>
                              </tr>                             
                            </thead>
                            <tbody>
                              @foreach($clases->sortByDesc('created_at')->take(8) as $p)
                                <tr>
                                  <td>
                                    <a href="/clase/{{ $p->encode_id}}/edit">
                                        <i style="width: 20px;" class="fa fa-briefcase text-center" aria-hidden="true"></i>
                                      {{ $p->nombre }}
                                    </a>
                                  </td>
                                  @if($p->created_at != null)
                                    <td>{{ date_format( $p->created_at, 'd/m/Y H:i:s' ) }}</td>
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

       
       {!! Form::close()!!}
        
  </div>

@endsection


@push('scripts')

<script type="text/javascript">
  
  $( document ).ready(function() {
    $('input').attr('autocomplete','off');
});

</script>


@endpush