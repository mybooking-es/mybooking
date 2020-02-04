<?php
/**
*   PLUGIN CONTACT FORM WIDGET
*   --------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/
?>

<section class="widget widget_mybooking_engine_contact">
  <form id="widget_contact_form" name="widget_contact_form" autocomplete="off">

          <div class="field field-body">
            <div class="field">
              <label class="label"><?php _e('Nombre','mybooking'); ?>*</label>
              <div class="control is-expanded">
                  <input name="customer_name" id="customer_name" type="text" class="input" placeholder="<?php _e('Nombre','mybooking'); ?>">
              </div>
            </div>
            <div class="field">
              <label class="label"><?php _e('Apellidos','mybooking'); ?>*</label>
              <div class="control is-expanded">
                  <input name="customer_surname" id="customer_surname" type="text" class="input"  placeholder="<?php _e('Apellidos','mybooking'); ?>">
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label"><?php _e('Correo electrónico','mybooking'); ?>*</label>
            <div class="control is-expanded">
                <input name="customer_email" id="customer_email" type="text" class="input"  placeholder="<?php _e('Correo electrónico','mybooking'); ?>">
            </div>
          </div>

          <div class="field">
            <label class="label"><?php _e('Teléfono','mybooking'); ?>*</label>
            <div class="control is-expanded">
                <input name="customer_phone" id="customer_phone" type="text" class="input"  placeholder="<?php _e('Teléfono','mybooking'); ?>">
            </div>
          </div>

          <div class="field">
            <label class="label"><?php _e('Mensaje','mybooking'); ?>*</label>
            <div class="control is-expanded">
                <textarea name="comments" id="comments" class="textarea" placeholder="<?php _e('Mensaje','mybooking'); ?>"></textarea>
            </div>
          </div>

          <div class="field">
              <div class="message is-danger" id="contact_form_errors" style="display: none">
               </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button id="send_message_button" type="submit" class="button is-primary"><?php _e('Enviar','mybooking') ?></a>
            </div>
          </div>

  </form>
</section>
