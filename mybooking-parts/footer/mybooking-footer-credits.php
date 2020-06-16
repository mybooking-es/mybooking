<?php
/**
*		MYBOOKING FOOTER CREDITS PARTIAL
*  	--------------------------------
*
* 	Versión: 0.0.1
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
      <?php $company_trade_name = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_trade_name");
      if ($company_trade_name !== '') { ?>
      <p class="footer_copyright">
        <small>
          &copy; <?php echo date('Y'); ?> <?php echo $company_trade_name ?>
          <span> | <?php _e('Powered by', 'mybooking') ?> <a href="https://mybooking.es/"
              target="_blank">mybooking</a></span>
        </small>
      </p>
      <?php } else { ?>
      <p class="footer_copyright">
        <small>
          <span><?php _e('Powered by', 'mybooking') ?> <a href="https://mybooking.es/"
              target="_blank">mybooking</a></span>
        </small>
      </p>
      <?php } ?>

    </div>
  </div>
</div>