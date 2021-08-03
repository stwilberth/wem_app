<?php

namespace App\Http\Livewire\Hombre;
use App\Models\Pais;

use App\Models\Grupo;
use App\Models\Barrio;
use App\Models\Canton;
use App\Models\Hombre;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Create extends Component
{
    public $dni;
    public $tipo_identificacion;
    public $was_validated = '';
    public $grupos;

    public $estado = 'editar_dni'; 

    public $provincias;
    public $cantones;
    public $distritos;
    public $barrios;
    public $paises;
    public Hombre $hombres;
    public $labels = array(
        'tipo_identificacion' => 'Tipo de Identificación',
        'dni' => 'Identificación',
        'name' => 'Nombre',
        'pin' => 'Contraseña (pin de 4 digitos)',
        'fecha_nacimiento' => 'Fecha de nacimiento',
        'estado_civil' => '¿Cuál es tu estado civil?',
        'tiene_pareja' => '¿Tiene pareja en este momento?',
        'esta_conviviendo_pareja' => '¿Si tiene pareja, está conviviendo con ella?',
        'estudio' => '¿Cuál es su nivel educativo?',
        'wem_jovenes' => '¿Asiste a Wem para Jovenes menores de 20 años?',
        'tiene_hijos' => '¿Tiene hijos/as?',
        'cantidad_hijos' => '¿Cuántos hijos/as tiene?',
        'situacion_laboral' => '¿Cuál es su situación laboral?',
        'ocupacion' => '¿Cuál es su ocupación?',
        'nacionalidad' => '¿Cuál es su nacionalidad?',
        'total_sesiones' => 'Cantidad de sesiones de venir a Wem (digite un número)',
        'grupo_id' => '¿A cual grupo de Wem es al que más asiste?',
        'telefono' => 'Digite su número de teléfono',
        'provincia' => 'Provincia',
        'canton' => 'Cantón',
        'distrito' => 'Distrito',
        'barrio' => 'Barrio',
    );


    public function rules() {
        return[
            'hombres.dni'           => ['string', 'required', Rule::unique('hombres')],
            'hombres.pin'           => 'numeric|required',
            'hombres.name'           => 'string|required',
            'hombres.email'           => 'string',
            // 'hombres.activo'           => 'boolean|required',
            'hombres.telefono'           => 'string',
            'hombres.wem_jovenes'           => 'boolean|required',
            'hombres.tiene_pareja'                          => 'required|boolean',
            'hombres.esta_conviviendo_pareja'               => 'exclude_if:hombres.tiene_pareja,false|required|boolean',

            // 'hombres.form_primero' => ['required', Rule::in(['sin_iniciar', 'editando', 'finalizado'])],
            // 'hombres.form_segundo' => ['required', Rule::in(['sin_iniciar', 'editando', 'finalizado'])],
            // 'hombres.form_tercero' => ['required', Rule::in(['sin_iniciar', 'editando', 'finalizado'])],

            'hombres.fecha_nacimiento'       => 'date|required',	    // ¿Cuál es tu edad (digite un número)?,
            'hombres.estado_civil'           => ['required', Rule::in(['soltero', 'casado', 'union_libre', 'divorciado', 'viudo'])],
            'hombres.estudio'                => 'string|required',              // ¿Cuál es su nivel educativo?,
            'hombres.tiene_hijos'            => 'boolean|required',         // ¿hijos tiene?
            'hombres.cantidad_hijos'         => 'exclude_if:hombres.tiene_hijos,false|required|integer',      // ¿Cuántos hijos/as tiene? Si no tiene hijos/as escriba el número cero en la respuesta.,
            'hombres.situacion_laboral'      => 'boolean|required',   // ¿Cuál es su situación laboral?,
            'hombres.ocupacion'              => 'string|required',            // ¿Cuál es su ocupación?,
            'hombres.nacionalidad'           => 'string|required',         // ¿Cuál es su nacionalidad?,
            'hombres.total_sesiones'         => 'integer|required',      // Cantidad de sesiones de venir a Wem (digite un número),
            'hombres.provincia'              => ['required', Rule::notIn(['provincia'])],           // Provincia,
            'hombres.canton'                 => ['required', Rule::notIn(['canton'])],             // Cantón,
            'hombres.distrito'               => 'nullable',            // Distrito,
            'hombres.barrio'                 => 'nullable',              // Barrio,
            'hombres.grupo_id'               => 'required',
        ];
    }

    public function mount(){

        if (Auth::user()) {
            return redirect()->route('welcome');
        }
        if (session()->get('hombre_id')) {
            return redirect()->route('hombre', session()->get('hombre_id'));
        }
        $this->grupos = Grupo::all();
        $this->provincias = Provincia::all();
        $this->hombres = new Hombre();

    }

    public function render()
    {
        if (session()->get('hombre_id')) {
           redirect()->route('hombre', session()->get('hombre_id'));
        }

        $this->paises = Pais::all();
        $this->provincias = Provincia::all();
        $this->cantones = ($this->hombres->provincia) ? Canton::where('provincia_id', $this->hombres->provincia)->get() : null;
        $this->distritos = ($this->hombres->canton) ? Distrito::where('canton_id', $this->hombres->canton)->get() : null;
        $this->barrios = ($this->hombres->distrito) ? Barrio::where('distrito_id', $this->hombres->distrito)->get() : null;

        return view('livewire.hombre.create', ['paises' => $this->paises, 'provincias' => $this->provincias, 'cantones' => $this->cantones, 'distritos' => $this->distritos, 'barrios' => $this->barrios])
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => 'Información Personal', 'body_class' => '', ]);
    }

    public function change_provincia(){
        $this->cantones = ($this->hombres->provincia) ? Canton::where('provincia_id', $this->hombres->provincia)->get() : null;
        $this->distritos = ($this->hombres->canton) ? Distrito::where('canton_id', $this->hombres->canton)->get() : null;
        $this->barrios = ($this->hombres->distrito) ? Barrio::where('distrito_id', $this->hombres->distrito)->get() : null;
        $this->hombres->canton = null;
        $this->hombres->distrito = null;
        $this->hombres->barrio = null;
    }
    public function change_canton(){
        $this->distritos = ($this->hombres->canton) ? Distrito::where('canton_id', $this->hombres->canton)->get() : null;
        $this->barrios = ($this->hombres->distrito) ? Barrio::where('distrito_id', $this->hombres->distrito)->get() : null;
        $this->hombres->distrito = null;
        $this->hombres->barrio = null;
    }
    public function change_distrito(){
        $this->barrios = ($this->hombres->distrito) ? Barrio::where('distrito_id', $this->hombres->distrito)->get() : null;
        $this->hombres->barrio = null;
    }

    public function getDataHacienda()
    {
        if ($this->hombres->dni) {
            $res = Http::get("https://api.hacienda.go.cr/fe/ae?identificacion=".$this->hombres->dni);
             if ($res->status() == 200) {
                 $data = $res->json();
                 $this->hombres->name = $data['nombre'];
                 $this->hombres->tipo_identificacion = $data['tipoIdentificacion'];
                 $this->estado = $res->status();
             } else {
                 $this->estado = $res->status();
             }
        } else {
            # code...
        }
        

    }

    public function saltarValidacion()
    {
        $this->estado = 'saltar_validacion';
        $this->hombres->name = '';
        $this->hombres->dni = '';
    }

    public function save()
    {
        $this->was_validated = 'was-validated';
        if (!$this->hombres->distrito || !$this->hombres->distrito == 'distrito') {
            $this->hombres->distrito = null;
        }

        if (!$this->hombres->barrio || !$this->hombres->barrio == 'barrio') {
            $this->hombres->barrio = null;
        }

        $this->validate();
        
        $this->hombres->form_primero = 'sin_iniciar';
        $this->hombres->form_segundo = 'sin_iniciar';
        $this->hombres->form_tercero = 'sin_iniciar';
        $this->hombres->activo = 1;
        $this->hombres->save();
        $this->hombres->grupos()->attach($this->hombres->grupo_id);
        session(['hombre_id' => $this->hombres->id]);
        session(['hombre_name' => $this->hombres->name]);
        return redirect()->to('/form-primero');

    }
}
