<?php

namespace App\Http\Livewire\Forms;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\FormTercero;
use App\Models\Grupo;
use App\Models\Hombre;

class TerceroCtrl extends Component
{
    public ?FormTercero $FormTercero = null;
    public ?Hombre $Hombre = null;
    public $was_validated = '';
    public $grupos;
    public $cantidad_sesiones_error = '';

    public $preguntas = array(
        [// ¿Cuál es tu estado civil? *
            'id' => 'estado_civil',
            'label' => '¿Cuál es tu estado civil? *',
            'tipo' => 'radio_b',
            'opciones' => [
                ['id' => 'soltero',       'label' => 'Soltero'],
                ['id' => 'casado',        'label' => 'Casado'],
                ['id' => 'union_libre',   'label' => 'Unión Libre'],
                ['id' => 'divorciado',    'label' => 'Divorciado'],
                ['id' => 'viudo',         'label' => 'Viudo']
            ]
        ],

        [// ¿Cuáles de los siguientes talleres ha llevado?
            'id' => 'cuales_talleres_ha_llevado', 
            'label' => '¿Cuáles de los siguientes talleres ha llevado?',
            'tipo' => 'checkbox',
            'radios' => [// checkbox
                ['id' => 'manejo_del_enojo',        'label' => 'Manejo del enojo'],
                ['id' => 'comunicacion_asertiva',   'label' => 'Comunicación Asertiva'],
                ['id' => 'celos',                   'label' => 'Celos'],
                ['id' => 'duelo',                   'label' => 'Duelo'],
                ['id' => 'infidelidad',             'label' => 'Infidelidad'],
                ['id' => 'sexualidad',              'label' => 'Sexualidad'],
                ['id' => 'paternidad',              'label' => 'Paternidad'],
            ]
        ],
        
        [// A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique CÓMO SE SIENTE AHORA MISMO. *    
            'id' => 'como_se_siente_ahora_mismo',
            'label' => 'A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique CÓMO SE SIENTE AHORA MISMO. * ',
            'tipo' => 'radio',
            'opciones' => [//1. No, en absoluto	2. Algo	3. Moderadamente	4. Mucho
                [ 'id' => 'no_en_absoluto',  'label' => 'No, en absoluto',   'value' => 1],
                [ 'id' => 'algo',            'label' => 'Algo',              'value' => 2],
                [ 'id' => 'moderadamente',   'label' => 'Moderadamente',     'value' => 3],
                [ 'id' => 'mucho',           'label' => 'Mucho',             'value' => 4],
            ],
            'radios' => [// radio
                ['id' => 'estoy_furioso_a',              'label' => 'Estoy furioso/a.'],
                ['id' => 'siento_irritado_a',            'label' => 'Me siento irritado/a.'],
                ['id' => 'siento_enfadado_a',            'label' => 'Me siento enfadado/a.'],
                ['id' => 'le_pegaria_a_alguien',         'label' => 'Le pegaría a alguien.'],
                ['id' => 'estoy_bravo_a',                'label' => 'Estoy bravo/a.'],
                ['id' => 'gustaria_decir_groserias',     'label' => 'Me gustaría decir groserías.'],
                ['id' => 'estoy_cabreado_a',             'label' => 'Estoy cabreado/a.'],
                ['id' => 'daria_punetazos_a_la_pared',   'label' => 'Daría puñetazos a la pared.'],
                ['id' => 'ganas_maldecir_gritos',        'label' => 'Me dan ganas de maldecir a gritos.'],
                ['id' => 'ganas_gritarle_alguien',       'label' => 'Me dan ganas de gritarle a alguien.'],
                ['id' => 'quiero_romper_algo',           'label' => 'Quiero romper algo.'],
                ['id' => 'ganas_de_gritar',              'label' => 'Me dan ganas de gritar.'],
                ['id' => 'tiraria_algo_alguien',         'label' => 'Le tiraría algo a alguien.'],
                ['id' => 'ganas_abofetear_alguien',      'label' => 'Tengo ganas de abofetear a alguien.'],
                ['id' => 'gustaria_bronca_alguien',      'label' => 'Me gustaría hacerle la bronca a alguien.'],
            ]
        ],
        
        [// A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique COMO SE SIENTE NORMALMENTE. *
            'id' => 'como_se_siente_normalmente',
            'label' => 'A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique COMO SE SIENTE NORMALMENTE. *',
            'tipo' => 'radio',
            'opciones' => [//1. Casi Nunca	2. Algunas Veces	3. A menudo	4. Casi Siempre
                [ 'id' => 'casi_nunca',      'label' => 'Casi Nunca',    'value' => 1],
                [ 'id' => 'algunas_veces',   'label' => 'Algunas Veces', 'value' => 2],
                [ 'id' => 'a_menudo',        'label' => 'A menudo',      'value' => 3],
                [ 'id' => 'casi_siempre',    'label' => 'Casi Siempre',  'value' => 4],
            ],
            'radios' => [//radio -> opciones
                ['id' => 'caliento_rapidamente',                'label' => 'Me caliento rápidamente.'],
                ['id' => 'tengo_un_caracter_irritable',         'label' => 'Tengo un carácter irritable.'],
                ['id' => 'soy_una_persona_exaltada',            'label' => 'Soy una persona exaltada.'],
                ['id' => 'molesta_cuando_no_lo_reconocen',      'label' => 'Me molesta cuando hago algo bien y no me lo reconocen.'],
                ['id' => 'tiendo_a_perder_los_estribos',        'label' => 'Tiendo a perder los estribos.'],
                ['id' => 'furioso_critiquen_delante_demas',     'label' => 'Me pone furioso/a que me critiquen delante de los demás.'],
                ['id' => 'hago_un_buen_trabajo_valora_poco',    'label' => 'Me siento furioso/a cuando hago un buen trabajo y se me valora poco.'],
                ['id' => 'cabreo_con_facilidad',                'label' => 'Me cabreo con facilidad.'],
                ['id' => 'enfado_salen_como_tenia_previsto',    'label' => 'Me enfado si no me salen las cosas como tenía previsto.'],
                ['id' => 'enfado_cuando_trata_injustamente',    'label' => 'Me enfado cuando se me trata injustamente.'],
                ['id' => 'controlo_mi_temperamento',            'label' => 'Controlo mi temperamento.'],
                ['id' => 'expreso_mi_ira',                      'label' => 'Expreso mi ira.'],
                ['id' => 'guardo_lo_que_siento',                'label' => 'Me guardo para mí lo que siento.'],
                ['id' => 'hago_comentarios_ironicos_demas',     'label' => 'Hago comentarios irónicos de los demás.'],
                ['id' => 'mantengo_la_calma',                   'label' => 'Mantengo la calma.'],
                ['id' => 'hago_cosas_como_dar_portazos',        'label' => 'Hago cosas como dar portazos.'],
                ['id' => 'ardo_dentro_no_demuestro',            'label' => 'Ardo por dentro aunque no lo demuestro.'],
                ['id' => 'controlo_mi_comportamiento',          'label' => 'Controlo mi comportamiento.'],
                ['id' => 'discuto_con_los_demas',               'label' => 'Discuto con los demás.'],
                ['id' => 'rencores_que_no_cuento_a_nadie',      'label' => 'Tiendo a tener rencores que no cuento a nadie.'],
                ['id' => 'puedo_controlarme',                   'label' => 'Puedo controlarme y no perder los estribos.'],
                ['id' => 'mas_enfadado_que_quiero_admitir',     'label' => 'Estoy más enfadado/a de lo que quiero admitir.'],
                ['id' => 'digo_barbaridades',                   'label' => 'Digo barbaridades.'],
                ['id' => 'irrito_mas_gente_cree',               'label' => 'Me irrito más de lo que la gente se cree.'],
                ['id' => 'pierdo_la_paciencia',                 'label' => 'Pierdo la paciencia.'],
                ['id' => 'controlo_sentimientos_enfado',        'label' => 'Controlo mis sentimientos de enfado.'],
                ['id' => 'evito_encararlo_enfada',              'label' => 'Evito encararme con aquello que me enfada.'],
                ['id' => 'controlo_impulso_expresar_ira',       'label' => 'Controlo el impulso de expresar mis sentimientos de ira.'],
                ['id' => 'respiro_profundamente_relajo',        'label' => 'Respiro profundamente y me relajo.'],
                ['id' => 'cuento_hasta_10',                     'label' => 'Hago cosas como contar hasta 10.'],
                ['id' => 'trato_de_relajarme',                  'label' => 'Trato de relajarme.'],
                ['id' => 'hago_sosegado_para_calmarme',         'label' => 'Hago algo sosegado para calmarme.'],
                ['id' => 'distraerel_enfado',                   'label' => 'Intento distraerme para que se me pase el enfado.'],
                ['id' => 'pienso_agradable_tranquilizarme',     'label' => 'Pienso en algo agradable para tranquilizarme.']
            ]
        ],
        
        [// ¿Cuáles de las siguientes actividades realiza semanalmente? *
            'id' => 'cuales_realiza_semanalmente', 
            'label' => '¿Cuáles de las siguientes actividades realiza semanalmente? *',
            'tipo' => 'checkbox',
            'radios' => [// checkbox
                ['id' => 'preparar_la_comida',         'label' => 'Preparar la comida'],
                ['id' => 'limpiar_la_casa',            'label' => 'Limpiar la casa'],
                ['id' => 'limpiar_el_bano',            'label' => 'Limpiar el baño'],
                ['id' => 'lavar_ropa',                 'label' => 'Lavar ropa'],
                ['id' => 'cuidar_hermanas_o_hijas',    'label' => 'Cuidar de hermanos/as pequeños o de hijos/as']
            ]
        ],
        
        [// ¿Quiénes participan más frecuentemente en las actividades anteriores? *
            'id' => 'quienes_participan_actividades', 
            'label' => '¿Quiénes participan más frecuentemente en las actividades anteriores? *',
            'tipo' => 'radio_b',
            'opciones' => [//radio_b
                [ 'id' => 'usted',                   'label' => 'Usted',                                'value' => 1],
                [ 'id' => 'su_pareja',               'label' => 'Su pareja',                            'value' => 2],
                [ 'id' => 'ambos_usted_pareja',      'label' => 'Ambos (usted y su pareja)',            'value' => 3],
                [ 'id' => 'otra_persona_empleado',   'label' => 'Otra persona (empleada/o doméstica)',  'value' => 4],
            ]
        ],

        [// Marque si está de acuerdo con las siguientes afirmaciones: *
            'id' => 'rol_hijos', 
            'label' => 'Marque si está de acuerdo con las siguientes afirmaciones: *',
            'tipo' => 'radio',
            'opciones' => [//De acuerdo	En desacuerdo	No aplica
                [ 'id' => 'de_acuerdo',     'label' => 'De acuerdo',    'value' => 1],
                [ 'id' => 'en_desacuerdo',  'label' => 'En desacuerdo', 'value' => 2],
                [ 'id' => 'no_aplica',      'label' => 'No aplica',     'value' => 3],
            ],
            'radios' => [
                ['id' => 'tiempo_hijas_trabajo',                      'label' => 'Tengo muy poco tiempo para estar con mis hijos e hijas por razones de trabajo.'],
                ['id' => 'trabajaria_menos_tiempo_hijas',             'label' => 'Trabajarían menos si eso significara pasar más tiempo con mis hijos e hijas.'],
                ['id' => 'pareja_fin_miedo_sin_contacto_hijas',       'label' => 'Si mi relación de pareja terminara, tendría miedo de perder el contacto con mis hijos/as.'],
                ['id' => 'rol_cuidado_ninas_ayudante',                'label' => 'Mi rol en el cuidado de los niños/as es principalmente como ayudante.'],
                ['id' => 'estoy_estresado_por_dinero',                'label' => 'Estoy actualmente estresado por falta de dinero.'],
                ['id' => 'alcohol_mas_una_x_semana',                  'label' => 'Tomo alcohol más de una vez a la semana.'],
                ['id' => 'mes_sentido_deprimido',                     'label' => 'En el último mes me he sentido deprimido.'],
                ['id' => 'examenes_colesterol_azucar',                'label' => 'En el último año he ido a hacerme los exámenes médicos de rutina (colesterol, azúcar).'],
                ['id' => 'examenes_enfermedades_sexual',              'label' => 'En el último año he ido a hacerme exámenes por enfermedades de transmisión sexual.']
            ]
        ],

        [// Lea cada afirmación y marque la casilla que correspondan *
            'id' => 'lea_cada_afirmacion', 
            'label' => 'Lea cada afirmación y marque la casilla que correspondan *',
            'tipo' => 'radio',
            'opciones' => [// 1. Muy en Desacuerdo	2. Parcialmente de Acuerdo	3. Muy de Acuerdo
               [ 'id' => 'muy_en_desacuerdo',           'label' => 'Muy en Desacuerdo',         'value' => 1],
               [ 'id' => 'parcialmente_de_acuerdo',     'label' => 'Parcialmente de Acuerdo',   'value' => 2],
               [ 'id' => 'muy_de_acuerdo',              'label' => 'Muy de Acuerdo',            'value' => 3],
            ],
            'radios' => [//radio
                ['id' => 'mujer_hogar_cocinar_familia',         'label' => 'El rol más importante de la mujer es cuidar de su hogar y cocinar para su familia.'],
                ['id' => 'hombre_mas_sexo_que_mujeres',         'label' => 'Los hombres necesitan tener más sexo que las mujeres.'],
                ['id' => 'no_habla_sexo_solo_practica',         'label' => 'Los hombres no hablan de sexo, sólo lo practican.'],
                ['id' => 'ocasiones_mujer_merece_golpe',        'label' => 'Hay ocasiones en que las mujeres merecen ser golpeadas.'],
                ['id' => 'panal_alimentar_tarea_madres',        'label' => 'Cambiar pañales, bañar y alimentar a los niños y niñas es responsabilidad de la madre.'],
                ['id' => 'solo_mujer_evitar_embarazada',        'label' => 'Es responsabilidad de la mujer evitar quedar embarazada.'],
                ['id' => 'hombre_ultima_palabra_hogar',         'label' => 'El hombre debe ser quien tiene la última palabra en las decisiones del hogar.'],
                ['id' => 'hombre_siempre_ispuesto_sexo',        'label' => 'Los hombres siempre están dispuestos para tener sexo.'],
                ['id' => 'mujer_tolera_golpe_x_familia',        'label' => 'Una mujer debería tolerar si su pareja la golpea para mantener a su familia unida.'],
                ['id' => 'indignar_esposa_pide_condon',         'label' => 'Me indignaría si mi esposa me pidiera que use preservativo (condón).'],
                ['id' => 'pareja_decide_anticonceptivo',        'label' => 'El hombre y la mujer deberían decidir juntos qué tipo de anticoncepción usar.'],
                ['id' => 'jamas_tendria_amigo_homosexual',      'label' => 'Jamás tendría un amigo homosexual (gay).'],
                ['id' => 'defender_reputacion_fuerza',          'label' => 'Si alguien me insulta, voy a defender mi reputación con la fuerza si es necesario.'],
                ['id' => 'hombre_necesitas_ser_duro',           'label' => 'Para ser hombre, necesitas ser duro.'],
                ['id' => 'hombre_avergonzar_no_ereccion',       'label' => 'Los hombres deben de avergonzarse si no pueden tener una erección.'],
                ['id' => 'embaraza_responsabilidad_ambos',      'label' => 'Si un joven embaraza a una mujer, la responsabilidad del/a bebé es de ambos.'],
                ['id' => 'saber_gusta_pareja_sexo',             'label' => 'El hombre debería saber qué le gusta a su pareja durante el sexo.'],
                ['id' => 'el_padre_importante_criar_hijas',     'label' => 'La participación del padre es importante para criar a los hijos(as)'],
                ['id' => 'importante_amigos_hablar_problemas',  'label' => 'Es importante para un hombre tener amigos para hablar de sus problemas.'],
                ['id' => 'decidir_junta_quieren_hijas',         'label' => 'Una pareja debe decidir junta si quieren tener hijos e hijas.'],
                ['id' => 'hombre_decide_tipo_sexo_tiene',       'label' => 'Es el hombre quien decide qué tipo de sexo se tiene.'],
                ['id' => 'mujeres_llevan_condones_faciles',     'label' => 'Las mujeres que llevan consigo condones son “fáciles”.'],
                ['id' => 'necesita_mujeres_aun_mujer_bien',     'label' => 'Un hombre necesita de otras mujeres, aun si las cosas con su mujer están bien.'],
                ['id' => 'mujer_infidelidad_hombre_golpea',     'label' => 'Si una mujer engaña (infidelidad) a un hombre, está bien que él la golpee.'],
                ['id' => 'golpear_esposa_ella_no_sexo',         'label' => 'Está bien para un hombre golpear a su esposa si ella no tiene sexo con él.'],
                ['id' => 'mujer_puede_sugerir_usar_condon',     'label' => 'En mi opinión, una mujer puede sugerir usar condón, así como un hombre.'],
                ['id' => 'saber_que_gusta_companera_en_sexo',   'label' => 'Un hombre debería saber qué es lo que le gusta a su compañera durante el sexo.'],
                ['id' => 'presente_vida_hijas_aun_no_madre',    'label' => 'Es importante que un padre esté presente en la vida de sus hijos/as, aun si éste no se encuentra con la madre.'],
                ['id' => 'pueden_cuidar_hijas_como_mujer',      'label' => 'Los hombres pueden cuidar de sus hijos e hijas también como lo puede hacer una mujer.'],
                ['id' => 'si_ve_mujer_agredida_intervenir',     'label' => 'Si un hombre ve que una mujer está siendo agredida, él debería intervenir y parar la situación.'],
            ],

        ],

    );

    public function rules() {
        return [
            'FormTercero.grupo_id'                              => 'required',
            'FormTercero.tiene_pareja'                          => 'required|boolean',
            'FormTercero.esta_conviviendo_pareja'               => 'exclude_if:FormTercero.tiene_pareja,false|required|boolean',
            'FormTercero.estado_civil'                          => ['required', Rule::in(['soltero', 'casado', 'union_libre', 'divorciado', 'viudo'])],

            'FormTercero.manejo_del_enojo'                      => 'nullable|boolean', //checbox
            'FormTercero.comunicacion_asertiva'                 => 'nullable|boolean', //checbox
            'FormTercero.celos'                                 => 'nullable|boolean', //checbox
            'FormTercero.duelo'                                 => 'nullable|boolean', //checbox
            'FormTercero.infidelidad'                           => 'nullable|boolean', //checbox
            'FormTercero.sexualidad'                            => 'nullable|boolean', //checbox
            'FormTercero.paternidad'                            => 'nullable|boolean', //checbox

            'FormTercero.estoy_furioso_a'                       => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.siento_irritado_a'                     => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.siento_enfadado_a'                     => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.le_pegaria_a_alguien'                  => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.estoy_bravo_a'                         => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.gustaria_decir_groserias'              => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.estoy_cabreado_a'                      => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.daria_punetazos_a_la_pared'            => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.ganas_maldecir_gritos'                 => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.ganas_gritarle_alguien'                => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.quiero_romper_algo'                    => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.ganas_de_gritar'                       => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.tiraria_algo_alguien'                  => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.ganas_abofetear_alguien'               => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],
            'FormTercero.gustaria_bronca_alguien'               => ['required', Rule::in(['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])],

            'FormTercero.caliento_rapidamente'                  => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.tengo_un_caracter_irritable'           => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.soy_una_persona_exaltada'              => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.molesta_cuando_no_lo_reconocen'        => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.tiendo_a_perder_los_estribos'          => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.furioso_critiquen_delante_demas'       => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.hago_un_buen_trabajo_valora_poco'      => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.cabreo_con_facilidad'                  => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.enfado_salen_como_tenia_previsto'      => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.enfado_cuando_trata_injustamente'      => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.controlo_mi_temperamento'              => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.expreso_mi_ira'                        => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.guardo_lo_que_siento'                  => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.hago_comentarios_ironicos_demas'       => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.mantengo_la_calma'                     => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.hago_cosas_como_dar_portazos'          => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.ardo_dentro_no_demuestro'              => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.controlo_mi_comportamiento'            => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.discuto_con_los_demas'                 => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.rencores_que_no_cuento_a_nadie'        => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.puedo_controlarme'                     => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.mas_enfadado_que_quiero_admitir'       => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.digo_barbaridades'                     => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.irrito_mas_gente_cree'                 => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.pierdo_la_paciencia'                   => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.controlo_sentimientos_enfado'          => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.evito_encararlo_enfada'                => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.controlo_impulso_expresar_ira'         => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.respiro_profundamente_relajo'          => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.cuento_hasta_10'                       => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.trato_de_relajarme'                    => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.hago_sosegado_para_calmarme'           => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.distraerel_enfado'                     => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],
            'FormTercero.pienso_agradable_tranquilizarme'       => ['required', Rule::in(['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])],

            'FormTercero.preparar_la_comida'                    => 'nullable|boolean', //checkbox
            'FormTercero.limpiar_la_casa'                       => 'nullable|boolean', //checkbox
            'FormTercero.limpiar_el_bano'                       => 'nullable|boolean', //checkbox
            'FormTercero.lavar_ropa'                            => 'nullable|boolean', //checkbox
            'FormTercero.cuidar_hermanas_o_hijas'               => 'nullable|boolean', //checkbox

            'FormTercero.quienes_participan_actividades'        => ['required', Rule::in(['usted', 'su_pareja', 'ambos_usted_pareja', 'otra_persona_empleado'])],

            'FormTercero.tiempo_hijas_trabajo'                  => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.trabajaria_menos_tiempo_hijas'         => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.pareja_fin_miedo_sin_contacto_hijas'   => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.rol_cuidado_ninas_ayudante'            => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.estoy_estresado_por_dinero'            => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.alcohol_mas_una_x_semana'              => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.mes_sentido_deprimido'                 => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.examenes_colesterol_azucar'            => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],
            'FormTercero.examenes_enfermedades_sexual'          => ['required', Rule::in(['de_acuerdo', 'en_desacuerdo', 'no_aplica'])],

            'FormTercero.mujer_hogar_cocinar_familia'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.hombre_mas_sexo_que_mujeres'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.no_habla_sexo_solo_practica'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.ocasiones_mujer_merece_golpe'          => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.panal_alimentar_tarea_madres'          => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.solo_mujer_evitar_embarazada'          => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.hombre_ultima_palabra_hogar'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.hombre_siempre_ispuesto_sexo'          => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.mujer_tolera_golpe_x_familia'          => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.indignar_esposa_pide_condon'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.pareja_decide_anticonceptivo'          => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.jamas_tendria_amigo_homosexual'        => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.defender_reputacion_fuerza'            => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.hombre_necesitas_ser_duro'             => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.hombre_avergonzar_no_ereccion'         => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.embaraza_responsabilidad_ambos'        => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.saber_gusta_pareja_sexo'               => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.el_padre_importante_criar_hijas'       => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.importante_amigos_hablar_problemas'    => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.decidir_junta_quieren_hijas'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.hombre_decide_tipo_sexo_tiene'         => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.mujeres_llevan_condones_faciles'       => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.necesita_mujeres_aun_mujer_bien'       => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.mujer_infidelidad_hombre_golpea'       => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.golpear_esposa_ella_no_sexo'           => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.mujer_puede_sugerir_usar_condon'       => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.saber_que_gusta_companera_en_sexo'     => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.presente_vida_hijas_aun_no_madre'      => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.pueden_cuidar_hijas_como_mujer'        => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
            'FormTercero.si_ve_mujer_agredida_intervenir'       => ['required', Rule::in(['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])],
        ];
    }

    public function mount() {
        
        if (!session()->get('hombre_id')) {
            return redirect()->route('welcome');
        }

        $this->grupos = Grupo::all();
        $this->hombre_id = session()->get('hombre_id');
        $this->Hombre = Hombre::find($this->hombre_id);
        if ($this->Hombre) {
            if ($this->Hombre->total_sesiones >= 30 && $this->Hombre->total_sesiones <= 45) {
                if ($this->Hombre->form_tercero == 'sin_iniciar') {
                    $this->FormTercero ??= new FormTercero();
                    $this->FormTercero->hombre_id = $this->hombre_id;
                    $this->Hombre->form_tercero = 'editando';
                    $this->FormTercero->save();
                    $this->Hombre->save();
                } else if ($this->Hombre->form_tercero == 'editando') {
                    $this->FormTercero ??= FormTercero::where('hombre_id', $this->hombre_id)->firstOrFail();
                }
            } else {
                $this->cantidad_sesiones_error = 'Tiene que tener de 30 a 45 sesiones para llenar este formulario';
            }
            
        }
    }

    public function render()
    {
        return view('livewire.forms.tercero')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData([
                'titulo' => 'Formulario cumpliendo 30 a 45 sesiones', 
            ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->FormTercero->save();
    }

    public function save(){//falta agregar en el perfil del usuario
        $this->was_validated = 'was-validated';
        session()->flash('datos_invalidos', 'Algunos campos necesitan atención');
        $this->validate();
        $this->FormTercero->save();
        $this->Hombre->form_tercero = 'finalizado';
        $this->Hombre->save();
        return redirect()->route('hombre', $this->Hombre->id);
    }
}
