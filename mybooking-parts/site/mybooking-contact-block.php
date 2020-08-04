<?php
/**
*   BLOCK CONTACT
*   -------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.6.2
*/

/* USAGE:
<?php get_template_part('mybooking-parts/site/mybooking-contact-block') ?>
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<section class="blank-section reservation-process_contact">
  <div class="container">
    <div class="row action-block">
      <div class="col">
        <h3 class="action-block_title">
          <?php echo _x('Any questions?', 'contact_block', 'mybooking') ?>
        </h3>
        <a class="action-block_text" href="<?php echo get_site_url(); ?>/contacto">
          <?php $company_name = MyBookingThemeSettings::getInstance()->get_theme_option("company_info_name");
            if ($company_name !== '') { ?>
              <?php _e('Contact with ', 'contact_block', 'mybooking') ?>
              <?php echo $company_name ?>
          <?php } ?>
        </a>
      </div>
    </div>
  </div>
</section>
