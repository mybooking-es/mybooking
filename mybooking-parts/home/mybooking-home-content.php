<?php
/**
*		MYBOOKING HOME CONTENT PARTIAL
*  	--------------------------------
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $content_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_content_visibility" );
if ($content_visible) { ?>

  <div class="container page_content">
    <div class="row">
      <div class="col">

        <?php while ( have_posts() ) : the_post(); ?>
          
          <?php the_content(); ?>

          <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;
          ?>

        <?php endwhile;?>

      </div>
    </div>
  </div>

<?php } ?>
