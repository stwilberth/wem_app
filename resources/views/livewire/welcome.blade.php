<div class="container">
  

  <div class="row" style="height: 300px">
      <div class="col d-flex justify-content-center align-items-center">
          <h1 class="fs-1">Wem App</h1>
      </div>
  </div>
    @guest
      @if (!session('hombre_id'))
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-sm-6 col-md-3 d-flex justify-content-end mt-3">
                <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#ingreso">
                    Ingreso
                </button>
            </div>
            <div class="col-sm-6 col-md-3 d-flex justify-content-start mt-3">
                <button type="button" class="btn btn-secondary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#registro">
                    Registro
                </button>
            </div>
            <div class="col-md-3"></div>
        </div>  
      @endif
    @endguest

    @if (session()->get('hombre_id'))
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-sm-6 col-md-3 d-flex justify-content-end mt-3">
            <a href="{{ route('hombre', session()->get('hombre_id')) }}" type="button" class="btn btn-primary btn-lg w-100">
              Mi Perfil
            </a>
          </div>
          <div class="col-sm-6 col-md-3 d-flex justify-content-start mt-3">
            <button type="button" class="btn btn-secondary btn-lg w-100" wire:click="logout">
              Salir
            </button>
          </div>
          <div class="col-md-3"></div>
        </div>
    @endif

    @auth
      @if (Auth::user()->hasRole(['admin', 'psicologo']))
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-sm-6 col-md-3 d-flex justify-content-end mt-3">
            <a href="{{ route('dashboard') }}" type="button" class="btn btn-success btn-lg w-100">
              Tablero
            </a>
          </div>
          <div class="col-sm-6 col-md-3 d-flex justify-content-start mt-3">
            <button type="button" class="btn btn-secondary btn-lg w-100" wire:click="logout">
              Salir
            </button>
          </div>
          <div class="col-md-3"></div>
        </div>
      @else
      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Pasos a seguir</h5>
            </div>
            <div class="card-body">
              <p class="card-text">
                Este registro es unicamente para psicologos que trabajan en el Instituo Wem. 
                Favor avise al administrador del sitio que se ha completado su registro.
              </p>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-secondary" wire:click="logout">
                Salir
              </button>
            </div>
          </div>
        </div>
      </div>
      @endif   
    @endauth




    <div class="modal" tabindex="-1" id="registro">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Indique su Rol</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <a href="{{ route('hombre-create') }}" class="btn btn-primary btn-lg m-2">Hombre Wem</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg m-2">Psic??logo</a>
            </div>
          </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="ingreso">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Indique su Rol</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <a href="{{ route('hombre-login') }}" class="btn btn-primary btn-lg m-2">Hombre Wem</a>
                <a href="{{ route('login') }}" class="btn btn-secondary btn-lg m-2">Psic??logo</a>
            </div>
          </div>
        </div>
    </div>
  

</div>