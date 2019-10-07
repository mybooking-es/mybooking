<?php

/**
* Template Name: MyBooking Contact
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- CONTACT SECTION -->

<section class="bg-contact">

  <div class="contact-content">
    <div class="contact-left">
      <div class="contact-left-info">
        <div class="contact_details">

          <!-- Header -->

          <div class="about">

            <?php $title_contact = get_option("contact_section_title");
        	    if ($title_contact !== '') { ?>
        	    	<h1><?php echo $title_contact ?></h1>
        	    <?php }
        	  	else { ?>
        	  		<h4><?php _e("Contacto",'mybookinges'); ?></h4>
            <?php } ?>

            <hr />

            <?php $subtitle_contact = get_option("contact_section_subtitle");
        	    if ($subtitle_contact !== '') { ?>
        	    	<h3><?php echo $subtitle_contact ?></h3>
        	    <?php }
        	  	else { ?>
        	  		<h3><?php _e("Estaré encantado de atenderte en:",'mybookinges'); ?></h3>
            <?php } ?>

          </div>

          <!-- Contact info -->

          <div class="info">

            <h4 class="brand-primary">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <?php _e("Localización",'mybookinges'); ?>
            </h4>

            <?php $company_adress = get_option("company_info_adress");
        	    if ($company_adress !== '') { ?>
        	    	<p><?php echo $company_adress ?></p>
        	  <?php } ?>

            <h4 class="brand-primary">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <?php _e("Teléfono",'mybookinges'); ?>
            </h4>

            <?php $company_phone = get_option("company_info_phone");
        	    if ($company_phone !== '') { ?>
        	    	<p><?php echo $company_phone ?></p>
        	  <?php } ?>

            <h4 class="brand-primary">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <?php _e("Correo electrónico",'mybookinges'); ?>
            </h4>

            <?php $company_email = get_option("company_info_email");
        	    if ($company_email !== '') { ?>
        	    	<p><?php echo $company_email ?></p>
        	  <?php } ?>

          </div>
        </div>

        <!-- Social links -->

        <ul class="social-links mt50">

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

      <!-- Map -->

      <div class="contact-left-map">

        <?php $contact_map = get_option("contact_map_code");
    	    if ($contact_map !== '') { ?>
              <?php echo $contact_map ?>
    	  <?php } ?>

      </div>
    </div>

    <!-- Contact form -->

    <div class="contact-form contact-right">
      <h4>Form</h4>

      <hr />

      <form action="https://formspree.io/johndoe@gmail.com" method="POST">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nombre" />
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" name="_replyto" class="form-control" aria-describedby="emailHelp" placeholder="Email" />
        </div>
        <div class="form-group">
          <label for="comment">Commentario:</label>
          <textarea name="message" placeholder="Mensaje" class="form-control" rows="4" id="comment"></textarea>
        </div>
        <div class="form-group">
          <label>
            <button type="submit" value="Send" class="btn btn-outline-light">
              Enviar
            </button>
          </label>
        </div>
      </form>
    </div>

  </div>
</section>

<?php get_footer();
