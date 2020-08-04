<?php
/**
*		SINGLE POST PARTIAL
*  	-------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col">

			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">

					<?php mybooking_posted_on(); ?>

				</div>
			</header>
			<div class="entry-content">

				<?php the_content(); ?>
				<?php	wp_link_pages( array(
						'before' => '<div class="page-links">' . _x( 'Pages:', 'content_single', 'mybooking' ),
						'after'  => '</div>',
					)); ?>

			</div>
			<footer class="entry-footer">

				<?php mybooking_entry_footer(); ?>

			</footer>
		</div>
	</div>
</article>
