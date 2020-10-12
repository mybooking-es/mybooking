<?php
/**
*		DEFAULT PAGE
*  	------------
*
* 	@version 0.0.6
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="wrapper page_content " id="page-wrapper">
  <div class="container" id="content" tabindex="-1">
    <div class="row">
      <main class="site-main" id="main">

        <?php while ( have_posts() ) : the_post(); ?>
          <h1 class="entry-title text-center display-3"><?php the_title(); ?></h1>

          <?php the_content(); ?>

          <?php
      		wp_link_pages(
      			array(
      				'before' => '<div class="mybooking-entry-links">' . _x( 'Pages', 'pages_navigation', 'mybooking' ),
      				'after'  => '</div>',
      			)
      		);
      		?>

          <footer class="entry-footer">
						<?php mybooking_entry_footer(); ?>
					</footer>

        <?php endwhile; ?>

      </main>
    </div>
  </div>
</div>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
  comments_template();
endif;
?>

<?php get_footer();
