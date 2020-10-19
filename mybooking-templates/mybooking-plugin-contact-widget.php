<?php
  /** 
   * The Template for showing the contact form widget
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-contact-widget.php
   *
   */
?>
<section class="widget widget_mybooking_engine_contact">
  <form id="widget_contact_form" name="widget_contact_form" autocomplete="off">

          <div class="field field-body">
            <div class="field">
              <label class="label"><?php echo esc_html_x( 'Name', 'contact_form', 'mybooking') ?>*</label>
              <div class="control is-expanded">
                  <input name="customer_name" id="customer_name" type="text" class="input" placeholder="<?php echo esc_attr_x( 'Name', 'contact_form', 'mybooking') ?>">
              </div>
            </div>
            <div class="field">
              <label class="label"><?php echo esc_html_x( 'Surname', 'contact_form', 'mybooking') ?>*</label>
              <div class="control is-expanded">
                  <input name="customer_surname" id="customer_surname" type="text" class="input"  placeholder="<?php echo esc_attr_x( 'Surname', 'contact_form', 'mybooking') ?>">
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label"><?php echo esc_html_x( 'E-mail', 'contact_form', 'mybooking') ?>*</label>
            <div class="control is-expanded">
                <input name="customer_email" id="customer_email" type="text" class="input"
                  placeholder="<?php echo esc_attr_x( 'E-mail', 'contact_form', 'mybooking') ?>">
            </div>
          </div>

          <div class="field">
            <label class="label"><?php echo esc_html_x( 'Phone number', 'contact_form', 'mybooking') ?>*</label>
            <div class="control is-expanded">
                <input name="customer_phone" id="customer_phone" type="text" class="input"  placeholder="<?php echo esc_attr_x( 'Phone number', 'contact_form', 'mybooking') ?>">
            </div>
          </div>

          <div class="field">
            <label class="label"><?php echo esc_html_x( 'Message', 'contact_form', 'mybooking') ?>*</label>
            <div class="control is-expanded">
                <textarea name="comments" id="comments" class="textarea" placeholder="<?php echo esc_attr_x( 'Message', 'contact_form', 'mybooking') ?>"></textarea>
            </div>
          </div>

          <div class="field">
              <div class="message is-danger" id="contact_form_errors" style="display: none">
               </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button id="send_message_button" type="submit" class="btn btn-primary is-primary"><?php echo esc_html_x( 'Send', 'contact_form', 'mybooking') ?></a>
            </div>
          </div>

  </form>
</section>
