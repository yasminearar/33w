<?php get_header(); ?>

    <!-- 1. Section Carousel -->
    <section class="hero">
        <?php get_template_part("gabarit/carrousel"); ?>
        <?php get_template_part("gabarit/hero"); ?>
    </section>

    <!-- Séparateur SVG entre carousel et articles populaires -->
<?php separateur_theme('wave-smooth', '100px', false); ?>

    <!-- 2. Section Articles Populaires -->
    <section class="populaire">
        <div class="populaire__contenu">
            <h2>Les plus populaires</h2>
            <?php
            $query = new WP_Query(array(
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    if (in_category('galerie')) {
                        get_template_part('gabarit/galerie');
                    } else {
                        // On passe 'Populaire' comme catégorie à exclure des liens uniquement
                        carte('Populaire');
                    }
                }
                wp_reset_postdata();
            } else {
                echo '<p>Aucun article disponible</p>';
            }
            ?>
        </div>
    </section>

    <!-- Séparateur SVG entre populaire et filtre REST-API -->
<?php separateur_theme('hills', '140px', false); ?>

    <!-- 3. Section Filtre REST-API -->
    <section class="destination">
        <?php extraire_list_categories("destination"); ?>
        <h2 class="destination__titre">Articles de la catégorie</h2>
        <div class="destination__list"></div>
    </section>

    <!-- Séparateur SVG entre filtre REST-API et formulaire -->
<?php separateur_theme('waves-opacity', '120px', false); ?>

    <!-- 4. Section Formulaire d'inscription -->
    <section id="formulaire-inscription" class="formulaire">
        <form class="formulaire__formulaire">
            <input class="formulaire__champ" type="text" placeholder="Écrivez votre nom" />
            <input class="formulaire__champ" type="text" placeholder="Écrivez votre prénom" />
            <input class="formulaire__champ" type="email" placeholder="Écrivez votre courriel" />
            <input class="formulaire__champ" type="tel" placeholder="Écrivez votre téléphone" />
            <button class="formulaire__bouton" type="submit">S'inscrire</button>
        </form>
    </section>

<?php get_footer();