<?php
/**
*		SIDEBAR
*  	-------
*
* 	@version 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.17
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
  <div class="col-md-3">
    <?php dynamic_sidebar( 'blog_sidebar' ); ?>
  </div>
<?php endif; ?>
