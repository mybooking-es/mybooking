<?php
/**
*		BLOGROLL LOOP RENDERING
*  	-----------------------
*
* 	@version 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*
*   CHANGELOG
*   Version 0.0.2
*		- Changed markup to two columns grid layout
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


	<div class="col-md-6 col-lg-4">
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="news_thumbnail">

				<?php $permalink = get_permalink(); ?>
				<?php if ( !has_post_thumbnail( $post->ID ) ) { ?>

					<a class="news_post-image"
						 href="<?php echo $permalink ?>"
						 rel="bookmark"
						 style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.png')">
					</a>

				<?php } else { ?>
					<?php $featured_img_url = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>

					<a class="news_post-image"
						 href="<?php echo $permalink ?>"
						 rel="bookmark"
						 style="background-image: url('<?php echo esc_url( $featured_img_url ) ?>')">
					</a>

				<?php } ?>
			</div>

			<?php the_title( sprintf(
				'<h3 class="post_title">
					<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a>
				</h3>' ); ?>

				<a class="btn btn-secondary mybooking-read-more-link" href="<?php echo esc_url( get_permalink( $post->ID ) ) ?>">
					<?php echo _x( 'Read', 'home-news-button','mybooking' ) ?>
				</a>
		</article>
	</div>
