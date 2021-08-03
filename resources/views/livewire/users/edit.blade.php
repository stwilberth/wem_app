<div class="container">
    <form>
        <div class="row">
            <div class="col">
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="row">ID</td>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Nombre</td>
                            <td>
                                <div class="mb-3">
                                  <input type="text" class="form-control" name="name" id="name" wire:model="user.name">
                                </div>
                                @error('user.name') <span class="text-danger">{{ $message }}</span> @enderror
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Roles</td>
                            {{-- <td><x-user.roles_show :roles="$user->roles" /></td> --}}
                            <td><x-user.role_asignar :roles="$roles" :asignados="$user->roles" /></td>
                        </tr>
                        <tr>
                            <td scope="row">email</td>
                            <td>
                                <div class="mb-3">
                                  <input type="email"
                                    class="form-control" name="email" id="email" wire:model='user.email'>
                                </div>
                                @error('user.email') <span class="text-danger">{{ $message }}</span> @enderror
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">email verificado</td>
                            <td>{{ ($user->email_verified_at)?'Sí':'No' }}</td>
                        </tr>
                        <tr>
                            <td scope="row">Estado</td>
                            <td>
                                <x-form.radio_cero nombre="activo" wire="user.activo" label="Inactivo" />
                                <x-form.radio_uno nombre="activo" wire="user.activo" label="Activo" />
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Fecha Ingreso</td>
                            <td><x-utils.fecha :fecha="$user->created_at" /></td>
                        </tr>
                        <tr>
                            <td scope="row">Grupos</td>
                            {{-- <td><x-user.grupos_show :grupos="$user->grupos" /></td> --}}
                            <td><x-user.grupo_asignar :grupos="$grupos" :asignados="$user->grupos" /></td>
                        </tr>
        
                    </tbody>
                </table>
                
        
            </div>
        </div>
    </form>
    {{-- 
        id
        name
        email
        email_verified_at
        activo
        password
        remember_token
        created_at
        updated_at
    --}}
</div>

