<?php
/**
*   Comments
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.10
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area mybooking-comments" id="comments">
	<div class="container">

		<?php // You can start editing here -- including this comment! ?>

		<?php if ( have_comments() ) : ?>

			<h2 class="comments-title">

				<?php
				$comments_number = get_comments_number();
				if ( 1 === (int) $comments_number ) {
					printf(
						/* translators: %s: post title */
						_x( 'One thought on &ldquo;<span>%s</span>&rdquo;', 'comments', 'mybooking' ),
						esc_html( get_the_title() )
					);
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;<span>%2$s</span>&rdquo;',
							'%1$s thoughts on &ldquo;<span>%2$s</span>&rdquo;',
							$comments_number,
							'comments title',
							'mybooking'
						),
						number_format_i18n( $comments_number ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						esc_html( get_the_title() )
					);
				}
				?>

			</h2><!-- .comments-title -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>

				<nav class="comment-navigation" id="comment-nav-above">

					<h2 class="sr-only"><?php esc_html_x( 'Comment navigation', 'comments', 'mybooking' ); ?></h2>

					<?php if ( get_previous_comments_link() ) { ?>
						<div class="nav-previous">
							<?php previous_comments_link( _x( '&larr; Older Comments', 'comments', 'mybooking' ) ); ?>
						</div>
					<?php } ?>

					<?php	if ( get_next_comments_link() ) { ?>
						<div class="nav-next">
							<?php next_comments_link( _x( 'Newer Comments &rarr;', 'comments', 'mybooking' ) ); ?>
						</div>
					<?php } ?>

				</nav><!-- #comment-nav-above -->

			<?php endif; // Check for comment navigation. ?>

			<ol class="comment-list">

				<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
					)
				);
				?>

			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>

				<nav class="comment-navigation" id="comment-nav-below">

					<h2 class="sr-only"><?php esc_html_x( 'Comment navigation', 'comments', 'mybooking' ); ?></h2>

					<?php if ( get_previous_comments_link() ) { ?>
						<div class="nav-previous">
							<?php previous_comments_link( _x( '&larr; Older Comments', 'comments', 'mybooking' ) ); ?>
						</div>
					<?php } ?>

					<?php	if ( get_next_comments_link() ) { ?>
						<div class="nav-next">
							<?php next_comments_link( _x( 'Newer Comments &rarr;', 'comments', 'mybooking' ) ); ?>
						</div>
					<?php } ?>

				</nav><!-- #comment-nav-below -->

			<?php endif; // Check for comment navigation. ?>

		<?php endif; // End of if have_comments(). ?>

		<?php comment_form(); // Render comments form. ?>

	</div>
</div><!-- #comments -->
