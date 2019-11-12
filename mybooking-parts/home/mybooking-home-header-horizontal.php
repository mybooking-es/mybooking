<?php
/**
*		MYBOOKING HOME HEADER HORIZONTAL PARTIAL
*  	----------------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="hero-header-container">
  <div class="hero-header-content-horizontal">
    <div class="aligner-horizontal">

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

      <!-- Widget -->
      <?php if ( is_active_sidebar( 'mybooking_home_hero_right' ) ) : ?>
        <?php dynamic_sidebar( 'mybooking_home_hero_right' ); ?>
      <?php endif; ?>

    </div>
  </div>
</div>
