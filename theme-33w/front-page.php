<?php get_header(); ?>
<main>
    <div class="hero">
        <section class="hero__contenu">
            <h1 class="hero__titre">Club de voyage</h1>
            <p class="hero__description">
                Bienvenue au Club de Voyage, votre partenaire privilégié pour découvrir le monde autrement. 
                Que vous rêviez de plages paradisiaques, de montagnes majestueuses ou de villes vibrantes, 
                nous vous proposons des expériences sur mesure, authentiques et inoubliables. 
                Rejoignez notre communauté de voyageurs passionnés et laissez-vous inspirer par des destinations uniques.
            </p>
            <p class="hero__contact">
              info@mondovoyages.ca<br />
              305, rue Sherbrooke, Montréal<br />
              (514) 456-7893
            </p>

            <button class="hero__bouton">S'inscrire</button>
            <div class="reseaux-sociaux">
                <?php get_template_part('gabarit/icone'); ?>
            </div>
        </section>
    </div>

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
  <div class="populaire__contenu">
    <?php if (have_posts()) {
      while (have_posts()) {
        /* affiche l'image « mise en avant » miniature */
        the_post();


        ?>
        <article class="populaire__carte">
          <?php the_post_thumbnail('miniature'); ?>

          <h3><?php 
          /* affiche le titre du post */
          the_title(); ?></h3>
          <p><?php
            $lien = "<a href=" . get_permalink() .">suite</a>"; // Récupère le lien de l'article
            echo wp_trim_words(get_the_excerpt(), 10, $lien); 
          ?></p>  <!-- Affiche un extrait de 10 mots -->
        </article>
        <?php
      }
    }?>
  </div>
</section>
</main>
<?php get_footer();