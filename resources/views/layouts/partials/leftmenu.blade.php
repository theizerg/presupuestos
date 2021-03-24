 <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('images/fondo/logo-hexagono.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SAPCPV</span>
    </a>

   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{auth()->user()->display_name}} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon mdi mdi-view-dashboard"></i>
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('VerUsuario')
              <li class="nav-item">
                <a href="/user" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              @endcan
              @can('VerPermisos')
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon mdi mdi-lock"></i>
                <p>
                  Permisos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @foreach ($roles as $role)
                <li class="nav-item">
                  <a href="/permission/{{ $role->name }}" class="nav-link">
                    <i class="mdi mdi-human-male-child nav-icon"></i>
                    <p>{{ $role->name }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endcan
            @can('VerRol')
              <li class="nav-item">
                <a href="/roles" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                <a href="/logins" class="nav-link">
                  <i class="fas fa-sign-in-alt nav-icon"></i>
                  <p>Logins</p>
                </a>
              </li>
            </ul>
          </li>
          @if (auth()->user()->hasRole('Usuario') )
          <li class="nav-item has-treeview menu-open ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                REGISTROS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('VerDepartamento')
              <li class="nav-item">
                <a href="/cliente/nuevo" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              @endcan
              {{-- @can('VerSueldo')
              <li class="nav-item">
                <a href="/proveedores" class="nav-link">
                  <i class="mdi mdi-truck-delivery nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              @endcan 
              @can('VerDivision')
              <li class="nav-item">
                <a href="/clase" class="nav-link">
                  <i class="mdi mdi-car-cog nav-icon"></i>
                  <p>Tipo de servicio</p>
                </a>
              </li>
              @endcan--}}
              @can('VerDeducciones')
              <li class="nav-item">
                <a href="/servicios/nuevo" class="nav-link">
                  <i class="mdi mdi-cog nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>
              @endcan
               @can('VerDeducciones')
              <li class="nav-item">
                <a href="/presupuestos" class="nav-link">
                  <i class="mdi mdi-ticket nav-icon"></i>
                  <p>Presupuestos</p>
                </a>
              </li>
              @endcan
              @can('VerDeducciones')
              <li class="nav-item">
                <a href="/ingreso" class="nav-link">
                  <i class="mdi mdi-car-arrow-left nav-icon"></i>
                  <p>Control de ingreso</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endif  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->