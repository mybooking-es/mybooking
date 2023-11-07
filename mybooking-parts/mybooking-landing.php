<?php
/**
*   Template Name: MyBooking Landing
*  	--------------------------------
*
* 	@version: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="content">
  <?php while ( have_posts() ) : the_post(); ?>
    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <div class="page_header">

        <?php the_post_thumbnail(); ?>

      </div>

      <div class="wrapper page_content mybooking_page" id="page-wrapper">
        <div class="container" tabindex="-1">
          <div class="row">
            <div class="col-md-5 order-md-last order-sm-first page_sidebar">
              <div class="page_inside">
                <h1 class="page_title"><?php the_title(); ?></h1>
                <?php if ( is_active_sidebar( 'mybooking_page_sidebar' ) ) : ?>
                  <?php dynamic_sidebar( 'mybooking_page_sidebar' ); ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6 page_body">

              <?php the_content(); ?>

              <footer class="entry-footer">

                <?php mybooking_entry_footer(); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
                ?>

              </footer>

            </div>
          </div>
        </div>
      </div>
    </div>

  <?php endwhile; ?>
</div>

<?php get_footer();
