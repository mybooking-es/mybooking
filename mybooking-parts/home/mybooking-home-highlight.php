<?php
/**
*		MYBOOKING HOME HIGHLIGHT PARTIAL
*  	----------------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $highlight_visible = get_option("home_highlight_visibility");
if ($highlight_visible == 1) { ?>

  <div class="container">

    <!-- Header -->

    <?php
    $title_highlight_header = get_option("home_highlight_header_title");
    $text_highlight_header = get_option("home_highlight_header_text");
      if ($title_highlight_header !== '' || $text_highlight_header !== '') { ?>

        <div class="title-wrapper">
          <div class="title">
            <h1><?php echo $title_highlight_header ?></h1>
            <p class="color-gray-500"><?php echo $text_highlight_header ?></p>
          </div>
        </div>

    <?php } ?>

    <!-- Facts -->

    <div class="icons-wrapper">

      <?php
        $imagen_fact_one = get_option( "home_fact_one_image" );
        $text_fact_one = get_option("home_fact_one_text");
        if ( $imagen_fact_one !== '' || $text_fact_one !== '' ) { ?>

          <div class="icon-panel icon-1">
            <img src="<?php echo $imagen_fact_one ?>" alt="">
          </div>
          <br>
          <h6 class="color-black"><?php echo $text_fact_one ?></h6>

      <?php } ?>
      <?php
        $imagen_fact_two = get_option( "home_fact_two_image" );
        $text_fact_two = get_option("home_fact_two_text");
        if ( $imagen_fact_two !== '' || $text_fact_two !== '' ) { ?>

          <div class="icon-panel icon-1">
            <img src="<?php echo $imagen_fact_two ?>" alt="">
          </div>
          <br>
          <h6 class="color-black"><?php echo $text_fact_two ?></h6>

      <?php } ?>
      <?php
        $imagen_fact_three = get_option( "home_fact_three_image" );
        $text_fact_three = get_option("home_fact_three_text");
        if ( $imagen_fact_three !== '' || $text_fact_three !== '' ) { ?>

          <div class="icon-panel icon-1">
            <img src="<?php echo $imagen_fact_three ?>" alt="">
          </div>
          <br>
          <h6 class="color-black"><?php echo $text_fact_three ?></h6>

      <?php } ?>
      <?php
        $imagen_fact_four = get_option( "home_fact_four_image" );
        $text_fact_four = get_option("home_fact_four_text");
        if ( $imagen_fact_four !== '' || $text_fact_four !== '' ) { ?>

          <div class="icon-panel icon-1">
            <img src="<?php echo $imagen_fact_four ?>" alt="">
          </div>
          <br>
          <h6 class="color-black"><?php echo $text_fact_four ?></h6>

      <?php } ?>

    </div>
  </div>

<?php } ?>
