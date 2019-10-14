<?php
/**
*		RESERVATION HOME FEATURES PARTIAL
*  	---------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $features_visible = get_option("home_features_visibility");
if ($features_visible == 1) { ?>

  <div class="gradient-section">

      <!-- Header -->
      <div class="title-wrapper">
        <div class="title">
      <?php $title_features_header = get_option("home_features_header_title");
          if ($title_features_header !== '') { ?>
            <h1 class="color-white"><?php echo $title_features_header ?></h1>
      <?php }
          else { ?>
            <h1 class="color-white"><?php _e("Cómo funciona",'mybooking'); ?></h1>
      <?php } ?>

      <?php $text_features_header = get_option("home_features_header_text");
          if ($text_features_header !== '') { ?>
            <p class="color-white"><?php echo $text_features_header ?></p>
      <?php }
          else { ?>
            <p class="color-white"><?php _e("Mybooking WordPress Theme es sencillo de instalar y configurar para que puedas lanzar tu web de reservas en el menor tiempo posible",'mybooking'); ?></p>
      <?php } ?>
      </div>
    </div>

    <div class="text-center">

      <?php $imagen_features_header = get_option("home_features_header_image");
          if ($imagen_features_header !== '') { ?>
            <img class="image-fluid" src="<?php echo $imagen_features_header ?>" alt="">
      <?php }
          else { ?>
            <img class="image-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/images/three-cars.png" alt="">
      <?php } ?>

    </div>

    <!-- Points -->

    <div class="feature">
      <div class="features__item">
        <span class="stopa stopa-1">1</span>

        <?php $title_features_one = get_option("home_features_one_title");
            if ($title_features_one !== '') { ?>
              <h3><?php echo $title_features_one ?></h3>
        <?php }
            else { ?>
              <h3><?php _e("Instala",'mybooking'); ?></h3>
        <?php } ?>

        <hr />

        <?php $text_features_one = get_option("home_features_one_text");
            if ($text_features_one !== '') { ?>
              <p><?php echo $text_features_one ?></p>
        <?php }
            else { ?>
              <p><?php _e("Mybooking WordPress se integra con tu sitio WordPress existente o te permite empezar desde cero. Tu decides.",'mybooking'); ?></p>
        <?php } ?>

      </div>

      <div class="features__item">
        <span class="stopa stopa-2">2</span>

        <?php $title_features_two = get_option("home_features_two_title");
            if ($title_features_two !== '') { ?>
              <h3><?php echo $title_features_two ?></h3>
        <?php }
            else { ?>
              <h3><?php _e("Configura",'mybooking'); ?></h3>

        <?php } ?>

        <hr />

        <?php $text_features_two = get_option("home_features_two_text");
            if ($text_features_two !== '') { ?>
              <p><?php echo $text_features_two ?></p>
        <?php }
            else { ?>
              <p><?php _e("Mybooking WordPress está pensado para que la configuración de tu sitio sea rápida y sencilla.",'mybooking'); ?></p>
        <?php } ?>

      </div>

      <div class="features__item">
        <span class="stopa stopa-3">3</span>

        <?php $title_features_three = get_option("home_features_three_title");
            if ($title_features_three !== '') { ?>
              <h3><?php echo $title_features_three ?></h3>
        <?php }
            else { ?>
              <h3><?php _e("Reserva",'mybooking'); ?></h3>
        <?php } ?>

        <hr />

        <?php $text_features_three = get_option("home_features_three_text");
            if ($text_features_three !== '') { ?>
              <p><?php echo $text_features_three ?></p>
        <?php }
            else { ?>
              <p><?php _e("Nuestro plugin conecta tu sitio web con el back-office en segundos y sin quebraderos de cabeza.",'mybooking'); ?></p>
        <?php } ?>

      </div>
    </div>
  </div>

<?php } ?>
