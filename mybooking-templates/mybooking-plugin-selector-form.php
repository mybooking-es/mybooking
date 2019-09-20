  <section class="widget widget_mybooking_rent_engine_selector reservation-step">
      <div class="landing-form mx-3">
        <form name="search_form" method="get" enctype="application/x-www-form-urlencoded">
          <div class="form-group w-100">
            <label class="control-label w-100"
              >Lugar Entrega
              <select class="w-100" id="pickup_place" name="pickup_place">
              </select>
            </label>
          </div>
          <div class="form-group w-100">
            <label class="control-label w-100"
              >Lugar Devolución
              <select class="w-100" id="return_place" name="return_place">
              </select>
            </label>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label class="control-label"
                  >Fecha Entrega
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                      </div>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      id="date_from"
                      name="date_from"
                    />
                    <select
                      class="input-group-field ml-1"
                      id="time_from"
                      name="time_from"
                    >
                    </select>
                  </div>
                </label>
              </div>
              <div class="col">
                <label class="control-label"
                  >Fecha Devolución
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                      </div>
                    </div>

                    <input
                      type="text"
                      class="form-control"
                      id="date_to"
                      name="date_to"
                    />
                    <select
                      class="input-group-field ml-1"
                      id="time_to"
                      name="time_to"
                    >
                    </select>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <input
            type="submit"
            class="btn btn-primary float-right"
            value="Buscar"
          />
        </form>
      </div>  
  </section>