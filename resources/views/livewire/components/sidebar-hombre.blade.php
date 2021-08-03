<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
            
        <li class="nav-item">
          <a class="nav-link" 
              aria-current="page" href="{{ route('hombre', session()->get('hombre_id')) }}">
            <span data-feather="user"></span>
            Mi Perfil
          </a>
        </li>

        <x-sidebar.link label="Primer Ingreso"      route="form-primero"     icon="file-text" />
        <x-sidebar.link label="15 - 20 sesiones"      route="form-segundo"     icon="file-text" />
        <x-sidebar.link label="30 - 45 sesiones"      route="form-tercero"     icon="file-text" />

        <li class="nav-item">
          <span class="nav-link" wire:click="logout">
            <span data-feather="log-out"></span>
            Salir
          </span>
        </li>
      </ul>

    </div>
</nav>