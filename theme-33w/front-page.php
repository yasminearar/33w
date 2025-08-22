<?php get_header(); ?>

    <section class="hero">
        <?php get_template_part("gabarit/carrousel"); ?>

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
        <div class="populaire__contenu">
            <h2>Les plus populaires</h2>
            <?php
            $query = new WP_Query(array(
                'posts_per_page' => 6,
                'meta_key' => 'wpb_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            ));

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    if (in_category('galerie')) {
                        get_template_part('gabarit/galerie');
                    } else {
                        carte('Populaire');
                    }
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </section>

<?php get_footer();