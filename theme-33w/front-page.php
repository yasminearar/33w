<?php get_header(); ?>
<?php
// Initialiser les images de fond ici
$hero_background[0] = get_theme_mod("hero_background_0", get_template_directory_uri() . "/images/default1.jpg");
$hero_background[1] = get_theme_mod("hero_background_1", get_template_directory_uri() . "/images/default2.jpg");
$hero_background[2] = get_theme_mod("hero_background_2", get_template_directory_uri() . "/images/default3.jpg");
$hero_background[3] = get_theme_mod("hero_background_3", get_template_directory_uri() . "/images/default4.jpg");
$hero_background[4] = get_theme_mod("hero_background_4", get_template_directory_uri() . "/images/default5.jpg");
$hero_background[5] = get_theme_mod("hero_background_5", get_template_directory_uri() . "/images/default6.jpg");
$hero_background[6] = get_theme_mod("hero_background_6", get_template_directory_uri() . "/images/default7.jpg");

?>

    <section class="hero">
        <div class="carrousel" data-index="0" style="background-image: url('<?= $hero_background[0] ?>'); opacity:1"></div>
        <div class="carrousel" data-index="1" style="background-image: url('<?= $hero_background[1] ?>'); opacity:0"></div>
        <div class="carrousel" data-index="2" style="background-image: url('<?= $hero_background[2] ?>'); opacity:0"></div>
        <div class="carrousel" data-index="3" style="background-image: url('<?= $hero_background[3] ?>'); opacity:0"></div>
        <div class="carrousel" data-index="4" style="background-image: url('<?= $hero_background[4] ?>'); opacity:0"></div>
        <div class="carrousel" data-index="5" style="background-image: url('<?= $hero_background[5] ?>'); opacity:0"></div>
        <div class="carrousel" data-index="6" style="background-image: url('<?= $hero_background[6] ?>'); opacity:0"></div>
        <form class="carrousel__form">
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide1" checked>
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide2">
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide3">
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide4">
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide5">
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide6">
            <input type="radio" class="carrousel__radio" name="carrousel" id="slide7">
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