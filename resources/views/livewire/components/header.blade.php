<header class="navbar navbar-light bg-light sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('welcome') }}"
      style="background-color: rgb(56 152 139); color: rgb(255 255 255)">
      Wem App
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" 
      type="button" 
      data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" 
      aria-controls="sidebarMenu" 
      aria-expanded="false" 
      aria-label="Toggle navigation"
      style="color: white">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <span class="nav-link px-3" wire:click="logout">Salir</span>
      </div>
    </div> --}}
</header>