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
        <?php get_template_part('gabarit/populaire'); ?>
    </section>

<?php get_footer();