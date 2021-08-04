<div class="container">

    <form wire:submit.prevent="save" id="create" class="bg-white p-5 row needs-validation {{ $was_validated }}" novalidate>

        @if ($estado == 'editar_dni' || $estado == '404')
            <!-- dni -->
            <div class="mb-4">
                <label for="dni">{{ $labels['dni'] }}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control"
                        aria-label="Digite su identificación" aria-describedby="button-addon2"
                        wire:model.lazy="hombres.dni" name="dni" required>
                    <span class="btn btn-success" id="button-addon2"
                        wire:click="getDataHacienda">
                        Verificar
                    </span>
                </div>

                @if ($estado == '404')
                    <span class="text-danger">No se encontraron coincidencias, verifique si la información es correcta</span>
                    <br>
                    <span class="btn btn-danger" wire:click="saltarValidacion">Saltar
                        validación</span>
                @endif

                @error('hombres.dni') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        @endif

        @if ($estado == '200')
            <!-- name -->
            <div class="mb-4">
                <label for="name">{{ $labels['name'] }}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-describedby="button-addon2"
                        wire:model.lazy="hombres.name" name="name" required
                        {{ $estado == 'editar_info' ? '' : 'disabled' }}>
                </div>
                @error('hombres.name') <span class="text-danger">{{ $message }}</span> @enderror
                <label>¿Esta información es correcta? </label>
                <br>
                <span class="btn btn-success" wire:click="$set('estado', 'llenar_form')">
                    Sí, usar esta información
                </span>
                <span class="btn btn-danger" wire:click="$set('estado', 'editar_dni')">
                    No, corregir identificación
                </span>
                <span class="btn btn-danger" wire:click="saltarValidacion">
                    No, saltar validación
                </span>
            </div>
        @endif




        @if ($estado == 'llenar_form' || $estado == 'saltar_validacion')

            @if ($estado == 'saltar_validacion')
                <!-- name -->
                <div class="mb-4">
                    <label for="name">{{ $labels['name'] }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-describedby="button-addon2"
                            wire:model.lazy="hombres.name" name="name" required>
                    </div>
                    @error('hombres.name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- dni -->
                <div class="mb-4">
                    <label for="dni">{{ $labels['dni'] }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            aria-label="Digite su identificación" aria-describedby="button-addon2"
                            wire:model.lazy="hombres.dni" name="dni" required>
                    </div>
                    @error('hombres.dni') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @else
            <div class="mb-4">
                <label for="name">{{ $labels['name'] }}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-describedby="button-addon2"
                        wire:model.lazy="hombres.name" name="name" required disabled>
                </div>
                @error('hombres.name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- dni -->
            <div class="mb-4">
                <label for="dni">{{ $labels['dni'] }}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control"
                        aria-label="Digite su identificación" aria-describedby="button-addon2"
                        wire:model.lazy="hombres.dni" name="dni" required disabled>
                </div>
                @error('hombres.dni') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @endif

            <div class="mb-4">
                <label for="pin">{{ $labels['pin'] }}</label>
                <input wire:model.lazy="hombres.pin" name="pin" id="pin"
                    type="number" class="form-control" required />
                @error('hombres.pin') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- fecha_nacimiento -->
            <div class="mb-4">
                <label for="fecha_nacimiento">{{ $labels['fecha_nacimiento'] }}</label>
                <input wire:model.lazy="hombres.fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento"
                    type="date" class="form-control" required />
                @error('hombres.fecha_nacimiento') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- estado_civil -->
            <div class="mb-4">
                <label for="estado_civil">{{ $labels['estado_civil'] }}</label>
                <select wire:model.lazy="hombres.estado_civil" class="form-control" name="estado_civil"
                    id="estado_civil" required>
                    <option value="">Seleccione</option>
                    <option value="soltero">Soltero</option>
                    <option value="casado">Casado</option>
                    <option value="union_libre">Unión Libre</option>
                    <option value="divorciado">Divorciado</option>
                    <option value="viudo">Viudo</option>
                </select>
                @error('hombres.estado_civil') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- tiene_pareja -->
            <div class="mb-4">
                <div><label>{{ $labels['tiene_pareja'] }}</label></div>
                <div class="form-check">
                    <input wire:model="hombres.tiene_pareja" name="tiene_pareja" type="radio" class="form-check-input"
                        id="pareja_si" value="1" required />
                    <label class="form-check-label" for="pareja_si">Sí</label>
                </div>
                <div class="form-check">
                    <input wire:model="hombres.tiene_pareja" name="tiene_pareja" type="radio" class="form-check-input"
                        id="pareja_no" value="0" required />
                    <label class="form-check-label" for="pareja_no">No</label>
                </div>
                @error('hombres.tiene_pareja') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- esta_conviviendo_pareja -->
            @if ($hombres->tiene_pareja)
                <div class="mb-4">
                    <div><label>{{ $labels['esta_conviviendo_pareja'] }}</label></div>
                    <div class="form-check">
                        <input wire:model.lazy="hombres.esta_conviviendo_pareja" name="esta_conviviendo_pareja"
                            type="radio" class="form-check-input" id="esta_conviviendo_pareja_si" value="1" required />
                        <label class="form-check-label" for="esta_conviviendo_pareja_si">Sí</label>
                    </div>
                    <div class="form-check">
                        <input wire:model.lazy="hombres.esta_conviviendo_pareja" name="esta_conviviendo_pareja"
                            type="radio" class="form-check-input" id="esta_conviviendo_pareja_no" value="0" required />
                        <label class="form-check-label" for="esta_conviviendo_pareja_no">No</label>
                    </div>
                    @error('hombres.esta_conviviendo_pareja') <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif

            <!-- estudio -->
            <div class="mb-4">
                <label for="estudio">{{ $labels['estudio'] }}</label>
                <select wire:model.lazy="hombres.estudio" class="form-control" name="estudio" id="estudio" required>
                    <option value="">Seleccione</option>
                    <option value="primaria_incompleta">Primaria Incompleta</option>
                    <option value="primaria_completa">Primaria Completa</option>
                    <option value="secundaria_incompleta">Secundaria Incompleta</option>
                    <option value="secundaria_completa">Secundaria Completa</option>
                    <option value="universidad">Universidad</option>
                </select>
                @error('hombres.estudio') <span class="text-danger">{{ $message }}</span> @enderror
            </div>


            <!-- wem_jovenes -->
            <div class="mb-4">
                <div><label>{{ $labels['wem_jovenes'] }}</label></div>
                <div class="form-check">
                    <input wire:model.lazy="hombres.wem_jovenes" name="wem_jovenes" type="radio"
                        class="form-check-input" id="wem_jovenes_si" value="1" required /> <label
                        class="form-check-label" for="wem_jovenes_si">Sí</label>
                </div>
                <div class="form-check">
                    <input wire:model.lazy="hombres.wem_jovenes" name="wem_jovenes" type="radio"
                        class="form-check-input" id="wem_jovenes_no" value="0" required /> <label
                        class="form-check-label" for="wem_jovenes_no">No</label>
                </div>
                @error('hombres.wem_jovenes') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- tiene_hijos -->
            <div class="mb-4">
                <div><label>{{ $labels['tiene_hijos'] }}</label></div>
                <div class="form-check">
                    <input wire:model="hombres.tiene_hijos" name="tiene_hijos" type="radio" class="form-check-input"
                        id="tiene_hijos_si" value="1" required /> <label class="form-check-label"
                        for="tiene_hijos_si">Sí</label>
                </div>
                <div class="form-check">
                    <input wire:model="hombres.tiene_hijos" name="tiene_hijos" type="radio" class="form-check-input"
                        id="tiene_hijos_no" value="0" required /> <label class="form-check-label"
                        for="tiene_hijos_no">No</label>
                </div>
                @error('hombres.tiene_hijos') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- cantidad_hijos -->
            @if ($hombres->tiene_hijos)
                <div class="mb-4">
                    <label for="cantidad_hijos">{{ $labels['cantidad_hijos'] }}</label>
                    <input name="cantidad_hijos" id="cantidad_hijos" type="number" class="form-control"
                        wire:model.lazy="hombres.cantidad_hijos" required />
                    @error('hombres.cantidad_hijos') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @endif

            <!-- situacion_laboral -->
            <div class="mb-4">
                <div><label>{{ $labels['situacion_laboral'] }}</label></div>
                <div class="form-check">
                    <input wire:model.lazy="hombres.situacion_laboral" name="situacion_laboral" type="radio"
                        class="form-check-input" id="situacion_laboral_si" value="1" required />
                    <label class="form-check-label" for="situacion_laboral_si">Desempleado</label><br>
                </div>
                <div class="form-check">
                    <input wire:model.lazy="hombres.situacion_laboral" name="situacion_laboral" type="radio"
                        class="form-check-input" id="situacion_laboral_no" value="0" required />
                    <label class="form-check-label" for="situacion_laboral_no">Trabajando</label>
                </div>
                @error('hombres.situacion_laboral') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- ocupacion -->
            <div class="mb-4">
                <label for="ocupacion">{{ $labels['ocupacion'] }}</label>
                <input wire:model.lazy="hombres.ocupacion" name="ocupacion" type="text" class="form-control" required />
                @error('hombres.ocupacion') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- nacionalidad -->
            <div class="mb-4">
                <label for="hombres.nacionalidad">{{ $labels['nacionalidad'] }} *</label>
                <select class="form-select" id="hombres.nacionalidad" wire:model.lazy="hombres.nacionalidad" required>
                    <option value="">Seleccione</option>
                    @foreach ($paises as $nacionalidad)
                        <option value="{{ $nacionalidad->id }}">{{ $nacionalidad->nombre }}</option>
                    @endforeach
                </select>
                @error('hombres.nacionalidad') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            {{-- ubicacion --}}
            <div class="mb-4">
                <label>Dirección: *</label>
                <!-- provincia -->
                <select class="form-select mb-3" id="provincia" wire:change='change_provincia'
                    wire:model="hombres.provincia">
                    <option value="provincia">Provincia</option>
                    @foreach ($provincias as $provincia_item)
                        <option value="{{ $provincia_item->id }}">{{ $provincia_item->provincia }}</option>
                    @endforeach
                </select>

                <!-- canton -->
                @if ($hombres->provincia && $cantones)
                    <select class="form-select mb-3" id="canton" wire:change='change_canton'
                        wire:model="hombres.canton">
                        <option value="canton">Cantón</option>
                        @foreach ($cantones as $canton_item)
                            <option value="{{ $canton_item->id }}">{{ $canton_item->canton }}</option>
                        @endforeach
                    </select>
                @endif

                <!-- distrito -->
                @if ($hombres->canton && $distritos)
                    <select class="form-select mb-3" id="distrito" wire:change='change_distrito'
                        wire:model="hombres.distrito">
                        <option value="distrito">Distrito</option>
                        @foreach ($distritos as $distrito_item)
                            <option value="{{ $distrito_item->id }}">{{ $distrito_item->distrito }}</option>
                        @endforeach
                    </select>
                @endif

                <!-- barrio -->
                @if ($hombres->distrito && $barrios)
                    <select class="form-select mb-3" id="barrio" wire:model.lazy="hombres.barrio">
                        <option value="barrio">Barrio</option>
                        @foreach ($barrios as $barrio_item)
                            <option value="{{ $barrio_item->id }}">{{ $barrio_item->barrio }}</option>
                        @endforeach
                    </select>
                @endif

                @error('hombres.provincia') <span class="text-danger">Seleccione su provincia</span> @enderror
                @error('hombres.canton') <span class="text-danger">Seleccione su cantón</span> @enderror
                @error('hombres.distrito') <span class="text-danger">{{ $message }}</span> @enderror
                @error('hombres.barrio') <span class="text-danger">{{ $message }}</span> @enderror

            </div>


            <!-- total_sesiones -->
            <div class="mb-4">
                <label for="total_sesiones">{{ $labels['total_sesiones'] }}</label>
                <input wire:model.lazy="hombres.total_sesiones" name="total_sesiones" type="number" class="form-control"
                    required />
                @error('hombres.total_sesiones') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- grupo_id -->
            <div class="mb-4">
                <label for="hombres.grupo_id">¿A cual grupo de Wem es al que más asiste? *</label>
                <select class="form-select" id="hombres.grupo_id" wire:model.lazy="hombres.grupo_id" required>
                    @if (!$this->hombres->grupo_id)
                        <option selected>Seleccione</option>
                    @endif
                    @foreach ($this->grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                    @endforeach
                </select>
                @error('hombres.grupo_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="telefono">{{ $labels['telefono'] }}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control"
                        aria-label="Telófono" aria-describedby="button-addon2"
                        wire:model.lazy="hombres.telefono" name="telefono" required>
                </div>
            </div>

            <!-- guardar -->
            <div class="mb-5">
                <button  type="submit" class="btn btn-primary g-recaptcha" 
                data-sitekey="6Lc4bKQZAAAAABQjo7NnmrLE8x3D9f1mEaWuiJhf" 
                data-callback='onSubmit'>
                Guardar</button>
            </div>

            @if ($was_validated)
                <span class="text-danger">Algunos campos necesitan atención</span>
            @endif

        @endif

    </form>

    @section('script')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function onSubmit(token) {
                document.getElementById("create").submit();
            }
        </script>
    @endsection

</div>
