<?php
/**
*   CONTACT MAP PARTIAL
*   -------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<div class="contact-left-map">

  <?php $mybooking_contact_map = MyBookingCustomizer::getInstance()->get_theme_option("contact_map_code");
    if ( !empty( $mybooking_contact_map ) ) { ?>
        <?php echo html_entity_decode( $mybooking_contact_map ) ?>
  <?php } ?>

</div>
