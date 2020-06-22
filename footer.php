<?php
/**
*		FOOTER
*  	------
* 	Contains the closing of the #content div and all content after
*
*		Versión: 0.0.6
*  	@package WordPress
*  	@subpackage Mybooking WordPress Theme
*  	@since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'mybooking_container_type' );
?>

<?php $footer_layout = get_theme_mod( 'mybooking_global_footer_layout' );
				if ( $footer_layout == 0 ) { ?>
<footer class="footer" id="wrapper-footer">
  <div class="<?php echo esc_attr( $container ); ?>">
    <?php get_template_part('mybooking-parts/mybooking-footer');?>
</footer>
</div>
<?php } ?>

<?php get_template_part( 'mybooking-parts/footer/mybooking-footer-credits' ); ?>
</div>

<?php get_template_part( 'mybooking-parts/site/mybooking-google-analytics' ) ?>

<?php wp_footer(); ?>

<?php

			/**
			*		Promotions modal loader
			*  	-----------------------
			* 	locate_template() returns path to file.
			* 	if either the child theme or the parent theme have overridden the template.
			* 	If neither the child nor parent theme have overridden the template,
			* 	we load the template from the 'templates' sub-directory of the directory this file is in.
			*/

			if ( $overridden_template = locate_template( 'mybooking-plugin-promotions-popup.php' ) ) {
				load_template( $overridden_template );
			} else {
				load_template( dirname( __FILE__ ) . '/mybooking-templates/mybooking-plugin-promotions-popup.php' );
			}
		 ?>

<!-- Back top link -->
<a href="#0" class="cd-top">Top</a>
</body>

</html>