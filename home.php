<?php

/**
* Template Name: MyBooking Home
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

// Variables del template


// Pintamos la cabecera de página
get_header();
?>

<!-- HERO SECTION -->

<div class="hero-header-container">
  <div class="hero-header-content">

    <!-- PUNCHLINE -->
    <div class="hero-header-left">
      <div class="aligner">
        <!-- Titulo -->
        <?php
          $titulo_hero = get_option("home_hero_title");

    	    if ($titulo_hero !== '') { ?>
    	    	<h1><?php echo $titulo_hero ?></h1>
    	    <?php }
    	  	else { ?>
    	  		<h1><?php _e("Título genérico",'mybookinges'); ?></h1>
            <!-- TODO: Añadir título genérico final -->
        <?php } ?>
        <!-- Texto -->
        <?php
          $texto_hero = get_option("home_hero_text");

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

    <!-- WIDGET AREA -->
    <div class="hero-header-right">
      <?php if ( is_active_sidebar( 'mybooking_home_hero' ) ) : ?>
      	<?php dynamic_sidebar( 'mybooking_home_hero' ); ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="diagonal-section"></div>
</div>

<div class="flex-block-wrapper">
  <div class="centered-flex-block mt150">
    <h1>Overview</h1>
    <div class="hr"></div>
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae magni culpa
      laudantium at. Pariatur officia maiores earum
    </p>
  </div>
</div>

<div class="icons-wrapper mt100">
  <div class="icon-panel icon-1">
    <i class="fas fa-gas-pump"></i><br />
    <h5>We don't charge deposit</h5>
  </div>
  <div class="icon-panel icon-2">
    <i class="fas fa-wallet"></i><br />
    <h5>Competitive prices</h5>
  </div>
  <div class="icon-panel icon-3">
    <i class="fas fa-credit-card"></i><br />
    <h5>Credit card doesn't required</h5>
  </div>
  <div class="icon-panel icon-4">
    <i class="fas fa-users"></i><br />
    <h5>Extra drivers included</h5>
  </div>
</div>

<div class="gradient-section">
  <div class="centered-flex-block mt150">
    <h1 class="color-white">How it works</h1>
    <div class="hr-white"></div>
    <p class="color-white">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae magni culpa
      laudantium at. Pariatur officia maiores earum impedit numquam quod cum
    </p>
  </div>
  <div class="centered-flex-block">
    <img src="assets/images/three-cars.png" alt="" />
  </div>

  <div class="feature">
    <div class="features__item">
      <span class="stopa">1</span>
      <h3>Choose</h3>
      <hr />
      <p>
        Duis finibus odio sit amet nisi dictum et viverra libero semper donec
      </p>
    </div>
    <div class="features__item">
      <span class="stopa stopa-2">2</span>
      <h3>Your</h3>
      <hr />
      <p>
        Integer ac rhoncus urna curabitur feugiat dolor id fermentum rutrum ex
        tellus tristique ante sit amet malesuada justo diam
      </p>
    </div>
    <div class="features__item">
      <span class="stopa">3</span>
      <h3>Car</h3>
      <hr />
      <p>
        Duis finibus odio sit amet nisi dictum et viverra libero semper donec
      </p>
    </div>
  </div>
</div>

<?php get_footer();
