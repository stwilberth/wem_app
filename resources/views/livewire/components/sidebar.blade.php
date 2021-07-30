<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
            
        <x-sidebar.link label="Tablero"     route="dashboard"   icon="home" />
        <x-sidebar.link label="Mis Grupos"  route="grupos"      icon="folder" />
        <x-sidebar.link label="Hombres"     route="hombres"     icon="users" />
        <x-sidebar.link label="Psicólogos"  route="psicologos"  icon="users" />
        <x-sidebar.link label="Usuarios"    route="users"       icon="users" />

        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Asistencia
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Enlace Asistencia</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>

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