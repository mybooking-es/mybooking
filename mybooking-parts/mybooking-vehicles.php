<?php
/**
*		Template Name: Mybooking Vehicles
*  	---------------------------------
*
* 	Versión: 0.0.5
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*
*   CHANGELOG
*   Version 0.0.5
*   - Styled like Choose Product template cards
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="wrapper page_content" id="index-wrapper">
  <div class="container" id="content" tabindex="-1">
    <div class="row">
      <main class="site-main" id="main">

        <div class="col-md-12">
          <?php the_content(); ?>
        </div>

        <div class="cards-static-container">

        <?php
        $args=array( 'post_type' => 'vehicle' );
        $vehicle_item = new WP_Query( $args );
        if( $vehicle_item->have_posts() ) { ?>
        <?php  while ( $vehicle_item->have_posts() ) : $vehicle_item->the_post(); ?>

          <div class="card-static-wrapper">
            <div class="card-static">
              <div class="card-static_image">
                  <?php the_post_thumbnail(); ?>
              </div>
              <div class="card-static_body">
                  <div class="card-static_header">
                      <h2 class="card-static_product-name"><?php the_title(); ?></h2>
                      <h3 class="card-static_product-short-description">
                        <?php
                          $vehicle_type = get_post_meta( get_the_id(),'vehicle_info_type',true );
                          echo $vehicle_type;
                        ?>
                      </h3>
                  </div>
                  <div class="card-static_btn">
                    <a class="button btn btn-choose-product" href="<?php the_permalink(); ?>"
                      title="<?php esc_attr_x( 'More info', 'vehicle', 'mybooking' ); ?> <?php the_title(); ?>">
                      <?php _ex( 'More info', 'vehicle', 'mybooking' ) ?>
                    </a>
                  </div>
                </div>
            </div>
          </div>

        <?php endwhile; ?>
        <?php } ?>

        </div>
      </main>

      <?php mybooking_pagination(); ?>

    </div>
  </div>
</div>

<?php get_footer();
