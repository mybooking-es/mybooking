<?php
/**
*		MYBOOKING HOME HEADER PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="hero-header-container">
  <div class="hero-header-content">
    <div class="hero-header-left">
      <div class="aligner">
        <p>

          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_hero_left' ) ) : ?>
            <?php dynamic_sidebar( 'mybooking_home_hero_left' ); ?>
          <?php endif; ?>

        </p>

        <!-- Title -->
        <?php $title_hero = get_option("home_hero_title");
    	    if ($title_hero !== '') { ?>
            <h1><?php echo $title_hero ?></h1>
        <?php }
    	  	else { ?>
            <h1><?php _e("Mybooking WordPress Theme",'mybooking'); ?></h1>
        <?php } ?>

        <!-- Subtitle -->
        <?php $text_hero = get_option("home_hero_text");
    	    if ($text_hero !== '') { ?>
            <p><?php echo $text_hero ?></p>
        <?php }
    	  	else { ?>
            <p><?php _e("Lanza tu web de reservas para tu negocio de alquiler de vehiculos sin esfuerzo. Instalar y listo.",'mybooking'); ?></p>
        <?php } ?>

      </div>
    </div>

    <!-- Widget Right -->
    <div class="hero-header-right">

      <?php if ( is_active_sidebar( 'mybooking_home_hero_right' ) ) : ?>
        <?php dynamic_sidebar( 'mybooking_home_hero_right' ); ?>
      <?php endif; ?>

    </div>

  </div>
</div>
