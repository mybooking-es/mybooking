<?php
/**
*		MYBOOKING FOOTER INFO PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.3
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
  <?php if ( is_active_sidebar( 'mybooking_global_footer_1' )) { ?>

    <div class="col">
      <?php dynamic_sidebar( 'mybooking_global_footer_1' ); ?>
    </div>

  <?php } else { ?>

    <div class="col">
      <div class="logo-footer">

        <?php the_custom_logo(); ?>

      </div>
      <ul>
        <li>

          <?php $company_name = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_name");
            if ($company_name !== '') { ?>
              <?php echo $company_name ?>
          <?php } ?>

        </li>
        <li>

          <?php $company_id = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_nif");
            if ($company_id !== '') { ?>
              NIF: <?php echo $company_id ?>
          <?php } ?>

        </li>
        <li>

          <?php $company_adress = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_adress");
            if ($company_adress !== '') { ?>
              <?php echo $company_adress ?>
          <?php } ?>

        </li>
      </ul>
    </div>

  <?php } ?>

  <!-- Widget area 2 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_2' )) { ?>

    <div class="col">
      <?php dynamic_sidebar( 'mybooking_global_footer_2' ); ?>
    </div>

  <?php } ?>

  <!-- Widget area 3 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_3' )) { ?>

    <div class="col">
      <?php dynamic_sidebar( 'mybooking_global_footer_3' ); ?>
    </div>

  <?php } ?>

  <!-- Contact or widget area 4 -->
  <?php if ( is_active_sidebar( 'mybooking_global_footer_4' )) { ?>

    <div class="col">
      <?php dynamic_sidebar( 'mybooking_global_footer_4' ); ?>
    </div>

  <?php } else { ?>

    <div class="col">
      <h6>Síguenos</h6>
      <ul class="social-links">

        <?php $company_facebook = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_facebook_url");
          if ($company_facebook !== '') { ?>
          <li class="social__item">
            <a href="<?php echo $company_facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
          </li>
        <?php } ?>

        <?php $company_instagram = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_instagram_url");
          if ($company_instagram !== '') { ?>
          <li class="social__item">
            <a href="<?php echo $company_instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
          </li>
        <?php } ?>

        <?php $company_twitter = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_twitter_url");
          if ($company_twitter !== '') { ?>
          <li class="social__item">
            <a href="<?php echo $company_twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
          </li>
        <?php } ?>

        <?php $company_linkedin = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_linkedin_url");
          if ($company_linkedin !== '') { ?>
          <li class="social__item">
            <a href="<?php echo $company_linkedin ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
          </li>
        <?php } ?>

        <?php $company_youtube = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_youtube_url");
          if ($company_youtube !== '') { ?>
          <li class="social__item">
            <a href="<?php echo $company_youtube ?>" target="_blank"><i class="fa fa-youtube"></i></a>
          </li>
        <?php } ?>
        
      </ul>
      <br>
      <p class="info_bloc">

        <?php $company_phone = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_phone");
          if ($company_phone !== '') { ?>
            <a class="info_link" href="tel:<?php echo $company_phone ?>">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span class="info_text"><?php echo $company_phone ?></span>
            </a>
        <?php } ?>

        <br>

        <?php $company_email = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_email");
          if ($company_email !== '') { ?>
            <a class="info_link" href="mailto:<?php echo $company_email ?>">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <span class="info_text"><?php echo $company_email ?></span>
            </a>
        <?php } ?>

      </p>
    </div>

  <?php } ?>

</div>
