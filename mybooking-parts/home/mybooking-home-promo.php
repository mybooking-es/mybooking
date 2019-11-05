<?php
/**
*		MYBOOKING HOME PROMO PARTIAL
*  	------------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<?php $promo_visible = get_option("home_promo_visibility");
if ($promo_visible == 1) { ?>

      <?php
      $promo_args = array(
        'post_type' => 'promo',
        'tax_query' => array(
          array(
            'taxonomy' => 'estado',
            'field' => 'slug',
            'terms' => array( 'activo' )
          ),
        ),
        'posts_per_page'=> 1,
      );
      $promo_item = new WP_Query($promo_args); ?>
      <?php  while ( $promo_item->have_posts() ) : $promo_item->the_post(); ?>

        <div class="container">
          <div class="">

            <br>
            <div class="row">
              <div class="col text-center">

                <?php $promo_image_visible = get_option("home_promo_image_visibility");
                if ($promo_image_visible == 1) {
                  the_post_thumbnail();
                } ?>

                <?php $promo_title_visible = get_option("home_promo_title_visibility");
                if ($promo_title_visible == 1) { ?>
                  <h2 class="mybooking-promo_title display-4"><?php the_title(); ?></h2>
                <?php } ?>


                <?php
                $promo_button_visible = get_option("home_promo_button_visibility");
                $promo_button_text = get_option("home_promo_button_text");
                if ($promo_button_visible == 1 && $promo_button_text !=='') { ?>

                  <a class="btn btn-primary mb50" href="<?php the_permalink(); ?>" >
                    <?php esc_html_e( $promo_button_text, 'mybooking' ); ?>
                  </a>

                <?php } ?>

              </div>
            </div>
            <br>

          </div>
        </div>

    <?php endwhile; ?>

<?php } ?>
