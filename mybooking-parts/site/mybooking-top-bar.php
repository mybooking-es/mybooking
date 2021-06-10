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
<?php $mybooking_company_mobile = MyBookingCustomizer::getInstance()->get_theme_option("company_info_mobile"); ?>
<?php $mybooking_company_email = MyBookingCustomizer::getInstance()->get_theme_option("company_info_email"); ?>

<?php if ( !empty($mybooking_company_phone) || !empty($mybooking_company_mobile) || !empty($mybooking_company_email) ||
           is_active_sidebar( 'mybooking_global_topbar_right' ) ) { ?>
  <div class="topbar">
    <!-- Top Bar content -->
    <?php $mybooking_container = MyBookingCustomizer::getInstance()->get_theme_option( 'mybooking_container_type' ); ?>
    <div class="<?php echo esc_attr( $mybooking_container ); ?>">
      <?php if ( !empty( $mybooking_company_phone) ) { ?>
        <span>
          <a class="info_link" href="<?php echo esc_url( 'tel:'.str_replace(' ','',$mybooking_company_phone) ) ?>"><i class="fa fa-phone" aria-hidden="true"></i> <span class="info_text"><?php echo esc_html( $mybooking_company_phone ) ?></span></a>
        </span>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_mobile) ) { ?>
        <span>
      	  <a class="info_link" href="<?php echo esc_url( 'whatsapp://send?phone='.str_replace(' ','',$mybooking_company_mobile).'&abid='.str_replace(' ','',$mybooking_company_mobile), ['whatsapp'] ) ?>"><i class="fa fa-whatsapp"
      	      aria-hidden="true"></i> <span class="info_text"><?php echo esc_html( $mybooking_company_mobile ) ?></span></a>
        </span>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_email) ) { ?>
        <span>
          <a class="info_link" href="<?php echo esc_url( 'mailto:'.$mybooking_company_email ) ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="info_text"><?php echo esc_html( $mybooking_company_email ) ?></span></a>
        </span>   
      <?php } ?>

      <!-- TopBar Message area -->
      <?php if ( is_active_sidebar( 'mybooking_global_topbar_right' ) ) { ?>
         <?php dynamic_sidebar( 'mybooking_global_topbar_right' ); ?>
      <?php } ?>
    </div>

  </div>
<?php } ?>