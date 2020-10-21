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

  <?php while ( have_posts() ) : the_post(); ?>

    <?php if ( !empty( get_the_content() ) ) : ?>
      <div class="container page_content">
        <div class="row">
          <div class="col">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    <?php else: ?>
      <?php the_content(); ?>
    <?php endif;?>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
    ?>

  <?php endwhile;?>

