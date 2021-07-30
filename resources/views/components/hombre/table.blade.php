<div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Sesiones</th>
            <th scope="col">Asistencia Mes Actual</th>
            <th scope="col">Form Primer Ingreso</th>
            <th scope="col">Form 15 - 20 sesiones</th>
            <th scope="col">Form 30 - 45 sesiones</th>
            <th scope="col">Acciones</th>
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
                    <td><x-hombre.form_estado :form="$hombre->form_primero" /></td>
                    <td><x-hombre.form_estado :form="$hombre->form_segundo" /></td>
                    <td><x-hombre.form_estado :form="$hombre->form_tercero" /></td>
                    <td>
                        <a href="{{ route('hombre', $hombre->id)}}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>