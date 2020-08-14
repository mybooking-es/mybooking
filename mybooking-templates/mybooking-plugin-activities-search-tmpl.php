<script type="text/tmpl" id="form_activities_selector_tmpl">
	<% if (configuration.selectActivityDestination) { %>
		<div class="form-group col-md-3">
			<select name="destination_id" id="activity_selector_destination_id" class="form-control"
							<?php if ( array_key_exists('destination_id', $args) && $args['destination_id'] != '') { ?>data-value="<?php echo $args['destination_id']?>"<?php } ?>>
				<option value=""><?php echo _x( 'Destination', 'activities_search', 'mybooking-wp-plugin' ) ?></option>
			</select>
		</div>
	<% } %>	
	<% if (configuration.selectActivityCategory) { %>
		<div class="form-group col-md-3">
			<select name="family_id" id="family_id" class="form-control"
							<?php if ( array_key_exists('family_id', $args) && $args['family_id'] != '') { ?>data-value="<?php echo $args['family_id']?>"<?php } ?>>
			  <option value=""><?php echo _x( 'Category', 'activities_search', 'mybooking-wp-plugin' ) ?></option> 
			</select>
		</div>
	<% } %>
</script>