<?php
/**
*		MYBOOKING FOOTER CREDITS PARTIAL
*  	--------------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.3
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $mybooking_footer_credits = MyBookingCustomizer::getInstance()->get_theme_option("mybooking_global_footer_credits"); ?>
<?php if ( !empty( $mybooking_footer_credits ) ): ?>
  <div class="container-fluid mb-copy mb-copy-wrapper">
    <div class="row">
      <div class="col text-center">
        <p class="footer_copyright">
          <small>
            <?php           
              $mybooking_allowed_html = array(
                  'a' => array(
                      'href' => array(),
                      'title' => array(),
                      'rel' => array(),
                      'class' => array(),
                      'target' => array()
                  ),
                  'br' => array(),
                  'em' => array(),
                  'strong' => array()
              ); 
              echo wp_kses( $mybooking_footer_credits, $mybooking_allowed_html )  ?>
          </small>
        </p>
      </div>
    </div>
  </div>
<?php endif; ?>  