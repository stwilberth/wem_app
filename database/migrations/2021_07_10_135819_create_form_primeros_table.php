<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormPrimerosTable extends Migration
{
    public function up()
    {

        Schema::create('form_primeros', function (Blueprint $t) {//tabla
            $t->id();
            $t->timestamps();
            $t->enum('estado_civil',  ['soltero', 'casado', 'union_libre', 'divorciado', 'viudo'])->default('soltero')->nullable(); // ¿Cuál es tu estado civil? *
            $t->boolean('tiene_pareja')->nullable();            // ¿Tiene pareja en este momento?,
            $t->boolean('vive_con_ella')->nullable();           // ¿Si tiene pareja, está conviviendo con ella?,
            $t->boolean('referido')->nullable();                            // ¿Fue referido por alguna institución pública (PANI, Poder Judicial, etc)?,
            //¿Se enteró de Wem por algunas de las siguientes opciones? 
            $t->boolean('redes_sociales')->nullable();         // Redes sociales
            $t->boolean('campannas')->nullable();              // Campañas (Lazo Blanco, Salud masculina o Paternidades),
            $t->boolean('profesionales')->nullable();          // Profesionales en psicología o trabajo social,
            $t->boolean('pareja')->nullable();                 // Pareja,
            $t->boolean('grupo_religioso')->nullable();        // Grupo Religioso,
            $t->boolean('radio')->nullable();                  // Radio,
            $t->boolean('instituciones_gobierno')->nullable(); // Instituciones de Gobierno,
            $t->boolean('amiga')->nullable();                  // Amigo/a,
            $t->boolean('empresa_privada')->nullable();        // Empresa privada,
            //¿Cuáles de los siguientes talleres ha llevado? 
            $t->boolean('enojo')->nullable();                   // Manejo del enojo
            $t->boolean('comunicacion')->nullable();            // Comunicación Asertiva
            $t->boolean('celos')->nullable();                   // Celos
            $t->boolean('duelo')->nullable();                   // Duelo
            $t->boolean('infidelidad')->nullable();             // Infidelidad
            $t->boolean('sexualidad')->nullable();              // Sexualidad
            $t->boolean('paternidad')->nullable();              // Paternidad            
            //Indique si algunas de estas situaciones lo han motivado a asistir al grupo de Wem
            $t->boolean('problemas_comunicacion')->nullable();                 // Problemas de comunicación
            $t->boolean('problemas_medidas_cautelares')->nullable();           // Medidas de restricción o medidas cautelares
            $t->boolean('problemas_problemas_hijos')->nullable();              // Problemas con los hijos/as
            $t->boolean('problemas_manejo_enojo')->nullable();                 // Manejo del enojo
            $t->boolean('problemas_problemas_familiares')->nullable();         // Problemas con familiares
            $t->boolean('problemas_infidelidad_pareja')->nullable();           // Infidelidad de la pareja
            $t->boolean('problemas_depresion')->nullable();                    // Depresión
            $t->boolean('problemas_celos')->nullable();                        // Celos
            $t->boolean('problemas_infidelidad_hacia_pareja')->nullable();     // Infidelidad hacia la pareja
            $t->boolean('problemas_ideacion_suicida')->nullable();             // Ideación suicida
            $t->boolean('problemas_separacion_pareja')->nullable();            // Separación de pareja
            //Marque si asiste, en la actualidad, a alguna de las siguientes instituciones educativas (puede seleccionar varias opciones) 
            $t->boolean('cen_cinai')->nullable();                   // CEN-CINAI
            $t->boolean('pani')->nullable();                        // PANI
            $t->boolean('cecudi')->nullable();                      // CECUDI
            $t->boolean('hogar_comunitario')->nullable();           // Hogar Comunitario
            $t->boolean('centro_educación_privado')->nullable();    // Centro de Educación Privado
            $t->boolean('centro_educación_regular')->nullable();    // Centro de Educación Regular
            $t->boolean('centro_educación_especial')->nullable();   // Centro de Educación Especial
            //A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique CÓMO SE SIENTE AHORA MISMO. 
            $t->boolean('estoy_furiosa')->nullable();    // Estoy furioso/a
            $t->boolean('siento_irritada')->nullable();    // Me siento irritado/a
            $t->boolean('siento_enfadada')->nullable();    // Me siento enfadado/a
            $t->boolean('pegaria_alguien')->nullable();    // Le pegaría a alguien
            $t->boolean('estoy_brava')->nullable();    // Estoy bravo/a
            $t->boolean('gustaria_decir_groserias')->nullable();    // Me gustaría decir groserías
            $t->boolean('estoy_cabreada')->nullable();    // Estoy cabreado/a
            $t->boolean('daria_punnetazos_pared')->nullable();    // Daría puñetazos a la pared
            $t->boolean('ganas_maldecir_gritos')->nullable();    // Me dan ganas de maldecir a gritos
            $t->boolean('ganas_gritarle_alguien')->nullable();    // Me dan ganas de gritarle a alguien
            $t->boolean('quiero_romper_algo')->nullable();    // Quiero romper algo
            $t->boolean('ganas_gritar')->nullable();    // Me dan ganas de gritar
            $t->boolean('tiraria_alguien')->nullable();    // Le tiraría algo a alguien
            $t->boolean('ganas_abofetear_alguien')->nullable();    // Tengo ganas de abofetear a alguien
            $t->boolean('gustaria_bronca_alguien')->nullable();    // Me gustaría hacerle la bronca a alguien
            // A continuación, se presentan una serie de afirmaciones que la gente usa para describirse a sí misma. Lea cada afirmación y marque la respuesta que mejor indique COMO SE SIENTE NORMALMENTE. 
            $t->boolean('caliento_rapidamente')->nullable();    // Me caliento rápidamente.
            $t->boolean('tengo_caracter_irritable')->nullable();    // Tengo un carácter irritable.
            $t->boolean('soy_persona_exaltada')->nullable();    // Soy una persona exaltada.
            $t->boolean('molesta_bien_reconocen')->nullable();    // Me molesta cuando hago algo bien y no me lo reconocen.
            $t->boolean('tiendo_perder_estribos')->nullable();    // Tiendo a perder los estribos.
            $t->boolean('furiosa_critiquen_demas')->nullable();    // Me pone furioso/a que me critiquen delante de los demás.
            $t->boolean('furiosa_trabajo_valora_poco')->nullable();    // Me siento furioso/a cuando hago un buen trabajo y se me valora poco.
            $t->boolean('cabreo_facilidad')->nullable();    // Me cabreo con facilidad.
            $t->boolean('enfado_no_salen_cosas_previsto')->nullable();    // Me enfado si no me salen las cosas como tenía previsto.
            $t->boolean('enfado_trata_injustamente')->nullable();    // Me enfado cuando se me trata injustamente.
            $t->boolean('controlo_temperamento')->nullable();    // Controlo mi temperamento.
            $t->boolean('expreso_ira')->nullable();    // Expreso mi ira.
            $t->boolean('guardo_para_mi_siento')->nullable();    // Me guardo para mí lo que siento.
            $t->boolean('hago_comentarios_ironicos_demas')->nullable();    // Hago comentarios irónicos de los demás.
            $t->boolean('mantengo_calma')->nullable();    // Mantengo la calma.
            $t->boolean('hago_cosas_dar_portazos')->nullable();    // Hago cosas como dar portazos.
            $t->boolean('ardo_dentro_aunque_demuestro')->nullable();    // Ardo por dentro aunque no lo demuestro.
            $t->boolean('controlo_comportamiento')->nullable();    // Controlo mi comportamiento.
            $t->boolean('discuto_demas')->nullable();    // Discuto con los demás.
            $t->boolean('tiendo_tener_rencores_cuento_nadie')->nullable();    // Tiendo a tener rencores que no cuento a nadie.
            $t->boolean('puedo_controlarme_perder_estribos')->nullable();    // Puedo controlarme y no perder los estribos.
            $t->boolean('estoy_enfadada_quiero_admitir')->nullable();    // Estoy más enfadado/a de lo que quiero admitir.
            $t->boolean('digo_barbaridades')->nullable();    // Digo barbaridades.
            $t->boolean('irrito_gente_cree')->nullable();    // Me irrito más de lo que la gente se cree.
            $t->boolean('pierdo_paciencia')->nullable();    // Pierdo la paciencia.
            $t->boolean('controlo_sentimientos_enfado')->nullable();    // Controlo mis sentimientos de enfado.
            $t->boolean('evito_encararme_aquello_enfada')->nullable();    // Evito encararme con aquello que me enfada.
            $t->boolean('controlo_impulso_sentimientos_ira')->nullable();    // Controlo el impulso de expresar mis sentimientos de ira.
            $t->boolean('respiro_profundamente_relajo')->nullable();    // Respiro profundamente y me relajo.
            $t->boolean('hago_cosas_contar_hasta_10')->nullable();    // Hago cosas como contar hasta 10.
            $t->boolean('trato_relajarme')->nullable();    // Trato de relajarme.
            $t->boolean('hago_sosegado_para_calmarme')->nullable();    // Hago algo sosegado para calmarme.
            $t->boolean('intento_distraerme_para_pase_enfado')->nullable();    // Intento distraerme para que se me pase el enfado.
            $t->boolean('pienso_agradable_tranquilizarme')->nullable();    // Pienso en algo agradable para tranquilizarme.
            //¿Cuáles de las siguientes actividades realiza semanalmente? 
            $t->boolean('preparar_comida')->nullable();    // Preparar la comida
            $t->boolean('limpiar_casa')->nullable();    // Limpiar la casa
            $t->boolean('limpiar_banno')->nullable();    // Limpiar el baño
            $t->boolean('lavar_ropa')->nullable();    // Lavar ropa
            $t->boolean('cuidar_hermanas_pequennos_o_hijas')->nullable();    // Cuidar de hermanos/as pequeños o de hijos/as,
            $t->string('quienes_participan_actividades')->nullable();   // ¿Quiénes participan más frecuentemente en las actividades anteriores?
            //Marque si está de acuerdo con las siguientes afirmaciones: 
            $t->boolean('poco_tiempo_hijas_trabajo')->nullable();    // Tengo muy poco tiempo para estar con mis hijos e hijas por razones de trabajo
            $t->boolean('trabajar_menos_mas_tiempo_hijos_e_hijas')->nullable();    // Trabajarían menos si eso significara pasar más tiempo con mis hijos e hijas.
            $t->boolean('relacion_terminara_miedo_perder_hijas')->nullable();    // Si mi relación de pareja terminara, tendría miedo de perder el contacto con mis hijos/as.
            $t->boolean('rol_cuidado_ninnas_principalmente_ayudante')->nullable();    // Mi rol en el cuidado de los niños/as es principalmente como ayudante.
            $t->boolean('estoy_actualmente_estresado_por_falta_dinero')->nullable();    // Estoy actualmente estresado por falta de dinero
            $t->boolean('tomo_alcohol_vez_semana')->nullable();    // Tomo alcohol más de una vez a la semana.
            $t->boolean('ultimo_mes_he_sentido_deprimido')->nullable();    // En el último mes me he sentido deprimido.
            $t->boolean('ultimo_anno_hacerme_examenes_medicos')->nullable();    // En el último año he ido a hacerme los exámenes médicos de rutina (colesterol, azúcar).
            $t->boolean('ultimo_anno_examenes_enfermedades_sexual')->nullable();    // En el último año he ido a hacerme exámenes por enfermedades de transmisión sexual.
            //Lea cada afirmación y marque la casilla que correspondan 
            $t->boolean('mujer_hogar_cocinar_familia')->nullable();    // El rol más importante de la mujer es cuidar de su hogar y cocinar para su familia.
            $t->boolean('hombres_necesitan_tener_sexo_mujeres')->nullable();    // Los hombres necesitan tener más sexo que las mujeres.
            $t->boolean('hombres_hablan_sexo_solo_lo_practican')->nullable();    // Los hombres no hablan de sexo, sólo lo practican.
            $t->boolean('mujeres_merecen_ser_golpeadas')->nullable();    // Hay ocasiones en que las mujeres merecen ser golpeadas.
            $t->boolean('cuidar_responsabilidad_madre')->nullable();    // Cambiar pañales, bañar y alimentar a los niños y niñas es responsabilidad de la madre.
            $t->boolean('responsabilidad_mujer_evitar_embarazada')->nullable();    // Es responsabilidad de la mujer evitar quedar embarazada.
            $t->boolean('hombre_tiene_ultima_palabra_hogar')->nullable();    // El hombre debe ser quien tiene la última palabra en las decisiones del hogar.
            $t->boolean('hombres_siempre_dispuestos_sexo')->nullable();    // Los hombres siempre están dispuestos para tener sexo.
            $t->boolean('mujer_tolerar_pareja_golpea_familia_unida')->nullable();    // Una mujer debería tolerar si su pareja la golpea para mantener a su familia unida.
            $t->boolean('indignaria_esposa_pidiera_condon')->nullable();    // Me indignaría si mi esposa me pidiera que use preservativo (condón).
            $t->boolean('deberian_decidir_anticoncepcion')->nullable();    // El hombre y la mujer deberían decidir juntos qué tipo de anticoncepción usar.
            $t->boolean('jamas_tendria_amigo_gay')->nullable();    // Jamás tendría un amigo homosexual (gay).
            $t->boolean('insulta_voy_defender')->nullable();    // Si alguien me insulta, voy a defender mi reputación con la fuerza si es necesario.
            $t->boolean('hombre_ser_duro')->nullable();    // Para ser hombre, necesitas ser duro.
            $t->boolean('avergonzarse_tener_ereccion')->nullable();    // Los hombres deben de avergonzarse si no pueden tener una erección.
            $t->boolean('responsabilidad_bebe_ambos')->nullable();    // Si un joven embaraza a una mujer, la responsabilidad del/a bebé es de ambos.
            $t->boolean('saber_gusta_pareja_durante_sexo')->nullable();    // El hombre debería saber qué le gusta a su pareja durante el sexo.
            $t->boolean('participacion_padre_importante')->nullable();    // La participación del padre es importante para criar a los hijos(as)
            $t->boolean('importante_amigos_hablar_problemas')->nullable();    // Es importante para un hombre tener amigos para hablar de sus problemas.
            $t->boolean('decidir_juntas_tener_hijas')->nullable();    // Una pareja debe decidir junta si quieren tener hijos e hijas.
            $t->boolean('hombre_decide_tipo_sexo')->nullable();    // Es el hombre quien decide qué tipo de sexo se tiene.
            $t->boolean('mujeres_llevan_condones_faciles')->nullable();    // Las mujeres que llevan consigo condones son “fáciles”.
            $t->boolean('hombre_necesita_otras_mujeres')->nullable();    // Un hombre necesita de otras mujeres, aun si las cosas con su mujer están bien.
            $t->boolean('mujer_infidelidad_golpee')->nullable();    // Si una mujer engaña (infidelidad) a un hombre, está bien que él la golpee.
            $t->boolean('correcto_golpear_esposa_sexo')->nullable();    // Está bien para un hombre golpear a su esposa si ella no tiene sexo con él.
            $t->boolean('mujer_sugerir_condon')->nullable();    // En mi opinión, una mujer puede sugerir usar condón, así como un hombre.
            $t->boolean('deberia_saber_gusta_compannera_sexo')->nullable();    // Un hombre debería saber qué es lo que le gusta a su compañera durante el sexo.
            $t->boolean('padre_presente_vida_hijas')->nullable();    // Es importante que un padre esté presente en la vida de sus hijos/as, aun si éste no se encuentra con la madre.
            $t->boolean('hombres_cuidar_hijas_tambien')->nullable();    // Los hombres pueden cuidar de sus hijos e hijas también como lo puede hacer una mujer.
            $t->boolean('ver_mujer_agredida_intervenir')->nullable();    // Si un hombre ve que una mujer está siendo agredida, él debería intervenir y parar la situación.
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_primeros');
    }
}
