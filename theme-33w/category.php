<?php

/**
 * le modèle index
 * Représente le modèle par défaut
 */

?>

<?php get_header() ?>
<main>
    <section class="populaire">
        <div class="populaire__contenu">
            <h2><?php single_cat_title() ?></h2>
            <?= category_description(); ?>
            <?php if (have_posts()) {
                while (have_posts()) {
                    /* affiche l'image « mise en avant » miniature */
                    the_post();

                    if (in_category('galerie')) {
                        get_template_part('gabarit/galerie');
                    } else {
                        // Utiliser la fonction carte avec la catégorie courante à exclure
                        $current_category = get_queried_object();
                        carte($current_category->name);
                    }
                }
            }?>
        </div>
    </section>
</main>
<?php get_footer(); ?>

