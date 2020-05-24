<?php
/**
*   PLUGIN SELECTOR WIDGET
*   ----------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<!-- FLEX-FORM-SELECTOR -->
<section class="widget widget_mybooking_rent_engine_selector widget-reservation-step">
  <form id="form-selector" name="widget_search_form" method="get" enctype="application/x-www-form-urlencoded"
    class="flex-form" autocomplete="off">

    <?php if ( array_key_exists('sales_channel_code', $args) && $args['sales_channel_code'] != '' ) : ?>

    <input type="hidden" name="sales_channel_code" value="<?php echo $args['sales_channel_code']?>" />

    <?php endif; ?>
    <?php if ( array_key_exists('family_id', $args) && $args['family_id'] != '' ) : ?>

    <input type="hidden" name="family_id" value="<?php echo $args['family_id']?>" />

    <?php endif; ?>

  </form>
</section>