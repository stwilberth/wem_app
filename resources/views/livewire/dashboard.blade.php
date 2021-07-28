<div class="container">
    
    {{-- users --}}
    <div class="row">
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
    
    {{-- hombres --}}
    @livewire('hombre.list-comp')

    {{-- grupos --}}



</div>
