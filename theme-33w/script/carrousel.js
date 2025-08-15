(function () {
  const carrousels = document.querySelectorAll(".carrousel");
  const radios = document.querySelectorAll(".carrousel__radio");
  const heroContent = document.querySelector(".hero__contenu");

  // Fonction pour relancer les animations du contenu Hero
  function restartHeroAnimations() {
    if (heroContent) {
      // Retirer temporairement la classe pour réinitialiser l'animation
      heroContent.style.animation = 'none';
      heroContent.offsetHeight; // Force le reflow
      heroContent.style.animation = '';

      // Relancer l'animation sur tous les éléments texte
      const animatedElements = heroContent.querySelectorAll('.hero__titre, .hero__description, .hero__auteur, .hero__adresse');
      animatedElements.forEach(element => {
        element.style.animation = 'none';
        element.offsetHeight; // Force le reflow
        element.style.animation = '';
      });
    }
  }

  // Lorsqu'on change un bouton radio
  radios.forEach((radio, index) => {
    radio.addEventListener("change", () => {
      carrousels.forEach((carrousel, i) => {
        if (i === index) {
          carrousel.classList.add("active");
        } else {
          carrousel.classList.remove("active");
        }
      });

      // Relancer les animations du contenu Hero à chaque changement d'image
      restartHeroAnimations();
    });
  });
})();

