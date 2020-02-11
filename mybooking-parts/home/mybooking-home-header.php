<?php
/**
*		MYBOOKING HOME HEADER PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="home-header">

  <!-- FONDOS -->
  <?php $options_header_background = get_option( "home_header_background" );
  if ( $options_header_background == 0 ) { ?>

    <?php $image_header = get_option( "home_header_image" ); ?>
    <img class="home-header_background home-header_background_img" src="<?php echo $image_header ?>">

  <?php } elseif ( $options_header_background == 1 ) { ?>

    <?php $video_header = get_option( "home_header_video" ); ?>
    <?php $image_header = get_option( "home_header_image" ); ?>
    <video class="home-header_background_video" autoplay loop muted poster="<?php echo $image_header ?>">
      <source src="<?php echo $video_header ?>">
    </video>

  <?php } elseif ( $options_header_background == 2 ) { ?>

    <?php
    $carousel_args = array( 'post_type' => 'carousel' );
    $carousel_item = new WP_Query( $carousel_args );
    if( $carousel_item->have_posts() ) { ?>
      <div class="home-header_background home-header_background_carrusel portada-carrusel -carrusel-portada">
        <?php  while ( $carousel_item->have_posts() ) : $carousel_item->the_post(); ?>
          <div class="carrusel-item">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php } ?>    

  <?php } ?>

  <!-- ESTRUCTURAS -->

  <div id="home-header_content_container" class="container home-header_content_container" >
    <div class="row justify-content-center">

      <?php $options_header_layout = get_option( 'home_header_layout' );
      if ( $options_header_layout == 0 ) { ?>

        <div class="home-header_content home-left col">
          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_izquierda' ) ) : ?>
            <?php dynamic_sidebar( 'mybooking_home_izquierda' ); ?>
          <?php endif; ?>
        </div>
        <div class="home-header_content home-right col">
          <!-- Widget Right -->
          <?php if ( is_active_sidebar( 'mybooking_home_derecha' ) ) : ?>
            <?php dynamic_sidebar( 'mybooking_home_derecha' ); ?>
          <?php endif; ?>
        </div>

      <?php } elseif ( $options_header_layout == 1 ) { ?>

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
