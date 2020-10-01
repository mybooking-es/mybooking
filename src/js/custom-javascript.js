/**
 *   MYBOOKING CUSTOM JS
 *   -------------------
 *
 *   @version 0.0.5
 *   @package WordPress
 *   @subpackage Mybooking WordPress Theme
 *   @since Mybooking WordPress Theme 0.0.1
 */
if (typeof $ === "undefined") {
  var $ = window.jQuery;
}


/*
 *  SLICK CAROUSEL
 *  Carousel settings
 */
$(document).ready(function () {
  if ( $(".-carrusel-portada").length > 0 ) {
    // Home page carousel
    $(".-carrusel-portada").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
    });
  }
});


/*
 *  STICKY FORM SELECTOR
 *  Manage behaivour of form selector depending viewport
 *  and controls sticky trigger point.
 *
 *  .home-header_sticky-breakpoint could be added under
 *  selector parent container via page builder and then it
 *  could be used to allow sticky on pages different than homepage.
 *
 */
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


/*
 *  GO-TOP BUTTON
 *  Go-top button settings and class addition
 */
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


/*
 *  RESERVATION STEPS
 *  Adds clases and elemnts to reservation process steps block
 */
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

/*
 *  SUBNAVIGATION MOBILE OPENING
 *  Controls submenu item's behaivour on navigation
 */
$(document).on("click", ".dropdown-menu li", function (e) {
  $(".dropdown-menu li > .dropdown-menu").slide();
  e.stopPropagation();
});


/*
 *  TOPBAR MARGIN
 *  Adds 40px extra if message is active
 */
$(document).ready(function () {
  var bodyStyles = document.body.style;
  // Home
  if ($(".topbar-message").length > 0) {
    bodyStyles.setProperty(
      "--margin-for-message",
      "var(--margin-for-message-active)"
    );
  }
});


/*
 *  MODAL MARGIN
 *  Avoid padding right when modal is open
 */
$(document).ready(function () {
  $("body").on("show.bs.modal", function () {
    $(".sticky-top").addClass("fixModal");
  });
  $("body").on("hidden.bs.modal", function () {
    $(".sticky-top").removeClass("fixModal");
  });
});


/*
    STICKY FOOTER
    Requirement: The footer must not have margin
*/

// $(document).ready(function () {
//   function stickyFooter() {
//     var $copyWrapper = $(".copy-wrapper");
//     var copyWrapperHeight = $copyWrapper.outerHeight(true);
//     var $footer = $("#wrapper-footer");
//     var footerTop = $footer.position().top; // Footer top position
//     var footerHeight = $footer.outerHeight(false); //Footer FULL Height including paddings (false not to apply margin because we calculate it)
//     var windowHeight = $(window).height();
//     var documentHeight = $(document).height();

//     var marginTop = windowHeight - footerTop - footerHeight - copyWrapperHeight;
//     /*
//     ----------------------------window         ------------------------window
//     CONTENT                                    CONTENT
//     ----------------------------footer         ..............................
//     top
//     outerHeight                                     MARGIN-TOP

//     ----------------------------footer        -------------------------footer

//                                               -------------------------footer
//     ----------------------------window        -------------------------window
//    */

//     if (marginTop > 0) {
//       $footer.css({
//         "margin-top": marginTop + "px",
//       });
//     }
//   }

//   stickyFooter();
//   //setTimeout(stickyFooter, 2000);

//   $(window).bind("scroll", function (event) {
//     stickyFooter();
//   });

//   $(window).bind("resize", function (event) {
//     stickyFooter();
//   });
// });

$(document).ready(function () {
  if ($(".topbar").length) {
    $("button.navbar-toggler").bind("click", function () {
      if (!$(".navbar-collapse").hasClass("show")) {
        $(".navbar").addClass("fixed-top topbar-height");
        $(".topbar").addClass("fixed-top");
      } else {
        $(".navbar").removeClass("fixed-top topbar-height");
        $(".topbar").removeClass("fixed-top");
      }
    });
  } else {
    $("button.navbar-toggler").bind("click", function () {
      if (!$(".navbar-collapse").hasClass("show")) {
        $(".navbar").addClass("fixed-top");
        $(".topbar").addClass("fixed-top");
      } else {
        $(".navbar").removeClass("fixed-top");
        $(".topbar").removeClass("fixed-top");
      }
    });
  }
});
