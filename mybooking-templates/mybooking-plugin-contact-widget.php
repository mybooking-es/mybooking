<?php
/**
*   PLUGIN CONTACT FORM WIDGET
*   --------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/
?>

<section class="widget widget_mybooking_engine_contact">
  <form id="widget_contact_form" name="widget_contact_form" autocomplete="off">

          <div class="field field-body">
            <div class="field">
              <label class="label"><?php echo _x( 'Name', 'contact_form', 'mybooking-wp-plugin') ?>*</label>
              <div class="control is-expanded">
                  <input name="customer_name" id="customer_name" type="text" class="input" placeholder="<?php echo _x( 'Name', 'contact_form', 'mybooking-wp-plugin') ?>">
              </div>
            </div>
            <div class="field">
              <label class="label"><?php echo _x( 'Surname', 'contact_form', 'mybooking-wp-plugin') ?>*</label>
              <div class="control is-expanded">
                  <input name="customer_surname" id="customer_surname" type="text" class="input"  placeholder="<?php echo _x( 'Surname', 'contact_form', 'mybooking-wp-plugin') ?>">
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label"><?php echo _x( 'E-mail', 'contact_form', 'mybooking-wp-plugin') ?>*</label>
            <div class="control is-expanded">
                <input name="customer_email" id="customer_email" type="text" class="input"
                  placeholder="<?php echo _x( 'E-mail', 'contact_form', 'mybooking-wp-plugin') ?>">
            </div>
          </div>

          <div class="field">
            <label class="label"><?php echo _x( 'Phone number', 'contact_form', 'mybooking-wp-plugin') ?>*</label>
            <div class="control is-expanded">
                <input name="customer_phone" id="customer_phone" type="text" class="input"  placeholder="<?php echo _x( 'Phone number', 'contact_form', 'mybooking-wp-plugin') ?>">
            </div>
          </div>

          <div class="field">
            <label class="label"><?php echo _x( 'Message', 'contact_form', 'mybooking-wp-plugin') ?>*</label>
            <div class="control is-expanded">
                <textarea name="comments" id="comments" class="textarea" placeholder="<?php echo _x( 'Message', 'contact_form', 'mybooking-wp-plugin') ?>"></textarea>
            </div>
          </div>

          <div class="field">
              <div class="message is-danger" id="contact_form_errors" style="display: none">
               </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button id="send_message_button" type="submit" class="btn btn-primary is-primary"><?php echo _x( 'Send', 'contact_form', 'mybooking-wp-plugin') ?></a>
            </div>
          </div>

  </form>
</section>
