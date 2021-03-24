@extends('layouts.admin')

@section('title', 'Clase de Servicio')
@section('page_title', 'Clase de Servicio')
@section('page_subtitle', 'Editar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('postulados') }}">postulados</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">

          <a href="{{ url('clase') }}" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          <a href="{{ url('clase/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">

         {!! Form::model($clase, ['route' => ['clase.update',$clase->encode_id],'method' => 'PUT']) !!}

        <div class="col-xs-12">
          <div class=" card-header">
            <h2 class="card-title">
              Editar datos del postulado
              <small class="pull-right"></small>
            </h2>
          </div>
        </div>
        <div class="card-body">
           @include('admin.clase.partials.form')
        </div>
        
          <button type="submit" class="btn btn-block btn-primary">Guardar</button>
        
      </div>
    </div>
  </div>

       
{!! Form::close()!!}
        
  </div>

@endsection


@push('scripts')


@endpush