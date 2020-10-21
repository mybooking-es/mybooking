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

    <?php $mybooking_home_content = apply_filters('the_content', get_the_content()); ?>
    <?php if ( !empty( $mybooking_home_content ) ) : ?>
      <div class="container page_content">
        <div class="row">
          <div class="col">
            <?php echo $mybooking_home_content; ?>
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

