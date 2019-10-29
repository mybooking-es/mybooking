<?php
/**
*		SITE TOP BAR PARTIAL
*  	--------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="cta">
  <span>

    <?php $company_phone = get_option("company_info_phone");
        if ($company_phone !== '') { ?>
          <i class="fa fa-phone" aria-hidden="true"></i>
          <a href="tel:<?php echo $company_phone ?>"> <?php echo $company_phone ?></span> </a>
    <?php } ?>

  </span>
  <span class="ml-3">

    <?php $company_chat = get_option("company_info_chat");
        if ($company_chat !== '') { ?>
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
          <a href="tel:<?php echo $company_chat ?>"> <?php echo $company_chat ?></span> </a>
    <?php } ?>

  </span>
  <span class="ml-3">

    <?php $company_email = get_option("company_info_email");
        if ($company_email !== '') { ?>
          <i class="fa fa-envelope-o" aria-hidden="true"></i>
          <a class="color-gray-800" href="mailto:<?php echo $company_email ?>"> <?php echo $company_email ?></span> </a>
    <?php } ?>

  </span>

  <!-- Widget -->

  <?php if ( is_active_sidebar( 'mybooking_top_bar' ) ) : ?>
    <?php dynamic_sidebar( 'mybooking_top_bar' ); ?>
  <?php endif; ?>

</div>
