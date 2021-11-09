<?php
  /**
   * The Template for showing the transfer selector widget - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-transfer-modify-reservation-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>
<script type="text/tmpl" id="transfer_form_selector_tmpl">

<!-- Going -->
<div class="mybooking-selector_transfers flex-form-group-wrapper" style="flex-direction: column;">

  <!-- Origin and Return Points -->
	<div class="flex-form-group">
    <!-- Delivery place -->
    <div class="flex-form-horizontal-box">
        <label for="origin_point"><?php echo esc_html_x( 'Origin', 'transfer_form_selector', 'mybooking-wp-plugin') ?></label>
        <div class="flex-form-item">
        	<select class="form-control" id="origin_point" name="origin_point_id"></select>
      	</div>
    </div>

    <!-- Collection place -->
    <div class="flex-form-horizontal-box">
      <label for="return_place"><?php echo esc_html_x( 'Destination', 'transfer_form_selector', 'mybooking-wp-plugin' ) ?></label>
      <div class="flex-form-item">
        <select class="form-control" id="destination_point" name="destination_point_id"></select>
      </div>
    </div>
  </div>

  <!-- Date and time -->
  <div class="flex-form-group" style="margin-left: 0;">
    <!-- Date -->
    <div class="flex-form-box">
      <label for="date"><?php echo esc_html_x( 'Date and time', 'transfer_form_selector', 'mybooking-wp-plugin') ?></label>
      <div class="flex-form-horizontal-item" style="display: flex;flex-direction: row">
        <input type="text" class="form-control" name="date" id="date" autocomplete="off" readonly="true" style="border-left: 1px solid var(--gray-500);border-top-left-radius: 3px;
			  border-bottom-left-radius: 3px;">
        <select class="form-control ml-1" name="time" id="time" style="max-width: 30%;"></select>
      </div>
    </div>
  </div>

</div>

<div class="flex-form-group-wrapper">
  <!-- Places -->
  <div class="row flex-form-group" style="flex-direction: row">
    <!-- Adults -->
    <div class="col-md-4 flex-form-horizontal-box">
        <label for="origin_point"><?php echo esc_html_x( 'Adults', 'transfer_form_selector', 'mybooking-wp-plugin') ?></label>
        <div class="flex-form-item">
          <input type="number" class="form-control" name="number_of_adults" id="number_of_adults" value="1">
        </div>
    </div>
    <!-- Children -->
    <div class="col-md-4 flex-form-horizontal-box">
      <label for="return_place"><?php echo esc_html_x( 'Children', 'transfer_form_selector', 'mybooking-wp-plugin' ) ?></label>
        <div class="flex-form-item">
          <input type="number" class="form-control" name="number_of_children" id="number_of_children" value="0">
        </div>
    </div>
    <!-- Infants -->
    <div class="col-md-4 flex-form-horizontal-box">
      <label for="return_place"><?php echo esc_html_x( 'Infants', 'transfer_form_selector', 'mybooking-wp-plugin' ) ?></label>
        <div class="flex-form-item">
          <input type="number" class="form-control" name="number_of_infants" id="number_of_infants" value="0">
        </div>
    </div>
  </div>
</div>

<div class="flex-form-group-wrapper">

  <!-- One Way / Round trip -->
  <div class="flex-form-group mb-3 mt-3" style="flex-direction: row">
    <div class="form-check form-check-inline">
      <input type="radio" class="form-check-input round_trip" name="round_trip" value="false" checked>
      <label  class="form-check-label">
        <?php echo esc_html_x( 'One way', 'transfer_form_selector', 'mybooking-wp-plugin') ?>
      </label>
    </div>
    <div class="form-check form-check-inline">
      <input type="radio" class="form-check-input round_trip" name="round_trip" value="true">
      <label  class="form-check-label">
        <?php echo esc_html_x( 'Round trip', 'transfer_form_selector', 'mybooking-wp-plugin') ?>
      </label>
    </div>
  </div>

</div>

<!-- Return -->
<div id="return_block" class="mybooking-selector_transfers flex-form-group-wrapper" style="flex-direction: column; display:none">

  <!-- Origin and Return Points -->
  <div class="flex-form-group" id="return_origin_destination_block" style="display: none">
    <!-- Delivery place -->
    <div class="flex-form-horizontal-box">
        <label for="origin_point"><?php echo esc_html_x( 'Return Origin', 'transfer_form_selector', 'mybooking-wp-plugin') ?></label>
        <div class="flex-form-item">
          <select class="form-control" id="return_origin_point" name="return_origin_point_id"></select>
        </div>
    </div>

    <!-- Collection place -->
    <div class="flex-form-horizontal-box">
      <label for="return_place"><?php echo esc_html_x( 'Return Destination', 'transfer_form_selector', 'mybooking-wp-plugin' ) ?></label>
      <div class="flex-form-item">
        <select class="form-control" id="return_destination_point" name="return_destination_point_id"></select>
      </div>
    </div>
  </div>

  <!-- Date and time -->
  <div class="flex-form-group" style="margin-left: 0;">
    <!-- Date -->
    <div class="flex-form-box">
      <label for="date"><?php echo esc_html_x( 'Return Date and time', 'transfer_form_selector', 'mybooking-wp-plugin') ?></label>
      <div class="flex-form-horizontal-item" style="display: flex;flex-direction: row">
        <input type="text" class="form-control" name="return_date" id="return_date" autocomplete="off" readonly="true" style="border-left: 1px solid var(--gray-500);border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;">
        <select class="form-control ml-1" name="return_time" id="return_time" style="max-width: 30%;"></select>
      </div>
    </div>
  </div>

</div>

<div class="flex-form-horizontal-box">
  <input class="btn btn-primary btn-block" type="submit" value="<?php echo esc_attr_x( 'Find a transfer', 'transfer_form_selector', 'mybooking-wp-plugin') ?>" />
</div>

</script>
