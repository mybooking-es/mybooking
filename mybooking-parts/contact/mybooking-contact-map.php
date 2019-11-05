<?php
/**
*   CONTACT MAP PARTIAL
*   -------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<div class="contact-left-map">

  <?php $contact_map = get_option("contact_map_code");
    if ($contact_map !== '') { ?>
        <?php echo $contact_map ?>
  <?php } ?>

</div>
