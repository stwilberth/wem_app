<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Models\FormPrimero;
use App\Models\Hombre;
use Illuminate\Validation\Rule;

class PrimeroCtrl extends Component
{
    public ?FormPrimero $FormPrimero = null;
    public ?Hombre $Hombre = null;
    public $form_completado = 0;
    public $hombre_id;
    public $preguntas = [
        [
            'id' => 'referido',
            'tipo' => 'radio',
            'pregunta_principal' => '¿Fue referido por alguna institución pública (PANI, Poder Judicial, etc)?'
        ],
        [
            'id' => 'se_entero_wem', 
            'tipo' => 'checkbox',
            'pregunta_principal' => '¿Se enteró de Wem por algunas de las siguientes opciones?', 
            'preguntas' => [
                ['id' => 'redes_sociales', 'label' => 'Redes sociales'],
                ['id' => 'campannas', 'label' => 'Campañas (Lazo Blanco, Salud masculina o Paternidades)'],
                ['id' => 'profesionales', 'label' => 'Profesionales en psicología o trabajo social'],
                ['id' => 'pareja', 'label' => 'Pareja'],
                ['id' => 'grupo_religioso', 'label' => 'Grupo Religioso'],
                ['id' => 'radio', 'label' => 'Radio'],
                ['id' => 'instituciones_gobierno', 'label' => 'Instituciones de Gobierno'],
                ['id' => 'amiga', 'label' => 'Amigo/a'],
                ['id' => 'empresa_privada', 'label' => 'Empresa privada'],
            ]
        ],
        [
            'id' => 'talleres_llevados',
            'tipo' => 'checkbox',
            'pregunta_principal' => '¿Cuáles de los siguientes talleres ha llevado?',
            'preguntas' => [
                ['id' => 'enojo', 'label' => 'Manejo del enojo'],
                ['id' => 'comunicacion', 'label' => 'Comunicación Asertiva'],
                ['id' => 'celos', 'label' => 'Celos'],
                ['id' => 'duelo', 'label' => 'Duelo'],
                ['id' => 'infidelidad', 'label' => 'Infidelidad'],
                ['id' => 'sexualidad', 'label' => 'Sexualidad'],
                ['id' => 'paternidad', 'label' => 'Paternidad'],
            ]
        ],
        [
            'id' => 'motivado_asistir', 
            'tipo' => 'checkbox',
            'pregunta_principal' => 'Indique si algunas de estas situaciones lo han motivado a asistir al grupo de Wem', 
            'preguntas' => [
                ['id' => 'problemas_comunicacion', 'label' => 'Problemas de comunicación'],
                ['id' => 'problemas_medidas_cautelares', 'label' => 'Medidas de restricción o medidas cautelares'],
                ['id' => 'problemas_problemas_hijos', 'label' => 'Problemas con los hijos/as'],
                ['id' => 'problemas_manejo_enojo', 'label' => 'Manejo del enojo'],
                ['id' => 'problemas_problemas_familiares', 'label' => 'Problemas con familiares'],
                ['id' => 'problemas_infidelidad_pareja', 'label' => 'Infidelidad de la pareja'],
                ['id' => 'problemas_depresion', 'label' => 'Depresión'],
                ['id' => 'problemas_celos', 'label' => 'Celos'],
                ['id' => 'problemas_infidelidad_hacia_pareja', 'label' => 'Infidelidad hacia la pareja'],
                ['id' => 'problemas_ideacion_suicida', 'label' => 'Ideación suicida'],
                ['id' => 'problemas_separacion_pareja', 'label' => 'Separación de pareja'],
            ]
        ],
        [
            'id' => 'marque_si_asiste',
            'tipo' => 'checkbox',
            'pregunta_principal' => 'Marque si asiste, en la actualidad, a alguna de las siguientes instituciones educativas (puede seleccionar varias opciones) ',
            'preguntas' => [
                ['id' => 'cen_cinai',  'label' => 'CEN-CINAI'],
                ['id' => 'pani',  'label' => 'PANI'],
                ['id' => 'cecudi',  'label' => 'CECUDI'],
                ['id' => 'hogar_comunitario',  'label' => 'Hogar Comunitario'],
                ['id' => 'centro_educación_privado',  'label' => 'Centro de Educación Privado'],
                ['id' => 'centro_educación_regular',  'label' => 'Centro de Educación Regular'],
                ['id' => 'centro_educación_especial',  'label' => 'Centro de Educación Especial']
            ]
        ],
        [
            'id' => 'como_se_siente_mismo',
            'tipo' => 'checkbox',
            'pregunta_principal' => 'A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique CÓMO SE SIENTE AHORA MISMO.',
            'preguntas' => [
                ['id' => 'estoy_furiosa', 'label' => 'Estoy furioso/a'],
                ['id' => 'siento_irritada', 'label' => 'Me siento irritado/a'],
                ['id' => 'siento_enfadada', 'label' => 'Me siento enfadado/a'],
                ['id' => 'pegaria_alguien', 'label' => 'Le pegaría a alguien'],
                ['id' => 'estoy_brava', 'label' => 'Estoy bravo/a'],
                ['id' => 'gustaria_decir_groserias', 'label' => 'Me gustaría decir groserías'],
                ['id' => 'estoy_cabreada', 'label' => 'Estoy cabreado/a'],
                ['id' => 'daria_punnetazos_pared', 'label' => 'Daría puñetazos a la pared'],
                ['id' => 'ganas_maldecir_gritos', 'label' => 'Me dan ganas de maldecir a gritos'],
                ['id' => 'ganas_gritarle_alguien', 'label' => 'Me dan ganas de gritarle a alguien'],
                ['id' => 'quiero_romper_algo', 'label' => 'Quiero romper algo'],
                ['id' => 'ganas_gritar', 'label' => 'Me dan ganas de gritar'],
                ['id' => 'tiraria_alguien', 'label' => 'Le tiraría algo a alguien'],
                ['id' => 'ganas_abofetear_alguien', 'label' => 'Tengo ganas de abofetear a alguien'],
                ['id' => 'gustaria_bronca_alguien', 'label' => 'Me gustaría hacerle la bronca a alguien'],
            ]
        ],
        [
            'id' => 'como_se_siente_normalmente',
            'tipo' => 'checkbox',
            'pregunta_principal' => 'A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique COMO SE SIENTE NORMALMENTE.',
            'preguntas' => [
                ['id' => 'caliento_rapidamente', 'label' => 'Me caliento rápidamente.'],
                ['id' => 'tengo_caracter_irritable', 'label' => 'Tengo un carácter irritable.'],
                ['id' => 'soy_persona_exaltada', 'label' => 'Soy una persona exaltada.'],
                ['id' => 'molesta_bien_reconocen', 'label' => 'Me molesta cuando hago algo bien y no me lo reconocen.'],
                ['id' => 'tiendo_perder_estribos', 'label' => 'Tiendo a perder los estribos.'],
                ['id' => 'furiosa_critiquen_demas', 'label' => 'Me pone furioso/a que me critiquen delante de los demás.'],
                ['id' => 'furiosa_trabajo_valora_poco', 'label' => 'Me siento furioso/a cuando hago un buen trabajo y se me valora poco.'],
                ['id' => 'cabreo_facilidad', 'label' => 'Me cabreo con facilidad.'],
                ['id' => 'enfado_no_salen_cosas_previsto', 'label' => 'Me enfado si no me salen las cosas como tenía previsto.'],
                ['id' => 'enfado_trata_injustamente', 'label' => 'Me enfado cuando se me trata injustamente.'],
                ['id' => 'controlo_temperamento', 'label' => 'Controlo mi temperamento.'],
                ['id' => 'expreso_ira', 'label' => 'Expreso mi ira.'],
                ['id' => 'guardo_para_mi_siento', 'label' => 'Me guardo para mí lo que siento.'],
                ['id' => 'hago_comentarios_ironicos_demas', 'label' => 'Hago comentarios irónicos de los demás.'],
                ['id' => 'mantengo_calma', 'label' => 'Mantengo la calma.'],
                ['id' => 'hago_cosas_dar_portazos', 'label' => 'Hago cosas como dar portazos.'],
                ['id' => 'ardo_dentro_aunque_demuestro', 'label' => 'Ardo por dentro aunque no lo demuestro.'],
                ['id' => 'controlo_comportamiento', 'label' => 'Controlo mi comportamiento.'],
                ['id' => 'discuto_demas', 'label' => 'Discuto con los demás.'],
                ['id' => 'tiendo_tener_rencores_cuento_nadie', 'label' => 'Tiendo a tener rencores que no cuento a nadie.'],
                ['id' => 'puedo_controlarme_perder_estribos', 'label' => 'Puedo controlarme y no perder los estribos.'],
                ['id' => 'estoy_enfadada_quiero_admitir', 'label' => 'Estoy más enfadado/a de lo que quiero admitir.'],
                ['id' => 'digo_barbaridades', 'label' => 'Digo barbaridades.'],
                ['id' => 'irrito_gente_cree', 'label' => 'Me irrito más de lo que la gente se cree.'],
                ['id' => 'pierdo_paciencia', 'label' => 'Pierdo la paciencia.'],
                ['id' => 'controlo_sentimientos_enfado', 'label' => 'Controlo mis sentimientos de enfado.'],
                ['id' => 'evito_encararme_aquello_enfada', 'label' => 'Evito encararme con aquello que me enfada.'],
                ['id' => 'controlo_impulso_sentimientos_ira', 'label' => 'Controlo el impulso de expresar mis sentimientos de ira.'],
                ['id' => 'respiro_profundamente_relajo', 'label' => 'Respiro profundamente y me relajo.'],
                ['id' => 'hago_cosas_contar_hasta_10', 'label' => 'Hago cosas como contar hasta 10.'],
                ['id' => 'trato_relajarme', 'label' => 'Trato de relajarme.'],
                ['id' => 'hago_sosegado_para_calmarme', 'label' => 'Hago algo sosegado para calmarme.'],
                ['id' => 'intento_distraerme_para_pase_enfado', 'label' => 'Intento distraerme para que se me pase el enfado.'],
                ['id' => 'pienso_agradable_tranquilizarme', 'label' => 'Pienso en algo agradable para tranquilizarme.']
            ]
        ],
        [
            'id' => 'actividades_semanales',
            'tipo' => 'checkbox',
            'pregunta_principal' => '¿Cuáles de las siguientes actividades realiza semanalmente?',
            'preguntas' => [
                ['id' => 'preparar_comida', 'label' => 'Preparar la comida'],
                ['id' => 'limpiar_casa', 'label' => 'Limpiar la casa'],
                ['id' => 'limpiar_banno', 'label' => 'Limpiar el baño'],
                ['id' => 'lavar_ropa', 'label' => 'Lavar ropa'],
                ['id' => 'cuidar_hermanas_pequennos_o_hijas', 'label' => 'Cuidar de hermanos/as pequeños o de hijos/as,'],
            ]
        ],
        [
            'id' => 'quienes_participan_actividades',
            'tipo' => 'string',
            'pregunta_principal' => '¿Quiénes participan más frecuentemente en las actividades anteriores?'
        ],
        [
            'id' => 'acuerdo_afirmaciones',
            'tipo' => 'checkbox',
            'pregunta_principal' => 'Marque si está de acuerdo con las siguientes afirmaciones:',
            'preguntas' => [
                ['id' => 'poco_tiempo_hijas_trabajo', 'label' => 'Tengo muy poco tiempo para estar con mis hijos e hijas por razones de trabajo'],
                ['id' => 'trabajar_menos_mas_tiempo_hijos_e_hijas', 'label' => 'Trabajarían menos si eso significara pasar más tiempo con mis hijos e hijas.'],
                ['id' => 'relacion_terminara_miedo_perder_hijas', 'label' => 'Si mi relación de pareja terminara, tendría miedo de perder el contacto con mis hijos/as.'],
                ['id' => 'rol_cuidado_ninnas_principalmente_ayudante', 'label' => 'Mi rol en el cuidado de los niños/as es principalmente como ayudante.'],
                ['id' => 'estoy_actualmente_estresado_por_falta_dinero', 'label' => 'Estoy actualmente estresado por falta de dinero'],
                ['id' => 'tomo_alcohol_vez_semana', 'label' => 'Tomo alcohol más de una vez a la semana.'],
                ['id' => 'ultimo_mes_he_sentido_deprimido', 'label' => 'En el último mes me he sentido deprimido.'],
                ['id' => 'ultimo_anno_hacerme_examenes_medicos', 'label' => 'En el último año he ido a hacerme los exámenes médicos de rutina (colesterol, azúcar).'],
                ['id' => 'ultimo_anno_examenes_enfermedades_sexual', 'label' => 'En el último año he ido a hacerme exámenes por enfermedades de transmisión sexual.'],
            ]
        ],
        [
            'id' => 'casilla_correspondan',
            'tipo' => 'checkbox',
            'pregunta_principal' => 'Lea cada afirmación y marque la casilla que correspondan ',
            'preguntas' => [
                ['id' => 'mujer_hogar_cocinar_familia', 'label' => 'El rol más importante de la mujer es cuidar de su hogar y cocinar para su familia.'],
                ['id' => 'hombres_necesitan_tener_sexo_mujeres', 'label' => 'Los hombres necesitan tener más sexo que las mujeres.'],
                ['id' => 'hombres_hablan_sexo_solo_lo_practican', 'label' => 'Los hombres no hablan de sexo, sólo lo practican.'],
                ['id' => 'mujeres_merecen_ser_golpeadas', 'label' => 'Hay ocasiones en que las mujeres merecen ser golpeadas.'],
                ['id' => 'cuidar_responsabilidad_madre', 'label' => 'Cambiar pañales, bañar y alimentar a los niños y niñas es responsabilidad de la madre.'],
                ['id' => 'responsabilidad_mujer_evitar_embarazada', 'label' => 'Es responsabilidad de la mujer evitar quedar embarazada.'],
                ['id' => 'hombre_tiene_ultima_palabra_hogar', 'label' => 'El hombre debe ser quien tiene la última palabra en las decisiones del hogar.'],
                ['id' => 'hombres_siempre_dispuestos_sexo', 'label' => 'Los hombres siempre están dispuestos para tener sexo.'],
                ['id' => 'mujer_tolerar_pareja_golpea_familia_unida', 'label' => 'Una mujer debería tolerar si su pareja la golpea para mantener a su familia unida.'],
                ['id' => 'indignaria_esposa_pidiera_condon', 'label' => 'Me indignaría si mi esposa me pidiera que use preservativo (condón).'],
                ['id' => 'deberian_decidir_anticoncepcion', 'label' => 'El hombre y la mujer deberían decidir juntos qué tipo de anticoncepción usar.'],
                ['id' => 'jamas_tendria_amigo_gay', 'label' => 'Jamás tendría un amigo homosexual (gay).'],
                ['id' => 'insulta_voy_defender', 'label' => 'Si alguien me insulta, voy a defender mi reputación con la fuerza si es necesario.'],
                ['id' => 'hombre_ser_duro', 'label' => 'Para ser hombre, necesitas ser duro.'],
                ['id' => 'avergonzarse_tener_ereccion', 'label' => 'Los hombres deben de avergonzarse si no pueden tener una erección.'],
                ['id' => 'responsabilidad_bebe_ambos', 'label' => 'Si un joven embaraza a una mujer, la responsabilidad del/a bebé es de ambos.'],
                ['id' => 'saber_gusta_pareja_durante_sexo', 'label' => 'El hombre debería saber qué le gusta a su pareja durante el sexo.'],
                ['id' => 'participacion_padre_importante', 'label' => 'La participación del padre es importante para criar a los hijos(as)'],
                ['id' => 'importante_amigos_hablar_problemas', 'label' => 'Es importante para un hombre tener amigos para hablar de sus problemas.'],
                ['id' => 'decidir_juntas_tener_hijas', 'label' => 'Una pareja debe decidir junta si quieren tener hijos e hijas.'],
                ['id' => 'hombre_decide_tipo_sexo', 'label' => 'Es el hombre quien decide qué tipo de sexo se tiene.'],
                ['id' => 'mujeres_llevan_condones_faciles', 'label' => 'Las mujeres que llevan consigo condones son “fáciles”.'],
                ['id' => 'hombre_necesita_otras_mujeres', 'label' => 'Un hombre necesita de otras mujeres, aun si las cosas con su mujer están bien.'],
                ['id' => 'mujer_infidelidad_golpee', 'label' => 'Si una mujer engaña (infidelidad) a un hombre, está bien que él la golpee.'],
                ['id' => 'correcto_golpear_esposa_sexo', 'label' => 'Está bien para un hombre golpear a su esposa si ella no tiene sexo con él.'],
                ['id' => 'mujer_sugerir_condon', 'label' => 'En mi opinión, una mujer puede sugerir usar condón, así como un hombre.'],
                ['id' => 'deberia_saber_gusta_compannera_sexo', 'label' => 'Un hombre debería saber qué es lo que le gusta a su compañera durante el sexo.'],
                ['id' => 'padre_presente_vida_hijas', 'label' => 'Es importante que un padre esté presente en la vida de sus hijos/as, aun si éste no se encuentra con la madre.'],
                ['id' => 'hombres_cuidar_hijas_tambien', 'label' => 'Los hombres pueden cuidar de sus hijos e hijas también como lo puede hacer una mujer.'],
                ['id' => 'ver_mujer_agredida_intervenir', 'label' => 'Si un hombre ve que una mujer está siendo agredida, él debería intervenir y parar la situación.'],

            ]
        ]
    ];

    function rules() {
        return [
            // ¿Fue referido por alguna institución pública (PANI, Poder Judicial, etc)?,
            'FormPrimero.referido' => 'required|boolean',
            
            // ¿Se enteró de Wem por algunas de las siguientes opciones? 
            'FormPrimero.redes_sociales'            => 'nullable|boolean',
            'FormPrimero.campannas'                 => 'nullable|boolean',
            'FormPrimero.profesionales'             => 'nullable|boolean',
            'FormPrimero.pareja'                    => 'nullable|boolean',
            'FormPrimero.grupo_religioso'           => 'nullable|boolean',
            'FormPrimero.radio'                     => 'nullable|boolean',
            'FormPrimero.instituciones_gobierno'    => 'nullable|boolean',
            'FormPrimero.amiga'                     => 'nullable|boolean',
            'FormPrimero.empresa_privada'           => 'nullable|boolean',
            
            // ¿Cuáles de los siguientes talleres ha llevado? 
            'FormPrimero.enojo' =>          'nullable|boolean',
            'FormPrimero.comunicacion' =>   'nullable|boolean',
            'FormPrimero.celos' =>          'nullable|boolean',
            'FormPrimero.duelo' =>          'nullable|boolean',
            'FormPrimero.infidelidad' =>    'nullable|boolean',
            'FormPrimero.sexualidad' =>     'nullable|boolean',
            'FormPrimero.paternidad' =>     'nullable|boolean',
            
            // Indique si algunas de estas situaciones lo han motivado a asistir al grupo de Wem
            'FormPrimero.problemas_comunicacion'                => 'nullable|boolean',
            'FormPrimero.problemas_medidas_cautelares'          => 'nullable|boolean',
            'FormPrimero.problemas_problemas_hijos'             => 'nullable|boolean',
            'FormPrimero.problemas_manejo_enojo'                => 'nullable|boolean',
            'FormPrimero.problemas_problemas_familiares'        => 'nullable|boolean',
            'FormPrimero.problemas_infidelidad_pareja'          => 'nullable|boolean',
            'FormPrimero.problemas_depresion'                   => 'nullable|boolean',
            'FormPrimero.problemas_celos'                       => 'nullable|boolean',
            'FormPrimero.problemas_infidelidad_hacia_pareja'    => 'nullable|boolean',
            'FormPrimero.problemas_ideacion_suicida'            => 'nullable|boolean',
            'FormPrimero.problemas_separacion_pareja'           => 'nullable|boolean',
            
            // Marque si asiste, en la actualidad, a alguna de las siguientes instituciones educativas (puede seleccionar varias opciones) 
            'FormPrimero.cen_cinai'                     => 'nullable|boolean',
            'FormPrimero.pani'                          => 'nullable|boolean',
            'FormPrimero.cecudi'                        => 'nullable|boolean',
            'FormPrimero.hogar_comunitario'             => 'nullable|boolean',
            'FormPrimero.centro_educación_privado'      => 'nullable|boolean',
            'FormPrimero.centro_educación_regular'      => 'nullable|boolean',
            'FormPrimero.centro_educación_especial'     => 'nullable|boolean',
            
            // A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique CÓMO SE SIENTE AHORA MISMO. 
            'FormPrimero.estoy_furiosa'                 => 'nullable|boolean',
            'FormPrimero.siento_irritada'               => 'nullable|boolean',
            'FormPrimero.siento_enfadada'               => 'nullable|boolean',
            'FormPrimero.pegaria_alguien'               => 'nullable|boolean',
            'FormPrimero.estoy_brava'                   => 'nullable|boolean',
            'FormPrimero.gustaria_decir_groserias'      => 'nullable|boolean',
            'FormPrimero.estoy_cabreada'                => 'nullable|boolean',
            'FormPrimero.daria_punnetazos_pared'        => 'nullable|boolean',
            'FormPrimero.ganas_maldecir_gritos'         => 'nullable|boolean',
            'FormPrimero.ganas_gritarle_alguien'        => 'nullable|boolean',
            'FormPrimero.quiero_romper_algo'            => 'nullable|boolean',
            'FormPrimero.ganas_gritar'                  => 'nullable|boolean',
            'FormPrimero.tiraria_alguien'               => 'nullable|boolean',
            'FormPrimero.ganas_abofetear_alguien'       => 'nullable|boolean',
            'FormPrimero.gustaria_bronca_alguien'       => 'nullable|boolean',
            
            // A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique COMO SE SIENTE NORMALMENTE. 
            'FormPrimero.caliento_rapidamente'                  => 'nullable|boolean',
            'FormPrimero.tengo_caracter_irritable'              => 'nullable|boolean',
            'FormPrimero.soy_persona_exaltada'                  => 'nullable|boolean',
            'FormPrimero.molesta_bien_reconocen'                => 'nullable|boolean',
            'FormPrimero.tiendo_perder_estribos'                => 'nullable|boolean',
            'FormPrimero.furiosa_critiquen_demas'               => 'nullable|boolean',
            'FormPrimero.furiosa_trabajo_valora_poco'           => 'nullable|boolean',
            'FormPrimero.cabreo_facilidad'                      => 'nullable|boolean',
            'FormPrimero.enfado_no_salen_cosas_previsto'        => 'nullable|boolean',
            'FormPrimero.enfado_trata_injustamente'             => 'nullable|boolean',
            'FormPrimero.controlo_temperamento'                 => 'nullable|boolean',
            'FormPrimero.expreso_ira'                           => 'nullable|boolean',
            'FormPrimero.guardo_para_mi_siento'                 => 'nullable|boolean',
            'FormPrimero.hago_comentarios_ironicos_demas'       => 'nullable|boolean',
            'FormPrimero.mantengo_calma'                        => 'nullable|boolean',
            'FormPrimero.hago_cosas_dar_portazos'               => 'nullable|boolean',
            'FormPrimero.ardo_dentro_aunque_demuestro'          => 'nullable|boolean',
            'FormPrimero.controlo_comportamiento'               => 'nullable|boolean',
            'FormPrimero.discuto_demas'                         => 'nullable|boolean',
            'FormPrimero.tiendo_tener_rencores_cuento_nadie'    => 'nullable|boolean',
            'FormPrimero.puedo_controlarme_perder_estribos'     => 'nullable|boolean',
            'FormPrimero.estoy_enfadada_quiero_admitir'         => 'nullable|boolean',
            'FormPrimero.digo_barbaridades'                     => 'nullable|boolean',
            'FormPrimero.irrito_gente_cree'                     => 'nullable|boolean',
            'FormPrimero.pierdo_paciencia'                      => 'nullable|boolean',
            'FormPrimero.controlo_sentimientos_enfado'          => 'nullable|boolean',
            'FormPrimero.evito_encararme_aquello_enfada'        => 'nullable|boolean',
            'FormPrimero.controlo_impulso_sentimientos_ira'     => 'nullable|boolean',
            'FormPrimero.respiro_profundamente_relajo'          => 'nullable|boolean',
            'FormPrimero.hago_cosas_contar_hasta_10'            => 'nullable|boolean',
            'FormPrimero.trato_relajarme'                       => 'nullable|boolean',
            'FormPrimero.hago_sosegado_para_calmarme'           => 'nullable|boolean',
            'FormPrimero.intento_distraerme_para_pase_enfado'   => 'nullable|boolean',
            'FormPrimero.pienso_agradable_tranquilizarme'       => 'nullable|boolean',
            
            // ¿Cuáles de las siguientes actividades realiza semanalmente? 
            'FormPrimero.preparar_comida'                       => 'nullable|boolean',
            'FormPrimero.limpiar_casa'                          => 'nullable|boolean',
            'FormPrimero.limpiar_banno'                         => 'nullable|boolean',
            'FormPrimero.lavar_ropa'                            => 'nullable|boolean',
            'FormPrimero.cuidar_hermanas_pequennos_o_hijas'     => 'nullable|boolean',
            
            // ¿Quiénes participan más frecuentemente en las actividades anteriores?
            'FormPrimero.quienes_participan_actividades'        => 'required|string',
            
            // Marque si está de acuerdo con las siguientes afirmaciones: 
            'FormPrimero.poco_tiempo_hijas_trabajo'                     => 'nullable|boolean',
            'FormPrimero.trabajar_menos_mas_tiempo_hijos_e_hijas'       => 'nullable|boolean',
            'FormPrimero.relacion_terminara_miedo_perder_hijas'         => 'nullable|boolean',
            'FormPrimero.rol_cuidado_ninnas_principalmente_ayudante'    => 'nullable|boolean',
            'FormPrimero.estoy_actualmente_estresado_por_falta_dinero'  => 'nullable|boolean',
            'FormPrimero.tomo_alcohol_vez_semana'                       => 'nullable|boolean',
            'FormPrimero.ultimo_mes_he_sentido_deprimido'               => 'nullable|boolean',
            'FormPrimero.ultimo_anno_hacerme_examenes_medicos'          => 'nullable|boolean',
            'FormPrimero.ultimo_anno_examenes_enfermedades_sexual'      => 'nullable|boolean',
            
            // Lea cada afirmación y marque la casilla que correspondan 
            'FormPrimero.mujer_hogar_cocinar_familia'               => 'nullable|boolean',
            'FormPrimero.hombres_necesitan_tener_sexo_mujeres'      => 'nullable|boolean',
            'FormPrimero.hombres_hablan_sexo_solo_lo_practican'     => 'nullable|boolean',
            'FormPrimero.mujeres_merecen_ser_golpeadas'             => 'nullable|boolean',
            'FormPrimero.cuidar_responsabilidad_madre'              => 'nullable|boolean',
            'FormPrimero.responsabilidad_mujer_evitar_embarazada'   => 'nullable|boolean',
            'FormPrimero.hombre_tiene_ultima_palabra_hogar'         => 'nullable|boolean',
            'FormPrimero.hombres_siempre_dispuestos_sexo'           => 'nullable|boolean',
            'FormPrimero.mujer_tolerar_pareja_golpea_familia_unida' => 'nullable|boolean',
            'FormPrimero.indignaria_esposa_pidiera_condon'          => 'nullable|boolean',
            'FormPrimero.deberian_decidir_anticoncepcion'           => 'nullable|boolean',
            'FormPrimero.jamas_tendria_amigo_gay'                   => 'nullable|boolean',
            'FormPrimero.insulta_voy_defender'                      => 'nullable|boolean',
            'FormPrimero.hombre_ser_duro'                           => 'nullable|boolean',
            'FormPrimero.avergonzarse_tener_ereccion'               => 'nullable|boolean',
            'FormPrimero.responsabilidad_bebe_ambos'                => 'nullable|boolean',
            'FormPrimero.saber_gusta_pareja_durante_sexo'           => 'nullable|boolean',
            'FormPrimero.participacion_padre_importante'            => 'nullable|boolean',
            'FormPrimero.importante_amigos_hablar_problemas'        => 'nullable|boolean',
            'FormPrimero.decidir_juntas_tener_hijas'                => 'nullable|boolean',
            'FormPrimero.hombre_decide_tipo_sexo'                   => 'nullable|boolean',
            'FormPrimero.mujeres_llevan_condones_faciles'           => 'nullable|boolean',
            'FormPrimero.hombre_necesita_otras_mujeres'             => 'nullable|boolean',
            'FormPrimero.mujer_infidelidad_golpee'                  => 'nullable|boolean',
            'FormPrimero.correcto_golpear_esposa_sexo'              => 'nullable|boolean',
            'FormPrimero.mujer_sugerir_condon'                      => 'nullable|boolean',
            'FormPrimero.deberia_saber_gusta_compannera_sexo'       => 'nullable|boolean',
            'FormPrimero.padre_presente_vida_hijas'                 => 'nullable|boolean',
            'FormPrimero.hombres_cuidar_hijas_tambien'              => 'nullable|boolean',
            'FormPrimero.ver_mujer_agredida_intervenir'             => 'nullable|boolean',
    
        ];
    }

    public function mount()
    {
        if (!session()->get('hombre_id')) {
            return redirect()->route('welcome');
        }
        
        $this->hombre_id = session()->get('hombre_id');
        $this->Hombre = Hombre::find($this->hombre_id);

        if ($this->Hombre) {
            if ($this->Hombre->form_primero == 'sin_iniciar') {
                $this->FormPrimero ??= new FormPrimero();
                $this->FormPrimero->hombre_id = $this->hombre_id;
                $this->Hombre->form_primero = 'editando';
                $this->FormPrimero->save();
                $this->Hombre->save();
            } else if ($this->Hombre->form_primero == 'editando') {
                $this->FormPrimero ??= FormPrimero::where('hombre_id', $this->hombre_id)->firstOrFail();
            }
        }
        
    }
    
    public function render()
    {   
        return view('livewire.forms.primero')
            ->extends('layouts.app')
            ->section('content')
            ->layoutData(['titulo' => 'Formulario Primer ingreso',]);
    }
  
    public function updated($input)
    {
        $this->validateOnly($input);
        $this->FormPrimero->save();
    }

    public function finalizar()
    {
        session()->flash('datos_invalidos', 'Algunos campos necesitan atención');
        $this->validate();
        $this->FormPrimero->save();
        $this->Hombre->form_primero = 'finalizado';
        $this->Hombre->save();
        return redirect()->to('/hombre-show');
    }
}
