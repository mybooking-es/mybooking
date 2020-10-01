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
      <?php $company_trade_name = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_trade_name");
      if ($company_trade_name !== '') { ?>
        <p class="footer_copyright">
          <small>
            <?php printf( _x( '&copy; %s %s | <span>Powered by <a href="%s" target="_blank">mybooking</a></span>', 'footer_credits', 'mybooking' ), 
                          date('Y'), $company_trade_name, 'https://mybooking.es' ) ?>
          </small>
        </p>
      <?php } else { ?>
        <p class="footer_copyright">
          <small>
            <?php printf( _x( '&copy; %s | <span>Powered by <a href="%s" target="_blank">mybooking</a></span>', 'footer_credits', 'mybooking' ), 
                          date('Y'), 'https://mybooking.es' ) ?>
          </small>
        </p>
      <?php } ?>

    </div>
  </div>
</div>