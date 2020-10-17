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

if ( ! function_exists( 'mybooking_pagination' ) ) {

	function mybooking_pagination( $args = array(), $class = 'pagination' ) {

		if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 2,
				'prev_next'          => true,
				'prev_text'          => _x( '&laquo;', 'pagination', 'mybooking' ),
				'next_text'          => _x( '&raquo;', 'pagination', 'mybooking' ),
				'screen_reader_text' => _x( 'Posts navigation', 'pagination', 'mybooking' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
			)
		);

		$links = paginate_links( $args );

		?>

		<nav aria-label="<?php echo esc_attr( $args['screen_reader_text'] ); ?>">

			<ul class="pagination">

				<?php
				foreach ( $links as $key => $link ) {
					?>
					<li class="page-item <?php echo esc_attr( strpos( $link, 'current' ) ? 'active' : '' ); ?>">
						<?php echo wp_kses_post( str_replace( 'page-numbers', 'page-link', $link ) ); ?>
					</li>
					<?php
				}
				?>

			</ul>

		</nav>

		<?php
	}
}
