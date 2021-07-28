<div class="row">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight"><h4>Hombres</h4></div>
                    <div class="p-2 flex-shrink-1 bd-highlight">                        
                        <input type="text" placeholder="Buscar" class="form-control" wire:model='buscar_hombre'>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Sesiones</th>
                        <th scope="col">Asistencia</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($hombres as $hombre)                        
                            <tr>
                                <th scope="row">{{ $hombre->dni }}</th>
                                <td>{{ $hombre->name }}</td>
                                <td>{{ Carbon\Carbon::createFromDate($hombre->fecha_nacimiento)->age }}</td>
                                <td>{{ $hombre->total_sesiones }}</td>
                                <td>{{ $hombre->asistencias }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>