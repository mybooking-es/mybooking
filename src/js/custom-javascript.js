/**
 *   MYBOOKING CUSTOM JS
 *   -------------------
 *
 *   @version 0.0.6
 *   @package WordPress
 *   @subpackage Mybooking WordPress Theme
 *   @since Mybooking WordPress Theme 0.0.1
 */
if (typeof $ === "undefined") {
  var $ = window.jQuery;
}

var mybooking = mybooking || {};

/**
 * Carrousel Portada
 */
mybooking.carrouselPortada = {
  init: function () {
    if ($(".-carrusel-portada").length > 0) {
      // Home page carousel
      $(".-carrusel-portada").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
      });
    }
  },
};

/**
 *  GO-TOP BUTTON
 *  Go-top button settings and class addition
 */
mybooking.goTopButton = {
  init: function () {
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
  },
};

/*
 *  MODAL MARGIN
 *  Avoid padding right when modal is open
 */
mybooking.modalMargin = {
  init: function () {
    $("body").on("show.bs.modal", function () {
      $(".sticky-top").addClass("fixModal");
    });
    $("body").on("hidden.bs.modal", function () {
      $(".sticky-top").removeClass("fixModal");
    });
  },
};

/**
 * Navbar and menu
 *
 *
 * NavBar structure:
 *
 * .wrapper-navbar
 *   .topbar-message (optional)
 *   .topbar (optional)
 *   .navbar
 *
 * The wrapper-navbars wraps three components, the topbar message,
 * the topbar and the navbar. The two first components are optional
 * and are only show depending on the content and the configuration.
 * The third one is the navigation menu.
 *
 * Special Cases:
 *
 * 1 - Mybooking Home Page template on desktop with integrated
 *     navbar
 *
 * When using Mybooking Home Page Template on desktop, the theme allows
 * the navbar to be integrated in the header background, so the logo
 * and the menu overlays the background. It is done adding the the
 * nav-container-absolute to the wrapper-navbar. When using this
 * design and the wpadminbar, it is necessary to apply the wpadminbar
 * height as margin on wrapper-navbar.
 *
 * 2 - Renting reservation process
 *
 * On choose product and complete steps the reservation summary is
 * shown on sticky. Take into to show below the adminbar
 *
 *
 */
mybooking.navBarMenu = {
  wizardCloseTop: 10,

  init: function () {
    var self = this;
    // Menu Toggler
    $("#navbarNavDropdown").on("shown.bs.collapse", function () {
      self.toggleMenu();
    });

    $("#navbarNavDropdown").on("hidden.bs.collapse", function () {
      self.toggleMenu();
    });

    // On Window resize
    $(window).resize(function () {
      self.adminBarMargins();
      self.complementsTop();
    });

    // On window scroll
    $(window).scroll(function () {
      self.complementsTop();
    });

    // Shows the navigation margin at start
    this.adminBarMargins();
    this.complementsTop();
  },

  /**
   * Toggle menu
   */
  toggleMenu: function () {
    // Check if the modal menu is shown
    var modalMenuShown = $(".navbar-collapse").hasClass("show");

    this.adminBarMargins();

    if (modalMenuShown) {
      // Hide the topbar-message
      if ($(".topbar-message").length) {
        $(".topbar-message").hide();
      }
      // Hide the topbar-message
      if ($(".topbar").length) {
        $(".topbar").hide();
      }
    } else {
      // Show the topbar-message
      if ($(".topbar-message").length) {
        $(".topbar-message").show();
      }
      // Show the topbar
      if ($(".topbar").length) {
        $(".topbar").show();
      }
    }

    // Manage Scrolling on modal menu
    this.htmlStyle(modalMenuShown);
  },

  /**
   * Wordpress adminbar margins
   */
  adminBarMargins: function () {
    var modalMenuShown = $(".navbar-collapse").hasClass("show");
    var adminBar = document.getElementById("wpadminbar");

    if (adminBar) {
      // 1 - Navigation bar
      if (
        $("#wrapper-navbar").hasClass("nav-container-absolute") &&
        $("body").hasClass("home") &&
        $(".home-header").length > 0
      ) {
        // Navbar integrated CSS rule (.nav-container-absolute on body home class and .home-header)
        var navbarToggleVisible = $("button.navbar-toggler").is(":visible");
        if (navbarToggleVisible) {
          if (modalMenuShown) {
            $("#wrapper-navbar").css(
              "margin-top",
              this.getAdminBarHeight() + "px"
            );
          } else {
            // Removes the margin top
            $("#wrapper-navbar").css("margin-top", "");
          }
        } else {
          $("#wrapper-navbar").css(
            "margin-top",
            this.getAdminBarHeight() + "px"
          );
        }
      } else {
        // No navbar integrated
        if (modalMenuShown) {
          $("#wrapper-navbar").css(
            "margin-top",
            this.getAdminBarHeight() + "px"
          );
        } else {
          // Removes the margin top
          $("#wrapper-navbar").css("margin-top", "");
        }
      }
    }
  },

  /**
   * Complements Top
   */
  complementsTop: function () {
    var modalMenuShown = $(".navbar-collapse").hasClass("show");
    var adminBar = document.getElementById("wpadminbar");
    var adminBarAbsolute = $(adminBar).css("position") === "absolute";

    if (adminBar) {
      // 1 - Form Selector
      if ($("form[name=widget_search_form]").length > 0) {
        if (adminBarAbsolute) {
          $("form[name=widget_search_form]").css("top", "0");
        } else {
          $("form[name=widget_search_form]").css(
            "top",
            this.getAdminBarHeight() + "px"
          );
        }
      }
      // 2 - Wizard Container
      if ($(".wizard-container").length > 0) {
        if (adminBarAbsolute) {
          $(".wizard-container").css("top", "0");
          $(".wizard-close").css("top", this.wizardCloseTop + "px");
          $(".wizard-container").css(
            "padding-top",
            this.getAdminBarHeight() + "px"
          );
        } else {
          $(".wizard-container").css("top", this.getAdminBarHeight() + "px");
          $(".wizard-close").css(
            "top",
            this.getAdminBarHeight() + this.wizardCloseTop + "px"
          );
          $(".wizard-container").css("padding-top", "");
        }
      }
      // 3 - Reservation detail (choose product)
      if ($("#reservation_detail.sticky-top").length > 0) {
        if (adminBarAbsolute) {
          $("#reservation_detail").css("top", "0");
        } else {
          $("#reservation_detail").css("top", this.getAdminBarHeight() + "px");
        }
      }
      // 4 - Reservation detail (complete)
      if ($("#reservation_detail_sticky.sticky-top").length > 0) {
        if (adminBarAbsolute) {
          $("#reservation_detail_sticky").css("top", "0");
        } else {
          $("#reservation_detail_sticky").css(
            "top",
            this.getAdminBarHeight() + "px"
          );
        }
      }
    }
  },

  /**
   * Get the wordpress wpadminbar height
   */
  getAdminBarHeight: function (negativeValue) {
    var adminBar = document.getElementById("wpadminbar");

    if (adminBar) {
      var height = adminBar.getBoundingClientRect().height;
      return negativeValue ? -height : height;
    }

    return 0;
  },

  /**
   * Apply style to HTML
   *
   * [If modal visible it avoids to scroll on the document]
   *
   */
  htmlStyle: function (modalVisible) {
    var properties = {
      "overflow-y": "scroll",
      position: "fixed",
      width: "100%",
      left: "0",
    };

    var adminBar = document.getElementById("wpadminbar");
    if (adminBar) {
      properties["top"] = this.getAdminBarHeight(true) + "px";
    }

    var htmlStyle = document.documentElement.style;
    if (modalVisible) {
      for (var property in properties) {
        htmlStyle.setProperty(property, properties[property]);
      }
    } else {
      for (var property in properties) {
        htmlStyle.removeProperty(property);
      }
    }
  },
};

/**
 * Multi-level menu
 */
mybooking.multilevelMenu = {
  init: function () {
    // Multi Level dropdowns on click
    $("ul.dropdown-menu [data-toggle='dropdown']").on(
      "click",
      function (event) {
        event.preventDefault();
        event.stopPropagation();

        $(this).siblings().toggleClass("show");

        if (!$(this).next().hasClass("show")) {
          $(this)
            .parents(".dropdown-menu")
            .first()
            .find(".show")
            .removeClass("show");
        }
        $(this)
          .parents("li.nav-item.dropdown.show")
          .on("hidden.bs.dropdown", function (e) {
            $(".dropdown-submenu .show").removeClass("show");
          });
      }
    );

    // Keyboard Navigation on Mobile Menu
    $(document).on("keydown", function (event) {
      var modalMenuShown = $(".navbar-collapse").hasClass("show");

      // If mobile
      if (modalMenuShown) {
        if (
          $("button.navbar-toggler").length > 0 &&
          $("nav.navbar ul.navbar-nav > li.menu-item:last > a").length > 0
        ) {
          var first = $("button.navbar-toggler").get(0);
          var last = $("nav.navbar ul.navbar-nav > li.menu-item:last > a").get(
            0
          );

          var tabKey = event.keyCode === 9;
          var shiftKey = event.shiftKey;

          if (!shiftKey && tabKey) {
            if (event.target === last) {
              event.preventDefault();
              first.focus();
            }
          }

          if (shiftKey && tabKey) {
            if (event.target === first) {
              event.preventDefault();
              last.focus();
            }
          }
        }
      }
    });
  },
};

// -----

/**
 * Sticky form selector
 *
 * Manage behaivour of form selector depending viewport
 * and controls sticky trigger point.
 *
 * .home-header_sticky-breakpoint could be added under
 * selector parent container via page builder and then it
 * could be used to allow sticky on pages different than homepage.
 */
mybooking.stickyFormSelector = {
  init: function () {
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
          } else if ($(window).scrollTop() > height && $('#driver_age_rule_id').length === 0) {
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
  },
};

/**
 * Reservation steps
 * Adds clases and elemnts to reservation process steps block
 */
mybooking.reservationSteps = {
  init: function () {
    $(".step").each(function (index, element) {
      //element == this
      $(element).not(".active").addClass("done");
      $(".done").html('<i class="fa fa-check" aria-hidden="true"></i>');
      if ($(this).is(".active")) {
        return false;
      }
    });
  },
};

/**
 * Jquery validator : It extends default styles
 */
mybooking.validation = {
  init: function () {
    if (jQuery.validator) {
      jQuery.validator.setDefaults({
        highlight: function (element) {
          jQuery(element).closest(".form-control").addClass("is-invalid");
        },
        unhighlight: function (element) {
          jQuery(element).closest(".form-control").removeClass("is-invalid");
        },
        errorElement: "span",
        errorClass: "label label-danger",
        errorPlacement: function (error, element) {
          if (element.parent(".input-group").length) {
            error.insertAfter(element.parent());
          } else {
            error.insertAfter(element);
          }
        },
      });
    }
  },
};

$(document).ready(function () {
  mybooking.carrouselPortada.init();
  mybooking.goTopButton.init();
  mybooking.modalMargin.init();
  mybooking.navBarMenu.init();
  mybooking.multilevelMenu.init();
  mybooking.stickyFormSelector.init();
  mybooking.reservationSteps.init();
  mybooking.validation.init();
});
