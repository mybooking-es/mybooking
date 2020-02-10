/**
*   MYBOOKING CUSTOM JS
*   -------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// OWL CAROUSEL
$(document).ready(function() {

  $(".-carrusel-portada").owlCarousel({
    autoPlay: true,
    slideSpeed : 3600,
    paginationSpeed : 600,
    navigation: false,
    pagination: true,
    singleItem:true
  });

  $(".-carrusel-un-item").owlCarousel({
    autoPlay: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    singleItem: true,
    pagination: false
  });

  $(".-carrusel-tres-items").owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: ["«", "»"],
    pagination: false,
    items: 3,
    itemsDesktop: [1200, 3],
    itemsDesktopSmall: [400, 1]
  });

  $(".-carrusel-cuatro-items").owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: ["«", "»"],
    pagination: false,
    items: 4,
    itemsDesktop: [1200, 3],
    itemsDesktopSmall: [400, 1]
  });
});

// FORM SELECTOR STICKY
$(document).ready(function() {
  if (typeof $(".home .page_content").offset() !== "undefined") {
    var height = $(".home .page_content").offset().top;
    var is_mobile = false;

    if ($(".navbar-toggler").is(":visible")) {
      is_mobile = true;
    }
    if (!is_mobile) {
      $(window).on("scroll", function() {
        if ($(".navbar-toggler").is(":visible")) {
          $("#form-selector").removeClass("flex-form-sticky");
        } else if ($(window).scrollTop() > height) {
          $("#form-selector").addClass("flex-form-sticky");
        } else {
          $("#form-selector").removeClass("flex-form-sticky");
        }
      });
    }
  }
});

// GO TOP BUTTON
jQuery(document).ready(function($) {
  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $(".cd-top");

  //hide or show the "back to top" link
  $(window).scroll(function() {
    $(this).scrollTop() > offset
      ? $back_to_top.addClass("cd-is-visible")
      : $back_to_top.removeClass("cd-is-visible cd-fade-out");
    if ($(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass("cd-fade-out");
    }
  });

  //smooth scroll to top
  $back_to_top.on("click", function(event) {
    event.preventDefault();
    $("body,html").animate(
      {
        scrollTop: 0
      },
      scroll_top_duration
    );
  });
});

// RESERVATION STEPS
$(document).ready(function() {
  $(".step").each(function(index, element) {
    //element == this
    $(element)
      .not(".active")
      .addClass("done");
    $(".done").html('<i class="fa fa-check" aria-hidden="true"></i>');
    if ($(this).is(".active")) {
      return false;
    }
  });
});
