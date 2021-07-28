<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('welcome') }}">Wem App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (Auth::user() && Auth::user()->hasRole(['admin', 'psicologo']))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">Tablero</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">Grupos</a>
            </li>
          @endif

          {{-- enlaces hombre --}}
          @if (session()->get('hombre_id'))
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hombre Wem
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('form-primero') }}">Primer Ingreso</a></li>
                <li><a class="dropdown-item" href="{{ route('form-segundo') }}">15 - 20 sesiones</a></li>
                <li><a class="dropdown-item" href="{{ route('form-tercero') }}">30 - 35 sesiones</a></li>                  
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('hombre-show') }}">Mi perfil</a></li>
              </ul>
            </li>
          @endif
          
          {{-- enlaces psicologo --}}
          @hasanyrole('psicologo|admin')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Resultados
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('result-asistencia') }}">Asistencia</a></li>
                  <li><a class="dropdown-item" href="{{ route('result-asistencia') }}">Evaluacion Semanal</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('result-primero') }}">Primer Ingreso</a></li>
                  <li><a class="dropdown-item" href="{{ route('result-segundo') }}">15 - 20 sesiones</a></li>
                  <li><a class="dropdown-item" href="{{ route('result-tercero') }}">30 - 35 sesiones</a></li>
                </ul>
              </li>
          @endhasanyrole

        </ul>


        <div class="d-flex">
          <ul class="navbar-nav">
            @if (Route::has('login'))
              @auth
                <li class="nav-item">
                  <span wire:click="logout" class="nav-link">Salir</span>
                </li>
              @endauth
            @endif
            @if (session()->get('hombre_id'))
              <li class="nav-item">
                <span wire:click="logoutHombre" class="nav-link">Salir</span>
              </li>
            @endif
          </ul>
        </div>


      </div>
    </div>
    {{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        @endauth
    </div>
  @endif --}}
  </nav>
