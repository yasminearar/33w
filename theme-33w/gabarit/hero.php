<?php
/**
 * Template-part hero.php
 * permet d'afficher la section  « Hero »
 */
?>

<?php
$hero_couleur = get_theme_mod('hero_couleur');
$hero_auteur = get_theme_mod("hero_auteur", "Yasmine-Arar");
$hero_adresse = get_theme_mod("hero_adresse", "305, rue Sherbrooke, Montréal");
$hero_bouton = get_theme_mod('hero_bouton', "S'inscrire");
?>
<style>
    .hero__contenu {
        color: <?= $hero_couleur ?>;
    }
</style>


<div class="hero__contenu">
    <h1 class="hero__titre"><?php bloginfo('name') ?></h1>
    <p class="hero__description">
        <?php bloginfo('description') ?>
    </p>
    <p class="hero__auteur">Auteur du thème : <?php echo $hero_auteur; ?></p>
    <p class="hero__adresse">Adresse du club : <?php echo $hero_adresse; ?></p>
    <button class="hero__bouton"><?php echo $hero_bouton; ?></button>
    <div class="hero__reseaux">
        <?php icone_sociaux($hero_couleur); ?>
    </div>
</div>