    <div id="product_selector" data-code="<?php echo $args['code']?>" class="container is-desktop">
      <div class="row">
        <div class="col-md-12">
          <form
            name="search_form"
            method="get"
            enctype="application/x-www-form-urlencoded">
            
            <!-- Pickup Place -->
            <div class="form-row" class="pickup_place_group">
              <div class="form-group">
                <div class="col-md-12">
                    <label for="pickup_place">Entrega</label>
                    <select id="pickup_place" name="pickup_place" placeholder="Seleccionar lugar de entrega" class="form-control w-100"></select>
                </div>
              </div>
            </div>

            <!-- Return place -->
            <div class="form-row" class="return_place">                
              <div class="form-group">
                <div class="col-md-12">
                    <label for="pickup_place">Devolución</label>
                    <select id="return_place" name="return_place" placeholder="Seleccionar lugar de devolución" class="form-control w-100"></select>
                </div>
              </div>
            </div>

            <!-- Availability calendar -->        
            <div class="form-row">    
              <div class="form-group">
                <input id="date" type="hidden" name="date"/>
                <div id="date-container" class="disabled-picker"></div>
              </div>
            </div>

            <!-- Pickup/return time -->
            <div class="form-row" class="time_selector_container">
                <div class="form-group col-md-6">
                    <label for="time_from">Hora entrega</label>
                    <select id="time_from" name="time_from" placeholder="hh:mm" disabled class="form-control"> </select>
                </div>            
                <div class="form-group col-md-6">
                    <label for="time_to">Hora devolución</label>
                    <select id="time_to" name="time_to" placeholder="hh:mm" disabled class="form-control"> </select>
                </div>                   
            </div>
            <hr>
            
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