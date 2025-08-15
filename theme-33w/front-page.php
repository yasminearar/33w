<?php get_header(); ?>
<?php
// Récupérer le nombre d'images défini dans le customizer
$carousel_count = get_theme_mod('hero_carousel_count', 3);

// Initialiser les images de fond dynamiquement
$hero_background = array();
for ($i = 0; $i < $carousel_count; $i++) {
    $hero_background[$i] = get_theme_mod("hero_background_$i", get_template_directory_uri() . "/images/default" . ($i + 1) . ".jpg");
}
?>

    <section class="hero">
        <?php
        // Génération dynamique des éléments carrousel avec une boucle
        for ($i = 0; $i < $carousel_count; $i++) {
            $opacity = ($i === 0) ? '1' : '0'; // Premier élément visible
            echo '<div class="carrousel" data-index="' . $i . '" style="background-image: url(\'' . $hero_background[$i] . '\'); opacity:' . $opacity . '"></div>';
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

        <?php get_template_part("gabarit/hero"); ?>
    </section>
    <section class="formulaire">
        <form class="formulaire__formulaire">
            <input class="formulaire__champ" type="text" placeholder="Écrivez votre nom" />
            <input class="formulaire__champ" type="text" placeholder="Écrivez votre prénom" />
            <input class="formulaire__champ" type="email" placeholder="Écrivez votre courriel" />
            <input class="formulaire__champ" type="tel" placeholder="Écrivez votre téléphone" />
            <button class="formulaire__bouton" type="submit">S'inscrire</button>
        </form>
    </section>


    <section class="populaire">
        <?php get_template_part('gabarit/populaire'); ?>
    </section>

<?php get_footer();