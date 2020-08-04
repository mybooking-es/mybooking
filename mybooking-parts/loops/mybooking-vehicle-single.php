<?php
/**
*		VEHICLE SINGLE PARTIAL
*  	----------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Product post -->
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <div class="entry-content">
    <div class="row">
      <div class="col-md-12 vehicle_title">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

      </div>
      <div class="col-md-9 vehicle_image">

        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

        <div class="vehicle_description">

          <?php the_content(); ?>

          <br>
          <table class="vehicle_info-table">
            <tr>
              <td colspan="2">
                <h3><?php echo _x('Vehicle details', 'vehicle_single', 'mybooking') ?></h3>
              </td>
            </tr>

            <?php $vehicle_brand = get_post_meta( get_the_id(),'vehicle_info_brand',true );
              if ( $vehicle_brand != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Brand','vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_brand; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_model = get_post_meta( get_the_id(),'vehicle_info_model',true );
              if ( $vehicle_model != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Model', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_model; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_fuel = get_post_meta( get_the_id(),'vehicle_info_fuel',true );
              if ( $vehicle_fuel != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Fuel', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_fuel; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_drive = get_post_meta( get_the_id(),'vehicle_info_drive',true );
              if ( $vehicle_drive != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Transmission', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_drive; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_km = get_post_meta( get_the_id(),'vehicle_info_km',true );
              if ( $vehicle_km != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Km/Miles', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_km; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_year = get_post_meta( get_the_id(),'vehicle_info_year',true );
              if ( $vehicle_year != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Year', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_year; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_displacement = get_post_meta( get_the_id(),'vehicle_info_displacement',true );
              if ( $vehicle_displacement != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('CC', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_displacement; ?> cc</td>
                </tr>

            <?php } ?>

            <?php $vehicle_power = get_post_meta( get_the_id(),'vehicle_info_power',true );
              if ( $vehicle_power != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('CV', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_power; ?> CV</td>
                </tr>

            <?php } ?>

            <?php $vehicle_places = get_post_meta( get_the_id(),'vehicle_info_places',true );
              if ( $vehicle_places != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Seats', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_places; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_color = get_post_meta( get_the_id(),'vehicle_info_color',true );
              if ( $vehicle_color != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Color', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_color; ?></td>
                </tr>

            <?php } ?>

            <?php $vehicle_warranty = get_post_meta( get_the_id(),'vehicle_info_warranty',true );
              if ( $vehicle_warranty != '' ) { ?>

                <tr>
                  <td><strong><?php echo _x('Warranty', 'vehicle_single', 'mybooking'); ?></strong></td>
                  <td><?php echo $vehicle_warranty; ?></td>
                </tr>

            <?php } ?>


          </table>
        </div>
      </div>
      <div class="col-md-3 vehicle_info">
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
        <table class="vehicle_info-table">

          <?php $vehicle_brand = get_post_meta( get_the_id(),'vehicle_info_brand',true );
            if ( $vehicle_brand != '' ) { ?>

                <h4><strong><?php echo $vehicle_brand; ?></h4>

          <?php } ?>

          <?php $vehicle_model = get_post_meta( get_the_id(),'vehicle_info_model',true );
            if ( $vehicle_model != '' ) { ?>

                <h4><?php echo $vehicle_model; ?></h4>

          <?php } ?>

          <?php $vehicle_fuel = get_post_meta( get_the_id(),'vehicle_info_fuel',true );
            if ( $vehicle_fuel != '' ) { ?>

                <h4><?php echo $vehicle_fuel; ?></h4>

          <?php } ?>

          <?php $vehicle_drive = get_post_meta( get_the_id(),'vehicle_info_drive',true );
            if ( $vehicle_drive != '' ) { ?>

                <h4><?php echo $vehicle_drive; ?></h4>

          <?php } ?>

          <?php $vehicle_km = get_post_meta( get_the_id(),'vehicle_info_km',true );
            if ( $vehicle_km != '' ) { ?>

                <h4><?php echo $vehicle_km; ?> km</h4>

          <?php } ?>

        </table>
      </div>
    </div>
    <div class="col_md_12">

      <?php	wp_link_pages( array(
          'before' => '<div class="page-links">' . echo _x( 'Pages:', 'vehicle_single', 'mybooking' ),
          'after'  => '</div>',
        )); ?>

    </div>
  </div>
  <footer class="entry-footer">

    <?php mybooking_entry_footer(); ?>

  </footer>
</article>
