<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
            
        <x-sidebar.link label="Inicio"     route="welcome"   icon="home" />
        
        @role('admin')
            <x-sidebar.link label="Grupos"      route="grupos"      icon="folder" />
            <x-sidebar.link label="Hombres"     route="hombres"     icon="users" />
            <x-sidebar.link label="Usuarios"    route="users"       icon="users" />
            <x-sidebar.link label="Asistencia"  route="reports-asistencia"  icon="check-square" />
        @endrole

        @role('psicologo')
          <x-sidebar.link label="Mis Grupos"  route="grupos"      icon="folder" />
          <x-sidebar.link label="Hombres"     route="hombres"     icon="users" />            
          <x-sidebar.link label="Asistencia"  route="reports-asistencia"  icon="check-square" />            
        @endrole

        <li class="nav-item">
          <span class="nav-link" wire:click="logout">
            <span data-feather="log-out"></span>
            Salir
          </span>
        </li>
      </ul>

      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Crear Enlace Asistencia</span>
        <span class="link-secondary" aria-label="Crear enlace de asistencia" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <span data-feather="plus-circle"></span>
        </span>
      </h6> --}}
      {{-- <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
          </a>
        </li>
      </ul> --}}
    </div>
</nav>