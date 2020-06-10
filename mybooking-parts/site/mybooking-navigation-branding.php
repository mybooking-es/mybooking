<?php
/**
*		NAVIGATION BRANDING PARTIAL
*  	---------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// NOTE: This line is single client legacy code, we need to refactorize in orden to
// avoid debug warnings messages
$custom_logo = get_post_meta($post->ID, 'logo_personalizado', true)
?>

<?php if ( ! has_custom_logo() ) { ?>

  <?php if ( is_front_page() && is_home() ) : ?>

    <!-- Puts sitename and description inside H1 tag only at home -->

    <h1 class="navbar-brand mb-0">
      <a
        rel="home"
        href="<?php echo esc_url( home_url( '/' ) ); ?>"
        title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
        itemprop="url">
          <?php bloginfo( 'name' ); ?>
      </a>
    </h1>

  <?php else : ?>

    <!-- Puts sitename and description everywhere but home -->

    <a
      class="navbar-brand"
      rel="home"
      href="<?php echo esc_url( home_url( '/' ) ); ?>"
      title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
      itemprop="url">
        <?php bloginfo( 'name' ); ?>
    </a>

  <?php endif; ?>

<?php
// NOTE: This block is single client legacy code, we need to refactorize in orden to
// avoid debug warnings messages
} elseif ( !empty( $custom_logo ) ) { ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home">
      <img src="<?php echo $custom_logo; ?>" class="img-fluid">
    </a>

<?php } else { ?>

  <?php the_custom_logo(); ?>

<?php } ?>
