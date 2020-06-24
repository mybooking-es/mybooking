/**
 *   MYBOOKING CUSTOM JS
 *   -------------------
 *
 *  Versión: 0.0.2
 *   @package WordPress
 *   @subpackage Mybooking WordPress Theme
 *   @since Mybooking WordPress Theme 0.0.1
 */
if (typeof $ === "undefined") {
  var $ = window.jQuery;
}

// OWL CAROUSEL
$(document).ready(function () {
  //Home page carousel
  $(".-carrusel-portada").owlCarousel({
    autoPlay: true,
    slideSpeed: 3600,
    paginationSpeed: 600,
    navigation: false,
    pagination: false,
    singleItem: true,
  });

  // Testimonials
  $(".-carrusel-testimonials").owlCarousel({
    autoPlay: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    singleItem: true,
    pagination: false,
  });
});

// FORM SELECTOR STICKY
$(document).ready(function () {
  if (typeof $(".home-header_sticky-breakpoint").offset() !== "undefined") {
    var height = $(".home-header_sticky-breakpoint").offset().top;
    var md = new MobileDetect(window.navigator.userAgent);
    if (!md.mobile()) {
      $(window).on("scroll", function () {
        if ($(".navbar-toggler").is(":visible")) {
          $("#form-selector").removeClass("flex-form-sticky");
          $("#home-header_content_container").removeClass(
            "home-header_content_container_sticky"
          );
        } else if ($(window).scrollTop() > height) {
          $("#form-selector").addClass("flex-form-sticky");
          $("#home-header_content_container").addClass(
            "home-header_content_container_sticky"
          );
        } else {
          $("#form-selector").removeClass("flex-form-sticky");
          $("#home-header_content_container").removeClass(
            "home-header_content_container_sticky"
          );
        }
      });
    }
  }
});

// GO TOP BUTTON
jQuery(document).ready(function ($) {
  // browser window scroll (in pixels) after which the "back to top" link is shown
  var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $(".cd-top");

  //hide or show the "back to top" link
  $(window).scroll(function () {
    $(this).scrollTop() > offset
      ? $back_to_top.addClass("cd-is-visible")
      : $back_to_top.removeClass("cd-is-visible cd-fade-out");
    if ($(this).scrollTop() > offset_opacity) {
      $back_to_top.addClass("cd-fade-out");
    }
  });

  //smooth scroll to top
  $back_to_top.on("click", function (event) {
    event.preventDefault();
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      scroll_top_duration
    );
  });
});

// RESERVATION STEPS
$(document).ready(function () {
  $(".step").each(function (index, element) {
    //element == this
    $(element).not(".active").addClass("done");
    $(".done").html('<i class="fa fa-check" aria-hidden="true"></i>');
    if ($(this).is(".active")) {
      return false;
    }
  });
});

// COOKIES POLICY
$(document).ready(function () {
  if ($(".eupopup").length > 0) {
    $(document).euCookieLawPopup().init({
      info: "YOU_CAN_ADD_MORE_SETTINGS_HERE",
      popupTitle: "This website is using cookies. ",
      popupText:
        "We use them to give you the best experience. If you continue using our website, we'll assume that you are happy to receive all cookies on this website.",
    });
  }
});

$(document).bind("user_cookie_consent_changed", function (event, object) {
  console.log("User cookie consent changed: " + $(object).attr("consent"));
});

// CONTROLS SUBMENU OPENING ON MOBILE
$(document).on("click", ".dropdown-menu li", function (e) {
  $(".dropdown-menu li > .dropdown-menu").slide();
  e.stopPropagation();
});

//add 40px extra if message is active

$(document).ready(function () {
  var bodyStyles = document.body.style;
  // Home
  if ($(".topbar-message").length > 0) {
    bodyStyles.setProperty(
      "--margin-for-message:",
      "var(--margin-for-message-active)"
    );
  }
});

// Avoid padding right when modal is open
$(document).ready(function () {
  $("body").on("show.bs.modal", function () {
    $(".sticky-top").addClass("fixModal");
  });
  $("body").on("hidden.bs.modal", function () {
    $(".sticky-top").removeClass("fixModal");
  });
});

/* Sticky footer 
  Requirement: The footer must not have margin
*/
$(document).ready(function () {
  function stickyFooter() {
    var $copyWrapper = $(".copy-wrapper");
    var copyWrapperHeight = $copyWrapper.outerHeight(true);
    var $footer = $("#wrapper-footer");
    var footerTop = $footer.position().top; // Footer top position
    var footerHeight = $footer.outerHeight(false); //Footer FULL Height including paddings (false not to apply margin because we calculate it)
    var windowHeight = $(window).height();
    var documentHeight = $(document).height();

    var marginTop = windowHeight - footerTop - footerHeight - copyWrapperHeight;
    /*
    ----------------------------window         ------------------------window
    CONTENT                                    CONTENT
    ----------------------------footer         ..............................
    top
    outerHeight                                     MARGIN-TOP
  
    ----------------------------footer        -------------------------footer
  
                                              -------------------------footer   
    ----------------------------window        -------------------------window
   */

    if (marginTop > 0) {
      $footer.css({
        "margin-top": marginTop + "px",
      });
    }
  }

  stickyFooter();

  $(window).bind("scroll", function (event) {
    stickyFooter();
  });

  $(window).bind("resize", function (event) {
    stickyFooter();
  });
});
