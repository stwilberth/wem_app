<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FormPersonalInformation;

class FormDatosPersonalesCtrl extends Component
{
    public $dni;
    public $tipo_identificacion;

    public FormPersonalInformation $FormModel;

    public $labels = array(
        'fecha_nacimiento' => 'Fecha de nacimiento',
        'estado_civil' => '¿Cuál es tu estado civil?',
        'tiene_pareja' => '¿Tiene pareja en este momento?',
        'vive_con_ella' => '¿Si tiene pareja, está conviviendo con ella?',
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
            'FormModel.fecha_nacimiento',
            'FormModel.estado_civil',
            'FormModel.tiene_pareja',
            'FormModel.vive_con_ella',
            'FormModel.estudio',
            'FormModel.wem_jovenes',
            'FormModel.tiene_hijos',
            'FormModel.cantidad_hijos',
            'FormModel.situacion_laboral',
            'FormModel.ocupacion',
            'FormModel.nacionalidad',
            'FormModel.total_sesiones',
            'FormModel.grupo_id',
            'FormModel.hombre_id',
            'FormModel.telefono',
            'FormModel.provincia',
            'FormModel.canton',
            'FormModel.distrito',
            'FormModel.barrio',
        ];
    }

    public function mount(){
        $this->FormModel::create([

        ]);
    }
    public function render()
    {
        return view('livewire.form-datos-personales')->extends('layouts.app')->section('content')->layoutData(['titulo' => 'Información Personal', 'body_class' => '', ]);
    }
}
