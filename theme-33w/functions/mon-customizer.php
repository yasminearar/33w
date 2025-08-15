<?php

/**
 * Configuration des nouveaux du customizer
 */

function theme_31w_customize_register($wp_customize)
{
    // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
    $wp_customize->add_section('hero_section', array(
        'title' => __('Section Héro - Accueil', 'theme_31w'),
        'priority' => 30,
    ));
    //////////////////////  Auteur
    /* configuration du champ */
    $wp_customize->add_setting('hero_auteur', array(
        'default' => __('Bienvenue sur mon site', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    /* configuration du contrôleur */
    $wp_customize->add_control('hero_auteur', array(
        'label' => __('Auteur ', 'theme_31w'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    ////////////////////// Adresse
    /* configuration du champ */
    $wp_customize->add_setting('hero_adresse', array(
        'default' => __('3800 Sherbrook-est', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    /* configuration du contrôleur */
    $wp_customize->add_control('hero_adresse', array(
        'label' => __('Adresse ', 'theme_31w'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Nombre d’images pour le carrousel (limiteur)
    $wp_customize->add_setting('hero_carousel_count', array(
        'default'           => 3,
        'sanitize_callback' => function ($value) {
            $n = absint($value);
            // borne entre 1 et 10 (adapte à ton besoin)
            if ($n < 1) $n = 1;
            if ($n > 10) $n = 10;
            return $n;
        },
        'transport' => 'postMessage', // Pour une prévisualisation live
    ));

    $wp_customize->add_control('hero_carousel_count', array(
        'label'       => __('Nombre d’images à afficher', 'theme_31w'),
        'description' => __('Limite le nombre d’images du carrousel héro.', 'theme_31w'),
        'section'     => 'hero_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 10,
            'step' => 1,
        ),
    ));



    // Génération dynamique des champs d'images (maximum 10 images)
    // Les champs seront affichés selon le nombre défini dans hero_carousel_count
    for ($i = 0; $i < 10; $i++) {
        // Créer le champ pour chaque image
        $wp_customize->add_setting("hero_background_$i", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        // Créer le contrôleur pour chaque image
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_background_$i", array(
            'label' => sprintf(__('Image %d du carrousel', 'theme_31w'), $i + 1),
            'section' => 'hero_section',
            'active_callback' => function() use ($i) {
                $carousel_count = get_theme_mod('hero_carousel_count', 3);
                return $i < $carousel_count;
            }
        )));
    }



    /////////////////// couleur du texte de la section hero
    ////////////////////// champ couleur
    /* créer le champ */
    $wp_customize->add_setting('hero_couleur', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    /* créer le contrôleur */
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
        'label' => __('Couleur du texte', 'theme_31w'),
        'section' => 'hero_section',
    )));


    ///////////////////////// Ajout du panneau « pied de page »
    // Le code pour ajouter des sections, des réglages et des contrôles ira ici.

    // SECTION Footer
    $wp_customize->add_section('footer_section', array(
        'title' => __('Section Pied de page', 'theme_31w'),
        'priority' => 40,
    ));

    // Champ : Adresse
    $wp_customize->add_setting('footer_adresse', array(
        'default' => __('3800, Sherbrook est, Montréal, Québec, Canada, H1X 2A2', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_adresse', array(
        'label' => __('Adresse', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Champ : Téléphone
    $wp_customize->add_setting('footer_telephone', array(
        'default' => __('514-254-7131', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_telephone', array(
        'label' => __('Téléphone', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Champ : Mission
    $wp_customize->add_setting('footer_mission', array(
        'default' => __('Notre mission est d\'inspirer et d\'informer...', 'theme_31w'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('footer_mission', array(
        'label' => __('Mission du club', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'theme_31w_customize_register');    

