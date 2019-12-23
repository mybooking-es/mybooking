<?php
/**
*		BLOG LOOP RENDERING
*  	-------------------
*		Overrides parent document on Understrap Theme
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-lg-4">
			<a href="<?php echo get_permalink() ?>" rel="bookmark">

				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

			</a>
		</div>
		<div class="col-lg-8">
			<header class="entry-header">

				<?php the_title( sprintf(
					'<h2 class="entry-title">
						<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a>
					</h2>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php understrap_posted_on(); ?>
					</div>
				<?php endif; ?>

			</header>
			<div class="entry-content">

				<?php the_excerpt(); ?>
				<?php wp_link_pages(	array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
						'after'  => '</div>',
					)); ?>

			</div>
		</div>
	</div>
</article>
