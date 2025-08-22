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

    // NOUVELLE SECTION : Réseaux sociaux configurables

    // Section dédiée aux réseaux sociaux
    $wp_customize->add_section('reseaux_sociaux_section', array(
        'title' => __('Réseaux Sociaux', 'theme_31w'),
        'description' => __('Configurez les icônes et liens des réseaux sociaux qui apparaissent dans le footer', 'theme_31w'),
        'priority' => 45,
    ));

    // Liste des réseaux sociaux disponibles
    $reseaux_sociaux = array(
        'github' => array(
            'label' => 'GitHub',
            'default_url' => 'https://github.com/yasminearar/33w/tree/tp2',
            'icon' => 'github'
        ),
        'facebook' => array(
            'label' => 'Facebook',
            'default_url' => 'https://facebook.com',
            'icon' => 'facebook'
        ),
        'instagram' => array(
            'label' => 'Instagram',
            'default_url' => 'https://instagram.com',
            'icon' => 'instagram'
        ),
        'twitter' => array(
            'label' => 'Twitter/X',
            'default_url' => 'https://twitter.com',
            'icon' => 'twitter'
        ),
        'linkedin' => array(
            'label' => 'LinkedIn',
            'default_url' => 'https://linkedin.com',
            'icon' => 'linkedin'
        ),
        'youtube' => array(
            'label' => 'YouTube',
            'default_url' => 'https://youtube.com',
            'icon' => 'youtube'
        ),
        'tiktok' => array(
            'label' => 'TikTok',
            'default_url' => 'https://tiktok.com',
            'icon' => 'tiktok'
        )
    );

    // Créer les contrôles pour chaque réseau social
    foreach ($reseaux_sociaux as $reseau_id => $reseau_data) {

        // Champ : Activer le réseau social
        $wp_customize->add_setting("social_{$reseau_id}_active", array(
            'default' => ($reseau_id === 'github') ? true : false, // GitHub activé par défaut
            'sanitize_callback' => function($value) {
                return (bool) $value;
            }
        ));

        $wp_customize->add_control("social_{$reseau_id}_active", array(
            'label' => sprintf(__('Afficher %s', 'theme_31w'), $reseau_data['label']),
            'section' => 'reseaux_sociaux_section',
            'type' => 'checkbox',
        ));

        // Champ : URL du réseau social
        $wp_customize->add_setting("social_{$reseau_id}_url", array(
            'default' => $reseau_data['default_url'],
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("social_{$reseau_id}_url", array(
            'label' => sprintf(__('URL %s', 'theme_31w'), $reseau_data['label']),
            'description' => sprintf(__('Lien vers votre profil %s', 'theme_31w'), $reseau_data['label']),
            'section' => 'reseaux_sociaux_section',
            'type' => 'url',
            'active_callback' => function() use ($reseau_id) {
                return get_theme_mod("social_{$reseau_id}_active", false);
            }
        ));
    }

    // Paramètres d'affichage des icônes
    $wp_customize->add_setting('social_couleur', array(
        'default' => '#f5f5dc',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_couleur', array(
        'label' => __('Couleur des icônes', 'theme_31w'),
        'description' => __('Couleur par défaut des icônes de réseaux sociaux', 'theme_31w'),
        'section' => 'reseaux_sociaux_section',
    )));

    // Taille des icônes
    $wp_customize->add_setting('social_taille', array(
        'default' => 32,
        'sanitize_callback' => function($value) {
            $n = absint($value);
            return ($n >= 16 && $n <= 64) ? $n : 32;
        }
    ));

    $wp_customize->add_control('social_taille', array(
        'label' => __('Taille des icônes', 'theme_31w'),
        'description' => __('Taille des icônes en pixels (16-64)', 'theme_31w'),
        'section' => 'reseaux_sociaux_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 16,
            'max' => 64,
            'step' => 2,
        ),
    ));

    // NOUVELLE SECTION : Page d'erreur 404

    // Section dédiée à la page 404
    $wp_customize->add_section('section_404', array(
        'title' => __('Page d\'erreur 404', 'theme_31w'),
        'description' => __('Configuration de la page d\'erreur 404 personnalisée', 'theme_31w'),
        'priority' => 50,
    ));

    // Champ : Image de fond par défaut
    $wp_customize->add_setting('404_background_image', array(
        'default' => get_template_directory_uri() . '/images/ilepalmier.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, '404_background_image', array(
        'label' => __('Image de fond', 'theme_31w'),
        'description' => __('Image de fond pour la page d\'erreur 404', 'theme_31w'),
        'section' => 'section_404',
    )));

    // Champ : Couleur d'arrière-plan des boutons et zone de recherche
    $wp_customize->add_setting('404_background_color', array(
        'default' => '#ba4d1d', // Couleur principale du thème
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, '404_background_color', array(
        'label' => __('Couleur des boutons et recherche', 'theme_31w'),
        'description' => __('Couleur d\'arrière-plan pour les boutons et la zone de recherche', 'theme_31w'),
        'section' => 'section_404',
    )));

    // Champ : Titre de la page d'erreur
    $wp_customize->add_setting('404_title', array(
        'default' => __('Oups ! Page introuvable', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('404_title', array(
        'label' => __('Titre de la page d\'erreur', 'theme_31w'),
        'description' => __('Titre principal affiché sur la page 404', 'theme_31w'),
        'section' => 'section_404',
        'type' => 'text',
    ));

    // Champ : Message d'erreur
    $wp_customize->add_setting('404_message', array(
        'default' => __('La page que vous recherchez semble avoir pris des vacances ! Explorez nos destinations pour planifier votre prochain voyage.', 'theme_31w'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('404_message', array(
        'label' => __('Message d\'erreur', 'theme_31w'),
        'description' => __('Message descriptif affiché sous le titre', 'theme_31w'),
        'section' => 'section_404',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'theme_31w_customize_register');

