<?php
/**
*   SITE FUNCTIONS
*   ---------------
*   Site functions building the pages
*
*   @version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.40
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with the site logo
 */
if ( ! function_exists( 'mybooking_site_logo' ) ) {
  function mybooking_site_logo() {

    $result = '';

    if ( has_custom_logo() ) {
      $result = the_custom_logo();
      // Check if the post has a custom property called custom_logo that allows a custom logo
      global $post;
      if ( isset($post) ) {
        $mybooking_custom_logo = get_post_meta($post->ID, 'custom_logo', true);
        if ( !empty( $mybooking_custom_logo ) ) { 
          $result = sprintf('<a href="%s" class="navbar-brand custom-logo-link" rel="home"><img src="%s" class="img-fluid"></a>',
                                          esc_url( home_url( '/' ) ),
                                          esc_url( $mybooking_custom_logo ) );
        }
      }      
    }
    else {
      $brand_no_logo_html = '';
      if ( is_front_page() && is_home() ) { 
        $brand_no_logo_html = <<<EOT
          <h1 class="navbar-brand mb-0">
            <a class="site-title" rel="home" href="%s" title="%s" itemprop="url">%s</a>
          </h1>
EOT;
      }
      else {
        $brand_no_logo_html = <<<EOT
          <a class="site-title navbar-brand" rel="home" href="%s" title="%s" itemprop="url">%s</a>
EOT;
      }
      $result = sprintf($brand_no_logo_html, 
                        esc_url( home_url( '/' ) ),
                        esc_attr( get_bloginfo( 'name', 'display' ) ),
                        esc_html( get_bloginfo( 'name' ) ) );

    }

    echo wp_kses_post( $result ); 
  }
}

/**
 * Prints HTML with the site description
 */
if ( ! function_exists( 'mybooking_site_description' ) ) {
  function mybooking_site_description() {

    $result = '';

    if ( !empty ( get_bloginfo('description') ) ) {
      $result = sprintf('<div class="site-description"><small>%s</small></div>',
                                      esc_html( get_bloginfo( 'description' ) ) );
    }

    echo wp_kses_post( $result ); 

  }
}
