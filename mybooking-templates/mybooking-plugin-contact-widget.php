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

    <?php if ( array_key_exists('subject', $args) && $args['subject'] != '' ) : ?>
      <input type="hidden" name="subject" value="<?php echo esc_attr( $args['subject'] )?>" />
    <?php endif; ?>

    <?php if ( array_key_exists('source', $args) && $args['source'] != '' ) : ?>
      <input type="hidden" name="source" value="<?php echo esc_attr( $args['source'] )?>" />
    <?php endif; ?>

    <?php if ( array_key_exists('sales_channel_code', $args) && $args['sales_channel_code'] != '' ) : ?>
      <input type="hidden" name="sales_channel_code" value="<?php echo esc_attr( $args['sales_channel_code'] )?>" />
    <?php endif; ?>

    <?php if ( array_key_exists('rental_location_code', $args) && $args['rental_location_code'] != '' ) : ?>
      <input type="hidden" name="rental_location_code" value="<?php echo esc_attr( $args['rental_location_code'] )?>" />
    <?php endif; ?>

    <div class="field field-body">
      <div class="field">
        <label class="label"><?php echo esc_html_x( 'Name', 'contact_form', 'mybooking') ?>*</label>
        <div class="control is-expanded">
            <input name="customer_name" id="customer_name" type="text" class="input" placeholder="<?php echo esc_attr_x( 'Name', 'contact_form', 'mybooking') ?>" />
        </div>
      </div>
      <div class="field">
        <label class="label"><?php echo esc_html_x( 'Surname', 'contact_form', 'mybooking') ?>*</label>
        <div class="control is-expanded">
            <input name="customer_surname" id="customer_surname" type="text" class="input"  placeholder="<?php echo esc_attr_x( 'Surname', 'contact_form', 'mybooking') ?>" />
        </div>
      </div>
    </div>

    <div class="field">
      <label class="label"><?php echo esc_html_x( 'E-mail', 'contact_form', 'mybooking') ?>*</label>
      <div class="control is-expanded">
          <input name="customer_email" id="customer_email" type="text" class="input" placeholder="<?php echo esc_attr_x( 'E-mail', 'contact_form', 'mybooking') ?>" />
      </div>
    </div>

    <div class="field">
      <label class="label"><?php echo esc_html_x( 'Phone number', 'contact_form', 'mybooking') ?>*</label>
      <div class="control is-expanded">
          <input name="customer_phone" id="customer_phone" type="text" class="input"  placeholder="<?php echo esc_attr_x( 'Phone number', 'contact_form', 'mybooking') ?>" />
      </div>
    </div>

    <div class="field">
      <label class="label"><?php echo esc_html_x( 'Message', 'contact_form', 'mybooking') ?>*</label>
      <div class="control is-expanded">
          <textarea name="comments" id="comments" class="textarea" placeholder="<?php echo esc_attr_x( 'Message', 'contact_form', 'mybooking') ?>"></textarea>
      </div>
    </div>

    <?php $mybooking_engine_privacy_page = get_privacy_policy_url();?>

    <?php if ( !empty($mybooking_engine_privacy_page) ) { ?>
      <!-- Privacy -->
      <div class="field">
        <label class="label" for="privacy_read">
          <input type="checkbox" id="privacy_read" name="privacy_read"  class="control" style="width: auto">
          <?php /* translators: %s: privacy policy URL */ ?>
          <?php echo wp_kses_post ( sprintf( _x( 'I have read and accept the <a href="%s" target="_blank">privacy policy</a>', 'contact_form', 'mybooking' ), $mybooking_engine_privacy_page ) )?>
        </label>
      </div>
    <?php } ?>

    <br/>

    <div class="field">
        <div class="alert alert-danger message is-danger" id="contact_form_errors" style="display: none"></div>
    </div>

    <?php if ( array_key_exists('google_captcha_api_key', $args) && !empty( $args['google_captcha_api_key'] ) ): ?>
      <div class="g-recaptcha mt-1 mb-3" data-sitekey="<?php echo esc_attr( $args['google_captcha_api_key'] )?>"></div>
    <?php endif; ?>

    <div class="field is-grouped">
      <div class="control">
        <button id="send_message_button" type="submit" class="btn btn-primary is-primary"><?php echo esc_html_x( 'Send', 'contact_form', 'mybooking') ?></button>
      </div>
    </div>

  </form>
</section>