<?php
  /** 
   * The Template for showing the renting modify reservation form
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-modify-reservation.php
   *
   */
?>
<!-- FLEX-FORM-MODIFY MODAL -->
<!-- Modal -->
<div class="modal fade modal-mybooking" id="modify_reservation_modal" tabindex="-1" role="dialog"
  aria-labelledby="modifyReservationModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          <?php echo esc_html_x( 'Modify reservation', 'renting_form_modify_reservation', 'mybooking') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo esc_attr_x( 'Close', 'renting_form_modify_reservation', 'mybooking' ); ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="search_form" method="get" enctype="application/x-www-form-urlencoded" class="flex-form">
      </form>

    </div>
  </div>
</div>