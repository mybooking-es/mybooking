<?php
  /** 
   * The Template for showing the activity shopping cart
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-activities-shopping-cart.php
   *
   */
?>
    <!-- Activities : Shopping cart page -->
    <section class="section reservation-step process-container">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <!-- Products -->
            <div id="selected_products" class="mt-4"></div>
          </div>
          <!-- Reservation form -->
          <div class="col-12 col-md-6 col-lg-8">
            <div class="activities-content__widget-wrapper">
              <div class="activity-content__widget">
                <form id="form-reservation" name="reservation_form" class="form-delivery activities-shopping-cart-form" method="post"
                  autocomplete="off">
                  <div id="reservation_container"></div>
                  <div id="reservation_detail"></div>
                  <div id="payment_detail"></div>
                  <!-- Reservation error -->
                  <div id="reservation_error" class="alert alert-danger my-3" style="display:none"></div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- /Activities : Shopping cart page -->