$(window).on("load", function () {
  const $navbarMenu = $(".navbar .links");
  const $hamburgerBtn = $(".hamburger-btn");
  const $hideMenuBtn = $(".navbar .close-btn");
  const $showPopupBtn = $(".login-btn");
  const $formPopup = $(".form-popup");
  const $hidePopupBtn = $formPopup.find(".close-btn");
  const $signupLoginLink = $formPopup.find(".bottom-link a");

  $hamburgerBtn.on("click", function () {
    $navbarMenu.toggleClass("show-menu");
  });

  $hideMenuBtn.on("click", function () {
    $hamburgerBtn.click();
  });

  $showPopupBtn.on("click", function () {
    $("body").toggleClass("show-popup");
  });

  $hidePopupBtn.on("click", function () {
    $showPopupBtn.click();
  });

  $signupLoginLink.on("click", function (e) {
    e.preventDefault();
    $formPopup.toggleClass(this.id === "signup-link" ? "show-signup" : "");
  });

  $("nav ul li").hover(
    function () {
      if ($("> ul", this).length > 0) {
        $("> ul", this).css("display", "flex");
        $("> ul", this).css("flex-direction", "column");
      }
    },
    function () {
      if ($("> ul", this).length > 0) {
        $("> ul", this).hide();
      }
    }
  );

  var minAgeInput = $("#min_age");
  var maxAgeInput = $("#max_age");
  var minAgeOutput = $('output[for="min_age"]');
  var maxAgeOutput = $('output[for="max_age"]');

  minAgeOutput.text(minAgeInput.val());
  maxAgeOutput.text(maxAgeInput.val());

  minAgeInput.on("input", function () {
    minAgeOutput.text(minAgeInput.val());
  });

  maxAgeInput.on("input", function () {
    maxAgeOutput.text(maxAgeInput.val());
  });

  var currentIndex = 0;
  var cardCount = $(".carousel .card").length;
  var cardWidth = $(".carousel .card").outerWidth();

  $("#nextBtn").on("click", function () {
    currentIndex = currentIndex < cardCount - 1 ? currentIndex + 1 : 0;
    updateCarousel();
  });

  $("#prevBtn").on("click", function () {
    currentIndex = currentIndex > 0 ? currentIndex - 1 : cardCount - 1;
    updateCarousel();
  });

  function updateCarousel() {
    var offset = -1 * currentIndex * cardWidth;
    $(".carousel .cards").css("transform", "translateX(" + offset + "px)");
  }
});
