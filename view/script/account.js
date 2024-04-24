$(window).on("load", function () {
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
});
