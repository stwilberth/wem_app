<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPrimerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('form_primeros', function (Blueprint $t) {//tabla
            $t->id();
            $t->timestamps();
            $t->foreignId('hombre_id')->references('id')->on('users');
            
            // ¿Cuál es tu estado civil? *
            $t->enum('estado_civil',                ['soltero', 'casado', 'union_libre', 'divorciado', 'viudo']);
            //¿Fue referido por alguna institución pública (PANI, Poder Judicial, etc)?,
            $t->boolean('referido');
            // ¿Se enteró de Wem por algunas de las siguientes opciones? 
            $t->boolean('redes_sociales')->default(0);         // Redes sociales
            $t->boolean('campannas')->default(0);              // Campañas (Lazo Blanco, Salud masculina o Paternidades),
            $t->boolean('profesionales')->default(0);          // Profesionales en psicología o trabajo social,
            $t->boolean('pareja')->default(0);                 // Pareja,
            $t->boolean('grupo_religioso')->default(0);        // Grupo Religioso,
            $t->boolean('radio')->default(0);                  // Radio,
            $t->boolean('instituciones_gobierno')->default(0); // Instituciones de Gobierno,
            $t->boolean('amiga')->default(0);                  // Amigo/a,
            $t->boolean('empresa_privada')->default(0);        // Empresa privada,
            //¿Cuáles de los siguientes talleres ha llevado? 
            $t->boolean('enojo')->default(0);                   //Manejo del enojo
            $t->boolean('comunicacion')->default(0);            //Comunicación Asertiva
            $t->boolean('celos')->default(0);                   // Celos
            $t->boolean('duelo')->default(0);                   // Duelo
            $t->boolean('infidelidad')->default(0);             // Infidelidad
            $t->boolean('sexualidad')->default(0);              // Sexualidad
            $t->boolean('paternidad')->default(0);              // Paternidad            
            // Indique si algunas de estas situaciones lo han motivado a asistir al grupo de Wem
            $t->boolean('problemas_comunicacion')->default(0);                 // Problemas de comunicación
            $t->boolean('problemas_medidas_cautelares')->default(0);           // Medidas de restricción o medidas cautelares
            $t->boolean('problemas_problemas_hijos')->default(0);              // Problemas con los hijos/as
            $t->boolean('problemas_manejo_enojo')->default(0);                 // Manejo del enojo
            $t->boolean('problemas_problemas_familiares')->default(0);         // Problemas con familiares
            $t->boolean('problemas_infidelidad_pareja')->default(0);           // Infidelidad de la pareja
            $t->boolean('problemas_depresion')->default(0);                    // Depresión
            $t->boolean('problemas_celos')->default(0);                        // Celos
            $t->boolean('problemas_infidelidad_hacia_pareja')->default(0);     // Infidelidad hacia la pareja
            $t->boolean('problemas_ideacion_suicida')->default(0);             // Ideación suicida
            $t->boolean('problemas_separacion_pareja')->default(0);            // Separación de pareja
            //Marque si asiste, en la actualidad, a alguna de las siguientes instituciones educativas (puede seleccionar varias opciones) 
            $t->boolean('cen_cinai')->default(0);                   // CEN-CINAI
            $t->boolean('pani')->default(0);                        // PANI
            $t->boolean('cecudi')->default(0);                      // CECUDI
            $t->boolean('hogar_comunitario')->default(0);           // Hogar Comunitario
            $t->boolean('centro_educación_privado')->default(0);    // Centro de Educación Privado
            $t->boolean('centro_educación_regular')->default(0);    // Centro de Educación Regular
            $t->boolean('centro_educación_especial')->default(0);   // Centro de Educación Especial
            // A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique CÓMO SE SIENTE AHORA MISMO. 
            $t->boolean('estoy_furiosa')->default(0);    //  Estoy furioso/a
            $t->boolean('siento_irritada')->default(0);    //  Me siento irritado/a
            $t->boolean('siento_enfadada')->default(0);    //  Me siento enfadado/a
            $t->boolean('pegaria_alguien')->default(0);    //  Le pegaría a alguien
            $t->boolean('estoy_brava')->default(0);    //  Estoy bravo/a
            $t->boolean('gustaria_decir_groserias')->default(0);    //  Me gustaría decir groserías
            $t->boolean('estoy_cabreada')->default(0);    //  Estoy cabreado/a
            $t->boolean('daria_punnetazos_pared')->default(0);    //  Daría puñetazos a la pared
            $t->boolean('ganas_maldecir_gritos')->default(0);    //  Me dan ganas de maldecir a gritos
            $t->boolean('ganas_gritarle_alguien')->default(0);    //  Me dan ganas de gritarle a alguien
            $t->boolean('quiero_romper_algo')->default(0);    //  Quiero romper algo
            $t->boolean('ganas_gritar')->default(0);    //  Me dan ganas de gritar
            $t->boolean('tiraria_alguien')->default(0);    //  Le tiraría algo a alguien
            $t->boolean('ganas_abofetear_alguien')->default(0);    //  Tengo ganas de abofetear a alguien
            $t->boolean('gustaria_bronca_alguien')->default(0);    //  Me gustaría hacerle la bronca a alguien
            // A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique COMO SE SIENTE NORMALMENTE. 
            $t->boolean('caliento_rapidamente')->default(0);    //  Me caliento rápidamente.
            $t->boolean('tengo_caracter_irritable')->default(0);    //  Tengo un carácter irritable.
            $t->boolean('soy_persona_exaltada')->default(0);    //  Soy una persona exaltada.
            $t->boolean('molesta_bien_reconocen')->default(0);    //  Me molesta cuando hago algo bien y no me lo reconocen.
            $t->boolean('tiendo_perder_estribos')->default(0);    //  Tiendo a perder los estribos.
            $t->boolean('furiosa_critiquen_demas')->default(0);    //  Me pone furioso/a que me critiquen delante de los demás.
            $t->boolean('furiosa_trabajo_valora_poco')->default(0);    //  Me siento furioso/a cuando hago un buen trabajo y se me valora poco.
            $t->boolean('cabreo_facilidad')->default(0);    //  Me cabreo con facilidad.
            $t->boolean('enfado_no_salen_cosas_previsto')->default(0);    //  Me enfado si no me salen las cosas como tenía previsto.
            $t->boolean('enfado_trata_injustamente')->default(0);    //  Me enfado cuando se me trata injustamente.
            $t->boolean('controlo_temperamento')->default(0);    //  Controlo mi temperamento.
            $t->boolean('expreso_ira')->default(0);    //  Expreso mi ira.
            $t->boolean('guardo_para_mi_siento')->default(0);    //  Me guardo para mí lo que siento.
            $t->boolean('hago_comentarios_ironicos_demas')->default(0);    //  Hago comentarios irónicos de los demás.
            $t->boolean('mantengo_calma')->default(0);    //  Mantengo la calma.
            $t->boolean('hago_cosas_dar_portazos')->default(0);    //  Hago cosas como dar portazos.
            $t->boolean('ardo_dentro_aunque_demuestro')->default(0);    //  Ardo por dentro aunque no lo demuestro.
            $t->boolean('controlo_comportamiento')->default(0);    //  Controlo mi comportamiento.
            $t->boolean('discuto_demas')->default(0);    //  Discuto con los demás.
            $t->boolean('tiendo_tener_rencores_cuento_nadie')->default(0);    //  Tiendo a tener rencores que no cuento a nadie.
            $t->boolean('puedo_controlarme_perder_estribos')->default(0);    //  Puedo controlarme y no perder los estribos.
            $t->boolean('estoy_enfadada_quiero_admitir')->default(0);    //  Estoy más enfadado/a de lo que quiero admitir.
            $t->boolean('digo_barbaridades')->default(0);    //  Digo barbaridades.
            $t->boolean('irrito_gente_cree')->default(0);    //  Me irrito más de lo que la gente se cree.
            $t->boolean('pierdo_paciencia')->default(0);    //  Pierdo la paciencia.
            $t->boolean('controlo_sentimientos_enfado')->default(0);    //  Controlo mis sentimientos de enfado.
            $t->boolean('evito_encararme_aquello_enfada')->default(0);    //  Evito encararme con aquello que me enfada.
            $t->boolean('controlo_impulso_sentimientos_ira')->default(0);    //  Controlo el impulso de expresar mis sentimientos de ira.
            $t->boolean('respiro_profundamente_relajo')->default(0);    //  Respiro profundamente y me relajo.
            $t->boolean('hago_cosas_contar_hasta_10')->default(0);    //  Hago cosas como contar hasta 10.
            $t->boolean('trato_relajarme')->default(0);    //  Trato de relajarme.
            $t->boolean('hago_sosegado_para_calmarme')->default(0);    //  Hago algo sosegado para calmarme.
            $t->boolean('intento_distraerme_para_pase_enfado')->default(0);    //  Intento distraerme para que se me pase el enfado.
            $t->boolean('pienso_agradable_tranquilizarme')->default(0);    //  Pienso en algo agradable para tranquilizarme.
            // ¿Cuáles de las siguientes actividades realiza semanalmente? 
            $t->boolean('preparar_comida')->default(0);    //     Preparar la comida
            $t->boolean('limpiar_casa')->default(0);    //     Limpiar la casa
            $t->boolean('limpiar_banno')->default(0);    //     Limpiar el baño
            $t->boolean('lavar_ropa')->default(0);    //     Lavar ropa
            $t->boolean('cuidar_hermanas_pequennos_o_hijas')->default(0);    //     Cuidar de hermanos/as pequeños o de hijos/as,
            // ¿Quiénes participan más frecuentemente en las actividades anteriores?
            $t->string('quienes_participan_actividades');
            // Marque si está de acuerdo con las siguientes afirmaciones: 
            $t->boolean('poco_tiempo_hijas_trabajo')->default(0);    //     Tengo muy poco tiempo para estar con mis hijos e hijas por razones de trabajo
            $t->boolean('trabajar_menos_mas_tiempo_hijos_e_hijas')->default(0);    //     Trabajarían menos si eso significara pasar más tiempo con mis hijos e hijas.
            $t->boolean('relacion_terminara_miedo_perder_hijas')->default(0);    //     Si mi relación de pareja terminara, tendría miedo de perder el contacto con mis hijos/as.
            $t->boolean('rol_cuidado_ninnas_principalmente_ayudante')->default(0);    //     Mi rol en el cuidado de los niños/as es principalmente como ayudante.
            $t->boolean('estoy_actualmente_estresado_por_falta_dinero')->default(0);    //     Estoy actualmente estresado por falta de dinero
            $t->boolean('tomo_alcohol_vez_semana')->default(0);    //     Tomo alcohol más de una vez a la semana.
            $t->boolean('ultimo_mes_he_sentido_deprimido')->default(0);    //     En el último mes me he sentido deprimido.
            $t->boolean('ultimo_anno_hacerme_examenes_medicos')->default(0);    //     En el último año he ido a hacerme los exámenes médicos de rutina (colesterol, azúcar).
            $t->boolean('ultimo_anno_examenes_enfermedades_sexual')->default(0);    //     En el último año he ido a hacerme exámenes por enfermedades de transmisión sexual.
            // Lea cada afirmación y marque la casilla que correspondan 
            $t->boolean('mujer_hogar_cocinar_familia')->default(0);    //     El rol más importante de la mujer es cuidar de su hogar y cocinar para su familia.
            $t->boolean('hombres_necesitan_tener_sexo_mujeres')->default(0);    //     Los hombres necesitan tener más sexo que las mujeres.
            $t->boolean('hombres_hablan_sexo_solo_lo_practican')->default(0);    //     Los hombres no hablan de sexo, sólo lo practican.
            $t->boolean('mujeres_merecen_ser_golpeadas')->default(0);    //     Hay ocasiones en que las mujeres merecen ser golpeadas.
            $t->boolean('cuidar_responsabilidad_madre')->default(0);    //     Cambiar pañales, bañar y alimentar a los niños y niñas es responsabilidad de la madre.
            $t->boolean('responsabilidad_mujer_evitar_embarazada')->default(0);    //     Es responsabilidad de la mujer evitar quedar embarazada.
            $t->boolean('hombre_tiene_ultima_palabra_hogar')->default(0);    //     El hombre debe ser quien tiene la última palabra en las decisiones del hogar.
            $t->boolean('hombres_siempre_dispuestos_sexo')->default(0);    //     Los hombres siempre están dispuestos para tener sexo.
            $t->boolean('mujer_tolerar_pareja_golpea_familia_unida')->default(0);    //     Una mujer debería tolerar si su pareja la golpea para mantener a su familia unida.
            $t->boolean('indignaria_esposa_pidiera_condon')->default(0);    //     Me indignaría si mi esposa me pidiera que use preservativo (condón).
            $t->boolean('deberian_decidir_anticoncepcion')->default(0);    //     El hombre y la mujer deberían decidir juntos qué tipo de anticoncepción usar.
            $t->boolean('jamas_tendria_amigo_gay')->default(0);    //     Jamás tendría un amigo homosexual (gay).
            $t->boolean('insulta_voy_defender')->default(0);    //     Si alguien me insulta, voy a defender mi reputación con la fuerza si es necesario.
            $t->boolean('hombre_ser_duro')->default(0);    //     Para ser hombre, necesitas ser duro.
            $t->boolean('avergonzarse_tener_ereccion')->default(0);    //     Los hombres deben de avergonzarse si no pueden tener una erección.
            $t->boolean('responsabilidad_bebe_ambos')->default(0);    //     Si un joven embaraza a una mujer, la responsabilidad del/a bebé es de ambos.
            $t->boolean('saber_gusta_pareja_durante_sexo')->default(0);    //     El hombre debería saber qué le gusta a su pareja durante el sexo.
            $t->boolean('participacion_padre_importante')->default(0);    //     La participación del padre es importante para criar a los hijos(as)
            $t->boolean('importante_amigos_hablar_problemas')->default(0);    //     Es importante para un hombre tener amigos para hablar de sus problemas.
            $t->boolean('decidir_juntas_tener_hijas')->default(0);    //     Una pareja debe decidir junta si quieren tener hijos e hijas.
            $t->boolean('hombre_decide_tipo_sexo')->default(0);    //     Es el hombre quien decide qué tipo de sexo se tiene.
            $t->boolean('mujeres_llevan_condones_faciles')->default(0);    //     Las mujeres que llevan consigo condones son “fáciles”.
            $t->boolean('hombre_necesita_otras_mujeres')->default(0);    //     Un hombre necesita de otras mujeres, aun si las cosas con su mujer están bien.
            $t->boolean('mujer_infidelidad_golpee')->default(0);    //     Si una mujer engaña (infidelidad) a un hombre, está bien que él la golpee.
            $t->boolean('correcto_golpear_esposa_sexo')->default(0);    //     Está bien para un hombre golpear a su esposa si ella no tiene sexo con él.
            $t->boolean('mujer_sugerir_condon')->default(0);    //     En mi opinión, una mujer puede sugerir usar condón, así como un hombre.
            $t->boolean('deberia_saber_gusta_compannera_sexo')->default(0);    //     Un hombre debería saber qué es lo que le gusta a su compañera durante el sexo.
            $t->boolean('padre_presente_vida_hijas')->default(0);    //     Es importante que un padre esté presente en la vida de sus hijos/as, aun si éste no se encuentra con la madre.
            $t->boolean('hombres_cuidar_hijas_tambien')->default(0);    //     Los hombres pueden cuidar de sus hijos e hijas también como lo puede hacer una mujer.
            $t->boolean('ver_mujer_agredida_intervenir')->default(0);    //     Si un hombre ve que una mujer está siendo agredida, él debería intervenir y parar la situación.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_primeros');
    }
}
