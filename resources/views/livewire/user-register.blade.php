<div class="container">
    <div class="row mt-5">
        <div class="col">
        </div>
        <div class="col">
            <form>

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

                {{-- nombre --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="name">
                </div>

                {{-- tiene correo --}}
                <div class="mb-4">
                    <div><label>¿Tiene correo?</label></div>
                    <input wire:model.lazy="tiene_email" name="tiene_email_si" type="radio" id="tiene_email_si" value="true" /> <label for="tiene_email_si">Sí</label><br>
                    <input wire:model.lazy="tiene_email" name="tiene_email_no" type="radio" id="tiene_email_no" value="false" /> <label for="tiene_email_no">No</label>
                </div>

                {{-- correo --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                {{-- telefono --}}
                <div class="mb-4">
                    <label for="telefono">Teléfono celular</label>
                    <input wire:model.lazy="p.telefono" name="telefono" type="text" class="form-control"/>
                </div>

                {{-- contraseña --}}
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                
                {{-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">No cerrar mi sesión</label>
                </div> --}}
                <button type="submit" class="btn btn-primary">Registrarme</button>
            </form>
        </div>
        <div class="col">
        </div>
      </div>
</div>
