<?php
/**
*   CONTACT INFO PARTIAL
*   --------------------
*
* 	@version 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<div class="contact-info">

  <!-- Address -->
  <div class="h6">
    <i class="fa fa-map-marker" aria-hidden="true"></i>
    <?php echo _x('Address', 'contact', 'mybooking'); ?>
  </div>

  <?php $company_adress =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_adress");
    if ($company_adress !== '') { ?>
      <p><?php echo $company_adress ?></p>
  <?php } ?>

  <!-- Phone number -->
  <div class="h6">
    <i class="fa fa-phone" aria-hidden="true"></i>
    <?php echo _x('Phone number', 'contact', 'mybooking'); ?>
  </div>

  <?php $company_phone =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_phone");
        $company_chat =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_chat");
    if ($company_phone !== '') { ?>
      <p><?php echo $company_phone ?><br>
    <?php }
    if ($company_chat !== '') { ?>
      <?php echo $company_chat ?></p>
  <?php } ?>

  <div class="h6">
    <i class="fa fa-envelope" aria-hidden="true"></i>
    <?php echo _x('E-mail address', 'contact', 'mybooking'); ?>
  </div>

  <?php $company_email =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_email");
    if ($company_email !== '') { ?>
      <p><?php echo $company_email ?></p>
  <?php } ?>

  <!-- Social links -->

  <ul class="contact-social social-links">
    <li class="social__item">

      <?php $company_twitter =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_twitter_url");
        if ($company_twitter !== '') { ?>
          <a href="<?php echo $company_twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      <?php } ?>

    </li>
    <li class="social__item">

      <?php $company_facebook =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_facebook_url");
        if ($company_facebook !== '') { ?>
          <a href="<?php echo $company_facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
      <?php } ?>

    </li>
    <li class="social__item">

      <?php $company_instagram =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_instagram_url");
        if ($company_instagram !== '') { ?>
          <a href="<?php echo $company_instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
      <?php } ?>

    </li>
    <li class="social__item">

      <?php $company_linkedin =  MyBookingCustomizer::getInstance()->get_theme_option("company_info_linkedin_url");
        if ($company_linkedin !== '') { ?>
          <a href="<?php echo $company_linkedin ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
      <?php } ?>

    </li>
  </ul>
</div>
