<?php
/**
*		NAVIGATION BRANDING PARTIAL
*  	---------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.4.0
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<?php if ( has_custom_logo() ) { 
    // Custom logo
    // Check if the post has a custom logo
    global $post;
    if ( isset($post) ) {
      $mybooking_custom_logo = get_post_meta($post->ID, 'custom_logo', true);
      if ( !empty( $mybooking_custom_logo ) ) { ?>
        <a href="<?php echo esc_attr ( esc_url( home_url( '/' ) ) ); ?>" class="navbar-brand custom-logo-link" rel="home">
          <img src="<?php echo esc_attr ( esc_url ( $mybooking_custom_logo ) ); ?>" class="img-fluid">
        </a>
<?php } 
      else {
        the_custom_logo();
      } 
    } 
    else {
      the_custom_logo();
    }
} else { 

  // Not custom logo
  if ( is_front_page() && is_home() ) { ?>

    <!-- Puts sitename and description inside H1 tag only at home -->
    <h1 class="navbar-brand mb-0">
      <a
        rel="home"
        href="<?php echo esc_attr ( esc_url( home_url( '/' ) ) ); ?>"
        title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
        itemprop="url">
          <?php bloginfo( 'name' ); ?>
      </a>
    </h1>

  <?php } else { ?>

    <!-- Puts sitename and description everywhere but home -->
    <a
      class="navbar-brand"
      rel="home"
      href="<?php echo esc_attr( esc_url( home_url( '/' ) ) ); ?>"
      title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
      itemprop="url">
        <?php bloginfo( 'name' ); ?>
    </a>

  <?php } ?>

<?php } ?>
