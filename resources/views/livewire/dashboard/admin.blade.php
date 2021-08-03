<style>
    .card {
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
    transition: all 0.2s;
    }

    .card:hover {
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
    transform: scale(1.01);
    }


    .card-1 {
    background: radial-gradient(#1fe4f5, #3fbafe);
    }

    .card-2 {
    background: radial-gradient(#fbc1cc, #fa99b2);
    }

    .card-3 {
    background: radial-gradient(#76b2fe, #b69efe);
    }

    .card-4 {
    background: radial-gradient(#60efbc, #58d5c9);
    }

    .card-5 {
    background: radial-gradient(#f588d8, #c0a3e5);
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="card card-1">
                <div class="card-header">
                    Hombres Activos
                </div>
                <div class="card-body">
                    {{ $hombres_activos }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-3">
                <div class="card-header">
                    Psicologos Activos
                </div>
                <div class="card-body">
                    {{ $psicologos_activos }}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-4">
                <div class="card-header">
                    Grupos Activos
                </div>
                <div class="card-body">
                    {{ $grupos_activos }}
                </div>
            </div>
        </div>
    </div>
</div>