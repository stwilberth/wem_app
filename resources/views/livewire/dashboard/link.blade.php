<div class="row">
    <div class="col">
        @if (!session('link_asistencia'))
            <div class="card mb-4">
                <form wire:submit.prevent="save">
                    <div class="card-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enlace temporal de asistencia</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="hombres.grupo_id" class="form-label">Grupo:</label>
                            <select class="form-select" id="hombres.grupo_id" wire:model.defer="grupo_id" required>
                                <option value="">Seleccione</option>
                                @foreach ($this->grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                @endforeach
                            </select>
                            @error('grupo_id') <span class="text-danger">Debe seleccionar un grupo</span> @enderror
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">Disponibilidad del enlace:</label>
                        <select class="form-control" name="tiempo" id="tiempo" wire:model.defer="tiempo" required>
                            <option value="">Seleccione</option>
                            <option value="15">15 minutos</option>
                            <option value="30">30 minutos</option>
                            <option value="45">45 minutos</option>
                            <option value="60">60 minutos</option>
                        </select>
                        @error('tiempo') <span class="text-danger">Debe seleccione un valor</span> @enderror
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="modalidad" value="presencial" wire:model.defer="modalidad" required>
                            Virtual
                        </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="modalidad" value="virtual" wire:model.defer="modalidad" required>
                            Presencial
                        </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </form>
            </div>
        @endif
        
        @if (session('link_asistencia'))
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 w-100 bd-highlight"><h5>Enlace</h5></div>
                        <div class="p-2 flex-shrink-1 bd-highlight">
                            <button class="btn btn-primary btn-sm" wire:click="nuevo">Nuevo</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Fecha de creación: {{ session('fecha_link_asistencia') ?? '' }}<br>
                        Fecha de Expiración: {{ session('fecha_expiracion_asistencia') ?? '' }}<br>
                        <span class="text-danger w-100 p-1">
                            <a href="{{ session('link_asistencia') }}">{{ session('link_asistencia') }}</a>
                        </span>
                    </p>
                </div>
            </div>            
        @endif
    </div>
</div>
