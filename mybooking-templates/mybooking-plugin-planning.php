<div class="mybooking-planning-content" 
  data-family-code="<?php echo isset($args['family']) ? esc_attr( $args['family'] ) : '' ?>" 
  data-category-code="<?php echo isset($args['category']) ? esc_attr( $args['category']) : '' ?>" 
  data-rental-location-code="<?php echo isset($args['rental_location']) ? esc_attr( $args['rental_location'] ) : '' ?>" 
  data-direction="<?php echo isset($args['direction']) ? esc_attr( $args['direction'] ) : '' ?>" 
  data-type="<?php echo isset($args['type']) ? esc_attr( $args['type'] ) : '' ?>"
  data-interval="<?php echo isset($args['interval']) ? esc_attr( $args['interval'] ) : '' ?>" 
  data-items="<?php echo isset($args['days']) ? esc_attr( $args['days'] ) : '' ?>" 
  id="planning-<?php echo isset($args['planning_id']) ? esc_attr( $args['planning_id'] ) : '' ?>"
>
  <form class="mybooking-planning-head">
    <div class="field">
      <label  class="label">
        <?php echo esc_html_x( 'Date', 'planning', 'mybooking' ) ?>
      </label>
      <div class="control">
        <input type="text" name="date"  />
        <div class="button-box">
          <button data-action="date" data-direction="back" class="button"><i class="dashicons dashicons-arrow-left-alt"></i></button>
          <button data-action="date" data-direction="next" class="button"><i class="dashicons dashicons-arrow-right-alt"></i></button>
        </div>
      </div>
    </div>
    <div class="field" style="display: none;">
      <label  class="label">
        <?php echo esc_html( MyBookingEngineContext::getInstance()->getFamily() ) ?>
      </label>
      <div class="control">
        <div class="select">
          <select name="family" style="min-width: 300px;">
          </select>
        </div>
      </div>
    </div>
    <div class="field" style="display: none;">
      <label  class="label">
        <?php echo esc_html( MyBookingEngineContext::getInstance()->getProduct() ) ?>
      </label>
      <div class="control">
        <div class="select">
          <select name="category" style="min-width: 300px;">
            <option value="all">
              <?php echo esc_html_x( 'All', 'planning', 'mybooking' ) ?>
            </option>
          </select>
        </div>
      </div>
    </div>
    <div class="field">
      <label  class="label"></label>
      <div class="control" style="top: 6px;">
        <div class="button-box">
          <button data-action="scroll" data-direction="back" class="button"><i class="dashicons dashicons-arrow-left-alt"></i></button>
          <button data-action="scroll" data-direction="next" class="button"><i class="dashicons dashicons-arrow-right-alt"></i></button>
        </div>
      </div>
    </div>
  </form>
  <div class="mybooking-planning-table"></div>
</div>

<!-- DETAILS MODAL ------------------------------------------------------------>
<div class="modal mybooking-modal" tabindex="-1" role="dialog" id="modalProductDetail">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-product-detail-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'renting_choose_product', 'mybooking' ); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-product-detail-content">
      </div>
    </div>
  </div>
</div>

<!-- PRODUCT DETAIL MODAL ----------------------------------------------------->
<script type="text/tmpl" id="script_product_modal">
  <div class="container">
    <div class="row">
      <div class="mybooking-modal_image-container col-md-7">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <% for (var idx=0; idx<product.photos.length; idx++) { %>
            <div class="carousel-item <% if (idx==0) {%>active<%}%>">
              <img class="d-block w-100" src="<%=product.photos[idx].full_photo_path%>" alt="<%=product.name%>">
            </div>
            <% } %>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">&lt;</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">&gt;</span>
          </a>
        </div>
      </div>
      <div class="mybooking-modal_info-container col-md-5">
        <div class="mybooking-modal_product-description">
          <%=product.short_description%>
        </div>
        <div class="mybooking-modal_product-short-description">
          <%=product.description%>
        </div>
      </div>
    </div>
  </div>
</script>