<?php
/**
*   CONTACT FORM PARTIAL
*   --------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="contact-form contact-right">
  <h4>Form</h4>
  <hr />
  <?php if ( is_active_sidebar( 'mybooking_contact_form' ) ) : ?>
    <div class="col">
      <?php dynamic_sidebar( 'mybooking_contact_form' ); ?>
    </div>
  <?php endif; ?>
</div>
