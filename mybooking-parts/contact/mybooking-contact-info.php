<?php
/**
*   CONTACT INFO PARTIAL
*   --------------------
*
* 	@version 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<div class="contact-info">

  <?php $mybooking_company_adress =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_adress"); ?>
  <?php $mybooking_company_phone =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_phone"); ?>
  <?php $mybooking_company_mobile =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_mobile"); ?>
  <?php $mybooking_company_email =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_email"); ?>

  <!-- Address -->
  <div class="h6">
    <i class="fa fa-map-marker" aria-hidden="true"></i>
    <?php echo esc_html_x('Address', 'contact', 'mybooking'); ?>
  </div>

  <?php if ( !empty( $mybooking_company_adress ) ) { ?>
      <p><?php echo esc_html( $mybooking_company_adress ) ?></p>
  <?php } ?>

  <!-- Phone number -->
  <div class="h6">
    <i class="fa fa-phone" aria-hidden="true"></i>
    <?php echo esc_html_x('Phone number', 'contact', 'mybooking'); ?>
  </div>
  <?php if ( !empty( $mybooking_company_phone ) ) { ?>
      <p><?php echo esc_html( $mybooking_company_phone ) ?><br>
  <?php } ?>
  <?php if ( !empty( $mybooking_company_chat ) ) { ?>
      <?php echo esc_html( $mybooking_company_chat ) ?></p>
  <?php } ?>

  <!-- Email address -->
  <div class="h6">
    <i class="fa fa-envelope" aria-hidden="true"></i>
    <?php echo esc_html_x('E-mail address', 'contact', 'mybooking'); ?>
  </div>
  <?php if ( !empty ( $mybooking_company_email ) ) { ?>
      <p><?php echo esc_html( $mybooking_company_email ) ?></p>
  <?php } ?>

  <!-- Social links -->

  <?php $mybooking_company_facebook = MyBookingCustomizer::getInstance()->get_theme_option("company_info_facebook_url");?>
  <?php $mybooking_company_instagram = MyBookingCustomizer::getInstance()->get_theme_option("company_info_instagram_url"); ?>
  <?php $mybooking_company_twitter = MyBookingCustomizer::getInstance()->get_theme_option("company_info_twitter_url"); ?>
  <?php $mybooking_company_linkedin = MyBookingCustomizer::getInstance()->get_theme_option("company_info_linkedin_url"); ?>
  <?php $mybooking_company_youtube = MyBookingCustomizer::getInstance()->get_theme_option("company_info_youtube_url"); ?>

  <?php if ( !empty( $mybooking_company_facebook ) || !empty( $mybooking_company_instagram) || 
             !empty( $mybooking_company_twitter) || !empty( $mybooking_company_linkedin) ||
             !empty( $mybooking_company_youtube) ) { ?>
    <ul class="contact-social social-links">
      <?php if ( !empty( $mybooking_company_twitter ) ) { ?>
        <li class="social__item">
              <a href="<?php echo esc_url( $mybooking_company_twitter ) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        </li>
      <?php } ?>
      <?php if ( !empty( $mybooking_company_facebook ) ) { ?>
        <li class="social__item">
              <a href="<?php echo esc_url( $mybooking_company_facebook ) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        </li>
      <?php } ?>
      <?php if ( !empty( $mybooking_company_instagram ) ) { ?>
        <li class="social__item">
          <a href="<?php echo esc_url( $mybooking_company_instagram ) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
        </li>
      <?php } ?>
      <?php if ( !empty( $mybooking_company_linkedin ) ) { ?>
        <li class="social__item">
              <a href="<?php echo esc_url( $mybooking_company_linkedin ) ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        </li>
      <?php } ?>
      <?php if ( !empty( $mybooking_company_youtube ) ) { ?>
        <li class="social__item">
              <a href="<?php echo esc_url( $mybooking_company_youtube ) ?>" target="_blank"><i class="fa fa-youtube"></i></a>
        </li>
      <?php } ?>
    </ul>
  <?php } ?>
</div>
