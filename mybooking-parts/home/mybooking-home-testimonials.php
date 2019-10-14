<?php
/**
*		RESERVATION HOME TESTIMONIALS PARTIAL
*  	-------------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/
?>

<?php $testimonial_carousel_visible = get_option("home_testimonial_carousel_visibility");
if ($testimonial_carousel_visible == 1) { ?>
<div class="bg-gray-100">
  <div class="container -carrusel-un-item carrusel-de-uno owl-carousel owl-theme">

    <?php
    $testimonial_args = array('post_type' => 'testimonial');
    $testimonial_item = new WP_Query($testimonial_args);
    while ( $testimonial_item->have_posts() ) : $testimonial_item->the_post();
    ?>

      <div class="col-md-9 offset-md-1">
        <blockquote class="blockquote">

            <?php the_content(); ?>

          <footer class="blockquote-footer">
            <?php the_title(); ?>
          </footer>
        </blockquote>
      </div>

    <?php endwhile; ?>

  </div>
  </div>
<?php } ?>
