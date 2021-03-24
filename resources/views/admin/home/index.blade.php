@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')
<div class="container">
 <div class="row">
  @if (auth()->user()->hasRole('Administrador'))
    <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de usuarios</small>
              <h4 class="mb-0">Usuarios</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="fas fa-user-tie fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\User::count()}}</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de Permisos</small>
              <h4 class="mb-0">Permisos</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="fas fa-lock fa-3x text-red float-left"></i>
          <div class="float-right fa-3x">{{Spatie\Permission\Models\Permission::count()}}</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de Roles</small>
              <h4 class="mb-0">Roles</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="fas fa-user fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{Spatie\Permission\Models\Role::count()}}</div>
        </div>
      </div>
    </div>
  @else
   <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de Clientes</small>
              <h4 class="mb-0">Clientes</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="fas fa-user fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\Clientes::count()}}</div>
        </div>
      </div>
    </div>
     {{-- <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de Proveedores</small>
              <h4 class="mb-0">Proveedores</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="mdi mdi-truck-delivery fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\Proveedor::count()}}</div>
        </div>
      </div>
    </div> 
    <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Tipo de Servicios</small>
              <h4 class="mb-0">Servicios Prestados</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="mdi mdi-car-cog fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\ClaseServicios::count()}}</div>
        </div>
      </div>
    </div>--}}
    <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Servicios actuales</small>
              <h4 class="mb-0">Servicios</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="mdi mdi-car-coolant-level fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\Servicios::count()}}</div>
        </div>
      </div>
    </div>
      <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de presupuestos pendientes</small>
              <h4 class="mb-0">Presupuestos pendientes</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="mdi mdi-ticket-percent-outline fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\Presupuesto::where('status',0)->count()}}</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <small class="text-uppercase ls-1 mb-1">Cantidad de presupuestos aceptados</small>
              <h4 class="mb-0">Presupuestos aceptados</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <i class="mdi mdi-check-all fa-3x text-blue float-left"></i>
          <div class="float-right fa-3x">{{App\Models\Presupuesto::where('status',1)->count()}}</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-6">
      <div class="card">
      <div class="card-header">
        <h4 class="text-center">
          Cantidad de presupuestos
        </h4>
      </div>
      <div class="card-body">
        <canvas id="presupuestos"style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
   </div>
   <div class="col-sm-6 col-lg-6">
    <div class="card">
    <div class="card-header">
      <h4 class="text-center">
        Ganancias obtenidas
      </h4>
    </div>
    <div class="card-body">
      <i class="fas fa-dollar-sign fa-9x float-right"></i>
      <div class="fa-10x mb-2">{{App\Models\LineaPresupuesto::sum('total')}}</div>
    </div>
  </div>
 </div>
  </div>
  <div class="card">
  <div class="card-header text-center">
    <h5>Cantidad de Presupuestos realizados</h5>
  </div>
  <canvas id="employee" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
  
  </div>
@endif

  </div>
</div>
<div class="container-fluid">
  <div class="row">
    
@endsection
@if (auth()->user()->hasRole('Usuario'))
@push('scripts')
     {{-- Create the chart with javascript using canvas --}}
     <script>
      // Get Canvas element by its id
      employee_chart = document.getElementById('employee').getContext('2d');
      chart = new Chart(employee_chart,{
          type:'line',
          data:{
              labels:[
                  /*
                      this is blade templating.
                      we are getting the date by specifying the submonth
                   */
                  '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}',
                  '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                  '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}',
                  '{{Carbon\Carbon::now()->subMonths(0)->toFormattedDateString()}}'
                  ],
              datasets:[{
                  label:'Presupuestos realizados en los Últimos 4 meses.',
                  data:[
                      '{{$emp_count_4}}',
                      '{{$emp_count_3}}',
                      '{{$emp_count_2}}',
                      '{{$emp_count_1}}'
                  ],
                  backgroundColor: [
                      'rgba(178,235,242 ,1)'
                  ],
                  borderColor: [
                      'rgba(0,150,136 ,1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
  </script>
  <script>
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#presupuestos').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Pendientes', 
          'Aceptados',
  
      ],
      datasets: [
        {
          data: ['{{$presupuestoPendiente}} ','{{$presupuestoAceptados}} '],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    });
  </script>
@endpush
@endif