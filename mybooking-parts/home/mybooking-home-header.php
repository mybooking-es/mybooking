<?php
/**
*		MYBOOKING HOME HEADER PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="hero-header-container">

  <?php $video_hero = get_option( "home_hero_video" ); ?>
  <?php $image_hero = get_option( "home_hero_image" ); ?>

  <?php if ( $video_hero !== '' ) { ?>

    <video class="bg-landing" src="<?php echo $video_hero ?>">

  <?php } else { ?>

    <img class="bg-landing" src="<?php echo $image_hero ?>" alt="">

  <?php } ?>

  <div class="hero-header-content">
    <div class="hero-header-left">
      <div class="aligner">
        <p>

          <!-- Widget Left -->
          <?php if ( is_active_sidebar( 'mybooking_home_hero_secondary' ) ) : ?>
            <?php dynamic_sidebar( 'mybooking_home_hero_secondary' ); ?>
          <?php endif; ?>

        </p>

        <!-- Title -->
        <?php $title_hero = get_option( "home_hero_title" );
    	    if ($title_hero !== '') { ?>
            <h1><?php echo $title_hero ?></h1>
        <?php } ?>

        <!-- Subtitle -->
        <?php $text_hero = get_option("home_hero_text");
    	    if ($text_hero !== '') { ?>
            <p><?php echo $text_hero ?></p>
        <?php } ?>

      </div>
    </div>

    <div class="hero-header-right">

      <!-- Widget Right -->
      <?php if ( is_active_sidebar( 'mybooking_home_hero_main' ) ) : ?>
        <?php dynamic_sidebar( 'mybooking_home_hero_main' ); ?>
      <?php endif; ?>

    </div>

  </div>
</div>
