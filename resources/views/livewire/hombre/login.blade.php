<div class="container">
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
</div>
