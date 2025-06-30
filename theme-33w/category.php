<?php

/**
 * le modèle index
 * Représente le modèle par défaut
 */

?>

<?php get_header() ?>

<section class="populaire">
  <h2><?php single_cat_title() ?></h2>
  <?= category_description(); ?>
  <?php if (have_posts()) {
    while (have_posts()) {
      /* affiche l'image « mise en avant » miniature */
      the_post();
      the_post_thumbnail('thumbnail');
  ?>
      <h1><?php
          /* affiche le titre pricipal du « post » */
          the_title(); ?></h1>

  <?php
      /* cette fontion permet d'afficher l'ensemble du contenu du post (article ou page)*/
      the_content();
    }
  } ?>
</section>
<?php get_footer();

