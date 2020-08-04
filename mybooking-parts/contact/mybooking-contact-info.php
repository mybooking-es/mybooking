<?php
/**
*   CONTACT INFO PARTIAL
*   --------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<div class="contact-left-info">
  <div class="contact_details">
    <div class="about">

      <?php $title_contact = MyBookingThemeSettings::getInstance()->get_theme_option("contact_section_title");
        if ($title_contact !== '') { ?>
          <h1><?php echo $title_contact ?></h1>
        <?php }
        else { ?>
          <h4><?php _e("Contact", 'contact','mybooking'); ?></h4>
      <?php } ?>

      <hr />

      <?php $subtitle_contact = MyBookingThemeSettings::getInstance()->get_theme_option("contact_section_subtitle");
        if ($subtitle_contact !== '') { ?>
          <h3><?php echo $subtitle_contact ?></h3>
      <?php } ?>

      <?php $company_text = MyBookingThemeSettings::getInstance()->get_theme_option("contact_section_text");
        if ($company_text !== '') { ?>
          <p><?php echo $company_text ?></p>
      <?php } ?>

    </div>

    <div class="info">
      <h4 class="color-brand-primary">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <?php _e("Address", 'contact', 'mybooking'); ?>
      </h4>

      <?php $company_adress =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_adress");
        if ($company_adress !== '') { ?>
          <p><?php echo $company_adress ?></p>
      <?php } ?>

      <h4 class="color-brand-primary">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <?php _e("Phone number", 'contact', 'mybooking'); ?>
      </h4>

      <?php $company_phone =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_phone");
            $company_chat =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_chat");
        if ($company_phone !== '') { ?>
          <p><?php echo $company_phone ?><br>
        <?php }
        if ($company_chat !== '') { ?>
          <?php echo $company_chat ?></p>
      <?php } ?>


      <h4 class="color-brand-primary">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <?php _e("E-mail address", 'contact', 'mybooking'); ?>
      </h4>

      <?php $company_email =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_email");
        if ($company_email !== '') { ?>
          <p><?php echo $company_email ?></p>
      <?php } ?>

    </div>
  </div>

  <!-- Social links -->

  <ul class="social-links mt50">
    <li class="social__item">

      <?php $company_twitter =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_twitter_url");
        if ($company_twitter !== '') { ?>
          <a href="<?php echo $company_twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      <?php } ?>

    </li>
    <li class="social__item">

      <?php $company_facebook =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_facebook_url");
        if ($company_facebook !== '') { ?>
          <a href="<?php echo $company_facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
      <?php } ?>

    </li>
    <li class="social__item">

      <?php $company_instagram =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_instagram_url");
        if ($company_instagram !== '') { ?>
          <a href="<?php echo $company_instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
      <?php } ?>

    </li>
    <li class="social__item">

      <?php $company_linkedin =  MyBookingThemeSettings::getInstance()->get_theme_option("company_info_linkedin_url");
        if ($company_linkedin !== '') { ?>
          <a href="<?php echo $company_linkedin ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
      <?php } ?>

    </li>
  </ul>
</div>
