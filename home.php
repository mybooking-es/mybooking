<?php

/**
* Template Name: MyBooking Home
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- SECCION CABECERA --------------------------------------------------------->

<div class="hero-header-container">
  <div class="hero-header-content">

    <!-- Eslogan -->

    <div class="hero-header-left">
      <div class="aligner">

        <!-- Titulo -->
        <?php $titulo_hero = get_option("home_hero_title");
    	    if ($titulo_hero !== '') { ?>
        <h1><?php echo $titulo_hero ?></h1>
        <?php }
    	  	else { ?>
        <h1><?php _e("Título genérico",'mybookinges'); ?></h1>
        <!-- TODO: Añadir título genérico final -->
        <?php } ?>

        <!-- Texto -->
        <?php $texto_hero = get_option("home_hero_text");
    	    if ($texto_hero !== '') { ?>
        <p><?php echo $texto_hero ?></p>
        <?php }
    	  	else { ?>
        <p><?php _e("Texto genérico sin Lorem ipsum dolor amet flannel mumblecore air plant iceland hexagon
            tote bag twee pok pok scenester selfies.",'mybookinges'); ?></p>
        <!-- TODO: Agregar texto genérico final -->
        <?php } ?>

      </div>
    </div>

    <!-- Widget -->

    <div class="hero-header-right">

      <?php if ( is_active_sidebar( 'mybooking_home_hero' ) ) : ?>
        <?php dynamic_sidebar( 'mybooking_home_hero' ); ?>
      <?php endif; ?>

    </div>
  </div>

  <div class="diagonal-section"></div>

</div>

<!-- Test widgets area -->

<div class="row">
  <div class="col-md-12">

    <?php if ( is_active_sidebar( 'mybooking_top_bar' ) ) : ?>
      <?php dynamic_sidebar( 'mybooking_top_bar' ); ?>
    <?php endif; ?>

  </div>
</div>


<!-- SECCION DESTACADA -------------------------------------------------------->

<?php $highlight_ver = get_option("home_highlight_visibilidad");
if ($highlight_ver == 1) { ?>

<!-- Cabecera -->

<div class="flex-block-wrapper">
  <div class="centered-flex-block mt150">

    <!-- Titulo -->
    <?php $titulo_highlight_cabecera = get_option("home_highlight_cabecera_title");
        if ($titulo_highlight_cabecera !== '') { ?>
    <h1><?php echo $titulo_highlight_cabecera ?></h1>
    <?php }
        else { ?>
    <h1><?php _e("Título sección",'mybookinges'); ?></h1>
    <!-- TODO: Añadir título genérico final -->
    <?php } ?>

    <!-- Texto -->
    <?php $texto_highlight_cabecera = get_option("home_highlight_cabecera_text");
        if ($texto_highlight_cabecera !== '') { ?>
    <p><?php echo $texto_highlight_cabecera ?></p>
    <?php }
        else { ?>
    <p><?php _e("Texto destacado sin Lorem ipsum dolor amet flannel mumblecore air plant iceland hexagon
          tote bag twee pok pok scenester selfies.",'mybookinges'); ?></p>
    <!-- TODO: Agregar texto genérico final -->
    <?php } ?>

  </div>
</div>

<!-- Puntos fuertes -->

<div class="icons-wrapper mt100">
  <div class="icon-panel icon-1">

    <?php $imagen_punto_uno = get_option("home_punto_uno_image");
        if ($imagen_punto_uno !== '') { ?>
    <img src="<?php echo $imagen_punto_uno ?>" alt="">
    <?php }
        else { ?>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_1.svg" alt="">
    <?php } ?>

    <?php $texto_punto_uno = get_option("home_punto_uno_text");
        if ($texto_punto_uno !== '') { ?>
    <br>
    <h5><?php echo $texto_punto_uno ?></h5>
    <?php }
        else { ?>
    <br>
    <h5><?php _e("We don't charge deposit",'mybookinges'); ?></h5>
    <?php } ?>

  </div>

  <div class="icon-panel icon-2">

    <?php $imagen_punto_dos = get_option("home_punto_dos_image");
        if ($imagen_punto_dos !== '') { ?>
    <img src="<?php echo $imagen_punto_dos ?>" alt="">
    <?php }
        else { ?>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_2.svg" alt="">
    <?php } ?>

    <?php $texto_punto_dos = get_option("home_punto_dos_text");
        if ($texto_punto_dos !== '') { ?>
    <br>
    <h5><?php echo $texto_punto_dos ?></h5>
    <?php }
        else { ?>
    <br>
    <h5><?php _e("Competitive prices",'mybookinges'); ?></h5>
    <?php } ?>

  </div>

  <div class="icon-panel icon-3">

    <?php $imagen_punto_tres = get_option("home_punto_tres_image");
        if ($imagen_punto_tres !== '') { ?>
    <img src="<?php echo $imagen_punto_tres ?>" alt="">
    <?php }
        else { ?>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/punto_3.svg" alt="">
    <?php } ?>

    <?php $texto_punto_tres = get_option("home_punto_tres_text");
        if ($texto_punto_tres !== '') { ?>
    <br>
    <h5><?php echo $texto_punto_tres ?></h5>
    <?php }
        else { ?>
    <br>
    <h5><?php _e("Extra drivers included",'mybookinges'); ?></h5>
    <?php } ?>

  </div>
</div>
<!-- TODO: Igualar los margins para darle consistencia cuando actue the_content() -->

<?php } ?>


<!-- SECCION CARACTERISTICAS -------------------------------------------------->

<?php $features_ver = get_option("home_features_visibilidad");
if ($features_ver == 1) { ?>

<div class="gradient-section">
  <div class="centered-flex-block mt150">

    <!-- Titulo -->
    <?php $titulo_features_cabecera = get_option("home_features_cabecera_title");
        if ($titulo_features_cabecera !== '') { ?>
    <h1 class="color-white"><?php echo $titulo_features_cabecera ?></h1>
    <?php }
        else { ?>
    <h1 class="color-white"><?php _e("How it works",'mybookinges'); ?></h1>
    <!-- TODO: Añadir título genérico final -->
    <?php } ?>

    <!-- Texto -->
    <?php $texto_features_cabecera = get_option("home_features_cabecera_text");
        if ($texto_features_cabecera !== '') { ?>
    <p class="color-white"><?php echo $texto_features_cabecera ?></p>
    <?php }
        else { ?>
    <p class="color-white"><?php _e("Texto caracteristicas sin Lorem ipsum dolor amet flannel mumblecore air plant iceland hexagon
          tote bag twee pok pok scenester selfies.",'mybookinges'); ?></p>
    <!-- TODO: Agregar texto genérico final -->
    <?php } ?>

  </div>

  <div class="text-center">

    <?php $imagen_features_cabecera = get_option("home_features_cabecera_image");
        if ($imagen_features_cabecera !== '') { ?>
    <img class="image-fluid" src="<?php echo $imagen_features_cabecera ?>" alt="">
    <?php }
        else { ?>
    <img class="image-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/images/three-cars.png" alt="">
    <?php } ?>

  </div>

  <div class="feature">
    <div class="features__item">

      <span class="stopa stopa-1">1</span>

      <!-- Titulo -->
      <?php $titulo_features_uno = get_option("home_features_uno_title");
          if ($titulo_features_uno !== '') { ?>
      <h3><?php echo $titulo_features_uno ?></h3>
      <?php }
          else { ?>
      <h3><?php _e("Choose",'mybookinges'); ?></h3>
      <!-- TODO: Añadir título genérico final -->
      <?php } ?>

      <hr />

      <!-- Texto -->
      <?php $texto_features_uno = get_option("home_features_uno_text");
          if ($texto_features_uno !== '') { ?>
      <p><?php echo $texto_features_uno ?></p>
      <?php }
          else { ?>
      <p>
        <?php _e("Texto features Duis finibus odio sit amet nisi dictum et viverra libero semper donec.",'mybookinges'); ?>
      </p>
      <!-- TODO: Agregar texto genérico final -->
      <?php } ?>

    </div>

    <div class="features__item">

      <span class="stopa stopa-2">2</span>

      <!-- Titulo -->
      <?php $titulo_features_dos = get_option("home_features_dos_title");
          if ($titulo_features_dos !== '') { ?>
      <h3><?php echo $titulo_features_dos ?></h3>
      <?php }
          else { ?>
      <h3><?php _e("Your",'mybookinges'); ?></h3>
      <!-- TODO: Añadir título genérico final -->
      <?php } ?>

      <hr />

      <!-- Texto -->
      <?php $texto_features_dos = get_option("home_features_dos_text");
          if ($texto_features_dos !== '') { ?>
      <p><?php echo $texto_features_dos ?></p>
      <?php }
          else { ?>
      <p>
        <?php _e("Texto features Duis finibus odio sit amet nisi dictum et viverra libero semper donec.",'mybookinges'); ?>
      </p>
      <!-- TODO: Agregar texto genérico final -->
      <?php } ?>

    </div>

    <div class="features__item">

      <span class="stopa stopa-3">3</span>

      <!-- Titulo -->
      <?php $titulo_features_tres = get_option("home_features_tres_title");
          if ($titulo_features_tres !== '') { ?>
      <h3><?php echo $titulo_features_tres ?></h3>
      <?php }
          else { ?>
      <h3><?php _e("Choose",'mybookinges'); ?></h3>
      <!-- TODO: Añadir título genérico final -->
      <?php } ?>

      <hr />

      <!-- Texto -->
      <?php $texto_features_tres = get_option("home_features_tres_text");
          if ($texto_features_tres !== '') { ?>
      <p><?php echo $texto_features_tres ?></p>
      <?php }
          else { ?>
      <p>
        <?php _e("Texto features Duis finibus odio sit amet nisi dictum et viverra libero semper donec.",'mybookinges'); ?>
      </p>
      <!-- TODO: Agregar texto genérico final -->
      <?php } ?>

    </div>

  </div>
</div>

<?php } ?>


<!-- EL CONTENIDO ------------------------------------------------------------->

<div class="content flex-block-wrapper">
  <div class="centered-flex-block">

    <?php while ( have_posts() ) : the_post(); ?>
    <!-- TODO: Insertar aquí un separador que actue cuando se activa esta condición -->
    <?php the_content(); ?>
    <?php endwhile;?>

  </div>
</div>


<!-- CARRUSEL ----------------------------------------------------------------->

<?php $carrusel_ver = get_option("home_carrusel_visibilidad");
if ($carrusel_ver == 1) { ?>

  <div class="content">
    <div class="centered-flex-block">
      <div class="-carrusel-un-item carrusel-de-uno owl-carousel owl-theme">

        <?php
        $noticias_args = array(
          'post_type' => 'post',
          'category_name' => 'portada',
          'posts_per_page'=> 6,
        );
        $noticias_item = new WP_Query($noticias_args); ?>
        <?php  while ( $noticias_item->have_posts() ) : $noticias_item->the_post(); ?>
          <div class="carrusel-item banner">
            <?php the_post_thumbnail(); ?>
            <div class="banner-franja">
              <h2 class="banner-titulo"><?php the_title(); ?></h2>
              <a class="banner-enlace button tiny" href="<?php the_permalink(); ?>" title="<?php esc_attr__('Llegir','caritaspress'); ?> <?php the_title(); ?>">
                <?php _e('Llegir','mybookinges'); ?>
              </a>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
    </div>
  </div>

<?php } ?>

<?php get_footer(); ?>
