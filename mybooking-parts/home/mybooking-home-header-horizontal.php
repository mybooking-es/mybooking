<?php
/**
*		MYBOOKING HOME HEADER HORIZONTAL PARTIAL
*  	----------------------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="hero-header-container">
  <?php $image_hero = get_option("home_hero_image"); ?>
  <img class="bg-landing" src="<?php echo $image_hero ?>" alt="">
  <div class="hero-header-content-horizontal">
    <div class="aligner-horizontal">

      <!-- Title -->
      <?php $title_hero = get_option("home_hero_title");
        if ($title_hero !== '') { ?>
          <h1><?php echo $title_hero ?></h1>
      <?php } ?>

      <!-- Subtitle -->
      <?php $text_hero = get_option("home_hero_text");
        if ($text_hero !== '') { ?>
          <p><?php echo $text_hero ?></p>
      <?php } ?>

      <!-- Widget -->
      <?php if ( is_active_sidebar( 'mybooking_home_hero_main' ) ) : ?>
        <?php dynamic_sidebar( 'mybooking_home_hero_main' ); ?>
      <?php endif; ?>

    </div>
  </div>
</div>
