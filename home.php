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

<!-- SECTION HEADER --------------------------------------------------------->

<div class="hero-header-container">
  <div class="hero-header-content">

    <!-- Punchline -->

    <div class="hero-header-left">
      <div class="aligner">

        <?php $title_hero = get_option("home_hero_title");
    	    if ($title_hero !== '') { ?>
            <h1><?php echo $title_hero ?></h1>
        <?php }
    	  	else { ?>
            <h1><?php _e("Mybooking WordPress Theme",'mybookinges'); ?></h1>
        <?php } ?>

        <?php $text_hero = get_option("home_hero_text");
    	    if ($text_hero !== '') { ?>
            <p><?php echo $text_hero ?></p>
        <?php }
    	  	else { ?>
            <p><?php _e("Lanza tu web de reservas para tu negocio de alquiler de vehiculos sin esfuerzo. Instalar y listo.",'mybookinges'); ?></p>
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

</div>


<!-- SECTION HIGHLIGHT -------------------------------------------------------->

<?php $highlight_visible = get_option("home_highlight_visibility");
if ($highlight_visible == 1) { ?>

  <div class="gradient-section">
    <div class="container">

    <!-- Header -->

        <?php
        $title_highlight_header = get_option("home_highlight_header_title");
        $text_highlight_header = get_option("home_highlight_header_text");
            if ($title_highlight_header !== '' || $text_highlight_header !== '') { ?>

              <div class="flex-block-wrapper">
                <div class="centered-flex-block mt150">
                  <h1><?php echo $title_highlight_header ?></h1>
                  <p class="color-gray-500"><?php echo $text_highlight_header ?></p>
                </div>
              </div>

        <?php } ?>

    <!-- Facts -->

    <div class="icons-wrapper mt100">
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
              <h5 class="color-white"><?php echo $text_fact_one ?></h5>
        <?php }
            else { ?>
              <h5 class="color-white"><?php _e("Conecta tu cuenta de Mybooking",'mybookinges'); ?></h5>
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
              <h5 class="color-white"><?php echo $text_fact_two ?></h5>
        <?php }
            else { ?>
              <h5 class="color-white"><?php _e("Opciones de diseño y personalización",'mybookinges'); ?></h5>
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

            <h5 class="color-white"><?php echo $text_fact_three ?></h5>

        <?php }
            else { ?>
              <h5 class="color-white"><?php _e("Gestión sencilla de contenidos",'mybookinges'); ?></h5>
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
                <h5 class="color-white"><?php echo $text_fact_four ?></h5>
          <?php }
              else { ?>
                <h5 class="color-white"><?php _e("Listo para empezar desde cero",'mybookinges'); ?></h5>
          <?php } ?>

        </div>
      </div>

    </div>
  </div>

<?php } ?>


<!-- PROMO SECTION ----------------------------------------------------------->

<?php $promo_visible = get_option("home_promo_visibility");
if ($promo_visible == 1) { ?>

<div class="container">
  <div class="">

      <?php
      $promo_args = array(
        'post_type' => 'promo',
        'tax_query' => array(
          array(
            'taxonomy' => 'estado',
            'field' => 'slug',
            'terms' => array( 'activo' )
          ),
        ),
        'posts_per_page'=> 1,
      );
      $promo_item = new WP_Query($promo_args); ?>
      <?php  while ( $promo_item->have_posts() ) : $promo_item->the_post(); ?>

        <br>
        <div class="row">
          <div class="col text-center">

            <?php the_post_thumbnail(); ?>
            <h2 class="promo_title display-4"><?php the_title(); ?></h2>

            <?php
            $promo_button_visible = get_option("home_promo_button_visibility");
            $promo_button_text = get_option("home_promo_button_text");
            if ($promo_button_visible == 1 && $promo_button_text !=='') { ?>

              <a class="btn btn-primary mb50" href="<?php the_permalink(); ?>" >
                <?php esc_html_e( $promo_button_text, 'mybookinges' ); ?>
              </a>

            <?php } ?>

          </div>
        </div>
        <br>

    <?php endwhile; ?>

  </div>
</div>

<?php } ?>


<!-- SECTION FEATURES -------------------------------------------------->

<?php $features_visible = get_option("home_features_visibility");
if ($features_visible == 1) { ?>

  <div class="gradient-section">
    <div class="centered-flex-block mt150">

      <!-- Header -->

      <?php $title_features_header = get_option("home_features_header_title");
          if ($title_features_header !== '') { ?>
            <h1 class="color-white"><?php echo $title_features_header ?></h1>
      <?php }
          else { ?>
            <h1 class="color-white"><?php _e("Cómo funciona",'mybookinges'); ?></h1>
      <?php } ?>

      <?php $text_features_header = get_option("home_features_header_text");
          if ($text_features_header !== '') { ?>
            <p class="color-white"><?php echo $text_features_header ?></p>
      <?php }
          else { ?>
            <p class="color-white"><?php _e("Mybooking WordPress Theme es sencillo de instalar y configurar para que puedas lanzar tu web de reservas en el menor tiempo posible",'mybookinges'); ?></p>
      <?php } ?>

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
              <h3><?php _e("Instala",'mybookinges'); ?></h3>
        <?php } ?>

        <hr />

        <?php $text_features_one = get_option("home_features_one_text");
            if ($text_features_one !== '') { ?>
              <p><?php echo $text_features_one ?></p>
        <?php }
            else { ?>
              <p><?php _e("Mybooking WordPress se integra con tu sitio WordPress existente o te permite empezar desde cero. Tu decides.",'mybookinges'); ?></p>
        <?php } ?>

      </div>

      <div class="features__item">
        <span class="stopa stopa-2">2</span>

        <?php $title_features_two = get_option("home_features_two_title");
            if ($title_features_two !== '') { ?>
              <h3><?php echo $title_features_two ?></h3>
        <?php }
            else { ?>
              <h3><?php _e("Configura",'mybookinges'); ?></h3>

        <?php } ?>

        <hr />

        <?php $text_features_two = get_option("home_features_two_text");
            if ($text_features_two !== '') { ?>
              <p><?php echo $text_features_two ?></p>
        <?php }
            else { ?>
              <p><?php _e("Mybooking WordPress está pensado para que la configuración de tu sitio sea rápida y sencilla.",'mybookinges'); ?></p>
        <?php } ?>

      </div>

      <div class="features__item">
        <span class="stopa stopa-3">3</span>

        <?php $title_features_three = get_option("home_features_three_title");
            if ($title_features_three !== '') { ?>
              <h3><?php echo $title_features_three ?></h3>
        <?php }
            else { ?>
              <h3><?php _e("Reserva",'mybookinges'); ?></h3>
        <?php } ?>

        <hr />

        <?php $text_features_three = get_option("home_features_three_text");
            if ($text_features_three !== '') { ?>
              <p><?php echo $text_features_three ?></p>
        <?php }
            else { ?>
              <p><?php _e("Nuestro plugin conecta tu sitio web con el back-office en segundos y sin quebraderos de cabeza.",'mybookinges'); ?></p>
        <?php } ?>

      </div>
    </div>
  </div>

<?php } ?>


<!-- NEWS SECTION ------------------------------------------------------------>

<?php $news_visible = get_option("home_news_visibility");
if ($news_visible == 1) { ?>

  <div class="news_container">
  <div class="container">
      <div class="row">

        <?php
        $news_args = array(
          'post_type' => 'post',
          'category_name' => 'mybooking-home',
          'posts_per_page'=> 3,
        );
        $news_item = new WP_Query($news_args); ?>
        <?php  while ( $news_item->have_posts() ) : $news_item->the_post(); ?>

          <div class="col-md-4">
            <div class="news_thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>
            <h2 class="news_title"><?php the_title(); ?></h2>
            <div class="news_extract">
              <?php echo the_excerpt(); ?>
            </div>
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  </div>

<?php } ?>

<!-- PAGE CONTENT ------------------------------------------------------------->

<div class="content flex-block-wrapper">
  <div class="centered-flex-block">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile;?>

  </div>
</div>


<!-- TESTIMONIAL CAROUSEL ----------------------------------------------------->

<?php $testimonial_carousel_visible = get_option("home_testimonial_carousel_visibility");
if ($testimonial_carousel_visible == 1) { ?>

  <div class="container -carrusel-un-item carrusel-de-uno owl-carousel owl-theme">
    <!--div class="container">
      <div class="row justify-content-center"-->

        <?php
        $testimonial_args = array('post_type' => 'testimonial');
        $testimonial_item = new WP_Query($testimonial_args);
        while ( $testimonial_item->have_posts() ) : $testimonial_item->the_post();
        ?>

          <div class="col-md-12">
            <blockquote class="blockquote">
              <p class="mb-0 text-centered">
                <?php the_content(); ?>
              </p>
              <footer class="blockquote-footer">
                <?php the_title(); ?>
              </footer>
            </blockquote>
          </div>

        <?php endwhile; ?>

      <!--/div>
    </div-->
  </div>

<?php } ?>

<?php get_footer(); ?>
