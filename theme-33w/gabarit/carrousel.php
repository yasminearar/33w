<?php
// Récupérer le nombre d'images défini dans le customizer
$carousel_count = get_theme_mod('hero_carousel_count', 3);

// Images par défaut disponibles dans le dossier images/
$default_images = array(
    'Chine.jpg',
    'Espagne.jpg', 
    'Hoggar.jpg',
    'Malaisie.jpg',
    'Mexique.jpg',
    'Punta-cana.jpg',
    'Suisse.jpg'
);

// Initialiser les images de fond dynamiquement
$hero_background = array();
for ($i = 0; $i < $carousel_count; $i++) {
    // Utiliser l'image configurée dans WordPress ou une image par défaut du dossier
    $default_image = isset($default_images[$i]) ? get_template_directory_uri() . "/images/" . $default_images[$i] : get_template_directory_uri() . "/images/hero.jpg";
    $hero_background[$i] = get_theme_mod("hero_background_$i", $default_image);
}
?>

<?php
// Génération dynamique des éléments carrousel avec une boucle
for ($i = 0; $i < $carousel_count; $i++) {
    $active_class = ($i === 0) ? ' active' : ''; // Premier élément actif
    echo '<div class="carrousel' . $active_class . '" data-index="' . $i . '" style="background-image: url(\'' . $hero_background[$i] . '\');"></div>';
}
?>

<form class="carrousel__form">
    <?php
    // Génération dynamique des boutons radio avec une boucle
    for ($i = 0; $i < $carousel_count; $i++) {
        $checked = ($i === 0) ? 'checked' : ''; // Premier bouton sélectionné
        echo '<input type="radio" class="carrousel__radio" name="carrousel" id="slide' . ($i + 1) . '" ' . $checked . '>';
    }
    ?>
</form>
