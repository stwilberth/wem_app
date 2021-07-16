<div class="container">

    <form wire:submit.prevent="save" class="row needs-validation {{ $was_validated }}" novalidate>

        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">¿A cual grupo de Wem es al que más asiste? *</div>
                <div class="card-body">
                    <select class="form-select" id="FormSegundo.grupo_id" wire:model.defer="FormSegundo.grupo_id">
                        @if (!$this->FormSegundo->grupo_id)
                            <option selected>Seleccione</option>
                        @endif
                        @foreach ($this->grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>                                                                                                          
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">¿Tiene pareja en este momento? *</div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" 
                            wire:model='FormSegundo.tiene_pareja' 
                            value="1" 
                            id="verdadero_tiene_pareja"
                            name="FormSegundo.tiene_pareja"
                            required>
                        <label class="form-check-label" for="verdadero_tiene_pareja">Sí</label>
                    </div>
        
                    <div class="form-check">
                        <input class="form-check-input" type="radio" 
                            wire:model='FormSegundo.tiene_pareja' 
                            value="0" 
                            id="falso_tiene_pareja"
                            name="FormSegundo.tiene_pareja"
                            required>
                        <label class="form-check-label" for="falso_tiene_pareja">No</label>
                    </div>
                </div>
            </div>
        </div>

        @if ($this->FormSegundo->tiene_pareja)   
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">¿Está conviviendo con su pareja? *</div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                wire:model='FormSegundo.esta_conviviendo_pareja' 
                                value="1" 
                                id="verdadero_esta_conviviendo_pareja"
                                name="FormSegundo.esta_conviviendo_pareja"
                                required>
                            <label class="form-check-label" for="verdadero_esta_conviviendo_pareja">Sí</label>
                        </div>
            
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                                wire:model='FormSegundo.esta_conviviendo_pareja' 
                                value="0" 
                                id="falso_esta_conviviendo_pareja"
                                name="FormSegundo.esta_conviviendo_pareja"
                                required>
                            <label class="form-check-label" for="falso_esta_conviviendo_pareja">No</label>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @foreach ($preguntas as $pregunta)
            <div class="col-12">
                <div class="card mt-3">
                                

                        @if ($pregunta['tipo'] == 'radio')
                            @php
                                $radios = $pregunta['radios'];
                                $opciones = $pregunta['opciones'];
                            @endphp
                            <div class="card-header">{{$pregunta['label']}}</div>
                            <div class="card-body">
                                @foreach ($radios as $radio)

                                    <span class="card-title">{{$radio['label']}}</span>
                                    @error('FormSegundo.'.$radio['id']) 
                                        <span class="text-danger">*</span>
                                    @enderror

                                    @foreach ($opciones as $opcion)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" 
                                                wire:model='FormSegundo.{{ $radio['id'] }}' 
                                                value="{{ $opcion['id'] }}" 
                                                id="{{ $radio['id'].'_'.$opcion['id'] }}"
                                                name="{{ $radio['id']}}"
                                                required>
                                            <label class="form-check-label" for="{{ $radio['id'].'_'.$opcion['id'] }}">{{ $opcion['label'] }}</label>
                                        </div>
                                    @endforeach
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                
                                    <br>
                                @endforeach
                            </div>
                        @endif
    
                        
                        @if ($pregunta['tipo'] == 'radio_boolean')
                            <div class="card-header">
                                {{$pregunta['label']}}
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" 
                                        wire:model='FormSegundo.{{ $pregunta['id'] }}' 
                                        value="1" 
                                        id="verdadero"
                                        name="FormSegundo.{{ $pregunta['id'] }}"
                                        required>
                                    <label class="form-check-label" for="verdadero">Sí</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" 
                                        wire:model='FormSegundo.{{ $pregunta['id'] }}' 
                                        value="0" 
                                        id="falso"
                                        name="FormSegundo.{{ $pregunta['id'] }}"
                                        required>
                                    <label class="form-check-label" for="falso">No</label>
                                </div>
                            </div>
                        @endif
                        
                        
                        @if ($pregunta['tipo'] == 'radio_b')
                            <div class="card-header">
                                {{$pregunta['label']}}
                                @error('FormSegundo.'.$pregunta['id']) 
                                    <span class="text-danger">*</span>
                                @enderror
                            </div>
                            <div class="card-body">
                                @foreach ($pregunta['opciones'] as $opcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" 
                                            wire:model.lazy='FormSegundo.{{ $pregunta['id'] }}' 
                                            value="{{ $opcion['id'] }}" id="{{ $opcion['id'] }}" 
                                            name="{{ $pregunta['id'] }}"
                                            required>
                                        <label class="form-check-label" for="{{ $opcion['id'] }}">{{ $opcion['label'] }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                



                
                        @if ($pregunta['tipo'] == 'xxstring')
                            <span class="card-title fs-5">{{$pregunta['pregunta_principal']}}</span>
                            <br>
                            <br>
                            <input class="form-control" type="text" wire:model.lazy='FormSegundo.{{ $pregunta['id'] }}'>
                            @error('FormSegundo.'.$pregunta['id']) <span class="text-danger">{{ $message }}</span> @enderror
                        @endif
                



                
                        @if ($pregunta['tipo'] == 'checkboxxx')
                            <div class="card-header">{{$pregunta['label']}}</div>
                            <div class="card-body">
                                @foreach ($pregunta['preguntas'] as $pregunta)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" wire:model.lazy="FormSegundo.{{$pregunta['id']}}" id="{{$pregunta['id']}}">
                                        <label class="form-check-label" for="{{$pregunta['id']}}">{{$pregunta['label']}}</label>
                                    </div>      
                                @endforeach
                            </div>
                        @endif
                                
                </div>
            </div>
        @endforeach
    
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg">Guardar</button>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <br>
        <br>
    </form>

</div>
