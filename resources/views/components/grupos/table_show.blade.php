
<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nombre</th>
                <td>{{ $grupo->name }}</td>
            </tr>
            <tr>
                <th scope="row">Wem Jóvenes</th>
                <td>
                    @if ($grupo->wem_jovenes)
                        <span class="text-success">Sí</span>
                    @else
                        <span class="text-danger">No</span> 
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">Ubicación</th>
                <td>{{ $grupo->ubicacion }}</td>
            </tr>
            <tr>
                <th scope="row">Modalidad</th>
                <td>
                    @if ($grupo->virtual)
                        <span class="text-primary">Virtual</span>
                        <br>
                    @endif
                    @if ($grupo->presencial)
                        <span class="text-warning">Presencial</span>
                        <br>
                    @endif
                </td>
            </tr>
            <tr>
                <th scope="row">Horario</th>
                <td>{{ $grupo->horario }}</td>
            </tr>
            <tr>
                <th scope="row">Estado</th>
                <td>
                    @if ($grupo->activo)
                        <span class="text-success">Activo</span>
                    @else
                        <span class="text-danger">Inactivo</span> 
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>