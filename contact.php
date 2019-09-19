<?php

/**
* Template Name: MyBooking Contact
*
* @package WordPress
* @subpackage Understrap Mybooking Child
* @since Understrap Mybooking Child 0.0.1
*/

get_header();
?>

<!-- CONTACT SECTION -->

<section class="bg-contact">

  <div class="flex-block-wrapper py-5">
    <div class="centered-flex-block">
        <h2>Contacto</h2>
    </div>
  </div>

  <div class="contact-content">
    <div class="contact-left">
      <div class="contact-left-info">
        <div class="contact_details">
          <div class="about">
            <h4>Contacto</h4>
            <hr />
            <p>
              Estaré encantado de atenderte en:
            </p>
          </div>
          <div class="info">
            <h4 class="color-blue-light">
              <i class="fa fa-map-marker" aria-hidden="true"></i> Localización
            </h4>
            <p>Avinguda des Camp Verd P37, 46, 07730 Alaior, Islas Baleares</p>
            <h4 class="color-blue-light">
              <i class="fa fa-phone" aria-hidden="true"></i> Teléfono
            </h4>
            <p>+34 888 88 88 88</p>
            <h4 class="color-blue-light">
              <i class="fa fa-envelope" aria-hidden="true"></i> Email
            </h4>
            <p>johndoe@gmail.com</p>
          </div>
        </div>
        <ul class="social-links mt50">
          <li class="social__item">
            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
          </li>
          <li class="social__item">
            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
          </li>
          <li class="social__item">
            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
          </li>
        </ul>
      </div>
      <div class="contact-left-map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3059.338384896538!2d4.147550115478896!3d39.933819992790625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12be21b9ec7e3359%3A0x4958a4bbdab1ed23!2smybooking!5e0!3m2!1ses!2ses!4v1546868592476"
          width="100%" height="553" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>

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
          <textarea name="message" placeholder="Mensage" class="form-control" rows="4" id="comment"></textarea>
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
