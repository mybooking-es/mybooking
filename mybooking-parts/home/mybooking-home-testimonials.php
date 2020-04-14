<?php
/**
*		MYBOOKING HOME TESTIMONIALS PARTIAL
*  	-------------------------------------
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $testimonial_carousel_visible = get_option("home_testimonial_carousel_visibility");
if ($testimonial_carousel_visible == 1) { ?>
<div class="rideon-home_testimonials">
  <div class="container -carrusel-testimonials owl-theme">

    <?php
    $testimonial_args = array('post_type' => 'testimonial');
    $query = new WP_Query($testimonial_args);
    $testimonial_items = $query->get_posts();
    foreach($testimonial_items as $testimonial_item) :
    ?>

    <blockquote class="testimonial-item row">
      <div class="testimonial-item_message col-md-10">

        <img class="testimonial-item_quote" src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote-left-solid.svg">
        <div class="testimonial-item_content ">
          <?php echo $testimonial_item->post_content; ?>
        </div>

      </div>
      <div class="testimonial-item_avatar col-md-2">

        <?php if ( !has_post_thumbnail( $testimonial_item->ID ) ) { ?>
          <img class="testimonial-item_image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-avatar.png">
        <?php } else { ?>
          <?php $featured_img_url = get_the_post_thumbnail_url( $testimonial_item,'full' ); ?>
          <img class="testimonial-item_image" src="<?php echo esc_url( $featured_img_url ) ?>">
        <?php } ?>

        <footer class="blockquote-footer">
          <?php echo $testimonial_item->post_title; ?>
        </footer>

      </div>
    </blockquote>

    <?php endforeach; ?>

  </div>
  </div>
<?php } ?>
