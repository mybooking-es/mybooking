      <!-- Search form -->
      <section class="section">
        <div class="container">
          <form name="wizard_search_form" class="mt-5">
              <input type="hidden" name="pickup_place">
              <input type="hidden" name="return_place">
              <input type="hidden" name="date_from">
              <input type="hidden" name="time_from">
              <input type="hidden" name="time_to">
              <div class="row">
                <div class="col-md-3">
                    <label for="place_holder">¿Dónde?</label>
                    <input type="text" class="form-control form-control-lg bg-white" id="place_holder" 
                           aria-describedby="pickupPlaceHolder" placeholder="Elige un lugar" readonly="true">
                </div>
                <div class="col-md-3">
                    <label for="from_holder">¿Cuando?</label>
                    <input type="text" class="form-control form-control-lg bg-white" id="from_holder" 
                           aria-describedby="FromHolder" placeholder="Fecha de salida" readonly="true">
                </div>    
                <div class="col-md-3 d-flex align-items-end">
                    <input type="text" class="form-control form-control-lg bg-white" id="to_holder" 
                           aria-describedby="FromHolder" placeholder="Fecha de salida" readonly="true">
                </div>   
                <br>
                <div class="col-md-1 d-flex align-items-end">
                    <button id="btn_reservation" type="button" class="btn btn-success">Reservar</button> 
                </div>                                     
              </div>           
            </div>
          </form>
        </div>
      </section>