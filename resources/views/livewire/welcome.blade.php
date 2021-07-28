<div class="container">
  
  
  
    @guest
      @if (!session('hombre_id'))
        <div class="row" style="height: 300px">
            <div class="col d-flex justify-content-center align-items-center">
                <h1>Wem App</h1>
            </div>
        </div>
        <div class="row">
          
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-lg" style="margin-right: 50px" data-bs-toggle="modal" data-bs-target="#ingreso">
                    Ingreso
                </button>
            </div>
            <div class="col d-flex justify-content-start">
                <button type="button" class="btn btn-secondary btn-lg" style="margin-left: 50px" data-bs-toggle="modal" data-bs-target="#registro">
                    Registro
                </button>
            </div>

        </div>  
      @endif
    @endguest




    <div class="modal" tabindex="-1" id="registro">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Indique su Rol</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <a href="{{ route('hombre-create') }}" class="btn btn-primary btn-lg m-2">Hombre Wem</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg m-2">Psicólogo</a>
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
                <a href="{{ route('login') }}" class="btn btn-secondary btn-lg m-2">Psicólogo</a>
            </div>
          </div>
        </div>
    </div>
  

</div>