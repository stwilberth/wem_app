<div class="row">
    <div class="col">

        <x-alert_warning :lista="array(
            'mostrar el tipo de usuario',
            'ver'
        )" />

        <div class="card mt-5">
            {{-- header --}}
            <div class="card-header">
                <div class="d-flex bd-highlight">
                    <div class="p-2 w-100 bd-highlight"><h4>Usuarios Lista</h4></div>
                    @if ($grupos)
                        <div class="p-2">
                            <select class="form-control" name="grupo_select" id="grupo_select" wire:model='grupo_id'>
                                <option value="">Todos los grupos</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="p-2 flex-shrink-1 bd-highlight">
                        <input type="text" placeholder="Nombre" class="form-control" wire:model='search' id="search">
                    </div>
                </div>
            </div>

            {{-- body --}}
            <div class="card-body">
                <x-user.table :users="$users" />
            </div>

            {{-- footer --}}
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        </div>


    </div>
</div>