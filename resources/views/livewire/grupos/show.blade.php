<div class="container">

    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header"><h4>{{ $grupo->name }}</h4></div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
    
    {{-- hombres --}}
    @livewire('hombre.list-comp', ['grupo_id' => $grupo->id])
</div>
