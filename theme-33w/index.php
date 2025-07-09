<?php

/**
 * le modèle index
 * Représente le modèle par défaut
 */

?>

<?php get_header() ?>
<main>
  <main>
  <section class="populaire">
    <div class="populaire__contenu">
      <h2 class="populaire__titre">Les plus populaires</h2>
      <?php if (have_posts()) {
        while (have_posts()) {
          /* affiche l'image « mise en avant » miniature */
          the_post();

          if (in_category('galerie')) {
            get_template_part('gabarit/galerie');
          } else { 
            get_template_part('gabarit/carte');
          }
        }
      }?>
    </div>
  </section>
</main>
<?php get_footer();


