<?php
/**
*		PAGINATION
*  	----------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$mybooking_prev_text = sprintf('<span aria-hidden="true">%s</span>',
	                             esc_html_x( '&laquo;', 'pagination', 'mybooking' ) );
$mybooking_next_text = sprintf('<span aria-hidden="true">%s</span>',
	                             esc_html_x( '&raquo;', 'pagination', 'mybooking' ) );

$mybooking_posts_pagination = get_the_posts_pagination(
	array(
		'screen_reader_text' => _x( 'Posts navigation', 'pagination', 'mybooking' ),
		'mid_size'  => 2,
		'prev_text' => $mybooking_prev_text,
		'next_text' => $mybooking_next_text,
	)
);

// If we're not outputting the previous page link, prepend a placeholder with `visibility: hidden` to take its place.
if ( strpos( $mybooking_posts_pagination, 'prev page-numbers' ) === false ) {
	$mybooking_posts_pagination = str_replace( '<div class="nav-links">', '<div class="nav-links"><span class="prev page-numbers placeholder" aria-hidden="true">' . $mybooking_prev_text . '</span>', $mybooking_posts_pagination );
}

// If we're not outputting the next page link, append a placeholder with `visibility: hidden` to take its place.
if ( strpos( $mybooking_posts_pagination, 'next page-numbers' ) === false ) {
	$mybooking_posts_pagination = str_replace( '</div>', '<span class="next page-numbers placeholder" aria-hidden="true">' . $mybooking_next_text . '</span></div>', $mybooking_posts_pagination );
}

if ( $mybooking_posts_pagination ) { ?>

	<div class="pagination-wrapper section-inner">

		<?php echo $mybooking_posts_pagination; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- already escaped during generation. ?>

	</div><!-- .pagination-wrapper -->

	<?php
}
