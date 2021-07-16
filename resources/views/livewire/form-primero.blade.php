<div class="container">

    <form wire:submit.prevent="save">

        @foreach ($preguntas as $pregunta_lista)
    
            
            @if ($pregunta_lista['tipo'] == 'radio')
            
                <div class="card mt-3">
                    <div class="card-body">
                        <span class="card-title fs-5">{{$pregunta_lista['pregunta_principal']}}</span>
                        <br>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" 
                                type="radio"
                                wire:model.lazy='FormPrimero.{{ $pregunta_lista['id'] }}'
                                value="true" 
                                id="{{ $pregunta_lista['id'] }}">
                            <label class="form-check-label" 
                                for="{{ $pregunta_lista['id'] }}">
                                Sí
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" 
                                type="radio"
                                wire:model.lazy='FormPrimero.{{ $pregunta_lista['id'] }}'
                                value="false"
                                id="{{ $pregunta_lista['id'] }}_dos">
                            <label class="form-check-label" 
                                for="{{ $pregunta_lista['id'] }}_dos">
                                No
                            </label>
                        </div>
                        @error('FormPrimero.'.$pregunta_lista['id']) <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
    
            @endif
    
    
            @if ($pregunta_lista['tipo'] == 'string')
                <div class="card mt-3">
                    <div class="card-body">
                        <span class="card-title fs-5">{{$pregunta_lista['pregunta_principal']}}</span>
                        <br>
                        <br>
                        <input class="form-control" type="text" wire:model.lazy='FormPrimero.{{ $pregunta_lista['id'] }}'>
                        @error('FormPrimero.'.$pregunta_lista['id']) <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif
    
    
            @if ($pregunta_lista['tipo'] == 'checkbox')
                <div class="card mt-3">
                    <div class="card-body">
                    <span class="card-title fs-5">{{$pregunta_lista['pregunta_principal']}}</span>
                    <br>
                    <br>
                    @foreach ($pregunta_lista['preguntas'] as $pregunta)
                        <div class="form-check">
                            <input class="form-check-input" 
                                type="checkbox" 
                                wire:model.lazy="FormPrimero.{{$pregunta['id']}}" 
                                id="{{$pregunta['id']}}">
                            <label class="form-check-label" 
                                for="{{$pregunta['id']}}">
                                {{$pregunta['label']}}
                            </label>
                        </div>      
                    @endforeach
                    </div>
                </div>
            @endif
    
    
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
