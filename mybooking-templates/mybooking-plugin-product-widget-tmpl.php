<?php
/**
*   PLUGIN PRODUCT WIDGET TEMPLATE
*   ------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.2.0
*/
?>

<script type="text/tmpl" id="script_reservation_summary">

    <h4 class="brand-primary my-3">Reserva</h4>
    <p class="color-gray-600">Duración del alquiler: <%=shopping_cart.days%> día/s</p>

	  <h5><?php _e('Total producto','mybooking') ?></h5>
	  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>

	  <% if (shopping_cart.time_from_cost > 0) { %>
	  <h6><?php _e('Suplemento hora de entrega', 'mybooking') ?></h6>
	  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_from_cost)%></p>
	  <% } %>

	  <% if (shopping_cart.pickup_place_cost > 0) { %>
	  <h6><?php _e('Suplemento lugar de entrega', 'mybooking') ?></h6>
	  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.pickup_place_cost)%></p>
	  <% } %>

	  <% if (shopping_cart.time_to_cost > 0) { %>
	  <h6><?php _e('Suplemento hora de devolución', 'mybooking') ?></h6>
	  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.time_to_cost)%></p>
	  <% } %>

	  <% if (shopping_cart.return_place_cost > 0) { %>
	  <h6><?php _e('Suplemento lugar de devolución', 'mybooking') ?></h6>
	  <p class="color-gray-600"><%=configuration.formatCurrency(shopping_cart.return_place_cost)%></p>
	  <% } %>

    <h4 class="brand-primary my-3">Importe total</h4>
    <p class="total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>

</script>
