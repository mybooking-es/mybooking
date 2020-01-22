<?php
/**
*   PLUGIN SUMMARY TEMPLATE
*   -----------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">

  <% for (var idx=0; idx < booking.booking_lines.length; idx++) { %>
      <%   var booking_line = booking.booking_lines[idx]; %>
  <% } %>

  <div class="product-detail">
    <div>
      <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
        <h2 class="product-name"><%=booking_line.item_description_customer_translation%></h2>
        <p class="detail-text"><?php _e('LOCALIZADOR','mybooking') ?>: <%= booking.id %></br>
            <?php _e('Duración del alquiler','mybooking') ?>: <%=booking.days%> <?php _e('día/s','mybooking') ?></p>
      <% } %>
      <h5><?php _e('Entrega', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_from_full_format%> / <%=booking.time_from%></li>
        <li><%=booking.pickup_place_customer_translation%></li>
      </ul>
      <h5 class="mt-3"><?php _e('Devolución', 'mybooking') ?></h5>
      <ul>
        <li><%=booking.date_to_full_format%> / <%=booking.time_to%></li>
        <li><%=booking.return_place_customer_translation%></li>
      </ul>
    </div>
    <div>
    <% for (var idx=0; idx<booking.booking_lines.length; idx++) { %>
        <img class="img-fluid" src="<%=booking_line.photo_full%>" alt="">
    <% } %>
    </div>

  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="col bg-white shadow-bottom py-3 px-3 mt-5">
          <h4 class="brand-primary my-3"><?php _e('Datos del cliente', 'mybooking') ?></h4>
          <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row"><?php _e('Nombre', 'mybooking') ?>:</th>
                    <td><%=booking.customer_name%> <%=booking.customer_surname%></td>
                  </tr>
                  <tr>
                    <th scope="row"><?php _e('Correo electrónico', 'mybooking') ?>:</th>
                    <td><%=booking.customer_email%></td>
                  </tr>
                  <tr>
                    <th scope="row"><?php _e('Teléfono', 'mybooking') ?>:</th>
                    <td><%=booking.customer_phone%> <%=booking.customer_mobile_phone%></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <br>
        <div class="col bg-white shadow-bottom py-3 px-3">
          <div id="reservation_form_container"></div>  
        </div>
        <br>   
      </div>
      <!-- Sidebar -->
      <div class="col-md-4">
        <div class="col sidebar bg-white shadow-bottom py-3 px-3 my-5">
          <h4 class="brand-primary my-3"><?php _e('Detalle de la reserva', 'mybooking') ?></h4>
          <h5><?php _e('Total producto', 'mybooking') ?></h5>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.item_cost)%></p>
          
          <% if (booking.booking_extras.length > 0) { %>
            <hr>
            <h5><?php _e('Extras', 'mybooking') ?></h5>
            <ul class="list-group">
            <% for (var idx=0; idx<booking.booking_extras.length; idx++) { %>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="extra-name"><%=booking.booking_extras[idx].extra_description_customer_translation%></span>
                <span class="badge badge-primary badge-pill"><%=booking.booking_extras[idx].quantity%></span>
                <span class="extra-price"><%=configuration.formatCurrency(booking.booking_extras[idx].extra_cost)%></span>
              </li>
            <% } %>
            </ul>
          <% } %>

          <% if (booking.extras_cost > 0) { %>
              <hr>
              <h5><?php _e('Total extras', 'mybooking') ?></h5>
              <p class="color-gray-600"><%=configuration.formatCurrency(booking.extras_cost)%></p>
          <% } %>

          <% if (booking.time_from_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento hora de entrega', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.time_from_cost)%></p>
          <% } %>

          <% if (booking.pickup_place_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento lugar de entrega', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.pickup_place_cost)%></p>
          <% } %>

          <% if (booking.time_to_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento hora de devolución', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.time_to_cost)%></p>
          <% } %>

          <% if (booking.return_place_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento lugar de devolución', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.return_place_cost)%></p>
          <% } %>

          <% if (booking.driver_age_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento edad del conductor', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.driver_age_cost)%></p>
          <% } %>

          <% if (booking.category_supplement_1_cost > 0) { %>
          <hr>
          <h6><?php _e('Suplemento combustible', 'mybooking') ?></h6>
          <p class="color-gray-600"><%=configuration.formatCurrency(booking.category_supplement_1_cost)%></p>
          <% } %>

          <hr>
          <h5 class="brand-primary"><?php _e('Importe total', 'mybooking') ?></h5>
          <p class="total-price"><%=configuration.formatCurrency(booking.total_cost)%></p>

          <hr>
          <h6><?php _e('Importe pagado', 'mybooking') ?></h5>
          <p class="total-price"><%=configuration.formatCurrency(booking.total_paid)%></p>

          <hr>
          <h6><?php _e('Importe pendiente', 'mybooking') ?></h5>
          <p class="total-price <% if (booking.total_pending > 0){ %>text-danger<%}%>"><%=configuration.formatCurrency(booking.total_pending)%></p>

        </div><!-- /.col.sidebar -->

        <div class="col bg-white shadow-bottom py-3 px-3">   
          <div id="payment_detail"></div>
        </div>
        <br>

      </div><!-- /col -->
    </div><!-- /row -->
  </div><!-- /container-fluid -->

</script>

<!-- Reservation form -->
<script type="text/tmpl" id="script_reservation_form">

  <form id="form-reservation" name="booking_information_form" autocomplete="off">
    <!-- Customer address -->
    <h4 class="brand-primary my-3"><?php _e('Dirección del cliente', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="street"><?php _e('Calle', 'mybooking') ?></label>
        <input class="form-control" id="street" name="customer_address[street]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Calle', 'mybooking') ?>")%>" value="<%=booking.address_street%>">
      </div>
      <div class="form-group col-md-6">
        <label for="number"><?php _e('Número', 'mybooking') ?></label>
        <input class="form-control" id="number" name="customer_address[number]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Número', 'mybooking') ?>")%>" value="<%=booking.address_number%>">
      </div>
      <div class="form-group col-md-6">
        <label for="complement"><?php _e('Complemento (piso/puerta)', 'mybooking') ?></label>
        <input class="form-control" id="complement" name="customer_address[complement]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Complemento (piso/puerta)', 'mybooking') ?>")%>" value="<%=booking.address_complement%>">
      </div>
      <div class="form-group col-md-6">
        <label for="city"><?php _e('Ciudad', 'mybooking') ?></label>
        <input class="form-control" id="city" name="customer_address[city]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Ciudad', 'mybooking') ?>")%>" value="<%=booking.address_city%>">
      </div>
      <div class="form-group col-md-6">
        <label for="state"><?php _e('Provincia', 'mybooking') ?></label>
        <input class="form-control" id="state" name="customer_address[state]" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Provincia', 'mybooking') ?>")%>" value="<%=booking.address_state%>">
      </div>
      <div class="form-group col-md-6">
        <label class="full-width" for="country"><?php _e('País', 'mybooking') ?>
          <i class="fa custom-icon fa-angle-down"></i>
          <select name="customer_address[country]" id="country" class="form-control">
            <option value="AF">Afganistán</option>
            <option value="AL">Albania</option>
            <option value="DE">Alemania</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antártida</option>
            <option value="AG">Antigua y Barbuda</option>
            <option value="AN">Antillas Holandesas</option>
            <option value="SA">Arabia Saudí</option>
            <option value="DZ">Argelia</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaiyán</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrein</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BE">Bélgica</option>
            <option value="BZ">Belice</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermudas</option>
            <option value="BY">Bielorrusia</option>
            <option value="MM">Birmania</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia y Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BR">Brasil</option>
            <option value="BN">Brunei</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="BT">Bután</option>
            <option value="CV">Cabo Verde</option>
            <option value="KH">Camboya</option>
            <option value="CM">Camerún</option>
            <option value="CA">Canadá</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CY">Chipre</option>
            <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comores</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, República Democrática del</option>
            <option value="KR">Corea</option>
            <option value="KP">Corea del Norte</option>
            <option value="CI">Costa de Marfíl</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croacia (Hrvatska)</option>
            <option value="CU">Cuba</option>
            <option value="DK">Dinamarca</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egipto</option>
            <option value="SV">El Salvador</option>
            <option value="AE">Emiratos Árabes Unidos</option>
            <option value="ER">Eritrea</option>
            <option value="SI">Eslovenia</option>
            <option value="ES" selected>España</option>
            <option value="US">Estados Unidos</option>
            <option value="EE">Estonia</option>
            <option value="ET">Etiopía</option>
            <option value="FJ">Fiji</option>
            <option value="PH">Filipinas</option>
            <option value="FI">Finlandia</option>
            <option value="FR">Francia</option>
            <option value="GA">Gabón</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GD">Granada</option>
            <option value="GR">Grecia</option>
            <option value="GL">Groenlandia</option>
            <option value="GP">Guadalupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GY">Guayana</option>
            <option value="GF">Guayana Francesa</option>
            <option value="GN">Guinea</option>
            <option value="GQ">Guinea Ecuatorial</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="HT">Haití</option>
            <option value="HN">Honduras</option>
            <option value="HU">Hungría</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IQ">Irak</option>
            <option value="IR">Irán</option>
            <option value="IE">Irlanda</option>
            <option value="BV">Isla Bouvet</option>
            <option value="CX">Isla de Christmas</option>
            <option value="IS">Islandia</option>
            <option value="KY">Islas Caimán</option>
            <option value="CK">Islas Cook</option>
            <option value="CC">Islas de Cocos o Keeling</option>
            <option value="FO">Islas Faroe</option>
            <option value="HM">Islas Heard y McDonald</option>
            <option value="FK">Islas Malvinas</option>
            <option value="MP">Islas Marianas del Norte</option>
            <option value="MH">Islas Marshall</option>
            <option value="UM">Islas menores de Estados Unidos</option>
            <option value="PW">Islas Palau</option>
            <option value="SB">Islas Salomón</option>
            <option value="SJ">Islas Svalbard y Jan Mayen</option>
            <option value="TK">Islas Tokelau</option>
            <option value="TC">Islas Turks y Caicos</option>
            <option value="VI">Islas Vírgenes (EEUU)</option>
            <option value="VG">Islas Vírgenes (Reino Unido)</option>
            <option value="WF">Islas Wallis y Futuna</option>
            <option value="IL">Israel</option>
            <option value="IT">Italia</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japón</option>
            <option value="JO">Jordania</option>
            <option value="KZ">Kazajistán</option>
            <option value="KE">Kenia</option>
            <option value="KG">Kirguizistán</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait</option>
            <option value="LA">Laos</option>
            <option value="LS">Lesotho</option>
            <option value="LV">Letonia</option>
            <option value="LB">Líbano</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libia</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lituania</option>
            <option value="LU">Luxemburgo</option>
            <option value="MK">Macedonia, Ex-República Yugoslava de</option>
            <option value="MG">Madagascar</option>
            <option value="MY">Malasia</option>
            <option value="MW">Malawi</option>
            <option value="MV">Maldivas</option>
            <option value="ML">Malí</option>
            <option value="MT">Malta</option>
            <option value="MA">Marruecos</option>
            <option value="MQ">Martinica</option>
            <option value="MU">Mauricio</option>
            <option value="MR">Mauritania</option>
            <option value="YT">Mayotte</option>
            <option value="MX">México</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldavia</option>
            <option value="MC">Mónaco</option>
            <option value="MN">Mongolia</option>
            <option value="MS">Montserrat</option>
            <option value="MZ">Mozambique</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Níger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk</option>
            <option value="NO">Noruega</option>
            <option value="NC">Nueva Caledonia</option>
            <option value="NZ">Nueva Zelanda</option>
            <option value="OM">Omán</option>
            <option value="NL">Países Bajos</option>
            <option value="PA">Panamá</option>
            <option value="PG">Papúa Nueva Guinea</option>
            <option value="PK">Paquistán</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Perú</option>
            <option value="PN">Pitcairn</option>
            <option value="PF">Polinesia Francesa</option>
            <option value="PL">Polonia</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="UK">Reino Unido</option>
            <option value="CF">República Centroafricana</option>
            <option value="CZ">República Checa</option>
            <option value="ZA">República de Sudáfrica</option>
            <option value="DO">República Dominicana</option>
            <option value="SK">República Eslovaca</option>
            <option value="RE">Reunión</option>
            <option value="RW">Ruanda</option>
            <option value="RO">Rumania</option>
            <option value="RU">Rusia</option>
            <option value="EH">Sahara Occidental</option>
            <option value="KN">Saint Kitts y Nevis</option>
            <option value="WS">Samoa</option>
            <option value="AS">Samoa Americana</option>
            <option value="SM">San Marino</option>
            <option value="VC">San Vicente y Granadinas</option>
            <option value="SH">Santa Helena</option>
            <option value="LC">Santa Lucía</option>
            <option value="ST">Santo Tomé y Príncipe</option>
            <option value="SN">Senegal</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leona</option>
            <option value="SG">Singapur</option>
            <option value="SY">Siria</option>
            <option value="SO">Somalia</option>
            <option value="LK">Sri Lanka</option>
            <option value="PM">St Pierre y Miquelon</option>
            <option value="SZ">Suazilandia</option>
            <option value="SD">Sudán</option>
            <option value="SE">Suecia</option>
            <option value="CH">Suiza</option>
            <option value="SR">Surinam</option>
            <option value="TH">Tailandia</option>
            <option value="TW">Taiwán</option>
            <option value="TZ">Tanzania</option>
            <option value="TJ">Tayikistán</option>
            <option value="TF">Territorios franceses del Sur</option>
            <option value="TP">Timor Oriental</option>
            <option value="TG">Togo</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad y Tobago</option>
            <option value="TN">Túnez</option>
            <option value="TM">Turkmenistán</option>
            <option value="TR">Turquía</option>
            <option value="TV">Tuvalu</option>
            <option value="UA">Ucrania</option>
            <option value="UG">Uganda</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistán</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam</option>
            <option value="YE">Yemen</option>
            <option value="YU">Yugoslavia</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabue</option>
          </select>
        </label>
      </div>
    </div>
    <!-- Driver information -->
    <h4 class="brand-primary my-3"><?php _e('Datos del conductor', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
        <input class="form-control" id="driver_name" name="driver_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nombre del conductor', 'mybooking') ?>")%>" value="<%=booking.driver_name%>">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
        <input class="form-control" id="driver_surname" name="driver_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Apellidos del conductor', 'mybooking') ?>")%>" value="<%=booking.driver_surname%>">
      </div>
      <div class="form-group col-md-6">
        <label for="driver_document_id"><?php _e('Nif o pasaporte del conductor', 'mybooking') ?></label>
        <input class="form-control" id="driver_document_id" name="driver_document_id" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nif o pasaporte del conductor', 'mybooking') ?>")%>" value="<%=booking.driver_document_id%>">
      </div>

      <div class="form-group col-md-6">
        <label
          for="driver_date_of_birth"><?php _e('Fecha de nacimiento del conductor', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="driver_date_of_birth_day" id="driver_date_of_birth_day"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="driver_date_of_birth_month" id="driver_date_of_birth_month"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="driver_date_of_birth_year" id="driver_date_of_birth_year"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
        </div>
        <input type="hidden" name="driver_date_of_birth" id="driver_date_of_birth"></input>
      </div>

      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
        <input class="form-control" id="driver_driving_license_number" name="driver_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php _e('Número del carnet de conducir', 'mybooking') ?>")%>" value="<%=booking.driver_driving_license_number%>">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="driver_driving_license_date_day" id="driver_driving_license_date_day"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="driver_driving_license_date_month" id="driver_driving_license_date_month"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="driver_driving_license_date_year" id="driver_driving_license_date_year"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
        </div>
        <input type="hidden" name="driver_driving_license_date" id="driver_driving_license_date"></input>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?>
          <i class="fa custom-icon fa-angle-down"></i>
          <select name="driver_driving_license_country" id="driver_driving_license_country"
            class="form-control">
            <option value="AF">Afganistán</option>
            <option value="AL">Albania</option>
            <option value="DE">Alemania</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antártida</option>
            <option value="AG">Antigua y Barbuda</option>
            <option value="AN">Antillas Holandesas</option>
            <option value="SA">Arabia Saudí</option>
            <option value="DZ">Argelia</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaiyán</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrein</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BE">Bélgica</option>
            <option value="BZ">Belice</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermudas</option>
            <option value="BY">Bielorrusia</option>
            <option value="MM">Birmania</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia y Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BR">Brasil</option>
            <option value="BN">Brunei</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="BT">Bután</option>
            <option value="CV">Cabo Verde</option>
            <option value="KH">Camboya</option>
            <option value="CM">Camerún</option>
            <option value="CA">Canadá</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CY">Chipre</option>
            <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comores</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, República Democrática del</option>
            <option value="KR">Corea</option>
            <option value="KP">Corea del Norte</option>
            <option value="CI">Costa de Marfíl</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croacia (Hrvatska)</option>
            <option value="CU">Cuba</option>
            <option value="DK">Dinamarca</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egipto</option>
            <option value="SV">El Salvador</option>
            <option value="AE">Emiratos Árabes Unidos</option>
            <option value="ER">Eritrea</option>
            <option value="SI">Eslovenia</option>
            <option value="ES" selected>España</option>
            <option value="US">Estados Unidos</option>
            <option value="EE">Estonia</option>
            <option value="ET">Etiopía</option>
            <option value="FJ">Fiji</option>
            <option value="PH">Filipinas</option>
            <option value="FI">Finlandia</option>
            <option value="FR">Francia</option>
            <option value="GA">Gabón</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GD">Granada</option>
            <option value="GR">Grecia</option>
            <option value="GL">Groenlandia</option>
            <option value="GP">Guadalupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GY">Guayana</option>
            <option value="GF">Guayana Francesa</option>
            <option value="GN">Guinea</option>
            <option value="GQ">Guinea Ecuatorial</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="HT">Haití</option>
            <option value="HN">Honduras</option>
            <option value="HU">Hungría</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IQ">Irak</option>
            <option value="IR">Irán</option>
            <option value="IE">Irlanda</option>
            <option value="BV">Isla Bouvet</option>
            <option value="CX">Isla de Christmas</option>
            <option value="IS">Islandia</option>
            <option value="KY">Islas Caimán</option>
            <option value="CK">Islas Cook</option>
            <option value="CC">Islas de Cocos o Keeling</option>
            <option value="FO">Islas Faroe</option>
            <option value="HM">Islas Heard y McDonald</option>
            <option value="FK">Islas Malvinas</option>
            <option value="MP">Islas Marianas del Norte</option>
            <option value="MH">Islas Marshall</option>
            <option value="UM">Islas menores de Estados Unidos</option>
            <option value="PW">Islas Palau</option>
            <option value="SB">Islas Salomón</option>
            <option value="SJ">Islas Svalbard y Jan Mayen</option>
            <option value="TK">Islas Tokelau</option>
            <option value="TC">Islas Turks y Caicos</option>
            <option value="VI">Islas Vírgenes (EEUU)</option>
            <option value="VG">Islas Vírgenes (Reino Unido)</option>
            <option value="WF">Islas Wallis y Futuna</option>
            <option value="IL">Israel</option>
            <option value="IT">Italia</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japón</option>
            <option value="JO">Jordania</option>
            <option value="KZ">Kazajistán</option>
            <option value="KE">Kenia</option>
            <option value="KG">Kirguizistán</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait</option>
            <option value="LA">Laos</option>
            <option value="LS">Lesotho</option>
            <option value="LV">Letonia</option>
            <option value="LB">Líbano</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libia</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lituania</option>
            <option value="LU">Luxemburgo</option>
            <option value="MK">Macedonia, Ex-República Yugoslava de</option>
            <option value="MG">Madagascar</option>
            <option value="MY">Malasia</option>
            <option value="MW">Malawi</option>
            <option value="MV">Maldivas</option>
            <option value="ML">Malí</option>
            <option value="MT">Malta</option>
            <option value="MA">Marruecos</option>
            <option value="MQ">Martinica</option>
            <option value="MU">Mauricio</option>
            <option value="MR">Mauritania</option>
            <option value="YT">Mayotte</option>
            <option value="MX">México</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldavia</option>
            <option value="MC">Mónaco</option>
            <option value="MN">Mongolia</option>
            <option value="MS">Montserrat</option>
            <option value="MZ">Mozambique</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Níger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk</option>
            <option value="NO">Noruega</option>
            <option value="NC">Nueva Caledonia</option>
            <option value="NZ">Nueva Zelanda</option>
            <option value="OM">Omán</option>
            <option value="NL">Países Bajos</option>
            <option value="PA">Panamá</option>
            <option value="PG">Papúa Nueva Guinea</option>
            <option value="PK">Paquistán</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Perú</option>
            <option value="PN">Pitcairn</option>
            <option value="PF">Polinesia Francesa</option>
            <option value="PL">Polonia</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="UK">Reino Unido</option>
            <option value="CF">República Centroafricana</option>
            <option value="CZ">República Checa</option>
            <option value="ZA">República de Sudáfrica</option>
            <option value="DO">República Dominicana</option>
            <option value="SK">República Eslovaca</option>
            <option value="RE">Reunión</option>
            <option value="RW">Ruanda</option>
            <option value="RO">Rumania</option>
            <option value="RU">Rusia</option>
            <option value="EH">Sahara Occidental</option>
            <option value="KN">Saint Kitts y Nevis</option>
            <option value="WS">Samoa</option>
            <option value="AS">Samoa Americana</option>
            <option value="SM">San Marino</option>
            <option value="VC">San Vicente y Granadinas</option>
            <option value="SH">Santa Helena</option>
            <option value="LC">Santa Lucía</option>
            <option value="ST">Santo Tomé y Príncipe</option>
            <option value="SN">Senegal</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leona</option>
            <option value="SG">Singapur</option>
            <option value="SY">Siria</option>
            <option value="SO">Somalia</option>
            <option value="LK">Sri Lanka</option>
            <option value="PM">St Pierre y Miquelon</option>
            <option value="SZ">Suazilandia</option>
            <option value="SD">Sudán</option>
            <option value="SE">Suecia</option>
            <option value="CH">Suiza</option>
            <option value="SR">Surinam</option>
            <option value="TH">Tailandia</option>
            <option value="TW">Taiwán</option>
            <option value="TZ">Tanzania</option>
            <option value="TJ">Tayikistán</option>
            <option value="TF">Territorios franceses del Sur</option>
            <option value="TP">Timor Oriental</option>
            <option value="TG">Togo</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad y Tobago</option>
            <option value="TN">Túnez</option>
            <option value="TM">Turkmenistán</option>
            <option value="TR">Turquía</option>
            <option value="TV">Tuvalu</option>
            <option value="UA">Ucrania</option>
            <option value="UG">Uganda</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistán</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam</option>
            <option value="YE">Yemen</option>
            <option value="YU">Yugoslavia</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabue</option>
          </select>
        </label>
      </div>
    </div>
    <!-- Additional drivers -->
    <h4 class="brand-primary my-3"><?php _e('Conductores adicionales', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_1_name" name="additional_driver_1_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nombre del conductor', 'mybooking') ?>")%>" value="<%=booking.additional_driver_1_name%>">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_1_surname" name="additional_driver_1_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Apellidos del conductor', 'mybooking') ?>")%>" value="<%=booking.additional_driver_1_surname%>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_1_driving_license_number" name="additional_driver_1_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php _e('Número del carnet de conducir', 'mybooking') ?>")%>" value="<%=booking.additional_driver_1_driving_license_number%>">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="additional_driver_1_driving_license_date_day" id="additional_driver_1_driving_license_date_day"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_1_driving_license_date_month" id="additional_driver_1_driving_license_date_month"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_1_driving_license_date_year" id="additional_driver_1_driving_license_date_year"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
        </div>
        <input type="hidden" name="additional_driver_1_driving_license_date" id="additional_driver_1_driving_license_date"></input>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?>
          <i class="fa custom-icon fa-angle-down"></i>
          <select name="additional_driver_1_driving_license_country" id="additional_driver_1_driving_license_country"
            class="form-control">
            <option value="AF">Afganistán</option>
            <option value="AL">Albania</option>
            <option value="DE">Alemania</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antártida</option>
            <option value="AG">Antigua y Barbuda</option>
            <option value="AN">Antillas Holandesas</option>
            <option value="SA">Arabia Saudí</option>
            <option value="DZ">Argelia</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaiyán</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrein</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BE">Bélgica</option>
            <option value="BZ">Belice</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermudas</option>
            <option value="BY">Bielorrusia</option>
            <option value="MM">Birmania</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia y Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BR">Brasil</option>
            <option value="BN">Brunei</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="BT">Bután</option>
            <option value="CV">Cabo Verde</option>
            <option value="KH">Camboya</option>
            <option value="CM">Camerún</option>
            <option value="CA">Canadá</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CY">Chipre</option>
            <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comores</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, República Democrática del</option>
            <option value="KR">Corea</option>
            <option value="KP">Corea del Norte</option>
            <option value="CI">Costa de Marfíl</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croacia (Hrvatska)</option>
            <option value="CU">Cuba</option>
            <option value="DK">Dinamarca</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egipto</option>
            <option value="SV">El Salvador</option>
            <option value="AE">Emiratos Árabes Unidos</option>
            <option value="ER">Eritrea</option>
            <option value="SI">Eslovenia</option>
            <option value="ES" selected>España</option>
            <option value="US">Estados Unidos</option>
            <option value="EE">Estonia</option>
            <option value="ET">Etiopía</option>
            <option value="FJ">Fiji</option>
            <option value="PH">Filipinas</option>
            <option value="FI">Finlandia</option>
            <option value="FR">Francia</option>
            <option value="GA">Gabón</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GD">Granada</option>
            <option value="GR">Grecia</option>
            <option value="GL">Groenlandia</option>
            <option value="GP">Guadalupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GY">Guayana</option>
            <option value="GF">Guayana Francesa</option>
            <option value="GN">Guinea</option>
            <option value="GQ">Guinea Ecuatorial</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="HT">Haití</option>
            <option value="HN">Honduras</option>
            <option value="HU">Hungría</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IQ">Irak</option>
            <option value="IR">Irán</option>
            <option value="IE">Irlanda</option>
            <option value="BV">Isla Bouvet</option>
            <option value="CX">Isla de Christmas</option>
            <option value="IS">Islandia</option>
            <option value="KY">Islas Caimán</option>
            <option value="CK">Islas Cook</option>
            <option value="CC">Islas de Cocos o Keeling</option>
            <option value="FO">Islas Faroe</option>
            <option value="HM">Islas Heard y McDonald</option>
            <option value="FK">Islas Malvinas</option>
            <option value="MP">Islas Marianas del Norte</option>
            <option value="MH">Islas Marshall</option>
            <option value="UM">Islas menores de Estados Unidos</option>
            <option value="PW">Islas Palau</option>
            <option value="SB">Islas Salomón</option>
            <option value="SJ">Islas Svalbard y Jan Mayen</option>
            <option value="TK">Islas Tokelau</option>
            <option value="TC">Islas Turks y Caicos</option>
            <option value="VI">Islas Vírgenes (EEUU)</option>
            <option value="VG">Islas Vírgenes (Reino Unido)</option>
            <option value="WF">Islas Wallis y Futuna</option>
            <option value="IL">Israel</option>
            <option value="IT">Italia</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japón</option>
            <option value="JO">Jordania</option>
            <option value="KZ">Kazajistán</option>
            <option value="KE">Kenia</option>
            <option value="KG">Kirguizistán</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait</option>
            <option value="LA">Laos</option>
            <option value="LS">Lesotho</option>
            <option value="LV">Letonia</option>
            <option value="LB">Líbano</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libia</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lituania</option>
            <option value="LU">Luxemburgo</option>
            <option value="MK">Macedonia, Ex-República Yugoslava de</option>
            <option value="MG">Madagascar</option>
            <option value="MY">Malasia</option>
            <option value="MW">Malawi</option>
            <option value="MV">Maldivas</option>
            <option value="ML">Malí</option>
            <option value="MT">Malta</option>
            <option value="MA">Marruecos</option>
            <option value="MQ">Martinica</option>
            <option value="MU">Mauricio</option>
            <option value="MR">Mauritania</option>
            <option value="YT">Mayotte</option>
            <option value="MX">México</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldavia</option>
            <option value="MC">Mónaco</option>
            <option value="MN">Mongolia</option>
            <option value="MS">Montserrat</option>
            <option value="MZ">Mozambique</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Níger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk</option>
            <option value="NO">Noruega</option>
            <option value="NC">Nueva Caledonia</option>
            <option value="NZ">Nueva Zelanda</option>
            <option value="OM">Omán</option>
            <option value="NL">Países Bajos</option>
            <option value="PA">Panamá</option>
            <option value="PG">Papúa Nueva Guinea</option>
            <option value="PK">Paquistán</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Perú</option>
            <option value="PN">Pitcairn</option>
            <option value="PF">Polinesia Francesa</option>
            <option value="PL">Polonia</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="UK">Reino Unido</option>
            <option value="CF">República Centroafricana</option>
            <option value="CZ">República Checa</option>
            <option value="ZA">República de Sudáfrica</option>
            <option value="DO">República Dominicana</option>
            <option value="SK">República Eslovaca</option>
            <option value="RE">Reunión</option>
            <option value="RW">Ruanda</option>
            <option value="RO">Rumania</option>
            <option value="RU">Rusia</option>
            <option value="EH">Sahara Occidental</option>
            <option value="KN">Saint Kitts y Nevis</option>
            <option value="WS">Samoa</option>
            <option value="AS">Samoa Americana</option>
            <option value="SM">San Marino</option>
            <option value="VC">San Vicente y Granadinas</option>
            <option value="SH">Santa Helena</option>
            <option value="LC">Santa Lucía</option>
            <option value="ST">Santo Tomé y Príncipe</option>
            <option value="SN">Senegal</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leona</option>
            <option value="SG">Singapur</option>
            <option value="SY">Siria</option>
            <option value="SO">Somalia</option>
            <option value="LK">Sri Lanka</option>
            <option value="PM">St Pierre y Miquelon</option>
            <option value="SZ">Suazilandia</option>
            <option value="SD">Sudán</option>
            <option value="SE">Suecia</option>
            <option value="CH">Suiza</option>
            <option value="SR">Surinam</option>
            <option value="TH">Tailandia</option>
            <option value="TW">Taiwán</option>
            <option value="TZ">Tanzania</option>
            <option value="TJ">Tayikistán</option>
            <option value="TF">Territorios franceses del Sur</option>
            <option value="TP">Timor Oriental</option>
            <option value="TG">Togo</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad y Tobago</option>
            <option value="TN">Túnez</option>
            <option value="TM">Turkmenistán</option>
            <option value="TR">Turquía</option>
            <option value="TV">Tuvalu</option>
            <option value="UA">Ucrania</option>
            <option value="UG">Uganda</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistán</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam</option>
            <option value="YE">Yemen</option>
            <option value="YU">Yugoslavia</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabue</option>
          </select>
        </label>
      </div>
    </div>
    <!-- Additional driver 2 -->
    <hr>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="driver_name"><?php _e('Nombre del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_2_name" name="additional_driver_2_name" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Nombre del conductor', 'mybooking') ?>")%>" value="<%=booking.additional_driver_2_name%>">
      </div>
      <div class="form-group col-md-6">
        <label for=""><?php _e('Apellidos del conductor', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_2_surname" name="additional_driver_2_surname" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Apellidos del conductor', 'mybooking') ?>")%>" value="<%=booking.additional_driver_2_surname%>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_number"><?php _e('Número del carnet de conducir', 'mybooking') ?></label>
        <input class="form-control" id="additional_driver_2_driving_license_number" name="additional_driver_2_driving_license_number"
          type="text" placeholder="<%=configuration.escapeHtml("<?php _e('Número del carnet de conducir', 'mybooking') ?>")%>" value="<%=booking.additional_driver_2_driving_license_number%>">
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_date"><?php _e('Fecha expedición carnet de conducir', 'mybooking') ?></label>
        <div class="custom-date-form">
          <div class="custom-date-item">
            <select name="additional_driver_2_driving_license_date_day" id="additional_driver_2_driving_license_date_day"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_2_driving_license_date_month" id="additional_driver_2_driving_license_date_month"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
          <div class="custom-date-item">
            <select name="additional_driver_2_driving_license_date_year" id="additional_driver_2_driving_license_date_year"
              class="form-control"></select>
            <i class="fa fa-angle-down"></i>
          </div>
        </div>
        <input type="hidden" name="additional_driver_2_driving_license_date" id="additional_driver_2_driving_license_date"></input>
      </div>
      <div class="form-group col-md-6">
        <label
          for="driver_driving_license_country"><?php _e('País de expedición carnet de conducir', 'mybooking') ?>
          <i class="fa custom-icon fa-angle-down"></i>
          <select name="additional_driver_2_driving_license_country" id="additional_driver_2_driving_license_country"
            class="form-control">
            <option value="AF">Afganistán</option>
            <option value="AL">Albania</option>
            <option value="DE">Alemania</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antártida</option>
            <option value="AG">Antigua y Barbuda</option>
            <option value="AN">Antillas Holandesas</option>
            <option value="SA">Arabia Saudí</option>
            <option value="DZ">Argelia</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaiyán</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrein</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BE">Bélgica</option>
            <option value="BZ">Belice</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermudas</option>
            <option value="BY">Bielorrusia</option>
            <option value="MM">Birmania</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia y Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BR">Brasil</option>
            <option value="BN">Brunei</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="BT">Bután</option>
            <option value="CV">Cabo Verde</option>
            <option value="KH">Camboya</option>
            <option value="CM">Camerún</option>
            <option value="CA">Canadá</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CY">Chipre</option>
            <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comores</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, República Democrática del</option>
            <option value="KR">Corea</option>
            <option value="KP">Corea del Norte</option>
            <option value="CI">Costa de Marfíl</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croacia (Hrvatska)</option>
            <option value="CU">Cuba</option>
            <option value="DK">Dinamarca</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egipto</option>
            <option value="SV">El Salvador</option>
            <option value="AE">Emiratos Árabes Unidos</option>
            <option value="ER">Eritrea</option>
            <option value="SI">Eslovenia</option>
            <option value="ES" selected>España</option>
            <option value="US">Estados Unidos</option>
            <option value="EE">Estonia</option>
            <option value="ET">Etiopía</option>
            <option value="FJ">Fiji</option>
            <option value="PH">Filipinas</option>
            <option value="FI">Finlandia</option>
            <option value="FR">Francia</option>
            <option value="GA">Gabón</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GD">Granada</option>
            <option value="GR">Grecia</option>
            <option value="GL">Groenlandia</option>
            <option value="GP">Guadalupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GY">Guayana</option>
            <option value="GF">Guayana Francesa</option>
            <option value="GN">Guinea</option>
            <option value="GQ">Guinea Ecuatorial</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="HT">Haití</option>
            <option value="HN">Honduras</option>
            <option value="HU">Hungría</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IQ">Irak</option>
            <option value="IR">Irán</option>
            <option value="IE">Irlanda</option>
            <option value="BV">Isla Bouvet</option>
            <option value="CX">Isla de Christmas</option>
            <option value="IS">Islandia</option>
            <option value="KY">Islas Caimán</option>
            <option value="CK">Islas Cook</option>
            <option value="CC">Islas de Cocos o Keeling</option>
            <option value="FO">Islas Faroe</option>
            <option value="HM">Islas Heard y McDonald</option>
            <option value="FK">Islas Malvinas</option>
            <option value="MP">Islas Marianas del Norte</option>
            <option value="MH">Islas Marshall</option>
            <option value="UM">Islas menores de Estados Unidos</option>
            <option value="PW">Islas Palau</option>
            <option value="SB">Islas Salomón</option>
            <option value="SJ">Islas Svalbard y Jan Mayen</option>
            <option value="TK">Islas Tokelau</option>
            <option value="TC">Islas Turks y Caicos</option>
            <option value="VI">Islas Vírgenes (EEUU)</option>
            <option value="VG">Islas Vírgenes (Reino Unido)</option>
            <option value="WF">Islas Wallis y Futuna</option>
            <option value="IL">Israel</option>
            <option value="IT">Italia</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japón</option>
            <option value="JO">Jordania</option>
            <option value="KZ">Kazajistán</option>
            <option value="KE">Kenia</option>
            <option value="KG">Kirguizistán</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait</option>
            <option value="LA">Laos</option>
            <option value="LS">Lesotho</option>
            <option value="LV">Letonia</option>
            <option value="LB">Líbano</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libia</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lituania</option>
            <option value="LU">Luxemburgo</option>
            <option value="MK">Macedonia, Ex-República Yugoslava de</option>
            <option value="MG">Madagascar</option>
            <option value="MY">Malasia</option>
            <option value="MW">Malawi</option>
            <option value="MV">Maldivas</option>
            <option value="ML">Malí</option>
            <option value="MT">Malta</option>
            <option value="MA">Marruecos</option>
            <option value="MQ">Martinica</option>
            <option value="MU">Mauricio</option>
            <option value="MR">Mauritania</option>
            <option value="YT">Mayotte</option>
            <option value="MX">México</option>
            <option value="FM">Micronesia</option>
            <option value="MD">Moldavia</option>
            <option value="MC">Mónaco</option>
            <option value="MN">Mongolia</option>
            <option value="MS">Montserrat</option>
            <option value="MZ">Mozambique</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Níger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk</option>
            <option value="NO">Noruega</option>
            <option value="NC">Nueva Caledonia</option>
            <option value="NZ">Nueva Zelanda</option>
            <option value="OM">Omán</option>
            <option value="NL">Países Bajos</option>
            <option value="PA">Panamá</option>
            <option value="PG">Papúa Nueva Guinea</option>
            <option value="PK">Paquistán</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Perú</option>
            <option value="PN">Pitcairn</option>
            <option value="PF">Polinesia Francesa</option>
            <option value="PL">Polonia</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="UK">Reino Unido</option>
            <option value="CF">República Centroafricana</option>
            <option value="CZ">República Checa</option>
            <option value="ZA">República de Sudáfrica</option>
            <option value="DO">República Dominicana</option>
            <option value="SK">República Eslovaca</option>
            <option value="RE">Reunión</option>
            <option value="RW">Ruanda</option>
            <option value="RO">Rumania</option>
            <option value="RU">Rusia</option>
            <option value="EH">Sahara Occidental</option>
            <option value="KN">Saint Kitts y Nevis</option>
            <option value="WS">Samoa</option>
            <option value="AS">Samoa Americana</option>
            <option value="SM">San Marino</option>
            <option value="VC">San Vicente y Granadinas</option>
            <option value="SH">Santa Helena</option>
            <option value="LC">Santa Lucía</option>
            <option value="ST">Santo Tomé y Príncipe</option>
            <option value="SN">Senegal</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leona</option>
            <option value="SG">Singapur</option>
            <option value="SY">Siria</option>
            <option value="SO">Somalia</option>
            <option value="LK">Sri Lanka</option>
            <option value="PM">St Pierre y Miquelon</option>
            <option value="SZ">Suazilandia</option>
            <option value="SD">Sudán</option>
            <option value="SE">Suecia</option>
            <option value="CH">Suiza</option>
            <option value="SR">Surinam</option>
            <option value="TH">Tailandia</option>
            <option value="TW">Taiwán</option>
            <option value="TZ">Tanzania</option>
            <option value="TJ">Tayikistán</option>
            <option value="TF">Territorios franceses del Sur</option>
            <option value="TP">Timor Oriental</option>
            <option value="TG">Togo</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad y Tobago</option>
            <option value="TN">Túnez</option>
            <option value="TM">Turkmenistán</option>
            <option value="TR">Turquía</option>
            <option value="TV">Tuvalu</option>
            <option value="UA">Ucrania</option>
            <option value="UG">Uganda</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistán</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam</option>
            <option value="YE">Yemen</option>
            <option value="YU">Yugoslavia</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabue</option>
          </select>
        </label>
      </div>
    </div>


    <!-- Flight information -->
    <h4 class="brand-primary my-3"><?php _e('Vuelo', 'mybooking') ?></h4>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="flight_company"><?php _e('Compañia', 'mybooking') ?></label>
        <input class="form-control" id="flight_company" name="flight_company" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Compañia', 'mybooking') ?>")%>" value="<%=booking.flight_company%>">
      </div>
      <div class="form-group col-md-6">
        <label for="flight_number"><?php _e('Número de vuelo', 'mybooking') ?></label>
        <input class="form-control" id="flight_number" name="flight_number" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Número de vuelo', 'mybooking') ?>")%>" value="<%=booking.flight_number%>">
      </div>
      <div class="form-group col-md-6">
        <label for="flight_time"><?php _e('Hora prevista', 'mybooking') ?></label>
        <input class="form-control" id="flight_time" name="flight_time" type="text"
          placeholder="<%=configuration.escapeHtml("<?php _e('Hora prevista', 'mybooking') ?>")%>" value="<%=booking.flight_time%>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <button class="btn btn-outline-dark" id="btn_update_reservation"><?php _e('Actualizar', 'mybooking') ?></button>
      </div>
    </div>
  </form>

</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
  <h4 class="brand-primary my-3"><?php _e('Pago', 'mybooking') ?></h4>
  <% if (booking.total_paid == 0) {%>
    <div id="payment_amount_container" class="alert alert-info">
      <%= i18next.t('complete.reservationForm.booking_amount', {amount:configuration.formatCurrency(booking.booking_amount) }) %>
    </div>
  <% } %>
  <form name="payment_form">  
    <% if (sales_process.payment_methods.paypal_standard && sales_process.payment_methods.tpv_virtual) { %>
    <div class="form-row">  
       <div class="form-group col-md-12">
         <label for="payments_paypal_standard">
          <input type="radio" name="payment_method_id" value="paypal_standard">&nbsp;<?php _e('Paypal', 'mybooking') ?>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-paypal.jpg"/>
         </label>
       </div>
       <div class="form-group col-md-12">
         <label for="payments_paypal_standard">
          <input type="radio" name="payment_method_id" value="<%=sales_process.payment_methods.tpv_virtual%>">&nbsp;<?php _e('Tarjeta de crédito/débito', 'mybooking') ?>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-visa.jpg"/>
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/pm-mastercard.jpg"/>
         </label>
       </div>
    </div>   
    <% } else if (sales_process.payment_methods.paypal_standard) {%>
      <input type="hidden" name="payment_method_id" value="paypal_standard" data-payment-method="paypal_standard">
    <% } else if (sales_process.payment_methods.tpv_virtual) {%>
      <input type="hidden" name="payment_method_id" value="<%=sales_process.payment_methods.tpv_virtual%>"/>
    <% } %>  
    <% if (sales_process.can_pay_deposit) { %>
      <input type="hidden" name="payment" value="deposit"/>
    <% } else if (booking.total_paid == 0) {%>
      <input type="hidden" name="payment" value="total"/>
    <% } else { %>
      <input type="hidden" name="payment" value="pending"/>
    <% } %>
    <div class="form-row">
      <div class="form-group col-md-12">
        <button class="btn btn-outline-dark" id="btn_update_reservation" type="submit"><?php _e('Pagar', 'mybooking') ?></button>
      </div>
    </div>
  </div>  

</script>