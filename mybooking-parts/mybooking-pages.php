<?php
/**
*   Template Name: MyBooking Pages
*  	------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php while ( have_posts() ) : the_post(); ?>
  <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="page_header">

      <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

    </div>

    <div class="wrapper page_content mybooking_page" id="page-wrapper">
    	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
    		<div class="row">
          <div class="col-md-6">

            <h1 class="entry-title"><?php the_title(); ?></h1>

          </div>
    			<main class="site-main" id="main">

            <!-- Widgets Sidebar -->
            <?php if ( is_active_sidebar( 'mybooking_page_sidebar' ) ) : ?>
    					<div class="col-md-5 page_sidebar">

    						<?php dynamic_sidebar( 'mybooking_page_sidebar' ); ?>

    					</div>
            <?php endif; ?>

    				<div class="col-md-6">

    					<!-- Page Content -->
              <div class="entry-content">

            		<?php the_content(); ?>
            		<?php
            		wp_link_pages(
            			array(
            				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
            				'after'  => '</div>',
            			)
            		);
            		?>

            	</div>
            	<footer class="entry-footer">

            		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

            	</footer>
    				</div>

    			</main>
    		</div>
    	</div>
    </div>
  </div>

<?php endwhile; ?>

<?php get_footer();
