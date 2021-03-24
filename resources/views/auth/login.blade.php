@extends('layouts.adminfront')

@section('title', 'Inicio de sesión')
@section('subtitle', 'Ingresa tus datos para iniciar sesión.')

@section('content')
<div class="container mt-5 pb-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="header">
        <div class="text-center">
            <img src="{{ asset('images/logo/logo-vertical.png') }}" height="50" class="mb-3">
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class=" card white">
        
         <div class="card-body px-lg-5 py-lg-5">
          <h1>Iniciar Sesión</h1><p class="text-muted">SAPCPV<br>
          </p><p class="text-muted">Ingresa tu cuenta</p>
               <form id="main-form" class="">
                <input type="hidden" id="_url" value="{{ url('login') }}">
                <input type="hidden" id="_redirect" value="{{ url('/') }}">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">      

            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                </div>
                <input class="form-control" placeholder="Usuario" type="text" @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
              </div>
            </div>
            <div class="text-center">
             <button type="submit" class="btn blue darken-4 form-control" id="boton">
                  <i class="fas fa-sign-in-alt text-white" id="ajax-icon"></i> <span class="text-white ml-3">{{ __('Iniciar Sesión') }}</span>
              </button> 
            </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush