    <section class="section">
      <!-- Wizard container -->  
      <div id="wizard_container" class="bg-white" 
           style="display: none; position: fixed; top: 0; left: 0; z-index: 1040; width: 100%; height: 100%; overflow: hidden;">
           <!-- Title -->
           <div id="step_title" class="text-center h5 pb-2" style="position: relative; top: 20px; border-bottom: 1px solid #eee">Seleccionar fecha</div>
           <!-- Close btn -->
           <span id="close_wizard_btn" style="position: fixed; top: 20px; right: 20px; margin-right: 10px" ><i class="fa fa-times" style="font-size:1.2em; font-weight: 200"></i></span>
           <!-- Container -->
          <div id="wizard_container_step" class="p-2" 
               style="position: fixed; top: 50px; left: 0; z-index: 2000; width: 100%; height: 100%; overflow-y: auto; overflow-x: hidden">
          </div>
      </div>
      <!-- Search form -->
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
              <!--div class="col-md-3 d-flex align-items-end">
                  <input type="text" class="form-control form-control-lg bg-white" id="to_holder" 
                         aria-describedby="FromHolder" placeholder="Fecha de salida" readonly="true">
              </div-->   
              <br>
              <div class="col-md-1 d-flex align-items-end">
                  <button id="btn_reservation" type="button" class="btn btn-success">Reservar</button> 
              </div>                                     
            </div>           
          </div>
        </form>
      </div>
    </section>