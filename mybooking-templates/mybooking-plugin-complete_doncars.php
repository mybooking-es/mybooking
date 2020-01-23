<?php
/**
*   PLUGIN COMPLETE PAGE
*   --------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<?php get_template_part('mybooking-parts/mybooking-reservation-steps'); ?>

<div class="reservation-step custom-form">

  <!-- Reservation : Selected product -->
  <div id="selected_product" class="product-detail"></div>

  <div class="bg-gray-200">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="col-md-12 bg-white shadow-bottom py-3 px-3 mt-5">
            <!-- Reservation : Extras -->
            <h4 class="brand-primary my-3"><?php _e('Extras', 'mybooking') ?></h4>
            <div id="extras_listing"></div>
          </div>

          <div class="col-md-12 bg-white shadow-bottom py-3 px-3 mt-3 mb-5">
            <!-- Reservation complete -->
            <form id="form-reservation" name="reservation_form">
              <h4 class="brand-primary my-3"><?php _e('Información del cliente', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name"><?php _e('Nombre', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_name" name="customer_name" type="text"
                    placeholder="<?php _e('Nombre', 'mybooking') ?>*">
                </div>
                <div class="form-group col-md-6">
                  <label for="surname"><?php _e('Apellidos', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_surname" name="customer_surname" type="text"
                    placeholder="<?php _e('Apellidos', 'mybooking') ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email"><?php _e('Correo eléctronico', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_email" name="customer_email" type="text"
                    placeholder="<?php _e('Correo eléctronico', 'mybooking') ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="confirm_customer_email"><?php _e('Confirmar correo eléctronico', 'mybooking') ?> *</label>
                  <input class="form-control" id="confirm_customer_email" name="confirm_customer_email" type="text"
                    placeholder="<?php _e('Confirmar correo eléctronico', 'mybooking') ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="phone"><?php _e('Teléfono principal', 'mybooking') ?> *</label>
                  <input class="form-control" id="customer_phone" name="customer_phone" type="text"
                    placeholder="<?php _e('Teléfono principal', 'mybooking') ?>">
                </div>
                <div class="form-group col-md-6">
                  <label
                    for="driver_date_of_birth"><?php _e('Fecha de nacimiento del conductor', 'mybooking') ?> *</label>
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
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="destination_accommodation"><?php _e('Alojamiento en destino', 'mybooking') ?> *</label>
                  <textarea name="destination_accommodation" id="destination_accommodation"
                    placeholder="<?php _e('Alojamiento', 'mybooking') ?>" rows="1"
                    style="width: 100%; padding: 0.8rem;"></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="number_of_adults"><?php _e('Número de personas', 'mybooking') ?> *</label>
                  <select name="number_of_adults" id="number_of_adults"
                    class="form-control" style="margin-top: 0">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                  </select>
                </div>

              </div>
              <h4 class="brand-primary my-3"><?php _e('Dirección del cliente', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="street"><?php _e('Dirección 1', 'mybooking') ?></label>
                  <input class="form-control" id="street" name="street" type="text"
                    maxlength="60"
                    placeholder="<?php _e('Dirección 1', 'mybooking') ?>">
                </div>
                <div class="form-group col-md-12">
                  <input class="form-control" id="complement" name="complement" type="text"
                    maxlength="20"
                    placeholder="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="city"><?php _e('Ciudad', 'mybooking') ?></label>
                  <input class="form-control" id="city" name="city" type="text"
                    maxlength="50"
                    placeholder="<?php _e('Ciudad', 'mybooking') ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="state"><?php _e('Provincia', 'mybooking') ?></label>
                  <input class="form-control" id="state" name="state" type="text"
                    maxlength="50"
                    placeholder="<?php _e('Provincia', 'mybooking') ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="state"><?php _e('Código Postal', 'mybooking') ?></label>
                  <input class="form-control" id="state" name="state" type="text"
                    maxlength="10"
                    placeholder="<?php _e('Código Postal', 'mybooking') ?>">
                </div>
                <div class="form-group col-md-6">
                  <label class="full-width" for="country"><?php _e('País', 'mybooking') ?>
                    <i class="fa custom-icon fa-angle-down"></i>
                    <select name="country" id="country" class="form-control">
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

              <h4 class="brand-primary my-3"><?php _e('Información adicional', 'mybooking') ?></h4>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="comments"><?php _e('Comentarios', 'mybooking') ?></label>
                  <textarea name="comments" id="comments" placeholder="<?php _e('Comentarios', 'mybooking') ?>"
                    style="width: 100%; height: 100px; padding: 0.8rem;"></textarea>
                </div>
              </div>
              <!-- Reservation : payment -->
              <div id="payment_detail"></div>
            </form>

          </div>
        </div>
        <!-- Reservation: Summary (sidebar) -->
        <div class="col-md-3">
          <div id="reservation_detail"></div>
        </div>
      </div>
    </div>
  </div>
  <?php mybooking_engine_get_template('mybooking-plugin-modify-reservation.php') ?>
</div>
