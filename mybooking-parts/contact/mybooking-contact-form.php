<?php
/**
*   CONTACT FORM PARTIAL
*   --------------------
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/
?>

<div class="contact-form contact-right">
  <h4>Form</h4>
  <hr />
  <form action="https://formspree.io/johndoe@gmail.com" method="POST">
    <div class="form-group">
      <label for="name"><?php _e('Nombre') ?></label>
      <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nombre" />
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php _e('Email') ?></label>
      <input type="email" name="_replyto" class="form-control" aria-describedby="emailHelp" placeholder="Email" />
    </div>
    <div class="form-group">
      <label for="comment"><?php _e('Commentario') ?>:</label>
      <textarea name="message" placeholder="Mensaje" class="form-control" rows="4" id="comment"></textarea>
    </div>
    <div class="form-group">
      <label>
        <button type="submit" value="Send" class="btn btn-outline-light">
          <?php _e('Enviar') ?>
        </button>
      </label>
    </div>
  </form>
</div>
