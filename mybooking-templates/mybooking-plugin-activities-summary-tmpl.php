<?php
  /** 
   * The Template for showing the activity summary step - JS microtemplates
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-activities-summary-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound 
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound   
   */
?>
    <script type="text/tpml" id="script_order">

      <!-- Status -->

      <div class="jumbotron">
        <h1 class="display-6 text-center"><%= order.summary_status %></h1>
      </div>

      <section class="section">
        <div class="container">
          <div class="row mt-5">
            <div class="col-md-8">
              <!-- Products -->
              <div id="selected_products">
                <% for (idx in order.items) { %>
                  <div class="card mb-3">
                    <!-- Product photo -->
                    <% if (order.items[idx].photo_full != null) { %>
                      <img class="card-img-top order-product-photo" src="<%=order.items[idx].photo_full%>" alt="">
                    <% } else { %>
                      <div class="text-center order-no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
                    <% } %>               
                    <!-- Product detail -->     
                    <div class="card-body">
                      <h5 class="card-title"><%=order.items[idx].item_description_customer_translation%></h5>
                      <p class="card-text text-muted"><%= configuration.formatDate(order.items[idx].date) %> <%= order.items[idx].time %></p>
                      <!-- Detail table -->
                      <% if (order.allow_select_places_for_reservation || order.use_rates) { %>
                        <br>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <% if (order.allow_select_places_for_reservation) { %>
                                <% if (order.use_rates) { %>
                                  <% for (var x=0; x<order.items[idx]['items'].length; x++) { %>
                                    <tr>
                                        <td><%=order.items[idx]['items'][x].quantity %>
                                            <%=order.items[idx]['items'][x].item_price_description %> x
                                            <%=configuration.formatCurrency(order.items[idx]['items'][x].item_unit_cost) %>
                                        </td>
                                        <td class="text-right">
                                            <%=configuration.formatCurrency(order.items[idx]['items'][x].item_cost) %>
                                        </td>
                                    </tr>
                                  <% } %>    
                                <% } else { %>
                                  <% for (var x=0; x<order.items[idx]['items'].length; x++) { %>
                                    <tr>
                                        <td><%=order.items[idx]['items'][x].quantity %>
                                            <%=order.items[idx]['items'][x].item_price_description %> 
                                        </td>
                                    </tr>
                                  <% } %>  
                                <% } %>
                              <% } %>   
                              <% if (order.use_rates) { %> 
                                <!-- Show the total -->
                                <tr>
                                  <td><strong><?php echo esc_html_x( 'Total', 'activity_order_item', 'mybooking' ) ?></strong></td>
                                  <td class="text-right"><strong><%=configuration.formatCurrency(order.items[idx]['total'])%></strong></td>
                                </tr>
                              <% } %>
                            </tbody>
                          </table>
                        </div>
                      <% } %>
                    </div>
                  </div>
                <% } %>
              </div>
            </div>
            <!-- /CONTENT -->

            <!-- SIDEBAR -->
            <div class="col-md-4">

              <!-- Reservation -->

              <div class="card mb-3">
                <div class="card-header">
                  <b><?php echo esc_html_x( 'Reservation ID', 'activity_summary', 'mybooking') ?></b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item h3"><%=order.id%></li>
                </ul>
              </div>

              <!-- Customers detail -->

              <div class="card mb-3">
                <div class="card-header">
                  <b><?php echo esc_html_x( "Customer's details", 'activity_summary', 'mybooking') ?></b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><%=order.customer_name%> <%=order.customer_surname%></li>
                  <li class="list-group-item"><%=order.customer_email%></li>
                  <li class="list-group-item"><%=order.customer_phone%></li>
                </ul>
              </div>

              <% if (order.use_rates) { %>
                <div class="jumbotron mb-3">
                  <h2 class="h5"><?php echo esc_html_x( 'Total', 'activity_summary', 'mybooking' ) ?> <span class="pull-right"><%=configuration.formatCurrency(order.total_cost)%></span></h2>
                  <hr>
                  <p class="lead"><?php echo esc_html_x( 'Paid', 'activity_summary', 'mybooking' ) ?> <span class="pull-right"><%=configuration.formatCurrency(order.total_paid)%></span></p>
                  <p class="lead"><?php echo esc_html_x( 'Pending', 'activity_summary', 'mybooking' ) ?> <span class="pull-right"><%=configuration.formatCurrency(order.total_pending)%></span></p>
                </div>
              <% } %>
            </div>
          </div>
        </div>
      </section>


    </script>