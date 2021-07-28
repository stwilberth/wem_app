<tr>
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
        <span class="btn btn-success" wire:click="save">Nuevo</span>
    </td>
</tr>
