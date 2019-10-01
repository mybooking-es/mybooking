<?php
/**
*		CATEGORIES
*  	----------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*  	@package Understrap Mybooking Child
*/

/**
* Create default categories
*
*/
function mybooking_create_categories() {
    if( file_exists( ABSPATH . '/wp-admin/includes/taxonomy.php' ) ) :
      require_once( ABSPATH . '/wp-admin/includes/taxonomy.php' );
        if ( !category_exists( 'Mybooking Home' ) ) {
        	wp_create_category( 'Mybooking Home' );
        }
    endif;
}
add_action( 'after_setup_theme', 'mybooking_create_categories' );

/**
* Custom category list
*
*/
function get_my_category_list( $separator = '', $parents='', $post_id = false ) {

  global $wp_rewrite;
	$categories = get_the_category( $post_id );

	if ( !is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) )
		return apply_filters( 'the_category', '', $separator, $parents );

	if ( empty( $categories ) )
		return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );

	$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';
	$thelist = '';

	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
						$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
			}
		}

		$thelist .= '</ul>';
  	 } else {
  		$i = 0;
  		foreach ( $categories as $category ) {
  			if ( 0 < $i )
  				$thelist .= $separator;
  			switch ( strtolower( $parents ) ) {
  				case 'multiple':
  					if ( $category->parent )
  						$thelist .= get_category_parents( $category->parent, true, $separator );
  						$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
  					break;
  				case 'single':
  					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>';
  					if ( $category->parent )
  						$thelist .= get_category_parents( $category->parent, false, $separator );
  						$thelist .= "$category->name</a>";

  					break;
  				case '':
  				default:
  					$thelist .= '<a class="category-'.$category->category_nicename.'" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ' . $rel . '>' . $category->name.'</a>';
  			}
  			++$i;
  		}
  	}
  	return apply_filters( 'the_category', $thelist, $separator, $parents );
}
?>
