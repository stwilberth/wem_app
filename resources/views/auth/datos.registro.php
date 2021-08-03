
                {{-- tipo identificacion --}}
                <div class="mb-4">
                    <label for="tipo_identificacion">Tipo de Identificación</label>
                    <select wire:model="tipo_identificacion" class="form-control" name="tipo_identificacion" id="tipo_identificacion">
                        <option value="cedula">     Cédula Costarricense</option>
                        <option value="dimex">      DIMEX</option>
                        <option value="pasaporte">  Pasaporte</option>
                        <option value="extrangero"> Identificación Extrangero</option>
                        <option value="otro">       Otro</option>
                    </select>
                </div>

                {{-- identificacion --}}
                <div class="mb-3">
                    <label for="dni" class="form-label">Identificación</label>
                    <input type="text" class="form-control" id="dni">
                </div>


                {{-- telefono --}}
                <div class="mb-4">
                    <label for="telefono">Teléfono celular</label>
                    <input wire:model.lazy="p.telefono" name="telefono" type="text" class="form-control"/>
                </div>
 

