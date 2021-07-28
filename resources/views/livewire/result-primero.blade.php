<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Resultados Primer Ingreso</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">ID Registro</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cédula</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Fecha</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($resultados)
                                @foreach ($resultados as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->hombre_name }}</td>
                                        <td>{{ $item->hombre_dni }}</td>
                                        <td>{{ $item->hombre_grupo }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
