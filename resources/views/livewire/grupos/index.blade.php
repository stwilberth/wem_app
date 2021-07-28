<div class="container">
    <div class="row">
        {{-- grupos --}}
        <div class="col">
            <div class="card mt-5">
                <div class="card-header"><h4>Grupos</h4></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Modalidad</th>
                            <th scope="col">Jovenes</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Horario</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)   
                                @livewire('grupos.item', ['grupo' => $grupo], key($grupo->id))
                            @endforeach
                            @if (Auth::user()->hasRole(['admin']))
                                @livewire('grupos.store')
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
