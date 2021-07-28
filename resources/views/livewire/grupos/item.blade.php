<tr>

    @if ($modo == 'show')
        <td> {{ $grupo->name }}</td>
        <td> 
            <span class="text-primary">{{ ($grupo->virtual)?'Virtual':'' }}</span>
            <br>
            <span class="text-warning">{{ ($grupo->presencial)?'Presencial':'' }}</span>
        </td>
        <td>
            @if ($grupo->wem_jovenes)
                <span class="text-primary">Sí</span>
            @else
                <span class="text-secondary">No</span>
            @endif
        </td>
        <td> 
            @if ($grupo->activo)
                <span class="text-success">Activo</span>
            @else
                <span class="text-danger">Inactivo</span>
            @endif
        </td>
        <td> {{ $grupo->ubicacion }}</td>
        <td> {{ $grupo->horario }}</td>
        <td>
            @if (Auth::user()->hasRole(['admin']))
                <span class="btn btn-primary" wire:click="edit">Editar</span>
            @endif
            <a href="{{ route('grupo', $grupo->id) }}" class="btn btn-secondary">Ver</a>
        </td>
    @endif

    @if ($modo == 'edit')
        <td>             
            <x-form.input_lazy :type="'text'" :placeholder="'Nombre'"  :id="'name'"     :label="''" :wire="'grupo.name'"/>
            @error('grupo.name') <span class="text-danger">{{ $message }}</span> @enderror
        <td>
            <x-form.check :type="'checkbox'" :label="'Virtual'"     :nombre="''" :id="'virtual'"     :wire="'grupo.virtual'"/>
            <x-form.check :type="'checkbox'" :label="'Presencial'"  :nombre="''" :id="'presencial'"  :wire="'grupo.presencial'"/>
        </td>
        <td> 
            <x-form.radio_uno   :label="'Sí'"  :nombre="'wem_jovenes'"  :wire="'grupo.wem_jovenes'"/>
            <x-form.radio_cero  :label="'No'"  :nombre="'wem_jovenes'"  :wire="'grupo.wem_jovenes'"/>
            @error('grupo.wem_jovenes') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td> 
            <x-form.radio_uno   :label="'Activo'"       :nombre="'activo'"  :wire="'grupo.activo'"/>
            <x-form.radio_cero  :label="'Inactivo'"     :nombre="'activo'"  :wire="'grupo.activo'"/>
            @error('grupo.activo') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <x-form.input_lazy :type="'text'" :placeholder="'Ubicación'"  :id="'ubicacion'" :label="''" :wire="'grupo.ubicacion'"/>
            @error('grupo.ubicacion') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <x-form.input_lazy :type="'text'" :placeholder="'Horario'"  :id="'horario'" :label="''" :wire="'grupo.horario'"/>
            @error('grupo.horario') <span class="text-danger">{{ $message }}</span> @enderror
        </td>
        <td>
            <span class="btn btn-success" wire:click="save">Guardar</span>
        </td>
    @endif



</tr>