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
              <% var customers_data = false; %>
              <div id="selected_products">
                <% for (idx in order.items) { %>
                <% if (typeof order.items[idx].customers !== 'undefined' && typeof order.items[idx].customer_questions !== 'undefined') { %>
                <% customers_data = true; %>
                <% } %>
                <div class="card mb-3">
                  <% if (order.items[idx].photo_full != null) { %>
                  <img class="card-img-top order-product-photo" src="<%=order.items[idx].photo_full%>" alt="">
                  <% } else { %>
                  <div class="text-center order-no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i>
                  </div>
                  <% } %>
                  <div class="card-body">
                    <h5 class="card-title"><%=order.items[idx].item_description_customer_translation%></h5>
                    <p class="card-text text-muted"><%= configuration.formatDate(order.items[idx].date) %>
                      <%= order.items[idx].time %></p>
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
                            <td>
                              <strong><?php echo _x( 'Total', 'activity_my_reservation_item', 'mybooking' ) ?></strong>
                            </td>
                            <td class="text-right">
                              <strong><%=configuration.formatCurrency(order.items[idx]['total'])%></strong></td>
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
              <!-- Customers data -->
              <% if (customers_data || order.request_customer_address) { %>
              <div id="customers_data">
                <form id="order_information_form" name="order_information_form">
                  <div class="card mb-3">
                    <div class="card-header">
                      <?php echo _x( 'Complete reservation', 'activity_my_reservation', 'mybooking') ?>
                    </div>
                    <div class="card-body">
                      <div class="alert alert-info">
                        <p>
                          <?php echo _x( 'Please complete the information to speed up the delivery process on the scheduled date', 'activity_my_reservation', 'mybooking') ?>
                        </p>
                      </div>
                      <!-- Address -->
                      <% if (order.request_customer_address) { %>
                      <h3 class="h4 card-title border p-3 bg-light">
                        <?php echo _x( 'Customer address', 'activity_my_reservation', 'mybooking') ?></h3>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label
                            for="street"><?php echo _x( 'Address', 'activity_my_reservation', 'mybooking') ?></label>
                          <input class="form-control" id="street" name="customer_address[street]" type="text"
                            placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Address', 'activity_my_reservation', 'mybooking') ?>")%>"
                            value="<%=order.address_street%>" maxlength="60">
                        </div>
                        <div class="form-group col-md-3">
                          <label
                            for="number"><?php echo _x( 'Number', 'activity_my_reservation', 'mybooking') ?></label>
                          <input class="form-control" id="number" name="customer_address[number]" type="text"
                            placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Number', 'activity_my_reservation', 'mybooking') ?>")%>"
                            value="<%=order.address_number%>" maxlength="10">
                        </div>
                        <div class="form-group col-md-3">
                          <label
                            for="complement"><?php echo _x( 'Complement', 'activity_my_reservation', 'mybooking') ?></label>
                          <input class="form-control" id="complement" name="customer_address[complement]" type="text"
                            placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Complement', 'activity_my_reservation', 'mybooking') ?>")%>"
                            value="<%=order.address_complement%>" max_length="20">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label
                            for="city"><?php echo _x( 'City', 'activity_my_reservation', 'mybooking') ?></label>
                          <input class="form-control" id="city" name="customer_address[city]" type="text"
                            placeholder="<%=configuration.escapeHtml("<?php echo _x( 'City', 'activity_my_reservation', 'mybooking') ?>")%>"
                            value="<%=order.address_city%>" max_length="60">
                        </div>
                        <div class="form-group col-md-6">
                          <label
                            for="state"><?php echo _x( 'State', 'activity_my_reservation', 'mybooking') ?></label>
                          <input class="form-control" id="state" name="customer_address[state]" type="text"
                            placeholder="<%=configuration.escapeHtml("<?php echo _x( 'State', 'activity_my_reservation', 'mybooking') ?>")%>"
                            value="<%=order.address_state%>" max_length="60">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label
                            for="country"><?php echo _x( 'Country', 'activity_my_reservation', 'mybooking') ?></label>
                          <select name="customer_address[country]" id="country" class="form-control">
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label
                            for="zip"><?php echo _x( 'Postal Code', 'activity_my_reservation', 'mybooking') ?></label>
                          <input class="form-control" id="zip" name="customer_address[zip]" type="text"
                            placeholder="<%=configuration.escapeHtml("<?php echo _x( 'Postal Code', 'activity_my_reservation', 'mybooking') ?>")%>"
                            value="<%=order.address_zip%>" max_length="10">
                        </div>
                      </div>
                      <% } %>
                      <!-- Customer information -->
                      <% if (customers_data) { %>
                      <% var index = 0; %>
                      <% for (idx in order.items) { %>
                      <!-- Customer questions and details -->
                      <% if (typeof order.items[idx].customers !== 'undefined' && typeof order.items[idx].customer_questions !== 'undefined') { %>
                      <% var customer_questions = order.items[idx].customer_questions; %>
                      <h5 class="h5 card-title border p-3 bg-light">
                        <%=order.items[idx].item_description_customer_translation%>
                        <%= configuration.formatDate(order.items[idx].date) %> <%= order.items[idx].time %></h5>
                      <% for (var idxCustomers=0; idxCustomers<order.items[idx].customers.length; idxCustomers++) { %>
                      <% order_item_customer= order.items[idx].customers[idxCustomers]; %>
                      <% index += 1; %>
                      <input type="hidden" name="order_item_customers[<%=index%>][id]"
                        value="<%=order_item_customer.id%>" />
                      <h6 class="h6 border p-2 text-right bg-light">
                        <b><?php echo _x( 'Partipant', 'activity_my_reservation', 'mybooking' ) ?>
                          #<%=index%></b></h6>

                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label
                            for="customer_name"><?php echo _x( 'Name', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_name]"
                            title="<?php echo _x( 'Name', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="text"
                            placeholder="<?php echo _x( 'Name', 'activity_my_reservation', 'mybooking') ?>:"
                            maxlength="80" value="<%=order_item_customer.customer_name%>">
                        </div>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_name"><?php echo _x( 'Surname', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_surname]"
                            title="<?php echo _x( 'Surname', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="text"
                            placeholder="<?php echo _x( 'Surname', 'activity_my_reservation', 'mybooking') ?>:"
                            maxlength="80" value="<%=order_item_customer.customer_surname%>">
                        </div>
                        <% if (customer_questions.request_customer_document_id) { %>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_document_id"><?php echo _x( 'Document ID', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_document_id]"
                            title="<?php echo _x( 'Document ID', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="text"
                            placeholder="<?php echo _x( 'Document ID', 'activity_my_reservation', 'mybooking') ?>:"
                            maxlength="50" value="<%=order_item_customer.customer_document_id%>">
                        </div>
                        <% } %>
                        <% if (customer_questions.request_customer_date_of_birth) { %>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_date_of_birth"><?php echo _x( 'Date of birth', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_date_of_birth]"
                            title="<?php echo _x( 'Date of birth', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="date"
                            placeholder="<?php echo _x( 'Date of birth', 'activity_my_reservation', 'mybooking') ?>:"
                            maxlength="50" value="<%=order_item_customer.customer_date_of_birth%>">
                        </div>
                        <% } %>

                        <% if (customer_questions.request_customer_phone) { %>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_phone"><?php echo _x( 'Phone number', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_phone]"
                            title="<?php echo _x( 'Phone number', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="text"
                            placeholder="<?php echo _x( 'Phone number', 'activity_my_reservation', 'mybooking') ?>:"
                            maxlength="50" value="<%=order_item_customer.customer_phone%>">
                        </div>
                        <% } %>
                        <% if (customer_questions.request_customer_email) { %>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_email"><?php echo _x( 'E-mail', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_email]"
                            title="<?php echo _x( 'E-mail', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="text"
                            placeholder="<?php echo _x( 'E-mail', 'activity_my_reservation', 'mybooking') ?>:"
                            maxlength="50" value="<%=order_item_customer.customer_email%>">
                        </div>
                        <% } %>
                      </div>

                      <% if (customer_questions.request_customer_height || customer_questions.request_customer_weight) { %>
                      <div class="form-row">
                        <% if (customer_questions.request_customer_height) { %>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_height"><?php echo _x( 'Height (cm)', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_height]"
                            title="<?php echo _x( 'Height (cm)', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="number"
                            placeholder="<?php echo _x( 'Height (cm)', 'activity_my_reservation', 'mybooking') ?>:"
                            min="0" max="250" value="<%=order_item_customer.customer_height%>">
                        </div>
                        <% } %>
                        <% if (customer_questions.request_customer_weight) { %>
                        <div class="form-group col-md-4">
                          <label
                            for="customer_weight"><?php echo _x( 'Weight (kg)', 'activity_my_reservation', 'mybooking') ?></label>
                          <input name="order_item_customers[<%=index%>][customer_weight]"
                            title="<?php echo _x( 'Weight (kg)', 'activity_my_reservation', 'mybooking') ?>"
                            data-toggle="tooltip" class="form-control alt" type="number"
                            placeholder="<?php echo _x( 'Weight (kg)', 'activity_my_reservation', 'mybooking') ?>:"
                            min="0" max="200" value="<%=order_item_customer.customer_weight%>">
                        </div>
                        <% } %>
                      </div>
                      <% } %>

                      <% if (customer_questions.request_customer_allergies_intolerances) { %>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <div class="form-check">
                            <input name="order_item_customers[<%=index%>][customer_allergies]"
                              title="<?php echo _x( 'Allergies', 'activity_my_reservation', 'mybooking') ?>"
                              data-toggle="tooltip" class="form-check-input" type="checkbox"
                              <% if (order_item_customer.customer_allergies){%>checked<%}%>>
                                              <label for="customer_allergies" class="form-check-label"><?php echo _x( 'Allergies', 'activity_my_reservation', 'mybooking') ?></label>
                                            </div>       
                                          </div>
                                          <div class="form-group col-md-8">
                                              <label for="customer_allergies_detail"><?php echo _x( 'Allergies detail', 'activity_my_reservation', 'mybooking') ?></label>
                                              <textarea name="order_item_customers[<%=index%>][customer_allergies_detail]"
                              title="<?php echo _x( 'Allergies detail', 'activity_my_reservation', 'mybooking') ?>"
                              data-toggle="tooltip" class="form-control alt" type="number"
                              placeholder="<?php echo _x( 'Allergies detail', 'activity_my_reservation', 'mybooking') ?>:"
                              rows="5"><%=order_item_customer.customer_allergies_detail%></textarea>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <div class="form-check">
                              <input name="order_item_customers[<%=index%>][customer_intolerances]"
                                title="<?php echo _x( 'Intolerances', 'activity_my_reservation', 'mybooking') ?>"
                                data-toggle="tooltip" class="form-check-input" type="checkbox"
                                <% if (order_item_customer.customer_intolerances){%>checked<%}%>>
                                              <label for="customer_intolerances" class="form-check-label"><?php echo _x( 'Intolerances', 'activity_my_reservation', 'mybooking') ?></label>
                                            </div>
                                          </div>
                                          <div class="form-group col-md-8">
                                              <label for="customer_intolerances_detail"><?php echo _x( 'Intolerances detail', 'activity_my_reservation', 'mybooking') ?></label>
                                              <textarea name="order_item_customers[<%=index%>][customer_intolerances_detail]"
                                title="<?php echo _x( 'Intolerances detail', 'activity_my_reservation', 'mybooking') ?>"
                                data-toggle="tooltip" class="form-control alt" type="number"
                                placeholder="<?php echo _x( 'Intolerances detail', 'activity_my_reservation', 'mybooking') ?>:"
                                rows="5"><%=order_item_customer.customer_intolerances_detail%></textarea>
                            </div>
                          </div>
                          <% } %>
                          <% if (customer_questions.request_customer_slight_injuries) { %>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <div class="form-check">
                                <input name="order_item_customers[<%=index%>][customer_slight_injuries]"
                                  title="<?php echo _x( 'Slight injuries', 'activity_my_reservation', 'mybooking') ?>"
                                  data-toggle="tooltip" class="form-check-input" type="checkbox"
                                  <% if (order_item_customer.customer_slight_injuries){%>checked<%}%>>
                                              <label for="customer_slight_injuries" class="form-check-label"><?php echo _x( 'Slight injuries', 'activity_my_reservation', 'mybooking') ?></label>
                                            </div>       
                                          </div>
                                          <div class="form-group col-md-8">
                                              <label for="customer_slight_injuries_detail"><?php echo _x( 'Slight injuries detail', 'activity_my_reservation', 'mybooking') ?></label>
                                              <textarea name="order_item_customers[<%=index%>][customer_slight_injuries_detail]"
                                  title="<?php echo _x( 'Slight injuries detail', 'activity_my_reservation', 'mybooking') ?>"
                                  data-toggle="tooltip" class="form-control alt" type="number"
                                  placeholder="<?php echo _x( 'Slight injuries detail', 'activity_my_reservation', 'mybooking') ?>:"
                                  rows="5"><%=order_item_customer.customer_slight_injuries_detail%></textarea>
                              </div>
                            </div>
                            <% } %>
                            <% if (customer_questions.request_customer_diseases) { %>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <div class="form-check">
                                  <input name="order_item_customers[<%=index%>][customer_diseases]"
                                    title="<?php echo _x( 'Diseases', 'activity_my_reservation', 'mybooking') ?>"
                                    data-toggle="tooltip" class="form-check-input" type="checkbox"
                                    <% if (order_item_customer.customer_diseases){%>checked<%}%>>
                                              <label for="customer_diseases" class="form-check-label"><?php echo _x( 'Diseases', 'activity_my_reservation', 'mybooking') ?></label>
                                            </div>       
                                          </div>
                                          <div class="form-group col-md-8">
                                              <label for="customer_diseases_detail"><?php echo _x( 'Diseases detail', 'activity_my_reservation', 'mybooking') ?></label>
                                              <textarea name="order_item_customers[<%=index%>][customer_diseases_detail]"
                                    title="<?php echo _x( 'Diseases detail', 'activity_my_reservation', 'mybooking') ?>"
                                    data-toggle="tooltip" class="form-control alt" type="number"
                                    placeholder="<?php echo _x( 'Diseases detail', 'activity_my_reservation', 'mybooking') ?>:"
                                    rows="5"><%=order_item_customer.customer_diseases_detail%></textarea>
                                </div>
                              </div>
                              <% } %>

                              <% if (customer_questions.request_customer_experience) { %>
                              <hr>
                              <div class="form-row">
                                <div class="col-md-12">
                                  <h6 class="h6"><%=customer_questions.request_customer_experience_products_text%></h6>
                                </div>
                                <% if (customer_questions.request_customer_experience_product_1) { %>
                                <div class="form-group col-md-6">
                                  <label for="customer_experience_product_1"
                                    class="form-check-label"><%=customer_questions.request_customer_experience_product_1_text%></label>
                                  <select name="order_item_customers[<%=index%>][customer_experience_product_1]"
                                    class="form-control">
                                    <option value="">
                                      <?php echo _x( 'Select the option', 'activity_my_reservation', 'mybooking') ?>
                                    </option>
                                    <option value="0" <% if (order_item_customer.customer_experience_product_1 == '0'){%>selected<%}%>><?php echo _x( 'Never', 'activity_my_reservation', 'mybooking') ?></option>
                                                <option value="1" <% if (order_item_customer.customer_experience_product_1 == '1'){%>selected<%}%>><?php echo _x( 'Once', 'activity_my_reservation', 'mybooking') ?></option>
                                                <option value="2" <% if (order_item_customer.customer_experience_product_1 == '2'){%>selected<%}%>><?php echo _x( 'Twice', 'activity_my_reservation', 'mybooking') ?></option>
                                                <option value="3" <% if (order_item_customer.customer_experience_product_1 == '3'){%>selected<%}%>><?php echo _x( 'Three or more times', 'activity_my_reservation', 'mybooking') ?></option>                                         
                                              </select>
                                            </div>
                                            <% } %>
                                      <% if (customer_questions.request_customer_experience_product_2) { %> <div
                                      class="form-group col-md-6">
                                      <label for="customer_experience_product_2"
                                        class="form-check-label"><%=customer_questions.request_customer_experience_product_2_text%></label>
                                      <select name="order_item_customers[<%=index%>][customer_experience_product_2]"
                                        class="form-control">
                                        <option value="">
                                          <?php echo _x( 'Select the option', 'activity_my_reservation', 'mybooking') ?>
                                        </option>
                                        <option value="0" <% if (order_item_customer.customer_experience_product_2 == '0'){%>selected<%}%>><?php echo _x( 'Never', 'activity_my_reservation', 'mybooking') ?></option>
                                                <option value="1" <% if (order_item_customer.customer_experience_product_2 == '1'){%>selected<%}%>><?php echo _x( 'Once', 'activity_my_reservation', 'mybooking') ?></option>
                                                <option value="2" <% if (order_item_customer.customer_experience_product_2 == '2'){%>selected<%}%>><?php echo _x( 'Twice', 'activity_my_reservation', 'mybooking') ?></option>
                                                <option value="3" <% if (order_item_customer.customer_experience_product_2 == '3'){%>selected<%}%>><?php echo _x( 'Three or more times', 'activity_my_reservation', 'mybooking') ?></option>                                         
                                              </select>
                                            </div>
                                            <% } %> </div> <% } %>
                                          <% if (customer_questions.request_customer_experience_course || customer_questions.request_customer_experience_activity) { %>
                                          <div class="form-row mb-2">
                                          <% if (customer_questions.request_customer_experience_course) { %>
                                          <div class="form-group col-md-6">
                                            <label for="customer_experience_tecnical_course"
                                              class="form-check-label"><%=customer_questions.request_customer_experience_course_text%></label>
                                            <select
                                              name="order_item_customers[<%=index%>][customer_experience_tecnical_course]"
                                              class="form-control">
                                              <option value="">
                                                <?php echo _x( 'Select the option', 'activity_my_reservation', 'mybooking') ?>
                                              </option>
                                              <option value="false" <% if (!order_item_customer.customer_experience_tecnical_course){%>selected<%}%>><?php echo _x( 'No', 'activity_my_reservation', 'mybooking') ?></option>
                                            <option value="true" <% if (order_item_customer.customer_experience_tecnical_course){%>selected<%}%>><?php echo _x( 'Yes', 'activity_my_reservation', 'mybooking') ?></option>
                                          </select>
                                        </div>
                                       <% } %> <% if (customer_questions.request_customer_experience_activity) { %>
                                                <div class="form-group col-md-6">
                                                <label for="customer_experience_activities"
                                                  class="form-check-label"><%=customer_questions.request_customer_experience_activity_text%></label>
                                                <select
                                                  name="order_item_customers[<%=index%>][customer_experience_activities]"
                                                  class="form-control">
                                                  <option value="">
                                                    <?php echo _x( 'Select the option', 'activity_my_reservation', 'mybooking') ?>
                                                  </option>
                                                  <option value="false" <% if (!order_item_customer.customer_experience_activities){%>selected<%}%>><?php echo _x( 'No', 'activity_my_reservation', 'mybooking') ?></option>
                                            <option value="true" <% if (order_item_customer.customer_experience_activities){%>selected<%}%>><?php echo _x( 'Yes', 'activity_my_reservation', 'mybooking') ?></option>
                                          </select>
                                        </div>
                                       <% } %> </div> <% } %> <% } %> <% } %> <% } %> <% } %> </div> <div
                                                    class="card-footer">
                                                    <button class="btn btn-primary pull-right" id="btn_update_order"
                                                      type="button"><?php echo _x( 'Update', 'activity_my_reservation', 'mybooking') ?></button>
                                          </div>
                                </div>
                </form>
              </div>
              <% } %>
            </div>
            <!-- /CONTENT -->

            <!-- SIDEBAR -->
            <div class="col-md-4">

              <!-- Reservation -->

              <div class="card mb-3">
                <div class="card-header">
                  <b><?php echo _x( 'Reservation ID', 'activity_my_reservation', 'mybooking') ?></b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item h3"><%=order.id%></li>
                </ul>
                <% if (order.allow_reservation_cancel) { %>
                <div class="card-footer">
                  <button id="btn_cancel_reservation"
                    class="btn btn-danger btn-cancel-reservation pull-right"><?php echo _x( 'Cancel Reservation', 'activity_my_reservation', 'mybooking' ) ?></button>
                </div>
                <% } %>
              </div>

              <!-- Customers detail -->

              <div class="card mb-3">
                <div class="card-header">
                  <b><?php echo _x( "Customer's details", 'activity_my_reservation', 'mybooking') ?></b>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><%=order.customer_name%> <%=order.customer_surname%></li>
                  <li class="list-group-item"><%=order.customer_email%></li>
                  <li class="list-group-item"><%=order.customer_phone%></li>
                </ul>
              </div>

              <!-- Total -->

              <% if (order.use_rates) { %>
              <div class="jumbotron mb-3">
                <h2 class="h5"><?php echo _x( 'Total', 'activity_my_reservation', 'mybooking' ) ?> <span
                    class="pull-right"><%=configuration.formatCurrency(order.total_cost)%></span></h2>
                <hr>
                <p class="lead"><?php echo _x( 'Paid', 'activity_my_reservation', 'mybooking' ) ?> <span
                    class="pull-right"><%=configuration.formatCurrency(order.total_paid)%></span></p>
                <p class="lead"><?php echo _x( 'Pending', 'activity_my_reservation', 'mybooking' ) ?> <span
                    class="pull-right"><%=configuration.formatCurrency(order.total_pending)%></span></p>
              </div>
              <% } %>

              <!-- Payment -->

              <% if (canPay && paymentAmount > 0) { %>

              <form name="payment_form">
                <div id="payment_now_container">

                  <div class="border p-4">
                    <h4>
                      <%=i18next.t('activities.payment.total_payment', {amount: configuration.formatCurrency(paymentAmount)})%>
                    </h4>
                    <br>

                    <!-- Payment amount -->
                    <% if (payment === 'deposit' || payment === 'total') { %>
                    <div class="alert alert-info">
                      <p>
                        <%=i18next.t('activities.payment.deposit_amount',{amount: configuration.formatCurrency(paymentAmount)})%>
                      </p>
                    </div>
                    <% } else if (payment === 'pending') { %>
                    <div class="alert alert-info">
                      <p>
                        <%=i18next.t('activities.payment.pending_amount',{amount: configuration.formatCurrency(paymentAmount)})%>
                      </p>
                    </div>
                    <% } %>

                    <!-- Payment method -->
                    <% if (order.payment_methods.paypal_standard &&
                                 order.payment_methods.tpv_virtual) { %>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="payments_paypal_standard">
                          <input type="radio" id="payments_paypal_standard" name="payment_method_value"
                            class="payment_method_select"
                            value="paypal_standard">&nbsp;<?php echo _x( 'Paypal', 'activity_my_reservation', 'mybooking' ) ?>
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
                        </label>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="payments_credit_card">
                          <input type="radio" id="payments_credit_card" name="payment_method_value"
                            class="payment_method_select"
                            value="<%=order.payment_methods.tpv_virtual%>">&nbsp;<?php echo _x( 'Credit or debit card', 'activity_my_reservation', 'mybooking' ) ?>
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg" />
                          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg" />
                        </label>
                      </div>
                    </div>
                    <div id="payment_method_select_error" class="form-row">
                    </div>
                    <% } else if (order.payment_methods.paypal_standard) { %>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
                    <input type="hidden" name="payment_method_value" value="paypal_standard">
                    <% } else if (order.payment_methods.tpv_virtual) { %>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg" />
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg" />
                    <input type="hidden" name="payment_method_value" value="<%=order.payment_methods.tpv_virtual%>">
                    <% } %>

                    <hr>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <button type="submit"
                          class="btn btn-success w-100"><%=i18next.t('activities.payment.payment_button',{amount: configuration.formatCurrency(paymentAmount)})%></a>
                      </div>
                    </div>
                  </div>

                </div>

                <div id="payment_error" class="alert alert-danger mt-1" style="display:none">
                </div>

              </form>

              <% } %>

            </div>
          </div>
        </div>
      </section>


    </script>