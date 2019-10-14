<?php
/**
*		RESERVATION HOME HIGHLIGHT PARTIAL
*  	----------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
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
      <div class="icon-panel icon-1">

        <?php $imagen_fact_one = get_option("home_fact_one_image");
            if ($imagen_fact_one !== '') { ?>
              <img src="<?php echo $imagen_fact_one ?>" alt="">
        <?php }
            else { ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_1.svg" alt="">
        <?php } ?>

        <?php $text_fact_one = get_option("home_fact_one_text");
            if ($text_fact_one !== '') { ?>
              <br>
              <h6 class="color-black"><?php echo $text_fact_one ?></h6>
        <?php }
            else { ?>
              <h6 class="color-black"><?php _e("Conecta tu cuenta de Mybooking",'mybooking'); ?></h6>
        <?php } ?>

      </div>

      <div class="icon-panel icon-2">

        <?php $imagen_fact_two = get_option("home_fact_two_image");
            if ($imagen_fact_two !== '') { ?>
              <img src="<?php echo $imagen_fact_two ?>" alt="">
        <?php }
            else { ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_2.svg" alt="">
        <?php } ?>

        <?php $text_fact_two = get_option("home_fact_two_text");
            if ($text_fact_two !== '') { ?>
              <h6 class="color-black"><?php echo $text_fact_two ?></h6>
        <?php }
            else { ?>
              <h6 class="color-black"><?php _e("Opciones de diseño y personalización",'mybooking'); ?></h6>
        <?php } ?>

      </div>

      <div class="icon-panel icon-3">

        <?php $imagen_fact_three = get_option("home_fact_three_image");
            if ($imagen_fact_three !== '') { ?>
              <img src="<?php echo $imagen_fact_three ?>" alt="">
        <?php }
            else { ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_3.svg" alt="">
        <?php } ?>

        <?php $text_fact_three = get_option("home_fact_three_text");
            if ($text_fact_three !== '') { ?>

            <h6 class="color-black"><?php echo $text_fact_three ?></h6>

        <?php }
            else { ?>
              <h6 class="color-black"><?php _e("Gestión sencilla de contenidos",'mybooking'); ?></h6>
        <?php } ?>

      </div>

      <div class="icon-panel icon-4">

          <?php $imagen_fact_four = get_option("home_fact_four_image");
              if ($imagen_fact_four !== '') { ?>
                <img src="<?php echo $imagen_fact_four ?>" alt="">
          <?php }
              else { ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_4.svg" alt="">
          <?php } ?>

          <?php $text_fact_four = get_option("home_fact_four_text");
              if ($text_fact_four !== '') { ?>
                <h6 class="color-black"><?php echo $text_fact_four ?></h6>
          <?php }
              else { ?>
                <h6 class="color-black"><?php _e("Listo para empezar desde cero",'mybooking'); ?></h6>
          <?php } ?>

        </div>
      </div>

    </div>

<?php } ?>
