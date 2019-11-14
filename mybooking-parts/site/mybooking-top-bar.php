<?php
/**
*		SITE TOP BAR PARTIAL
*  	--------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="topbar">
  <span>

    <?php $company_phone = get_option("company_info_phone");
        if ($company_phone !== '') { ?>
          <a class="info_link" href="tel:<?php echo $company_phone ?>"><i class="fa fa-phone" aria-hidden="true"></i> <span class="info_text"><?php echo $company_phone ?></span></a>
    <?php } ?>

  </span>
  <span>

    <?php $company_chat = get_option("company_info_chat");
        if ($company_chat !== '') { ?>
	  <a class="info_link" href="tel:<?php echo $company_chat ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i> <span class="info_text"><?php echo $company_chat ?></span></a>
    <?php } ?>

  </span>
  <span>

    <?php $company_email = get_option("company_info_email");
        if ($company_email !== '') { ?>
	  <a class="info_link" href="mailto:<?php echo $company_email ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="info_text"><?php echo $company_email ?></span></a>
    <?php } ?>

  </span>

  <!-- Top Menu -->
  <div class="topbar_menu">
    <?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
  </div>

</div>
