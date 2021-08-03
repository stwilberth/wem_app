<div class="container">
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
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Roles</td>
                        <td><x-user.roles_show :roles="$user->roles" /></td>
                    </tr>
                    <tr>
                        <td scope="row">email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td scope="row">email verificado</td>
                        <td>{{ ($user->email_verified_at)?'Sí':'No' }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Estado</td>
                        <td><x-user.estado_show :estado="$user->activo" /></td>
                    </tr>
                    <tr>
                        <td scope="row">Fecha Ingreso</td>
                        <td><x-utils.fecha :fecha="$user->created_at" /></td>
                    </tr>
                    <tr>
                        <td scope="row">Grupos</td>
                        <td><x-user.grupos_show :grupos="$user->grupos" /></td>
                    </tr>
    
                </tbody>
            </table>
            
    
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{ route('user-edit', $user->id) }}" role="button">Editar</a>
        </div>
    </div>
</div>

