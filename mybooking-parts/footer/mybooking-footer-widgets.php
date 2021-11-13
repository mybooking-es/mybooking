<?php
/**
*		MYBOOKING FOOTER INFO PARTIAL
*  	-----------------------------
*
* 	@version 0.0.6
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Footer info -->

<div class="row">

  <!-- Branding or widget area 1 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_1' ) ) { ?>

  <div class="col mybooking-footer-col-1">
    <?php dynamic_sidebar( 'mybooking_global_footer_1' ); ?>
  </div>

  <?php } else { ?>

  <div class="col">
    <div class="logo-footer">
      <?php the_custom_logo(); ?>
    </div>

    <?php $mybooking_company_name = MyBookingCustomizer::getInstance()->get_theme_option("company_info_name"); ?>
    <?php $mybooking_company_vat_number = MyBookingCustomizer::getInstance()->get_theme_option("company_info_nif"); ?>
    <?php $mybooking_company_adress = MyBookingCustomizer::getInstance()->get_theme_option("company_info_adress"); ?>
    <?php if ( !empty( $mybooking_company_name ) || !empty( $mybooking_company_vat_number) || 
                !empty( $mybooking_company_adress) ) { ?>
    <ul>
      <?php if ( !empty( $mybooking_company_name ) ) { ?>
      <li>
        <?php echo esc_html( $mybooking_company_name ) ?>
      </li>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_vat_number) ) { ?>
      <li>
        <?php echo esc_html( $mybooking_company_vat_number ) ?>
      </li>
      <?php } ?>
      <?php if ( !empty( $mybooking_company_adress) ) { ?>
      <li>
        <?php echo esc_html( $mybooking_company_adress ) ?>
      </li>
      <?php } ?>
    </ul>
    <?php } ?>
  </div>

  <?php } ?>

  <!-- Widget area 2 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_2' ) ) { ?>
  <div class="col mybooking-footer-col-2">
    <?php dynamic_sidebar( 'mybooking_global_footer_2' ); ?>
  </div>
  <?php } ?>

  <!-- Widget area 3 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_3' ) ) { ?>
  <div class="col mybooking-footer-col-3">
    <?php dynamic_sidebar( 'mybooking_global_footer_3' ); ?>
  </div>
  <?php } ?>

  <!-- Contact or widget area 4 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_4' ) ) { ?>
  <div class="col">
    <?php dynamic_sidebar( 'mybooking_global_footer_4' ); ?>
  </div>
  <?php } else { ?>

  <div class="col mybooking-footer-col-4">
    <?php $mybooking_company_facebook = MyBookingCustomizer::getInstance()->get_theme_option("company_info_facebook_url");?>
    <?php $mybooking_company_instagram = MyBookingCustomizer::getInstance()->get_theme_option("company_info_instagram_url"); ?>
    <?php $mybooking_company_twitter = MyBookingCustomizer::getInstance()->get_theme_option("company_info_twitter_url"); ?>
    <?php $mybooking_company_linkedin = MyBookingCustomizer::getInstance()->get_theme_option("company_info_linkedin_url"); ?>
    <?php $mybooking_company_youtube = MyBookingCustomizer::getInstance()->get_theme_option("company_info_youtube_url"); ?>

    <?php if ( !empty( $mybooking_company_facebook ) || !empty( $mybooking_company_instagram) || 
                !empty( $mybooking_company_twitter) || !empty( $mybooking_company_linkedin) ||
                !empty( $mybooking_company_youtube) ) { ?>
    <ul class="social-links d-flex justify-content-center justify-content-md-end">
      <?php if ( !empty( $mybooking_company_facebook ) ) { ?>
      <li class="social__item">
        <a href="<?php echo esc_url( $mybooking_company_facebook ) ?>" target="_blank" aria-label="Facebook"><i
            class="fa fa-facebook"></i></a>
      </li>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_instagram ) ) { ?>
      <li class="social__item">
        <a href="<?php echo esc_url( $mybooking_company_instagram ) ?>" target="_blank" aria-label="Instagram"><i
            class="fa fa-instagram"></i></a>
      </li>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_twitter ) ) { ?>
      <li class="social__item">
        <a href="<?php echo esc_url( $mybooking_company_twitter ) ?>" target="_blank" aria-label="Twitter"><i
            class="fa fa-twitter"></i></a>
      </li>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_linkedin ) ) { ?>
      <li class="social__item">
        <a href="<?php echo esc_url( $mybooking_company_linkedin ) ?>" target="_blank" aria-label="Linkedin"><i
            class="fa fa-linkedin"></i></a>
      </li>
      <?php } ?>

      <?php if ( !empty( $mybooking_company_youtube ) ) { ?>
      <li class="social__item">
        <a href="<?php echo esc_url( $mybooking_company_youtube ) ?>" target="_blank" aria-label="Youtube"><i
            class="fa fa-youtube"></i></a>
      </li>
      <?php } ?>
    </ul>
    <?php } ?>

    <?php $mybooking_company_phone = MyBookingCustomizer::getInstance()->get_theme_option("company_info_phone"); ?>
    <?php $mybooking_company_mobile = MyBookingCustomizer::getInstance()->get_theme_option("company_info_mobile"); ?>
    <?php $mybooking_company_email = MyBookingCustomizer::getInstance()->get_theme_option("company_info_email"); ?>
    <?php if ( !empty( $mybooking_company_phone ) || !empty( $mybooking_company_email) ) { ?>
    <p class="info_bloc">
      <!-- Phone -->
      <?php if ( !empty( $mybooking_company_phone ) ) { ?>
      <a class="info_link" href="<?php echo esc_url( 'tel:'.str_replace(' ','',$mybooking_company_phone) ) ?>">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <span class="info_text"><?php echo esc_html( $mybooking_company_phone ) ?></span>
      </a>
      <?php } ?>
      <!-- Mobile -->
      <?php if ( !empty( $mybooking_company_mobile ) ) { ?>
      <br>
      <a class="info_link" href="<?php echo esc_url( 'tel:'.str_replace(' ','',$mybooking_company_mobile) ) ?>">
        <i class="fa fa-mobile" aria-hidden="true"></i>
        <span class="info_text"><?php echo esc_html( $mybooking_company_mobile ) ?></span>
      </a>
      <?php } ?>
      <!-- Email -->
      <?php if ( !empty( $mybooking_company_email ) ) { ?>
      <br>
      <a class="info_link" href="<?php echo esc_url( 'mailto:'.$mybooking_company_email ) ?>">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
        <span class="info_text"><?php echo esc_html( $mybooking_company_email ) ?></span>
      </a>
      <?php } ?>
    </p>
    <?php } ?>
  </div>

  <?php } ?>

</div>