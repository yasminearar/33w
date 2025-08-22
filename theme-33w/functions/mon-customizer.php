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

    // NOUVELLE FONCTIONNALITÉ : Image de destination pour le footer

    // Champ : Activer l'image de destination
    $wp_customize->add_setting('footer_destination_active', array(
        'default' => true,
        'sanitize_callback' => function($value) {
            return (bool) $value;
        }
    ));

    $wp_customize->add_control('footer_destination_active', array(
        'label' => __('Afficher une image de destination', 'theme_31w'),
        'description' => __('Activer l\'affichage d\'une image de destination dans le footer', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'checkbox',
    ));

    // Champ : Sélection de l'image de destination
    $wp_customize->add_setting('footer_destination_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_destination_image', array(
        'label' => __('Image de destination', 'theme_31w'),
        'description' => __('Choisissez une image de destination à afficher dans le footer', 'theme_31w'),
        'section' => 'footer_section',
        'active_callback' => function() {
            return get_theme_mod('footer_destination_active', true);
        }
    )));

    // Champ : Titre de la destination
    $wp_customize->add_setting('footer_destination_titre', array(
        'default' => __('Destination du mois', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_destination_titre', array(
        'label' => __('Titre de la destination', 'theme_31w'),
        'description' => __('Titre affiché au-dessus de l\'image de destination', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'text',
        'active_callback' => function() {
            return get_theme_mod('footer_destination_active', true);
        }
    ));

    // Champ : Description de la destination
    $wp_customize->add_setting('footer_destination_description', array(
        'default' => __('Découvrez notre destination recommandée pour cette période.', 'theme_31w'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('footer_destination_description', array(
        'label' => __('Description de la destination', 'theme_31w'),
        'description' => __('Courte description de la destination sélectionnée', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'textarea',
        'active_callback' => function() {
            return get_theme_mod('footer_destination_active', true);
        }
    ));

    // Champ : Lien vers la destination
    $wp_customize->add_setting('footer_destination_lien', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('footer_destination_lien', array(
        'label' => __('Lien vers la destination', 'theme_31w'),
        'description' => __('URL vers la page de la destination (optionnel)', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'url',
        'active_callback' => function() {
            return get_theme_mod('footer_destination_active', true);
        }
    ));
}

add_action('customize_register', 'theme_31w_customize_register');

