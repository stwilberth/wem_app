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
            <th scope="col">email</th>
            <th scope="col">email Verificado</th>
            <th scope="col">Activo</th>
            <th scope="col">contraseña</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->email_verified_at}}</td>
                    <td>{{ $user->activo}}</td>
                    <td>*******</td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>