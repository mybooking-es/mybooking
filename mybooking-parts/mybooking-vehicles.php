<?php
/**
*		Template Name: Mybooking Vehicles
*  	---------------------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'mybooking_container_type' );
?>

<div class="wrapper page_content" id="index-wrapper">
  <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
    <div class="row">
      <main class="site-main" id="main">

        <?php the_content(); ?>

        <?php
        $args=array( 'post_type' => 'vehicle' );
        $vehicle_item = new WP_Query( $args );
        if( $vehicle_item->have_posts() ) { ?>
        <?php  while ( $vehicle_item->have_posts() ) : $vehicle_item->the_post(); ?>

        <article class="row article vehicle_item">
          <div class="col-md-3">
            <div class="vehicle_image">
              <a class="vehicle_image-link" href="<?php the_permalink(); ?>"
                title="<?php esc_attr__('Ver','mybooking'); ?> <?php the_title(); ?>">

                <?php the_post_thumbnail(); ?>

              </a>
            </div>
          </div>
          <div class="col-md-7">
            <div class="vehicle_body">
              <h2 class="vehicle_title">
                <a href="<?php the_permalink(); ?>"
                  title="<?php esc_attr__( 'Ver','mybooking' ); ?> <?php the_title(); ?>">

                  <?php the_title(); ?>

                </a>
              </h2>
              <div class="vehicle_excerpt">

                <p>

                  <?php
                      $vehicle_fuel = get_post_meta(
                        get_the_id(),
                        'vehicle_info_fuel',
                        true
                      );
                      echo $vehicle_fuel ?>

                  <br>

                  <?php
                      $vehicle_drive = get_post_meta(
                        get_the_id(),
                        'vehicle_info_drive',
                        true
                      );
                      echo $vehicle_drive ?>

                  <br>

                  <?php
                      $vehicle_km = get_post_meta(
                        get_the_id(),
                        'vehicle_info_km',
                        true
                      );
                      echo $vehicle_km ?> km

                </p>

              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="vehicle_info_list">
              <h2 class="vehicle_price">

                <?php
                    $vehicle_price_auto = get_post_meta(
                      get_the_id(),
                      'vehicle_info_price_auto',
                      true
                    );
                    echo $vehicle_price_auto;

                    $vehicle_price_manual = get_post_meta(
                      get_the_id(),
                      'vehicle_info_price_manual',
                      true
                    );
                    echo $vehicle_price_manual;

                    $vehicle_price_diesel = get_post_meta(
                      get_the_id(),
                      'vehicle_info_price_diesel',
                      true
                    );
                    echo $vehicle_price_diesel
                  ?>

              </h2>
            </div>
          </div>
        </article>

        <?php endwhile; ?>
        <?php } ?>

      </main>

      <?php mybooking_pagination(); ?>

    </div>
  </div>
</div>

<?php get_footer();
