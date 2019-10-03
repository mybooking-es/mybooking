<!-- Product detail -->
<script type="text/tpml" id="script_product_detail">
  <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <h2 class="mb-3 product-name"><%=shopping_cart.items[idx].item_description_customer_translation%></h2>
        <% } %>
        <h5>Entrega</h5>
        <ul>
          <li><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></li>
          <li><%=shopping_cart.pickup_place_customer_translation%></li>
        </ul>
        <h5 class="mt-3">Devolución</h5>
        <ul>
          <li><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></li>
          <li><%=shopping_cart.return_place_customer_translation%></li>
        </ul>
  </div>
  <div>
      <% for (var idx=0; idx<shopping_cart.items.length; idx++) { %>
          <div>
              <img src="<%=shopping_cart.items[idx].photo_full%>" alt="" style="max-width: 400px">
          </div>
          <% } %>
  </div>
</script>

<!-- Extra representation -->
<script type="text/template" id="script_detailed_extra">
  <% for (var idx=0;idx<extras.length;idx++) { %>
    <% var extra = extras[idx]; %>
    <% if (extra.max_quantity > 1) { %>
      <form>
          <div class="form-group w-100">
          <label class="control-label" for="select<%=extra.code%>"><%=extra.name%> <i class="fa custom-icon-select fa-angle-down"></i>
          <select class="pr-5" name="select<%=extra.code%>" id="select<%=extra.code%>" data-value="<%=extra.code%>">
            <% for (var idx=0;idx<=extra.max_quantity;idx++) { %>
            <option value="<%=idx%>"
              <% if (extrasInShoppingCart[extra.code] && extrasInShoppingCart[extra.code] == idx) { %>
                selected="selected"
              <%}%> >
              <%=idx%> un. <%if (idx>0){%>(<%=configuration.formatCurrency(extra.unit_price*idx)%>)<%}%>
            </option>
            <% } %>
          </select>
        </label> 
        </div>
      </form>
    <% } else { %>
      <form>
          <div class="form-group">
            <label for="checkboxl<%=extra.code%>"><%=extra.name%>
            <span><%=configuration.formatCurrency(extra.unit_price)%></span>
            <span><input id="checkboxl<%=extra.code%>" type="checkbox" class="extra-checkbox" data-value="<%=extra.code%>" <% if (extrasInShoppingCart[extra.code] &&  extrasInShoppingCart[extra.code] > 0) { %> checked="checked" <% } %>> </span>
          </label>
          </div>
      </form>
    <% } %>
  <% } %>
</script>

<!-- Reservation summary -->
<script type="text/tmpl" id="script_reservation_summary">
  <div class="col sidebar bg-white shadow-bottom py-3 px-3 mt-5 mb-3">
  <h4 class="title-small my-3">Detalle de la reserva</h4>
  <h5>Entrega</h5>
  <p class="color-gray-700"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_from_full_format%> / <%=shopping_cart.time_from%></p>
  <p class="color-gray-700"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.pickup_place_customer_translation%></p>
  <hr>
  <h5>Devolución</h5>
  <p class="color-gray-700"><span><i class="fa fa-calendar mr-1" aria-hidden="true"></i></span><%=shopping_cart.date_to_full_format%> / <%=shopping_cart.time_to%></p>
  <p class="color-gray-700"><span><i class="fa fa-map-marker mr-1" aria-hidden="true"></i></span><%=shopping_cart.return_place_customer_translation%></p>
  <hr>
  <!-- Button trigger modal -->
  <button id="modify_reservation_button" class="btn btn-outline-dark" data-toggle="modal" data-target="#choose_productModal">Modificar reserva</button> 
</div>

<div class="col sidebar bg-white shadow-bottom py-3 px-3">
  <h4 class="title-small my-3">Precio</h4>
  <h5>Total producto</h5>
  <p><%=configuration.formatCurrency(shopping_cart.item_cost)%></p>
  <hr>
  <h5>Total extras</h5>
  <p><%=configuration.formatCurrency(shopping_cart.extras_cost)%></p>
  <hr>
  <h5>Total</h5>
  <p class="total-price"><%=configuration.formatCurrency(shopping_cart.total_cost)%></p>
</div>  
</script>

<!-- Payment detail -->
<script type="text/tmpl" id="script_payment_detail">
  <h4 class="title-small my3">Pago</h4>
  <div class="form-row">
    <div class="form-group col">
      <div class="alert alert-success">
        <p>Para confirmar la reserva se requiere una paga y señal del 20% del importe total de la reserva</p>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-check col">
        <input class="form-check-input  ml-1" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
        <label class="form-check-label ml-4" for="exampleRadios1">
            Sólo solicitud de reserva
        </label>
    </div>
  </div>
</script>
