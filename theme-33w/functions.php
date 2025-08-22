<?php
// Définir le chemin vers le dossier "functions"
$functions_dir = get_template_directory() . '/functions/';

// Inclure les fichiers spécifiques
include_once $functions_dir . 'mon-customizer.php';
include_once $functions_dir . 'configuration-general.php';
include_once $functions_dir . 'composant.php';
include_once $functions_dir . 'carte.php';

// Enregistrer les scripts - identique au thème de référence
function enqueue_destination_assets() {
    wp_enqueue_script('destination', get_template_directory_uri() . '/script/destination.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_destination_assets');

// Inclure d'autres fichiers si nécessaire
// include_once $functions_dir . 'autre-fichier.php';
// include_once $functions_dir . 'encore-un-autre.php';