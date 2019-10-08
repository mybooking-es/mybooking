<?php
/**
*   CONTACT MAP PARTIAL
*   -------------------
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/
?>

<div class="contact-left-map">

  <?php $contact_map = get_option("contact_map_code");
    if ($contact_map !== '') { ?>
        <?php echo $contact_map ?>
  <?php } ?>

</div>
