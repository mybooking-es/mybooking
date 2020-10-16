<?php
/**
*		SITE TOP BAR PARTIAL
*  	--------------------
*
* 	@version 0.0.6
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*   Topbar message
*   Topbar info links
*   Top menu
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $mybooking_company_phone = MyBookingCustomizer::getInstance()->get_theme_option("company_info_phone"); ?>
<?php $mybooking_company_chat = MyBookingCustomizer::getInstance()->get_theme_option("company_info_chat"); ?>
<?php $mybooking_company_email = MyBookingCustomizer::getInstance()->get_theme_option("company_info_email"); ?>

<?php if ( !empty($mybooking_company_phone) || !empty($mybooking_company_chat) || !empty($mybooking_company_email) ) { ?>
  <div class="topbar">
    <!-- Top Bar content -->
    <?php $mybooking_container = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_container_type' ); ?>
    <div class="<?php echo esc_attr( $mybooking_container ); ?>">
      <span>
        <?php if ( !empty( $mybooking_company_phone) ) { ?>
          <a class="info_link" href="tel:<?php echo $mybooking_company_phone ?>"><i class="fa fa-phone" aria-hidden="true"></i> <span class="info_text"><?php echo $mybooking_company_phone ?></span></a>
        <?php } ?>
      </span>

      <span>
        <?php if ( !empty( $mybooking_company_chat) ) { ?>
      	  <a class="info_link" href="whatsapp://send?phone=<?php echo $mybooking_company_chat ?>&abid=<?php echo $mybooking_company_chat ?>"><i class="fa fa-whatsapp"
      	      aria-hidden="true"></i> <span class="info_text"><?php echo $mybooking_company_chat ?></span></a>
        <?php } ?>
      </span>

      <span>
        <?php if ( !empty( $mybooking_company_email) ) { ?>
          <a class="info_link" href="mailto:<?php echo $mybooking_company_email ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="info_text"><?php echo $mybooking_company_email ?></span></a>
        <?php } ?>
      </span>   
    </div>
  </div>
<?php } ?>