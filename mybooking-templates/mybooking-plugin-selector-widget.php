 

  <!-- FLEXBOX -->

  <section class="widget widget_mybooking_rent_engine_selector reservation-step">
    <div class="">
      <form name="widget_search_form" method="get" enctype="application/x-www-form-urlencoded" class="flex-form">
        <div class="flex-form-item-box">
          <label>Lugar Entrega </label>
          <div class="flex-form-item">
            <select id="widget_pickup_place" name="pickup_place"></select>
            <i class="fa fa-angle-down flex-icon"></i>
          </div>
        </div>
        <div class="flex-form-item-box">
          <label>Lugar Devolución </label>
          <div class="flex-form-item">
            <select id="widget_return_place" name="return_place">
            </select>
            <i class="fa fa-angle-down flex-icon"></i>
          </div>
        </div>
        <div class="flex-form-item-box">
          <label>Fecha Entrega </label>
          <div class="flex-form-item">
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            <input type="text" id="widget_date_from" name="date_from" />
            <select class="ml-1" id="widget_time_from" name="time_from">
            </select>
          </div>
        </div>
        <div class="flex-form-item-box">
          <label>Fecha Devolución </label>
          <div class="flex-form-item">
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            <input type="text" id="widget_date_to" name="date_to" />
            <select class="ml-1" id="widget_time_to" name="time_to">
            </select>
          </div>
        </div>
        <div class="flex-form-item-box">
          <input type="submit" class="btn btn-primary btn-block" value="Buscar" />
        </div>
      </form>
    </div>
  </section>