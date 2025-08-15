(function () {
  const carrousels = document.querySelectorAll(".carrousel");
  const radios = document.querySelectorAll(".carrousel__radio");

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
    });
  });
})();

