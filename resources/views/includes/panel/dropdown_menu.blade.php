<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
  <div class=" dropdown-header noti-title">
    <h6 class="text-overflow m-0">Bienvenido!</h6>
  </div>
  <a href="#" class="dropdown-item">
    <i class="ni ni-single-02"></i>
    <span>Mi perfil</span>
  </a>
  <a href="#" class="dropdown-item">
    <i class="ni ni-settings-gear-65"></i>
    <span>Configuración</span>
  </a>
  <a href="#" class="dropdown-item">
    <i class="ni ni-calendar-grid-58"></i>
    <span>Mis citas</span>
  </a>
  <a href="#" class="dropdown-item">
    <i class="ni ni-support-16"></i>
    <span>Ayuda</span>
  </a>
  <div class="dropdown-divider"></div>
  <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat dropdown-item">
      <i class="fas fa-sign-out-alt"></i> Salir
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
</div>