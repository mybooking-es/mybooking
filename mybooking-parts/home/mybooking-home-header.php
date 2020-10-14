<?php
/**
*		MYBOOKING HOME HEADER PARTIAL
*  	-----------------------------
*
* 	@version 0.0.6
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*   Notes:
*   ------
*
*   The wizard container is included in order to be able to show the selection
*   wizard in the home page
*
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- WIZARD -->
<div class="wizard-container full-size-datepicker-container" id="wizard_container">
  <div class="wizard-step_header container">
    <span class="wizard-close" id="close_wizard_btn">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-icon.png" alt="X">
    </span>
    <div class="wizard-step_title step_title" id="step_title"></div>
  </div>
  <div class="wizard-step_container" id="wizard_container_step">
    <div class="wizard-step_summary" id="wizard_container_step_header"></div>
    <div class="wizard-step_body" id="wizard_container_step_body"></div>
  </div>
</div>

<?php $home_header_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_header_visibility" );
if ($home_header_visible == '1') { ?>

  <div class="home-header">

    <!-- Backgrounds -->

    <?php $options_header_background = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_home_header_bg' );
      if ( $options_header_background == 0 ) { ?>

        <!-- Image background -->
        <?php $image_header = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_home_header_image_bg' ); ?>
        <?php if ( !empty($image_header) ) { ?>
          <img class="home-header_background home-header_background-img" src="<?php echo $image_header ?>">
        <?php } else { ?>
          <div class="home-header_background home-header_background-img"></div>
        <?php } ?>

    <?php } elseif ( $options_header_background == 1 ) { ?>

      <!-- Video background -->
      <?php $video_header = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_home_header_video_bg' ); ?>
      <div class="home-header_background-video-container">
        <?php if ( !empty($video_header) ) { ?>
            <video class="home-header_background-video" autoplay loop muted>
              <source src="<?php echo $video_header ?>">
            </video>
        <?php } else { ?>
            <div class="home-header_background-video"></div>
        <?php } ?>
      </div>
    <?php } elseif ( $options_header_background == 2 ) { ?>

      <!-- Carrousel backgrond -->
      <div class="home-header_background home-header_background_carrusel portada-carrusel -carrusel-portada">
        <?php $mybooking_carousel_items = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_home_header_carrousel_bg' ); ?>
        <?php if ( is_array($mybooking_carousel_items) && !empty( $mybooking_carousel_items ) ) { ?>
          <?php $mybooking_first = true; ?>
          <?php foreach( $mybooking_carousel_items as $mybooking_carousel_item ) :  ?>
            <div class="carrusel-item">
              <img src="<?php echo $mybooking_carousel_item ?>">
            </div>
            <?php $mybooking_first = false; ?>
          <?php endforeach; ?>
        <?php } ?>
      </div>

    <?php } ?>

    <!-- Structures -->

    <?php
      $navbar_integrated = get_theme_mod( "mybooking_home_navbar_integrated" );
      $navbar_fixed_class = ($navbar_integrated == 1 ? 'header-container_margin' : '');

    ?>

    <div id="home-header_content_container"
      class="container home-header_content_container <?php echo $navbar_fixed_class; ?>">
      <div class="row justify-content-center">

        <?php $options_header_layout = get_theme_mod( 'mybooking_home_header_layout', 0 );
          if ( $options_header_layout == 0 ) { ?>

        <div class="home-header_content home-left col-12 col-lg-6">
          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_izquierda' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_izquierda' ); ?>
          <?php endif; ?>
        </div>
        <div class="home-header_content home-right col-12 col-lg-6">
          <!-- Widget Right -->
          <?php if ( is_active_sidebar( 'mybooking_home_derecha' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_derecha' ); ?>
          <?php endif; ?>
        </div>

        <?php } elseif ( $options_header_layout == 1 ) { ?>

        <div class="home-header_content home-left col-12 col-lg-4">
          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_izquierda' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_izquierda' ); ?>
          <?php endif; ?>
        </div>
        <div class="home-header_content home-right col-12 col-lg-8">
          <!-- Widget Right -->
          <?php if ( is_active_sidebar( 'mybooking_home_derecha' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_derecha' ); ?>
          <?php endif; ?>
        </div>

        <?php } elseif ( $options_header_layout == 2 ) { ?>

        <div class="home-header_content home-left col-12 col-lg-8">
          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_izquierda' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_izquierda' ); ?>
          <?php endif; ?>
        </div>
        <div class="home-header_content home-right col-12 col-lg-4">
          <!-- Widget Right -->
          <?php if ( is_active_sidebar( 'mybooking_home_derecha' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_derecha' ); ?>
          <?php endif; ?>
        </div>

        <?php } elseif ( $options_header_layout == 3 ) { ?>

        <div class="home-header_content home-alone col">
          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_izquierda' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_izquierda' ); ?>
          <?php endif; ?>
          <!-- Widget Right -->
          <?php if ( is_active_sidebar( 'mybooking_home_derecha' ) ) : ?>
          <?php dynamic_sidebar( 'mybooking_home_derecha' ); ?>
          <?php endif; ?>
        </div>

        <?php } ?>

      </div>
    </div>
  </div>
  <span class="home-header_sticky-breakpoint"></span>

<?php } ?>
