    <!-- Micro templates -->

    <!-- Activity One Time Selector -->

    <script type="text/tmpl" id="script_one_time_selector">

      <form name="select_date_form" id="select_date_form">
          <input type="hidden" name="activity_id" id="activity_id" value="<%=activity.id%>"/>

            <% if (typeof activity.available !== 'undefined') { %>
              <% if (activity.available == 0) { %>
                <div class="alert alert-danger">
                  <p><%=i18next.t('activities.calendarWidget.fullPlaces')%></p>
                </div>
              <% } else if (activity.available == 2) {%>
                <div class="alert alert-warning">
                  <% if (activity.allow_select_places_for_reservation) { %>
                  <p><%=i18next.t('activities.calendarWidget.fewPlacesWarning')%></p>
                  <% } else { %>
                  <p><%=i18next.t('activities.calendarWidget.fewNoPlacesWarning')%></p>  
                  <% } %>
                </div>                  
              <% } %> 
            <% } %>  

          <div id="tickets"></div>
        </form>

    </script>

    <!-- Activity Multiple Dates Selector -->

    <script type="text/tmpl" id="script_multiple_dates_selector">

      <h2 class="h5 mt-3 mb-3"><b><?php echo _x( 'Select date', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></b></h2>
        <form name="select_date_form" id="select_date_form">
          <input type="hidden" name="activity_id" id="activity_id" value="<%=activity.id%>"/>
          <div class="form-group">
            <select name="activity_date_id" id="activity_date_id" class="form-control">
            </select>
          </div>
          <div id="tickets"></div>
        </form>          

    </script>

    <!-- Activity Cyclic Calendar -->

    <script type="text/tmpl" id="script_cyclic_calendar">

      <h2 class="h5 mt-3 mb-3 text-muted"><b><?php echo _x( 'Select date', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></b></h2>
        <form name="select_date_form" id="select_date_form">
          <input type="hidden" name="activity_id" id="activity_id" value="<%=activity_id%>"/>
          <div id="datepicker"></div>
          <div id="turns"></div>
          <div id="tickets"></div>
        </form>             
       
    </script>

    <script type="text/tmpl" id="script_cyclic_turns">

      <% if (isEmptyTurns) {%>
        <div class="alert alert-warning">
             <p><?php echo _x( 'We are sorry. There are not schedules available', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></p>
        </div>
      <% } else { %>
        <br>
        <h2 class="h5 mt-3 mb-3 text-muted"><b><?php echo _x( 'Select hour', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></b></h2>
        <div class="form-group">
          <% for (turn in turns) { %>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="turn" id="turn" value="<%=turn%>"
                     <% if (!turns[turn]) {%>disabled<%}%>>
              <label class="form-check-label" for="turn">
                  <% if (!turns[turn]) {%><span class="text-danger"><%=turn%></span><% } else {%><%=turn%><% } %>
              </label>
            </div>
          <% } %> 
        </div>
      <% }%>

    </script>

    <!-- Customer buy tickets -->

    <script type="text/tmpl" id="script_tickets">

      <h2 class="h5 mt-5 mb-3 text-muted"><b><?php echo _x( 'People', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></b></h2>

        <% for (item in tickets) { %>
           <div class="form-group">
              <select name="quantity_rate_<%=item%>" id="quantity_rate_<%=item%>" class="quantity_rate form-control">
                <% for (var idx=0; idx<tickets[item].length; idx++) { %>
                <option value="<%=tickets[item][idx]["number"]%>" data-total="<%=tickets[item][idx]["total"]%>"><%=tickets[item][idx]["description"]%></option>
                <% } %>
              </select>
           </div>
        <% } %>

        <div class="form-group">
          <button type="button" id="btn_reservation" class="btn btn-primary w-100"><?php echo _x( 'Book now', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></button>
        </div>  

    </script>

    <!-- Customer buys full activity -->

    <script type="text/tmpl" id="script_fixed_ticket">

      <% if (Object.keys(tickets).length == 1) { %>
          <!-- There is only one option, so hide it -->
          <% for (item in tickets) { %>
            <input type="hidden" name="quantity_rate_<%=item%>" class="quantity_rate" value="1"/>
          <% } %>
        <% } else if (Object.keys(tickets).length > 1) { %>
          <!-- There are more than 1 option, allow the customer to pick up one -->
          <div class="form-group">
            <select name="selected_tickets_full_mode" class="form-control">
               <option value=""><?php echo _x( 'Please, select an option', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></option>
            <% for (item in tickets) { %>
               <option value="<%=item%>"><%=tickets[item][0]["description"]%></option>
            <% } %>
            </select>
          </div>
        <% } %>

        <div class="form-group">
          <button type="button" id="btn_reservation" class="btn btn-primary w-100"><?php echo _x( 'Book now', 'activity_tickets_form_selector', 'mybooking-wp-plugin' ) ?></button>
        </div>  

    </script>