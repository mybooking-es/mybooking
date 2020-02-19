<?php
/**
*		SINGLE PRODUCT PARTIAL
*  	----------------------
*		Product content type partial
*
* 	Versión: 0.0.1
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
      <div class="col-md-12 product_title">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

      </div>
      <div class="col-md-9 product_image">

        <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

        <div class="product_description">

          <?php the_content(); ?>

          <br>
          <table class="product_info-table">
            <tr>
              <td colspan="2">
                <h3><?php _e('Detalles del vehículo','mybooking') ?></h3>
              </td>
            </tr>

            <?php $info_brand = get_post_meta( get_the_id(),'product_info_brand',true );
              if ( $info_brand != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Marca','mybooking'); ?></strong></td>
                  <td><?php echo $info_brand; ?></td>
                </tr>

            <?php } ?>

            <?php $info_model = get_post_meta( get_the_id(),'product_info_model',true );
              if ( $info_model != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Modelo','mybooking'); ?></strong></td>
                  <td><?php echo $info_model; ?></td>
                </tr>

            <?php } ?>

            <?php $info_fuel = get_post_meta( get_the_id(),'product_info_fuel',true );
              if ( $info_fuel != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Combustible','mybooking'); ?></strong></td>
                  <td><?php echo $info_fuel; ?></td>
                </tr>

            <?php } ?>

            <?php $info_drive = get_post_meta( get_the_id(),'product_info_drive',true );
              if ( $info_drive != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Cambio','mybooking'); ?></strong></td>
                  <td><?php echo $info_drive; ?></td>
                </tr>

            <?php } ?>

            <?php $info_km = get_post_meta( get_the_id(),'product_info_km',true );
              if ( $info_km != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Kilometraje','mybooking'); ?></strong></td>
                  <td><?php echo $info_km; ?></td>
                </tr>

            <?php } ?>

            <?php $info_year = get_post_meta( get_the_id(),'product_info_year',true );
              if ( $info_year != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Año','mybooking'); ?></strong></td>
                  <td><?php echo $info_year; ?></td>
                </tr>

            <?php } ?>

            <?php $info_displacement = get_post_meta( get_the_id(),'product_info_displacement',true );
              if ( $info_displacement != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Cilindrada','mybooking'); ?></strong></td>
                  <td><?php echo $info_displacement; ?> cc</td>
                </tr>

            <?php } ?>

            <?php $info_power = get_post_meta( get_the_id(),'product_info_power',true );
              if ( $info_power != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Potencia','mybooking'); ?></strong></td>
                  <td><?php echo $info_power; ?> CV</td>
                </tr>

            <?php } ?>

            <?php $info_places = get_post_meta( get_the_id(),'product_info_places',true );
              if ( $info_places != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Plazas','mybooking'); ?></strong></td>
                  <td><?php echo $info_places; ?></td>
                </tr>

            <?php } ?>

            <?php $info_color = get_post_meta( get_the_id(),'product_info_color',true );
              if ( $info_color != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Color','mybooking'); ?></strong></td>
                  <td><?php echo $info_color; ?></td>
                </tr>

            <?php } ?>

            <?php $info_warranty = get_post_meta( get_the_id(),'product_info_warranty',true );
              if ( $info_warranty != '' ) { ?>

                <tr>
                  <td><strong><?php _e('Garantia','mybooking'); ?></strong></td>
                  <td><?php echo $info_warranty; ?></td>
                </tr>

            <?php } ?>


          </table>
        </div>
      </div>
      <div class="col-md-3 product_info">
        <h2 class="product_price">

          <?php
            $info_price_auto = get_post_meta(
              get_the_id(),
              'product_info_price_auto',
              true
            );
            echo $info_price_auto;

            $info_price_manual = get_post_meta(
              get_the_id(),
              'product_info_price_manual',
              true
            );
            echo $info_price_manual;

            $info_price_diesel = get_post_meta(
              get_the_id(),
              'product_info_price_diesel',
              true
            );
            echo $info_price_diesel
          ?>

        </h2>
        <table class="product_info-table">

          <?php $info_brand = get_post_meta( get_the_id(),'product_info_brand',true );
            if ( $info_brand != '' ) { ?>

                <h4><strong><?php echo $info_brand; ?></h4>

          <?php } ?>

          <?php $info_model = get_post_meta( get_the_id(),'product_info_model',true );
            if ( $info_model != '' ) { ?>

                <h4><?php echo $info_model; ?></h4>

          <?php } ?>

          <?php $info_fuel = get_post_meta( get_the_id(),'product_info_fuel',true );
            if ( $info_fuel != '' ) { ?>

                <h4><?php echo $info_fuel; ?></h4>

          <?php } ?>

          <?php $info_drive = get_post_meta( get_the_id(),'product_info_drive',true );
            if ( $info_drive != '' ) { ?>

                <h4><?php echo $info_drive; ?></h4>

          <?php } ?>

          <?php $info_km = get_post_meta( get_the_id(),'product_info_km',true );
            if ( $info_km != '' ) { ?>

                <h4><?php echo $info_km; ?> km</h4>

          <?php } ?>

        </table>
      </div>
    </div>
    <div class="col_md_12">

      <?php	wp_link_pages( array(
          'before' => '<div class="page-links">' . __( 'Páginas:', 'mybooking' ),
          'after'  => '</div>',
        )); ?>

    </div>
  </div>
  <footer class="entry-footer">

    <?php mybooking_entry_footer(); ?>

  </footer>
</article>
