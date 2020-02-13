<?php
/**
*   PLUGIN SELECTOR WIZARD TEMPLATES
*   --------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.5.0
*/
?>

<!-- ===================================================== -->
<!--                      Microtemplates                   -->
<!-- ===================================================== -->

<!-- Steps summary -->

<script id="wizard_steps_summary" type="txt/tmpl">

  <div class="wizard-summary container">
    <div class="row">
      <div class="wizard-summary_item col">
        <span class="wizard-summary_pickup"><%= summary.pickupPlace %></span>
        <% if (summary.dateFrom != null) {%>
          <span class="wizard-summary_datefrom"><%= summary.dateFrom %> <% if (summary.timeFrom != null) {%><%= summary.timeFrom %><% } %> </span>
        <% } %>
      </div>
      <div class="wizard-summary_item col">
        <span class="wizard-summary_return"><%= summary.returnPlace %></span>
        <% if (summary.dateTo != null) {%>
          <span class="wizard-summary_dateto"><%= summary.dateTo %> <% if (summary.timeTo != null) {%><%= summary.timeTo %><% } %></span>
        <% } %>
      </div>
    </div>
  </div>

</script>

<!-- Select place micro-template -->

<script id="select_place_tmpl" type="txt/tmpl">

  <div class="wizard-place container">
    <div class="row">
      <div class="col-md-12">
        <ul class="wizard-place_list">
          <% for (var idx=0; idx<places.length; idx++) { %>
          <li><a class="wizard-place_item selector_place text-primary" role="button" data-place-id="<%=places[idx].name%>"><%=places[idx].name%></a></li>
          <% } %>
        </ul>
      </div>
    </div>
  </div>

</script>

<!-- Select place multiple destionations micro-template -->

<script id="select_place_multiple_destinations_tmpl" type="txt/tmpl">

  <div class="wizard-multi-place container">
    <!-- Place selectors -->
    <div class="wizard-multi-place_selectors row">
      <div class="col-md-12">
        <button class="wizard-multi-place_btn btn btn-primary destination-selector" type="button" data-destination-id="all"><?php _e('Todos','mybooking') ?></button>
        <% for (var idx=0; idx<places.destinations.length; idx++) { %>
          <button class="wizard-multi-place_btn btn btn-primary destination-selector"  type="button"
             data-destination-id="<%=places.destinations[idx].id%>"><%=places.destinations[idx].name%></button>
        <% } %>
      </div>
    </div>
    <!-- Places list -->
    <div class="wizard-multi-place_info row">
      <div class="col-md-12">
        <% for (var idx=0; idx<places.destinations.length; idx++) { %>
          <h3 class="wizard-place_title destination-group" data-destination-id="<%=places.destinations[idx].id%>"><a name="<%=places.destinations[idx].id%>"><%=places.destinations[idx].name%></a></h3>
          <ul class="wizard-place_list destination-group" data-destination-id="<%=places.destinations[idx].id%>">
          <% for (var idy=0; idy<places.destinations[idx].places.length; idy++) { %>
            <li class="wizard-place_item"><a class="selector_place" role="button" data-place-id="<%=places.destinations[idx].places[idy].name%>"><%=places.destinations[idx].places[idy].name%></a></li>
          <% } %>
          </ul>
        <% } %>
      </div>
    </div>
  </div>

</script>

<!-- Select date micro-template -->

<script id="select_date_tmpl" type="txt/tmpl">

  <div class="wizard-date container">
    <div class="row">
      <div class="col-md-12">
         <div id="selector_date" class="wizard-date_calendar"></div>
      </div>
    </div>
  </div>

</script>

<!-- Select time micro-template -->

<script id="select_time_tmpl" type="txt/tmpl">

  <div class="wizard-time container">
      <% for (var idx=0; idx<times.length; idx++) { %>
          <% if (idx % 2 == 0) { %>
          <div class="row">
          <% } %>
            <div class="wizard-time_selector col">
              <button class="wizard-time_btn btn btn-light selector_time" type="button" data-value="<%=times[idx]%>"><%= times[idx] %></button>
            </div>
          <% if (idx % 2 == 1) { %>
          </div>
          <% } %>
        <% } %>
    </div>
  </div>

</script>
