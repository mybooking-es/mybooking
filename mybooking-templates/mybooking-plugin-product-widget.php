<?php
/**
*   PLUGIN PRODUCT WIDGET
*   ---------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.2.0
*/
?>

<div id="product_selector" data-code="<?php echo $args['code']?>" class="container">
  <div class="row">
    <div class="col-xs-12">
      <form
        name="search_form"
        method="get"
        enctype="application/x-www-form-urlencoded">

        <!-- Pickup Place -->
        <div class="form-group"  class="pickup_place_group">
          <label for="pickup_place">Lugar de entrega</label>
          <select id="pickup_place" name="pickup_place" placeholder="Seleccionar lugar de entrega" 
                  class="form-control w-100"></select>
        </div>

        <!-- Return place -->
        <div class="form-group" class="return_place">
          <label for="pickup_place">Lugar de devolución</label>
          <select id="return_place" name="return_place" placeholder="Seleccionar lugar de devolución" 
                  class="form-control w-100"></select>
        </div>

        <!-- Availability calendar -->
        <div class="form-group">
          <input id="date" type="hidden" name="date"/>
          <div id="date-container" class="disabled-picker"></div>
        </div>

        <!-- Pickup/return time -->
        <div class="form-group time_selector_container">
            <label for="time_from">Hora de entrega</label>
            <select id="time_from" name="time_from" placeholder="hh:mm" disabled 
                    class="form-control w-100"> </select>
        </div>

        <div class="form-group time_selector_container">
            <label for="time_to">Hora de devolución</label>
            <select id="time_to" name="time_to" placeholder="hh:mm" disabled 
                    class="form-control w-100"> </select>
        </div>

        <!-- Reservation detail -->
        <div id="reservation_detail">
        </div>

        <div class="form-row">
          <div class="col-md-12">
            <button id="add_to_shopping_cart_btn" class="btn btn-outline-dark my-5 w-100" type="submit" disabled>Reservar</button>
          </div>
        </div>

      </form>

  </div>
  </div>
</div>
