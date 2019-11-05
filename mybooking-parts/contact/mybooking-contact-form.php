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
  <!-- <form action="https://formspree.io/johndoe@gmail.com" method="POST">
    <div class="form-group">
      <label for="name"><?php _e('Nombre', 'mybooking') ?></label>
      <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="<?php _e('Nombre', 'mybooking') ?>" />
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php _e('Email', 'mybooking') ?></label>
      <input type="email" name="_replyto" class="form-control" aria-describedby="emailHelp" placeholder="<?php _e('Email', 'mybooking') ?>" />
    </div>
    <div class="form-group">
      <label for="comment"><?php _e('Commentario', 'mybooking') ?>:</label>
      <textarea name="message" placeholder="<?php _e('Commentario', 'mybooking') ?>" class="form-control" rows="4" id="comment"></textarea>
    </div>
    <div class="form-group">
      <label>
        <button type="submit" value="Send" class="btn btn-outline-light">
          <?php _e('Enviar', 'mybooking') ?>
        </button>
      </label>
    </div>
  </form> -->
  <?php if ( is_active_sidebar( 'mybooking_contact_form' ) ) : ?>
    <div class="col">
      <?php dynamic_sidebar( 'mybooking_contact_form' ); ?>
    </div>
  <?php endif; ?>
</div>
