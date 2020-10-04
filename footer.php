<?php
/**
*		FOOTER
*  	------
* 	Contains the closing of the #content div and all content after
*
*		@version 0.0.8
*  	@package WordPress
*  	@subpackage Mybooking WordPress Theme
*  	@since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

<?php $footer_layout = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_global_footer_layout" ); 
if ( $footer_layout == '0' ) { ?>

  <footer class="footer" id="wrapper-footer">
    <div class="container">
      <?php get_template_part('mybooking-parts/mybooking-footer');?>
  </footer>
  </div>

<?php } ?>
<?php get_template_part( 'mybooking-parts/footer/mybooking-footer-credits' ); ?>

</div>

<?php get_template_part( 'mybooking-parts/site/mybooking-google-analytics' ) ?>
<?php wp_footer(); ?>

<!-- Back top link -->
<a href="#0" class="cd-top">Top</a>
</body>

</html>
