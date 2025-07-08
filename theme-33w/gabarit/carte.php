<?php
/**
 * Template-part carte.php
 * Affiche une carte dans un conteneur flex
 */
$lien = "<a href=" . get_permalink() .">suite</a>"; 
?>

<article class="populaire__carte">
    <?php the_post_thumbnail('thumbnail'); ?>
    <h3><?php the_title(); ?></h3>
    <p><?php echo wp_trim_words(get_the_excerpt(), 10, $lien); ?></p>

    <p class="populaire__carte__temperature populaire__carte__temperature--min">
  Température minimum : <?php the_field('temperature_minimum'); ?>&deg;C
</p>
<p class="populaire__carte__temperature populaire__carte__temperature--max">
  Température maximum : <?php the_field('temperature_maximum'); ?>&deg;C
</p>
<p class="populaire__carte__temperature populaire__carte__temperature--moyenne">
  Température moyenne : <?php the_field('temperature_moyenne'); ?>&deg;C
</p>
    <?php the_category(); ?>
</article>