    <!-- ===================================================== -->
    <!--                      Microtemplates                   -->
    <!-- ===================================================== -->

    <!-- Steps summary -->

    <script id="wizard_steps_summary" type="txt/tmpl">

      <div class="pt-2">
        <div class="row">
          <div class="col-md-6 text-right">
            <p><%= summary.pickupPlace %></p>
            <% if (summary.dateFrom != null) {%>
              <p><%= summary.dateFrom %> <% if (summary.timeFrom != null) {%><%= summary.timeFrom %><% } %> </p>
            <% } %>
          </div>
          <div class="col-md-6">
            <p><%= summary.returnPlace %></p>
            <% if (summary.dateTo != null) {%>
              <p><%= summary.dateTo %> <% if (summary.timeTo != null) {%><%= summary.timeTo %><% } %></p>
            <% } %>      
          </div>
        </div>
      </div>

    </script>

    <!-- Select place micro-template -->

    <script id="select_place_tmpl" type="txt/tmpl">

      <div class="container p-0">
        <div class="row">
          <div class="col-md-12">
            <ul style="list-style: none" class="pt-3">
              <% for (var idx=0; idx<places.length; idx++) { %>
              <li><a class="selector_place text-primary" role="button" data-place-id="<%=places[idx].name%>"><%=places[idx].name%></a></li>
              <% } %>
            </ul>
          </div>
        </div>
      </div>

    </script>

    <!-- Select place multiple destionations micro-template -->

    <script id="select_place_multiple_destinations_tmpl" type="txt/tmpl">

      <div class="container p-0">
        <!-- Destinations selector -->
        <div class="row mt-3">
          <div class="col-md-12">
            <button class="btn btn-primary destination-selector" type="button" data-destination-id="all">Todos</button>
            <% for (var idx=0; idx<places.destinations.length; idx++) { %>
              <button class="btn btn-primary destination-selector"  type="button" 
                 data-destination-id="<%=places.destinations[idx].id%>"><%=places.destinations[idx].name%></button>
            <% } %>
          </div>
        </div>
        <hr>
        <!-- Places selector -->
        <div class="row">
          <div class="col-md-12">
            <% for (var idx=0; idx<places.destinations.length; idx++) { %>
              <h3 class="destination-group" data-destination-id="<%=places.destinations[idx].id%>"><a name="<%=places.destinations[idx].id%>"><%=places.destinations[idx].name%></a></h3>
              <ul style="list-style: none" class="destination-group pt-3" data-destination-id="<%=places.destinations[idx].id%>">
              <% for (var idy=0; idy<places.destinations[idx].places.length; idy++) { %>               
                <li><a class="selector_place text-primary" role="button" data-place-id="<%=places.destinations[idx].places[idy].name%>"><%=places.destinations[idx].places[idy].name%></a></li>
              <% } %>
              </ul>
            <% } %>
          </div>
        </div>
      </div>

    </script>    

    <!-- Select date micro-template -->

    <script id="select_date_tmpl" type="txt/tmpl">

      <div class="container p-0">
        <div class="row">
          <div class="col-md-12">
             <div id="selector_date" class="pt-3"></div>
          </div>
        </div>
      </div>

    </script>

    <!-- Select time micro-template -->

    <script id="select_time_tmpl" type="txt/tmpl">

      <div class="container p-2 mb-5">
          <% for (var idx=0; idx<times.length; idx++) { %>
              <% if (idx % 2 == 0) { %>
              <div class="row">
              <% } %>
                <div class="col">
                  <button type="button" class="btn btn-light selector_time text-center mb-2 p-3" style="width: 100%" data-value="<%=times[idx]%>"><%= times[idx] %></button>
                </div>
              <% if (idx % 2 == 1) { %>                
              </div>
              <% } %>
            <% } %>
        </div>
      </div>

    </script>  