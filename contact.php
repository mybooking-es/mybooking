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

          <!-- Cabecera -->

          <div class="about">

            <?php $titulo_contacto = get_option("contacto_seccion_titulo");
        	    if ($titulo_contacto !== '') { ?>
        	    	<h1><?php echo $titulo_contacto ?></h1>
        	    <?php }
        	  	else { ?>
        	  		<h4><?php _e("Contacto",'mybookinges'); ?></h4>
            <?php } ?>

            <hr />

            <?php $texto_contacto = get_option("contacto_seccion_subtitulo");
        	    if ($texto_contacto !== '') { ?>
        	    	<h3><?php echo $texto_contacto ?></h3>
        	    <?php }
        	  	else { ?>
        	  		<h3><?php _e("Estaré encantado de atenderte en:",'mybookinges'); ?></h3>
            <?php } ?>

          </div>

          <!-- Información de contacto -->

          <div class="info">

            <h4 class="color-blue-light">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <?php _e("Localización",'mybookinges'); ?>
            </h4>

            <?php $direccion_contacto = get_option("info_negocio_direccion");
        	    if ($direccion_contacto !== '') { ?>
        	    	<p><?php echo $direccion_contacto ?></p>
        	  <?php } ?>

            <h4 class="color-blue-light">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <?php _e("Teléfono",'mybookinges'); ?>
            </h4>

            <?php $telefono_contacto = get_option("info_negocio_telefono");
        	    if ($telefono_contacto !== '') { ?>
        	    	<p><?php echo $telefono_contacto ?></p>
        	  <?php } ?>

            <h4 class="color-blue-light">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <?php _e("Correo electrónico",'mybookinges'); ?>
            </h4>

            <?php $email_contacto = get_option("info_negocio_email");
        	    if ($email_contacto !== '') { ?>
        	    	<p><?php echo $email_contacto ?></p>
        	  <?php } ?>

          </div>
        </div>

        <!-- Enlaces sociales -->

        <ul class="social-links mt50">

          <li class="social__item">
            <?php $twitter_contacto = get_option("info_negocio_twitter_url");
        	    if ($twitter_contacto !== '') { ?>
                <a href="<?php echo $twitter_contacto ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        	  <?php } ?>
          </li>

          <li class="social__item">
            <?php $facebook_contacto = get_option("info_negocio_facebook_url");
        	    if ($facebook_contacto !== '') { ?>
                <a href="<?php echo $facebook_contacto ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        	  <?php } ?>
          </li>

          <li class="social__item">
            <?php $instagram_contacto = get_option("info_negocio_instagram_url");
        	    if ($instagram_contacto !== '') { ?>
                <a href="<?php echo $instagram_contacto ?>" target="_blank"><i class="fa fa-instagram"></i></a>
        	  <?php } ?>
          </li>

          <li class="social__item">
            <?php $linkedin_contacto = get_option("info_negocio_linkedin_url");
        	    if ($linkedin_contacto !== '') { ?>
                <a href="<?php echo $linkedin_contacto ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        	  <?php } ?>
          </li>

        </ul>
      </div>

      <!-- Mapa -->

      <div class="contact-left-map">
        <?php $mapa_contacto = get_option("contacto_mapa_url");
    	    if ($mapa_contacto !== '') { ?>
            <iframe
              src="<?php echo $mapa_contacto ?>"
              width="100%" height="553" frameborder="0" style="border:0" allowfullscreen></iframe>
    	  <?php } ?>
      </div>
    </div>

    <!-- Formulario -->

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
