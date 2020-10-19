<?php
  /** 
   * The Template for showing the activity search component - JS Microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-activities-search-tmpl.php
   *
   * @phpcs:ignore PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:ignore Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   */
?>
<script type="text/tmpl" id="form_activities_selector_tmpl">
  <% if (configuration.selectActivityDestination) { %>
		<div class="form-group col-md-3">
			<select name="destination_id" id="activity_selector_destination_id" class="form-control"
				<?php if ( array_key_exists('destination_id', $args) && $args['destination_id'] != '') { ?>data-value="<?php echo esc_attr( $args['destination_id'] )?>"<?php } ?>>
				<option value=""><?php echo esc_html_x( 'Destination', 'activities_search', 'mybooking' ) ?></option>
			</select>
		</div>
	<% } %>	
	<% if (configuration.selectActivityCategory) { %>
		<div class="form-group col-md-3">
			<select name="family_id" id="family_id" class="form-control"
							<?php if ( array_key_exists('family_id', $args) && $args['family_id'] != '') { ?>data-value="<?php echo esc_attr( $args['family_id'] )?>"<?php } ?>>
			  <option value=""><?php echo esc_html_x( 'Category', 'activities_search', 'mybooking' ) ?></option> 
			</select>
		</div>
	<% } %>
</script>