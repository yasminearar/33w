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

          ?>
            
            <?php
            if (in_category('galerie')) {
              get_template_part('gabarit/galerie');
            } else { 
              get_template_part('gabarit/carte');
              ?>
              
            <article class="populaire__carte">
            <?php the_post_thumbnail('miniature'); ?>
            <h3><?php the_title(); ?></h3>
            <?php

              $lien = "<a href=" . get_permalink() .">suite</a>"; 
              echo "<p>" . wp_trim_words(get_the_excerpt(), 10, $lien) . "</p>";
            
            } ?> 
          </article>
          <?php
        }
      }?>
    </div>
  </section>
</main>
<?php get_footer();

