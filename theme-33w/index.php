<?php

/**
 * le modèle index
 * Représente le modèle par défaut
 */

?>

<?php get_header() ?>

<section class="populaire">
  <div class="populaire__contenu">
    <?php if (have_posts()) {
      while (have_posts()) {
        /* affiche l'image « mise en avant » miniature */
        the_post();
        the_post_thumbnail('thumbnail');
    ?>

      <h2 class="populaire__titre"><?php
          /* affiche le titre pricipal du « post » */
          the_title(); ?></h2>
          
          <p><?php
          /* affiche un extrait du contenu du « post » */
          the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>">Lire la suite</a>


  <?php
      /* cette fontion permet d'afficher l'ensemble du contenu du post (article ou page)*/
      the_content();
      if (in_category('galerie')) {
        get_template_part("gabarit/galerie");
      } else {
        get_template_part("gabarit/carte");
      }

    }
  } ?>
  </div>
</section>
<?php get_footer();


