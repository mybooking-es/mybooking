<?php
/**
*		DEFAULT PAGE
*  	------------
*
* 	@version 0.0.5
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
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <?php endwhile; ?>

      </main>
    </div>
  </div>
</div>

<?php get_footer();