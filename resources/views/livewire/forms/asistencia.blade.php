<div class="container">

    <div class="row">
        <div class="col">
            @if (session()->has('hombre_id'))
                <div class="row">
                    <div class="col">
                        <form wire:submit.prevent="save">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h6>Asistencia y evaluación de la sesión virtual</h6>
                                </div>
                                <div class="card-body">
                                    <p> Con esta encuesta estamos pasando las listas de asistencia al grupo. La información que nos
                                        brindes será confidencial y solo usada por los funcionarios del Instituto Wem. El formulario
                                        debe de llenarse al final de la sesión. Para mayor comodidad en completar la encuesta, es
                                        recomendable colocar el celular de forma horizontal, ya que así despliega el texto completo.
                                    </p>
        
                                    @php
                                        $preguntas = [
                                            ['id' => 'individualmente', 'label' => 'INDIVIDUALMENTE (bienestar personal)'], 
                                            ['id' => 'con_otras_personas', 'label' => 'Con OTRAS PERSONAS (familia y relaciones próximas) *'], 
                                            ['id' => 'en_lo_social', 'label' => 'En LO SOCIAL (trabajo, amistades, estudio) *'], 
                                            ['id' => 'en_general', 'label' => 'En GENERAL (sensación general de bienestar) *']];
                                    @endphp
        
                                    @foreach ($preguntas as $item)
                                        <div class="mb-3">
                                            <label for="individualmente" class="form-label">
                                                {{ $item['label'] }}
                                            </label>
                                            <div class="row">
                                                <span>Muy Mal</span>
                                                <div class="col-12">
                                                    @for ($i = 0; $i < 11; $i++)
        
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="EvaluacionSesion.{{ $item['id'] }}"
                                                                value="{{ $i }}"
                                                                wire:model="EvaluacionSesion.{{ $item['id'] }}">
                                                            <label class="form-check-label">
                                                                {{ $i }}
                                                            </label>
                                                        </div>
        
                                                    @endfor
                                                </div>
                                                <span>Muy Bien</span>
                                                @error('EvaluacionSesion.'.$item['id']) <span class="text-danger">{{ $message }}</span> @enderror

                                            </div>
                                        </div>
                                    @endforeach
        
        
        
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Finalizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col">
                        <form wire:submit.prevent="ingresar">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Ingresar</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="mb-3">
                                        <label for="dni" class="form-label">DNI</label>
                                        <input type="text" class="form-control" id="dni" wire:model='dni'>
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="pin" class="form-label">PIN</label>
                                        <input type="number" class="form-control" id="pin" wire:model='pin'>
                                    </div>
            
                                    <span class="text-danger">{{ session('datos_invalidos') }}</span>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-lg">Ingresar</button>
                                </div>
                            </div>
            
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
