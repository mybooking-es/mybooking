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

<div class="container-fluid copy copy-wrapper">
  <div class="row">
    <div class="col text-center">
      <?php $mybooking_footer_credits = MyBookingCustomizer::getInstance()->get_theme_option("mybooking_global_footer_credits");?>
      <p class="footer_copyright">
        <small>
          <?php echo sprintf( '&copy; %s %s', date('Y'), $mybooking_footer_credits ); ?>
        </small>
      </p>
    </div>
  </div>
</div>