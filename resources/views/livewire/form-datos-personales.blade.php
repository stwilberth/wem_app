<div class="container">

    <div class="bg-white p-5">

        <!-- fecha_nacimiento -->
        <div class="mb-4">
            <label for="fecha_nacimiento">{{ $labels['fecha_nacimiento'] }}</label>
            <input wire:model.lazy="FormModel.fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" type="date" class="form-control"/>
        </div>

        <!-- estado_civil -->
        <div class="mb-4">
            <label for="estado_civil">{{ $labels['estado_civil'] }}</label>
            <select wire:model.lazy="FormModel.estado_civil" class="form-control" name="estado_civil" id="estado_civil">
                <option value="soltero">Soltero</option>
                <option value="casado">Casado</option>
                <option value="divorciado">Divorciado</option>
                <option value="separado">Separado de hecho</option>
            </select>
        </div>

        <!-- tiene_pareja -->
        <div class="mb-4">
            <div><label>{{ $labels['tiene_pareja'] }}</label></div>
            <input wire:model="FormModel.tiene_pareja" name="pareja_si" type="radio" id="pareja_si" value="true" /> <label for="pareja_si">Sí</label><br>
            <input wire:model="FormModel.tiene_pareja" name="pareja_no" type="radio" id="pareja_no" value="false" /> <label for="pareja_no">No</label>
        </div>

        <!-- vive_con_ella -->
        @if ($FormModel->tiene_pareja)
            <div class="mb-4">
                <div><label>{{ $labels['vive_con_ella'] }}</label></div>
                <input wire:model.lazy="FormModel.vive_con_ella" name="vive_con_ella_si" type="radio" id="vive_con_ella_si" value="true" /> <label for="vive_con_ella_si">Sí</label><br>
                <input wire:model.lazy="FormModel.vive_con_ella" name="vive_con_ella_no" type="radio" id="vive_con_ella_no" value="false" /> <label for="vive_con_ella_no">No</label>
            </div>      
        @endif

        <!-- estudio -->
        <div class="mb-4">
            <label for="estudio">{{ $labels['estudio'] }}</label>
            <select wire:model.lazy="FormModel.estudio" class="form-control" name="estudio" id="estudio">
                <option value="primaria_incompleta">Primaria Incompleta</option>
                <option value="primaria_completa">Primaria Completa</option>
                <option value="secundaria_incompleta">Secundaria Incompleta</option>
                <option value="secundaria_completa">Secundaria Completa</option>
                <option value="universidad">Universidad</option>
            </select>
        </div>


        <!-- wem_jovenes -->
        <div class="mb-4">
            <div><label>{{ $labels['wem_jovenes'] }}</label></div>
            <input wire:model.lazy="FormModel.wem_jovenes" name="wem_jovenes_si" type="radio" id="wem_jovenes_si" value="true" /> <label for="wem_jovenes_si">Sí</label><br>
            <input wire:model.lazy="FormModel.wem_jovenes" name="wem_jovenes_no" type="radio" id="wem_jovenes_no" value="false" /> <label for="wem_jovenes_no">No</label>
        </div>

        <!-- tiene_hijos -->
        <div class="mb-4">
            <div><label>{{ $labels['tiene_hijos'] }}</label></div>
            <input wire:model="FormModel.tiene_hijos" name="tiene_hijos_si" type="radio" id="tiene_hijos_si" value="true" /> <label for="tiene_hijos_si">Sí</label><br>
            <input wire:model="FormModel.tiene_hijos" name="tiene_hijos_no" type="radio" id="tiene_hijos_no" value="false" /> <label for="tiene_hijos_no">No</label>
        </div>

        <!-- cantidad_hijos -->
        @if ($FormModel->tiene_hijos)
            <div class="mb-4">
                <label for="cantidad_hijos">{{ $labels['cantidad_hijos'] }}</label>
                <input name="cantidad_hijos" id="cantidad_hijos" type="number" class="form-control" wire:model.lazy="FormModel.cantidad_hijos" />
            </div>
        @endif

        <!-- situacion_laboral -->
        <div class="mb-4">
            <div><label>{{ $labels['situacion_laboral'] }}</label></div>
            <input wire:model.lazy="FormModel.situacion_laboral" name="situacion_laboral_si" type="radio" id="situacion_laboral_si" value="true" /> <label for="situacion_laboral_si">Desempleado</label><br>
            <input wire:model.lazy="FormModel.situacion_laboral" name="situacion_laboral_no" type="radio" id="situacion_laboral_no" value="false" /> <label for="situacion_laboral_no">Trabajando</label>
        </div>

        <!-- ocupacion -->
        <div class="mb-4">
            <label for="ocupacion">{{ $labels['ocupacion'] }}</label>
            <input wire:model.lazy="FormModel.ocupacion" name="ocupacion" type="text" class="form-control" />
        </div>

        <!-- nacionalidad -->
        <div class="mb-4">
            <label for="nacionalidad">{{ $labels['nacionalidad'] }}</label>
            <input wire:model.lazy="FormModel.nacionalidad" name="nacionalidad" type="text" class="form-control" />
        </div>

        <!-- total_sesiones -->
        <div class="mb-4">
            <label for="total_sesiones">{{ $labels['total_sesiones'] }}</label>
            <input wire:model.lazy="FormModel.total_sesiones" name="total_sesiones" type="number" class="form-control" />
        </div>

        <!-- ubicacion -->
        {{-- <div class="mb-4">
            <div>
                <select class="form-control" wire:model.lazy="FormModel.provincia">
                    <option disabled value="">Seleccione</option>
                    <option v-for="provincia in ubicacion.provincia" v-bind:value="provincia.id" :key="provincia.id">
                        {{ provincia . provincia }}</option>
                </select>
            </div>

            <div>
                <select class="form-control" wire:model.lazy="FormModel.canton">
                    <option disabled value="">Seleccione</option>
                    <option v-bind:value="canton.id" v-for="canton in canTones" :key="canton.id">
                        {{ canton . canton }}</option>
                </select>
            </div>

            <div>
                <select class="form-control" wire:model.lazy="FormModel.distrito">
                    <option disabled value="">Seleccione</option>
                    <option v-bind:value="distrito.id" v-for="distrito in distriTos" :key="distrito.id">
                        {{ distrito . distrito }}</option>
                </select>
            </div>

            <div>
                <select class="form-control" wire:model.lazy="FormModel.barrio">
                    <option disabled value="">Seleccione</option>
                    <option v-bind:value="barrio.id" v-for="barrio in barrIos" :key="barrio.id">
                        {{ barrio . barrio }}</option>
                </select>
            </div>

        </div> --}}

        <!-- grupo_id -->
        {{-- <div class="mb-4">
            <select class="form-control" wire:model.lazy="FormModel.grupo_id" @change="changeRol()">
                <option disabled value="">Seleccione</option>
                <option v-bind:value="grupo.id" v-for="grupo in grupos" :key="grupo.id">
                    {{ grupo . name }}</option>
            </select>
        </div> --}}

        <!-- guardar -->
        <div class="mb-5">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </div>

</div>
