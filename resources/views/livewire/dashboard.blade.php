<div class="container">
    
    <div class="row">
        {{-- hombres --}}
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

    <div class="row">
        {{-- grupos --}}
        <div class="col">
            <div class="card mt-5">
                <div class="card-header"><h4>Grupos</h4></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">name</th>
                            <th scope="col">virtual</th>
                            <th scope="col">jovenes</th>
                            <th scope="col">presencial</th>
                            <th scope="col">activo</th>
                            <th scope="col">ubicacion</th>
                            <th scope="col">horario</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)                        
                                <tr>
                                    <td> {{ $grupo->name }}</td>
                                    <td> {{ $grupo->virtual }}</td>
                                    <td> {{ $grupo->wem_jovenes }}</td>
                                    <td> {{ $grupo->presencial }}</td>
                                    <td> {{ $grupo->activo }}</td>
                                    <td> {{ $grupo->ubicacion }}</td>
                                    <td> {{ $grupo->horario }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- users --}}
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 w-100 bd-highlight"><h4>Users</h4></div>
                        <div class="p-2 flex-shrink-1 bd-highlight">                        
                            <input type="text" placeholder="Buscar" class="form-control" wire:model='buscar_user'>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">activo</th>
                            <th scope="col">password</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)                        
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->activo }}</td>
                                    <td>********</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
