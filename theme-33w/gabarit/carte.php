<?php

/**
 * Template-part carte.php
 * Affiche une carte dans un conteneur flex
 */
$lien = "<a href=" . get_permalink() . ">Suite</a>";
?>
<article class="populaire__carte">
    <?php the_post_thumbnail('thumbnail'); ?>
    <h3><?php the_title(); ?></h3>
    <p><?= wp_trim_words(get_the_excerpt(), 10, $lien); ?></p>

    <?php the_category(); ?>
</article>