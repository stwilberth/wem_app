<div class="container">

    @if (session('asistencia_guardada'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    <strong>
                        {{ session('asistencia_guardada') }}
                    </strong>
                </div>
            </div>
        </div>
    @endif

    @if (session('asistencia_duplicada'))
    <div class="row">
        <div class="col">
            <div class="alert alert-danger" role="alert">
                <strong>
                    {{ session('asistencia_duplicada') }}
                </strong>
            </div>
        </div>
    </div>
@endif

    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-body">
                  <h5 class="card-title">{{ $hombre['name'] }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Identificación: </span> 
                        <span class="text-primary"> {{ $hombre['dni'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Edad: </span> 
                        <span class="text-primary"> {{ Carbon\Carbon::createFromDate($hombre['fecha_nacimiento'])->age }} años</span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Cantidad de sesiones: </span> 
                        <span class="text-primary"> {{ $hombre['total_sesiones'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Asistencias del mes: </span> 
                        <span class="text-primary"> {{ $hombre['asistencias'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Grupo de Wem: </span> 
                        <span class="text-primary"> {{ $hombre['grupo_name'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Wem para Jovenes: </span> 
                        <span class="text-primary"> {{ ($hombre['wem_jovenes'])?'Sí':'No' }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Teléfono: </span> 
                        <a href="tel:{{ $hombre['telefono'] }}">{{ $hombre['telefono'] }}</a>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Estado civil: </span> 
                        <span class="text-primary"> 
                            @switch($hombre['estado_civil'])
                                @case('soltero')
                                    Soltero
                                    @break
                                @case('casado')
                                    Casado
                                    @break
                                @case('union_libre')
                                    Unión Libre
                                    @break
                                @case('divorciado')
                                    Divorciado 
                                    @break
                                @case('viudo')
                                    Viudo
                                    @break                                                                                                             
                                @default
                                    -   
                            @endswitch
                        
                        </span>
                    </li>

                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Formulario Primer Ingreso: </span> 
                        @switch($hombre['form_primero'])
                            @case('sin_iniciar')                                
                                <span class="text-danger">Sin iniciar</span>
                                @break
                            @case('editando')
                                <span class="text-warning">Editando</span>
                                @break
                            @case('finalizado')
                                <span class="text-success">Finalizado</span>
                                @break                                                                                                            
                            @default
                                -   
                        @endswitch
                    </li>

                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Formulario 15 a 20 sesiones: </span> 
                        <span class="text-primary"> 
                            @switch($hombre['form_segundo'])
                                @case('sin_iniciar')                                    
                                    <span class="text-danger">Sin iniciar</span>
                                    @break
                                @case('editando')
                                    <span class="text-warning">Editando</span>
                                    @break
                                @case('finalizado')
                                    <span class="text-success">Finalizado</span>
                                    @break                                                                                                            
                                @default
                                    -   
                            @endswitch
                        
                        </span>
                    </li>

                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Formulario 30 a 45 sesiones: </span> 
                        <span class="text-primary"> 
                            @switch($hombre['form_tercero'])
                                @case('sin_iniciar')                                    
                                    <span class="text-danger">Sin iniciar</span>
                                    @break
                                @case('editando')
                                    <span class="text-warning">Editando</span>
                                    @break
                                @case('finalizado')
                                    <span class="text-success">Finalizado</span>
                                    @break                                                                                                            
                                @default
                                    -   
                            @endswitch
                        
                        </span>
                    </li>
                    
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">¿Tiene pareja en este momento? </span>
                        <span class="text-primary"> {{ ($hombre['tiene_pareja'])?'Sí':'No' }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Está conviviendo con ella: </span> 
                        <span class="text-primary"> {{ ($hombre['esta_conviviendo_pareja'])?'Sí':'No' }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Nivel Educativo: </span> 
                        <span class="text-primary"> {{ $hombre['estudio'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Número de hijos/as: </span> 
                        <span class="text-primary"> {{ ($hombre['cantidad_hijos'])?$hombre['cantidad_hijos']:0 }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Situación laboral: </span> 
                        <span class="text-primary"> {{ ($hombre['situacion_laboral'])?'Trabajando':'Desempleado' }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Ocupación: </span> 
                        <span class="text-primary"> {{ $hombre['ocupacion'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Nacionalidad: </span> 
                        <span class="text-primary"> {{ $hombre['pais_name'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Provincia: </span> 
                        <span class="text-primary"> {{ $hombre['provincia_name'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Cantón: </span> 
                        <span class="text-primary"> {{ $hombre['canton_name'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Distrito: </span> 
                        <span class="text-primary"> {{ $hombre['distrito_name'] }} </span>
                    </li>
                    <li class="list-group-item">
                        <span class="text-uppercase fw-bold">Barrio: </span> 
                        <span class="text-primary"> {{ $hombre['barrio_name'] }} </span>
                    </li>
                </ul>
                {{-- <div class="card-body">
                  <a href="#" class="btn btn-primary">Editar</a>
                </div> --}}
              </div>
        </div>
    </div>
</div>
