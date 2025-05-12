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
  </head>
  <body>
    <header class="entete">
      <div class="entete__contenu">
        <img src="images/logo.png" alt="" class="entete__logo" />
        <label for="" class="entete__burger"></label>
        <input type="checkbox" class= >
        <nav class="entete__nav">
          <ul class="entete__menu">
            <li class="entete__menu-item"><a href="#">Aventure</a></li>
            <li class="entete__menu-item"><a href="#">Culturel</a></li>
            <li class="entete__menu-item"><a href="#">Zen</a></li>
            <li class="entete__menu-item"><a href="#">Sport</a></li>
            <li class="entete__menu-item"><a href="#">Croisière</a></li>
            <li class="entete__menu-item"><a href="#">Repos</a></li>
          </ul>
        </nav>
        <form class="recherche" action="">
          <input class="recherche__input" type="search" name="" id="" />
          <button class="recherche__bouton">
            <img
              src="https://s2.svgbox.net/hero-solid.svg?ic=search&color=000"
              width="32"
              height="32"
            />
          </button>
        </form>
      </div>
    </header>
    <section class="hero">
      <img src="images/maldives.jpg" alt="image hero">
      <div class="hero__contenu">
        <h1 class="hero__titre">Club de voyage</h1>
        <p class="hero__description">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur
          incidunt quas eius totam veniam, molestiae officiis cupiditate ut
          possimus tempore veritatis illum dignissimos, pariatur atque nulla
          architecto a natus voluptatibus!
        </p>
        <p>info@mondovoyages.ca<br>305, rue Sherbrooke, Montréal<br>(514) 456-7893</p>
        <button>S'inscrire</button>
      </div>
    </section>

    <!-- Formulaire d'inscription -->
    <section class="formulaire">
      <form>
        <input type="text" placeholder="Nom">
        <input type="text" placeholder="Prénom">
        <input type="email" placeholder="Courriel">
        <input type="tel" placeholder="Téléphone">
        <input type="text" placeholder="Destination souhaitée">
        <button type="submit">S'inscrire</button>
      </form>
    </section>

    <section class="galerie">
  <h2 class="galerie__titre">Nos destinations favorites</h2>
  <div class="galerie__contenu">
    <img src="images/acores.jpg" alt="Plage" class="galerie__image">
    <img src="images/image1.jfif" alt="Lac de montagne" class="galerie__image">
    <img src="images/image2.jfif" alt="Village italien" class="galerie__image">
    <img src="images/image4.jfif" alt="Montagne enneigée" class="galerie__image">
    <img src="images/images3.jfif" alt="Temple asiatique" class="galerie__image">
    <img src="images/italy.jpg" alt="Route forêt automne" class="galerie__image">
    <img src="images/city.jpg" alt="Champ de lavande" class="galerie__image">
    <img src="images/palm-trees.jpg" alt="Canyon" class="galerie__image">
    <img src="images/lin-zhi.jpg" alt="Ville de nuit" class="galerie__image">
    <img src="images/waterfall.jpg" alt="Cascade tropicale" class="galerie__image">
  </div>
</section>

    </section>
    <footer class="piedpage">fjfjfg</footer>
  </body>
</html>
