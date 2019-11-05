<?php
/**
*		MYBOOKING FOOTER INFO PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Footer info -->

<footer class="site-footer" id="colophon">
  <div class="site-info">

      <div class="row">

        <!-- Branding -->

        <div class="col mybooking-footer_branding">
          <p><?php the_custom_logo(); ?></p>
        </div>

        <!-- Company info -->

        <div class="col mybooking-footer_company-info">

          <?php $company_name = get_option("company_info_name");
            if ($company_name !== '') { ?>
              <h4><?php echo $company_name ?></h4>
          <?php } ?>

          <p>

            <?php $company_id = get_option("company_info_nif");
              if ($company_id !== '') { ?>
                NIF: <?php echo $company_id ?><br>
            <?php } ?>
            <?php $company_adress = get_option("company_info_adress");
              if ($company_adress !== '') { ?>
                <?php echo $company_adress ?>
            <?php } ?>

          </p>
        </div>

        <!-- Payment methods -->

        <div class="col mybooking-footer_payment">
          <h4><?php _e('Métodos de pago', 'mybooking'); ?></h4>
          <ul class="social-links">
            <li class="social__item">

              <?php $company_visa = get_option("company_payment_visa");
                if ($company_visa == 1) { ?>
                  <a href="<?php echo $company_visa ?>" target="_blank"><i class="fa fa-cc-visa"></i></a>
              <?php } ?>

            </li>
            <li class="social__item">

              <?php $company_mastercard = get_option("company_payment_mastercard");
                if ($company_mastercard == 1) { ?>
                  <a href="<?php echo $company_mastercard ?>" target="_blank"><i class="fa fa-cc-mastercard"></i></a>
              <?php } ?>

            </li>
            <li class="social__item">

              <?php $company_paypal = get_option("company_payment_paypal");
                if ($company_paypal == 1) { ?>
                  <a href="<?php echo $company_paypal ?>" target="_blank"><i class="fa fa-paypal"></i></a>
              <?php } ?>

            </li>
          </ul>
        </div>

        <!-- Social links -->

        <div class="col mybooking-footer_social">
          <h4><?php _e('Síguenos', 'mybooking'); ?></h4>
          <ul class="social-links">
            <li class="social__item">

              <?php $company_twitter = get_option("company_info_twitter_url");
                if ($company_twitter !== '') { ?>
                  <a href="<?php echo $company_twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
              <?php } ?>

            </li>
            <li class="social__item">

              <?php $company_facebook = get_option("company_info_facebook_url");
                if ($company_facebook !== '') { ?>
                  <a href="<?php echo $company_facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
              <?php } ?>

            </li>
            <li class="social__item">

              <?php $company_instagram = get_option("company_info_instagram_url");
                if ($company_instagram !== '') { ?>
                  <a href="<?php echo $company_instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
              <?php } ?>

            </li>
            <li class="social__item">

              <?php $company_linkedin = get_option("company_info_linkedin_url");
                if ($company_linkedin !== '') { ?>
                  <a href="<?php echo $company_linkedin ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
              <?php } ?>

            </li>
          </ul>
        </div>
      </div>

      <!-- Copyright notice -->

      <?php $company_trade_name = get_option("company_info_trade_name");
          if ($company_trade_name !== '') { ?>
            <div class="mybooking-copyright color-transparent-white">&copy; <?php echo date('Y'); ?> <?php echo $company_trade_name ?></div>
      <?php } ?>

  </div><!-- .site-info -->
</footer><!-- #colophon -->
