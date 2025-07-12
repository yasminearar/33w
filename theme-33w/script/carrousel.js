(function () {
  const carrousels = document.querySelectorAll(".carrousel");
  const radios = document.querySelectorAll(".carrousel__radio");

  // Lorsqu'on change un bouton radio
  radios.forEach((radio, index) => {
    radio.addEventListener("change", () => {
      carrousels.forEach((carrousel, i) => {
        carrousel.style.opacity = i === index ? "1" : "0";
        carrousel.style.pointerEvents = i === index ? "auto" : "none";
      });
    });
  });
})();

