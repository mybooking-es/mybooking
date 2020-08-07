<?php
/**
*		VEHICLE SINGLE PARTIAL
*  	----------------------
*
* 	Versión: 0.0.3
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

      <div class="col-md-8 vehicle_image">

        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

      </div>

      <div class="col-md-4 vehicle_info">

        <!-- Type -->
        <h1 class="vehicle_type">
          <?php
            $vehicle_type = get_post_meta( get_the_id(),'vehicle_info_type',true );
            echo $vehicle_type;
          ?>
        </h1>

        <!-- Vehicle title -->
        <?php the_title( '<h2 class="entry-title vehicle_name">', '</h2>' ); ?>

        <!-- Price -->
        <h2 class="vehicle_price">
          <small>
          <?php
            $vehicle_price = get_post_meta( get_the_id(),'vehicle_info_price',true );
            echo $vehicle_price;
          ?>
        </small>
        </h2>

        <!-- Description -->
        <div class="vehicle_description">
          <?php the_content(); ?>
        </div>

        <!-- Details -->
        <table class="vehicle_info-table">

          <?php
            $vehicle_brand = get_post_meta( get_the_id(),'vehicle_info_brand',true );
            $vehicle_model = get_post_meta( get_the_id(),'vehicle_info_model',true );
            $vehicle_places = get_post_meta( get_the_id(),'vehicle_info_places',true );
            $vehicle_doors = get_post_meta( get_the_id(),'vehicle_info_doors',true );
            $vehicle_fuel = get_post_meta( get_the_id(),'vehicle_info_fuel',true );
            $vehicle_drive = get_post_meta( get_the_id(),'vehicle_info_drive',true );
            $vehicle_color = get_post_meta( get_the_id(),'vehicle_info_color',true );
            $vehicle_km = get_post_meta( get_the_id(),'vehicle_info_km',true );
            $vehicle_year = get_post_meta( get_the_id(),'vehicle_info_year',true );
          ?>

          <?php if ( $vehicle_brand != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Brand','vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_brand; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_model != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Model', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_model; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_places != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Places', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_places; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_places != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Doors', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_doors; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_fuel != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Fuel', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_fuel; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_drive != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Transmission', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_drive; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_color != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Color', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_color; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_km != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Km/Miles', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_km; ?></td>
              </tr>
          <?php } ?>

          <?php if ( $vehicle_year != '' ) { ?>
              <tr>
                <td><strong><?php echo _x('Year', 'vehicle_single', 'mybooking'); ?></strong></td>
                <td><?php echo $vehicle_year; ?></td>
              </tr>
          <?php } ?>
        </table>

      </div>
    </div>
  </div>

  <footer class="entry-footer">

    <?php mybooking_entry_footer(); ?>

  </footer>
</article>
