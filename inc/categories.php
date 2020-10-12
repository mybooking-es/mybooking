<?php
/**
*		CATEGORIES
*  	----------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mybooking_create_categories' ) ) {
	/**
	* Create default categories
	*
	*/
	function mybooking_create_categories() {
	  if ( !term_exists( 'Mybooking Home' ) ) {
	  	wp_create_category( 'Mybooking Home' );
	  }
	}
	add_action( 'admin_init', 'mybooking_create_categories' );
}

if ( ! function_exists( 'mybooking_get_category_list' ) ) {
	/**
	* Custom category list
	*
	*/
	function mybooking_get_category_list( $separator = '', $parents='', $post_id = false ) {

	  global $wp_rewrite;
		$categories = get_the_category( $post_id );

		if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) ) {
			return apply_filters( 'the_category', '', $separator, $parents );
		}

		if ( empty( $categories ) ) {
			return apply_filters( 'the_category', 'Uncategorized', $separator, $parents );
		}

		$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';
		$thelist = '';

		if ( '' == $separator ) {
			$thelist .= '<ul class="post-categories">';

			// Categories
			foreach ( $categories as $category ) {
				$thelist .= "\n\t<li>";
				switch ( strtolower( $parents ) ) {
					case 'multiple':
						if ( $category->parent ) {
							$thelist .= get_category_parents( $category->parent, true, $separator );
						  $thelist .= sprintf('<a class="category-%s" href="%s" title="%s" %s>%s</a></li>', 
						                     $category->category_nicename,
						                     get_category_link( $category->term_id ),
						                     esc_attr( sprintf( _x( "View all posts in %s", 'categories', 'mybooking' ), $category->name ) ),
						                     $rel,
						                     $category->name
						                     );
						}
						break;
					case 'single':
					  $category_full_name = '';
					  if ( $category->parent ) {
					  	$category_full_name = get_category_parents( $category->parent, false, $separator );
					  }
					  $category_full_name .= $category->name;
					  $thelist .= sprintf('<a class="category-%s" href="%s" title="%s" %s>%s</a></li>', 
					                     $category->category_nicename,
					                     get_category_link( $category->term_id ),
					                     esc_attr( sprintf( _x( "View all posts in %s", 'categories', 'mybooking' ), $category->name ) ),
					                     $rel,
					                     $category_full_name
					                     );				
						break;
					case '':
					default:
						$thelist .= sprintf('<a class="category-%s" href="%s" title="%s" %s>%s</a></li>', 
						                     $category->category_nicename,
						                     get_category_link( $category->term_id ),
						                     esc_attr( sprintf( _x( "View all posts in %s", 'categories', 'mybooking' ), $category->name ) ),
						                     $rel,
						                     $category->name
						                     );
				}
			}

			$thelist .= '</ul>';
	  } 
	  else {
	  		$i = 0;
	  		foreach ( $categories as $category ) {
	  			if ( 0 < $i )
	  				$thelist .= $separator;
	  			switch ( strtolower( $parents ) ) {
	  				case 'multiple':
	  					if ( $category->parent ) {
	  						$thelist .= get_category_parents( $category->parent, true, $separator );
							  $thelist .= sprintf('<a class="category-%s" href="%s" title="%s" %s>%s</a></li>', 
							                     $category->category_nicename,
							                     get_category_link( $category->term_id ),
							                     esc_attr( sprintf( _x( "View all posts in %s", 'categories', 'mybooking' ), $category->name ) ),
							                     $rel,
							                     $category->name
							                     );
	  					}
	  					break;
	  				case 'single':
						  $category_full_name = '';
						  if ( $category->parent ) {
						  	$category_full_name = get_category_parents( $category->parent, false, $separator );
						  }
						  $category_full_name .= $category->name;
						  $thelist .= sprintf('<a class="category-%s" href="%s" title="%s" %s>%s</a></li>', 
						                     $category->category_nicename,
						                     get_category_link( $category->term_id ),
						                     esc_attr( sprintf( _x( "View all posts in %s", 'categories', 'mybooking' ), $category->name ) ),
						                     $rel,
						                     $category_full_name
						                     );			
	  					break; 
	  				case '':
	  				default:
						  $thelist .= sprintf('<a class="category-%s" href="%s" title="%s" %s>%s</a></li>', 
						                     $category->category_nicename,
						                     get_category_link( $category->term_id ),
						                     esc_attr( sprintf( _x( "View all posts in %s", 'categories', 'mybooking' ), $category->name ) ),
						                     $rel,
						                     $category->name
						                     );
	  			}
	  			++$i;
	  		}
	  	}
	  	return apply_filters( 'the_category', $thelist, $separator, $parents );
	}
}
?>
