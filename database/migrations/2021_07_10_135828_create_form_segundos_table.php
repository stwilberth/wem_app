<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSegundosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_segundos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('hombre_id')->nullable()->constrained();

            $table->enum('form_estado',                      ['sin_iniciar', 'editando', 'finalizado'])->default('sin_iniciar');

            $table->boolean('tiene_pareja')              ->nullable(); //radio_boolean
            $table->boolean('esta_conviviendo_pareja')   ->nullable(); //radio_boolean
            
            $table->enum('estado_civil',                ['soltero', 'casado', 'union_libre', 'divorciado', 'viudo'])->nullable();
            
            $table->boolean('manejo_del_enojo')          ->nullable(); //checbox
            $table->boolean('comunicacion_asertiva')     ->nullable(); //checbox
            $table->boolean('celos')                     ->nullable(); //checbox
            $table->boolean('duelo')                     ->nullable(); //checbox
            $table->boolean('infidelidad')               ->nullable(); //checbox
            $table->boolean('sexualidad')                ->nullable(); //checbox
            $table->boolean('paternidad')                ->nullable(); //checbox

            $table->enum('estoy_furioso_a',             ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('siento_irritado_a',           ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('siento_enfadado_a',           ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('le_pegaria_a_alguien',        ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('estoy_bravo_a',               ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('gustaria_decir_groserias',    ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('estoy_cabreado_a',            ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('daria_punetazos_a_la_pared',  ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('ganas_maldecir_gritos',       ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('ganas_gritarle_alguien',      ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('quiero_romper_algo',          ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('ganas_de_gritar',             ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('tiraria_algo_alguien',        ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('ganas_abofetear_alguien',     ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();
            $table->enum('gustaria_bronca_alguien',     ['no_en_absoluto', 'algo', 'moderadamente', 'mucho'])->nullable();

            $table->enum('caliento_rapidamente',                  ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('tengo_un_caracter_irritable',           ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('soy_una_persona_exaltada',              ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('molesta_cuando_no_lo_reconocen',        ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('tiendo_a_perder_los_estribos',          ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('furioso_critiquen_delante_demas',       ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('hago_un_buen_trabajo_valora_poco',      ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('cabreo_con_facilidad',                  ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('enfado_salen_como_tenia_previsto',      ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('enfado_cuando_trata_injustamente',      ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('controlo_mi_temperamento',              ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('expreso_mi_ira',                        ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('guardo_lo_que_siento',                  ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('hago_comentarios_ironicos_demas',       ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('mantengo_la_calma',                     ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('hago_cosas_como_dar_portazos',          ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('ardo_dentro_no_demuestro',              ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('controlo_mi_comportamiento',            ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('discuto_con_los_demas',                 ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('rencores_que_no_cuento_a_nadie',        ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('puedo_controlarme',                     ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('mas_enfadado_que_quiero_admitir',       ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('digo_barbaridades',                     ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('irrito_mas_gente_cree',                 ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('pierdo_la_paciencia',                   ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('controlo_sentimientos_enfado',          ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('evito_encararlo_enfada',                ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('controlo_impulso_expresar_ira',         ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('respiro_profundamente_relajo',          ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('cuento_hasta_10',                       ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('trato_de_relajarme',                    ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('hago_sosegado_para_calmarme',           ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('distraerel_enfado',                     ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();
            $table->enum('pienso_agradable_tranquilizarme',       ['casi_nunca', 'algunas_veces', 'a_menudo', 'casi_siempre'])->nullable();

            $table->boolean('preparar_la_comida')                 ->nullable();//checkbox
            $table->boolean('limpiar_la_casa')                    ->nullable();//checkbox
            $table->boolean('limpiar_el_bano')                    ->nullable();//checkbox
            $table->boolean('lavar_ropa')                         ->nullable();//checkbox
            $table->boolean('cuidar_hermanas_o_hijas')            ->nullable();//checkbox

            $table->enum('quienes_participan_actividades',       ['usted', 'su_pareja', 'ambos_usted_pareja', 'otra_persona_empleado'])->nullable();

            $table->enum('tiempo_hijas_trabajo',                  ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('trabajaria_menos_tiempo_hijas',         ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('pareja_fin_miedo_sin_contacto_hijas',   ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('rol_cuidado_ninas_ayudante',            ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('estoy_estresado_por_dinero',            ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('alcohol_mas_una_x_semana',              ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('mes_sentido_deprimido',                 ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('examenes_colesterol_azucar',            ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();
            $table->enum('examenes_enfermedades_sexual',          ['de_acuerdo', 'en_desacuerdo', 'no_aplica'])->nullable();

            $table->enum('mujer_hogar_cocinar_familia',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('hombre_mas_sexo_que_mujeres',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('no_habla_sexo_solo_practica',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('ocasiones_mujer_merece_golpe',          ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('panal_alimentar_tarea_madres',          ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('solo_mujer_evitar_embarazada',          ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('hombre_ultima_palabra_hogar',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('hombre_siempre_ispuesto_sexo',          ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('mujer_tolera_golpe_x_familia',          ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('indignar_esposa_pide_condon',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('pareja_decide_anticonceptivo',          ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('jamas_tendria_amigo_homosexual',        ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('defender_reputacion_fuerza',            ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('hombre_necesitas_ser_duro',             ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('hombre_avergonzar_no_ereccion',         ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('embaraza_responsabilidad_ambos',        ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('saber_gusta_pareja_sexo',               ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('el_padre_importante_criar_hijas',       ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('importante_amigos_hablar_problemas',    ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('decidir_junta_quieren_hijas',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('hombre_decide_tipo_sexo_tiene',         ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('mujeres_llevan_condones_faciles',       ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('necesita_mujeres_aun_mujer_bien',       ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('mujer_infidelidad_hombre_golpea',       ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('golpear_esposa_ella_no_sexo',           ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('mujer_puede_sugerir_usar_condon',       ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('saber_que_gusta_companera_en_sexo',     ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('presente_vida_hijas_aun_no_madre',      ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('pueden_cuidar_hijas_como_mujer',        ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
            $table->enum('si_ve_mujer_agredida_intervenir',       ['muy_en_desacuerdo', 'parcialmente_de_acuerdo', 'muy_de_acuerdo'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_segundos');
    }
}
