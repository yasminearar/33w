<?php
/**
 * Fonction pour afficher une carte
 * @param string $cat_a_retirer - La catégorie à exclure de la liste des liens
 */
function carte($cat_a_retirer = '') {
    $lien = "<a href=" . get_permalink() .">suite</a>"; 
    ?>
    
    <article class="populaire__carte">
        <?php the_post_thumbnail('thumbnail'); ?>
        <h3><?php the_title(); ?></h3>
        <p><?php echo wp_trim_words(get_the_excerpt(), 10, $lien); ?></p>
        <p class="populaire__carte__note-client">
            Note client : <?php the_field('note_client'); ?>
        </p>
        <p class="populaire__carte__temperature populaire__carte__temperature--min">
            Température minimum : <?php the_field('temperature_minimum'); ?>&deg;C
        </p>
        <p class="populaire__carte__temperature populaire__carte__temperature--max">
            Température maximum : <?php the_field('temperature_maximum'); ?>&deg;C
        </p>
        <p class="populaire__carte__temperature populaire__carte__temperature--moyenne">
            Température moyenne : <?php the_field('temperature_moyenne'); ?>&deg;C
        </p>

        <?php 
        // Afficher les catégories en excluant celle spécifiée
        $categories = get_the_category();
        if ($categories) {
            $categories_filtered = array();
            foreach ($categories as $category) {
                // Exclure la catégorie spécifiée dans le paramètre
                if (strtolower($category->name) !== strtolower($cat_a_retirer)) {
                    $categories_filtered[] = '<a href="' . get_category_link($category->term_id) . '" rel="category tag">' . $category->name . '</a>';
                }
            }
            
            if (!empty($categories_filtered)) {
                echo '<div class="cat-links">' . implode(', ', $categories_filtered) . '</div>';
            }
        }
        ?>
    </article>
    
    <?php
}
?>