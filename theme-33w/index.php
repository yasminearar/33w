<?php get_header() ?>
    <section class="hero">
      <div class="hero__contenu">
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

        <div class="hero__reseaux">
          <a href="#" aria-label="Facebook">
            <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="Facebook" class="hero__reseau-icon" />
          </a>
          <a href="#" aria-label="Instagram">
            <img src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg" alt="Instagram" class="hero__reseau-icon" />
          </a>
        </div>
      </div>
    </section>

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
      <h2 class="populaire__titre">Nos destinations favorites</h2>
        <div class="populaire__contenu">

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Suisse.jpg" alt="Paysage de la Suisse" class="populaire__image">
            <h3 class="populaire__sous-titre">Suisse</h3>
            <p class="populaire__texte">Découvrez les Alpes suisses, entre lacs cristallins et villages pittoresques.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Kabylie.jpg" alt="Paysage de la Kabylie" class="populaire__image">
            <h3 class="populaire__sous-titre">Kabylie, Algérie</h3>
            <p class="populaire__texte">Entre montagnes majestueuses et traditions ancestrales, la Kabylie vous émerveillera.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/venice.jpg" alt="Venise, Italie" class="populaire__image">
            <h3 class="populaire__sous-titre">Venise, Italie</h3>
            <p class="populaire__texte">Naviguez sur les canaux romantiques et explorez l’architecture unique de Venise.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Espagne.jpg" alt="Vue de l'Espagne" class="populaire__image">
            <h3 class="populaire__sous-titre">Espagne</h3>
            <p class="populaire__texte">Vibrante et ensoleillée, l’Espagne séduit par ses cultures, plages et gastronomie.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Malaisie.jpg" alt="Paysage de la Malaisie" class="populaire__image">
            <h3 class="populaire__sous-titre">Malaisie</h3>
            <p class="populaire__texte">Des plages paradisiaques aux jungles tropicales, une destination riche et diversifiée.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/italy.jpg" alt="Village italien" class="populaire__image">
            <h3 class="populaire__sous-titre">Italie</h3>
            <p class="populaire__texte">Explorez les villages colorés, les collines toscanes et la douceur de vivre italienne.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Punta-cana.jpg" alt="Plage de Punta Cana" class="populaire__image">
            <h3 class="populaire__sous-titre">Punta Cana, République dominicaine</h3>
            <p class="populaire__texte">Sable blanc, mer turquoise et palmiers pour des vacances de rêve sous les tropiques.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Chine.jpg" alt="Paysage de la rivière Li à Yangshuo, Chine" class="populaire__image">
            <h3 class="populaire__sous-titre">Yangshuo, Chine</h3>
            <p class="populaire__texte">Admirez les montagnes karstiques et la sérénité de la rivière Li.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Mexique.jpg" alt="Plage de Tulum, Mexique" class="populaire__image">
            <h3 class="populaire__sous-titre">Tulum, Mexique</h3>
            <p class="populaire__texte">Combinez plages idylliques, histoire maya et ambiance festive mexicaine.</p>
          </article>

          <article class="populaire__carte">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Alger.jpg" alt="Vue nocturne d'Alger" class="populaire__image">
            <h3 class="populaire__sous-titre">Alger, Algérie</h3>
            <p class="populaire__texte">Découvrez la beauté d’Alger la blanche, illuminée à la nuit tombée.</p>
          </article>

        </div>
    </section>


    <section class="populaire">
      <?php if (have_posts()) {
        while (have_posts()) {
          the_post(); ?>
          <h1><?php the_title(); ?></h1>
      <?php the_content();
      }
      } ?>
    </section>
    
<?php get_footer();

    
 

