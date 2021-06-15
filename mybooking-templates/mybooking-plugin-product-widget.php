<?php
  /** 
   * The Template for showing the product calendar widget
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-product-widget.php
   *
   */
?>
<div id="product_selector" data-code="<?php echo esc_attr( $args['code'] )?>"
													 <?php if ( array_key_exists('sales_channel_code', $args) && $args['sales_channel_code'] != '' ) : ?>
                             data-sales-channel-code="<?php echo esc_attr( $args['sales_channel_code'] )?>" 
                           <?php endif; ?>
                           <?php if ( array_key_exists('rental_location_code', $args) && $args['rental_location_code'] != '' ) : ?>
                             data-rental-location-code="<?php echo esc_attr( $args['rental_location_code'] )?>" 
                           <?php endif; ?> 
	   class="container">
  <div class="row">
    <div class="col-12">
      <form
        name="search_form"
        method="get"
        enctype="application/x-www-form-urlencoded">
      </form>
  </div>
  </div>
</div>
