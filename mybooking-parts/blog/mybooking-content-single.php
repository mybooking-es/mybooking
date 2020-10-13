<?php
/**
*		SINGLE POST PARTIAL
*  	-------------------
*
* 	@version 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*
*   CHANGELOG
*   Version 0.0.2
*		- Changed layout to show featured image header
*		- Added news post specific classes
*		- Added default image logic like home's News section posts
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail( $post->ID ) ) { ?>

		<?php $featured_img_url = get_the_post_thumbnail_url( $post->ID,'full' ); ?>
		<div class="post_header" style="background-image:url('<?php echo esc_url( $featured_img_url ) ?>')"></div>

	<?php } ?>

	<div class="post_content">
		<div class="container" tabindex="-1">
			<div class="row">
				<div class="col-12 post_body">
					<h1 class="post_title text-center display-3"><?php the_title(); ?></h1>
					<p class="post_meta text-center"><?php echo mybooking_posted_on(); ?></p>
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
					<?php mybooking_post_nav(); ?>
				</div>
			</div>
		</div>
	</div>
</article>
