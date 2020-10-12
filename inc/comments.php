<?php
/**
*		POSTS FUNCTIONS
*  	---------------
* 	Custom functions that act independently of the theme templates.
* 	Eventually, some of the functionality here could be replaced by core features.
*
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if ( !function_exists( 'mybooking_comment_reply_link' ) ) {
	/**
	 * Edit comment link => Add classes
	 */
	function mybooking_edit_comment_link( $output ) {
	  $myclass = 'btn btn-primary';
	  return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $myclass, $output, 1 );
	}
    add_filter( 'edit_comment_link', 'mybooking_edit_comment_link' );
}

if ( !function_exists( 'mybooking_comment_reply_link' ) ) {
	/**
	 * Edit reply link => Add classes
	 */ 
	function mybooking_comment_reply_link($content) {
	    $extra_classes = 'btn btn-primary';
	    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
	}
    add_filter( 'comment_reply_link', 'mybooking_comment_reply_link' );
}

if ( !function_exists( 'mybooking_comment_reply_title' )) {

	function mybooking_comment_reply_title( $defaults ){
	  $defaults['title_reply_before'] = '<div id="reply-title" class="h4 comment-reply-title">';
	  $defaults['title_reply_after'] = '</div>';
	  return $defaults;
	}
	add_filter( 'comment_form_defaults', 'mybooking_comment_reply_title' );
}