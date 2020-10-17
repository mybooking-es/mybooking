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

    <?php if ( is_sticky() && is_home() && !is_paged() ) { ?>
    <div class="col-md-12 col-lg-12">
   	<?php } else { ?>
	<div class="col-md-6 col-lg-4">
	<?php } ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<?php $mybooking_permalink = get_permalink(); ?>
			<div class="news_thumbnail">
				<?php if ( !has_post_thumbnail( $post->ID ) ) { ?>

					<a class="news_post-image"
						 href="<?php echo esc_attr( esc_url ( $mybooking_permalink ) ) ?>"
						 rel="bookmark"
						 style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.png')">
					</a>

				<?php } else { ?>
					<?php $mybooking_featured_img_url = get_the_post_thumbnail_url( $post->ID, 'full' ); ?>

					<a class="news_post-image"
						 href="<?php echo esc_attr( esc_url ( $mybooking_permalink ) ) ?>"
						 rel="bookmark"
						 style="background-image: url('<?php echo esc_attr( esc_url( $mybooking_featured_img_url ) ) ?>')">
					</a>

				<?php } ?>
			</div>

            <?php if ( !empty( get_the_title() ) ) { ?>
				<?php the_title( sprintf( '<h2 class="post_title"><a href="%s" rel="bookmark" class="block-ellipsis">', 
					  		 		      esc_attr( esc_url( $mybooking_permalink ) ) ),
										  '</a></h2>' ); ?>
            <?php } else { ?>	
                <h2 class="post_title"><?php printf( _x('<a href="%s" rel="bookmark" class="block-ellipsis untitled">Untitled</a>', 'content_blog', 'mybooking'), 
                                                     esc_attr( esc_url( $mybooking_permalink ) ) ); ?></h2>
            <?php } ?> 	

		</article>
	</div>
