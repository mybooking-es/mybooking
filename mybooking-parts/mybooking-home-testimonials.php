<!-- TESTIMONIAL CAROUSEL ----------------------------------------------------->

<?php $testimonial_carousel_visible = get_option("home_testimonial_carousel_visibility");
if ($testimonial_carousel_visible == 1) { ?>

  <div class="container -carrusel-un-item carrusel-de-uno owl-carousel owl-theme">

    <?php
    $testimonial_args = array('post_type' => 'testimonial');
    $testimonial_item = new WP_Query($testimonial_args);
    while ( $testimonial_item->have_posts() ) : $testimonial_item->the_post();
    ?>

      <div class="col-md-12">
        <blockquote class="blockquote">
          <p class="mb-0 text-centered">
            <?php the_content(); ?>
          </p>
          <footer class="blockquote-footer">
            <?php the_title(); ?>
          </footer>
        </blockquote>
      </div>

    <?php endwhile; ?>

  </div>

<?php } ?>
