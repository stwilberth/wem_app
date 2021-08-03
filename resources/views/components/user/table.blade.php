<div class="table-responsive">
    {{-- 
        id
        name
        email
        email_verified_at
        activo
        password
    --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Roles</th>
            <th scope="col">Grupos</th>
            <th scope="col">email</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @php
                function generateRandomString($length) {
                    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }
            @endphp
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name}}</td>
                    <td>
                        <x-user.roles_show :roles="$user->roles" />
                    </td>
                    <td>
                        @if (count($user->grupos) > 0)
                            @php
                                $collapse_id = generateRandomString(5);
                            @endphp
                            <p>
                                <button class="btn btn-outline-info btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapse_id }}_grupos_colapse" aria-expanded="false" aria-controls="{{ $collapse_id }}_grupos_colapse">Ver</button>
                            </p>
                            <div class="collapse" id="{{ $collapse_id }}_grupos_colapse">
                                <x-user.grupos_show :grupos="$user->grupos" />
                            </div>
                        @endif
                    </td>
                    <td>{{ $user->email}}</td>
                    <td>
                        <x-user.estado_show :estado="$user->activo" />
                    </td>
                    <td>
                        <a href="{{ route('user-edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('user', $user->id) }}" class="btn btn-secondary btn-sm">Ver</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>