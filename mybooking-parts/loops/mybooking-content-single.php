<?php
/**
*		SINGLE POST PARTIAL
*  	-------------------
*
* 	@version 0.0.2
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

		<div class="post_header">
			<?php the_post_thumbnail(); ?>
		</div>

	<?php } else { ?>

		<div class="post_header">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.png">
		</div>

	<?php } ?>

	<div class="post_content">
		<div class="container" tabindex="-1">
			<div class="row">
				<div class="col-12 post_body">
					<h1 class="post_title"><?php the_title(); ?></h1>
					<p class="post_meta"><?php echo mybooking_posted_on(); ?></p>
					<?php the_content(); ?>
					<footer class="entry-footer">
						<?php mybooking_entry_footer(); ?>
					</footer>
					<?php mybooking_post_nav(); ?>
				</div>
			</div>
		</div>
	</div>
</article>
