<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>prototype de la page d'accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <?php wp_head(); ?>
  </head>
  <body>
     <header class="entete">
      <div class="entete__contenu">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" class="entete__logo" />

        <input type="checkbox" class="chk__menu" id="chk__menu" />
        <label for="chk__menu" class="entete__burger">
          <img
            src="https://s2.svgbox.net/hero-outline.svg?ic=menu&color=000"
            width="32"
            height="32"
          />
        </label>

        <nav class="entete__nav">
          <ul class="entete__menu">
            <li class="entete__menu-item"><a href="#">Aventure</a></li>
            <li class="entete__menu-item"><a href="#">Culturel</a></li>
            <li class="entete__menu-item"><a href="#">Zen</a></li>
            <li class="entete__menu-item"><a href="#">Sport</a></li>
            <li class="entete__menu-item"><a href="#">Croisière</a></li>
            <li class="entete__menu-item"><a href="#">Repos</a></li>
          </ul>

          <form class="recherche" action="">
            <input class="recherche__input" type="search" />
            <button class="recherche__bouton">
              <img
                src="https://s2.svgbox.net/hero-solid.svg?ic=search&color=000"
                width="32"
                height="32"
              />
            </button>
          </form>
        </nav>
      </div>
    </header>