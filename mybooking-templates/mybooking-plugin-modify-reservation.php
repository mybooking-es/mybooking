<?php
/**
*   PLUGIN MODIFY RESERVATION PARTIAL
*   ---------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>
<!-- FLEX-FORM-MODIFY MODAL -->
<!-- Modal -->
<div class="modal fade" id="choose_productModal" tabindex="-1" role="dialog" aria-labelledby="choose_productModal"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content  bg-gray-400">
      <div class="modal-header">
        <h5 class="modal-title"><?php _e('Modificar reserva', 'mybooking') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="search_form" method="get" enctype="application/x-www-form-urlencoded"
        class="flex-form">
        <!-- Pickup place -->
        <div class="flex-form-item-box">
          <label><?php _e('Lugar Entrega ', 'mybooking') ?></label>
          <div class="flex-form-item pickup_place_group">
            <select id="pickup_place" name="pickup_place"></select>
            <i class="fa fa-angle-down flex-icon"></i>
          </div>
          <!-- Custom delivery place -->
          <div id="another_pickup_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between">
              <input class="bg-white w-100" type="text" id="pickup_place_other" name="pickup_place_other" />
              <input type="hidden" name="custom_pickup_place" value="false" />
              <button type="button" class="another_pickup_place_group_close p-0">
                <i class="fa fa-times flex-icon"></i>
              </button>
            </div>
          </div>          
        </div>
        <!-- Return place -->
        <div class="flex-form-item-box">
          <label><?php _e('Lugar Devolución ', 'mybooking') ?></label>
          <div class="flex-form-item return_place_group">
            <select id="return_place" name="return_place">
            </select>
            <i class="fa fa-angle-down flex-icon"></i>
          </div>
          <!-- Custom collection place -->
          <div id="another_return_place_group" style="display: none;">
            <div class="flex-form-item justify-content-between">
              <input class="bg-white w-100" type="text" id="return_place_other" name="return_place_other" />
              <input type="hidden" name="custom_return_place" value="false" />
              <button type="button" class="another_return_place_group_close p-0">
                  <i class="fa fa-times flex-icon"></i>
              </button>  
            </div>          
          </div>          
        </div>
        <!-- Date/Time from -->
        <div class="flex-form-item-box">
          <label><?php _e('Fecha Entrega ', 'mybooking') ?></label>
          <div class="flex-form-item">
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            <input type="text" id="date_from" name="date_from" />
            <select class="ml-1" id="time_from" name="time_from">
            </select>
          </div>
        </div>
        <!-- Date/Time to -->
        <div class="flex-form-item-box">
          <label><?php _e('Fecha Devolución ', 'mybooking') ?></label>
          <div class="flex-form-item">
            <i class="fa fa-calendar flex-icon" aria-hidden="true"></i>
            <input type="text" id="date_to" name="date_to" />
            <select class="ml-1" id="time_to" name="time_to">
            </select>
          </div>
        </div>
        <div class="flex-form-item-box mt-3">
          <input class="btn btn-primary btn-block" type="submit" value="<?php _e('Nueva búsqueda', 'mybooking') ?>" />
        </div>
      </form>
    </div>
  </div>
</div>
