<?php
/**
*		MYBOOKING HOME TESTIMONIALS PARTIAL
*  	-------------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<?php $testimonial_carousel_visible = get_option("home_testimonial_carousel_visibility");
if ($testimonial_carousel_visible == 1) { ?>
<div class="bg-gray-100">
  <div class="container -carrusel-testimonials owl-theme">

    <?php
    $testimonial_args = array('post_type' => 'testimonial');
    $query = new WP_Query($testimonial_args);
    $testimonial_items = $query->get_posts();
    foreach($testimonial_items as $testimonial_item) :  
    ?>
      <div class="col-md-9 offset-md-1">
        <blockquote class="blockquote">
            <?php echo $testimonial_item->post_content; ?>
          <footer class="blockquote-footer">
            <?php echo $testimonial_item->post_title; ?>
          </footer>
        </blockquote>
      </div>

    <?php endforeach; ?>

  </div>
  </div>
<?php } ?>
