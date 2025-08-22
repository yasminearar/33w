<div class="populaire__contenu">
      <h2><?php single_cat_title() ?></h2>
      <?php if (have_posts()) {
        while (have_posts()) {
          /* affiche l'image « mise en avant » miniature */
          the_post();

          if (in_category('galerie')) {
            get_template_part('gabarit/galerie');
          } else { 
            // Utiliser la fonction carte() pour être cohérent avec le reste du thème
            // Exclure la catégorie actuelle des liens (pas du contenu)
            $current_category = get_queried_object();
            carte($current_category->name);
          }
        }
      }?>
    </div>