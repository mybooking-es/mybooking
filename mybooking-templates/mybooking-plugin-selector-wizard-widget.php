    <section class="widget widget_mybooking_rent_engine_selector reservation-step has-background-grey-lighter">
      <form
        name="widget_search_form"
        method="get"
        enctype="application/x-www-form-urlencoded">
        
        <?php if ( $args['sales_channel_code'] != '' ) : ?>
        <input type="hidden" name="sales_channel_code" value="<?php echo $args['sales_channel_code']?>"/>
        <?php endif; ?>

        <?php if ( $args['family_id'] != '' ) : ?>
        <input type="hidden" name="family_id" value="<?php echo $args['family_id']?>"/>
        <?php endif; ?>
        
        <!-- Entrega -->
        <div class="field">
          <label class="label">Entrega</label>
          <div class="control">
            <div class="select is-fullwidth">
              <select id="widget_pickup_place" name="pickup_place"> </select>
            </div>
          </div>
        </div>

        <div class="field">
          <div class="control">
            <label class="checkbox">
                <input type="checkbox" id="widget_same_pickup_return_place" name="same_pickup_return_place" 
                       checked/>&nbsp;&nbsp;Devolver en la misma oficina
            </label>
          </div>
        </div>

        <div class="field field-body">
          <div class="field">
            <div class="control is-expanded">
              <input
                      type="text"
                      id="widget_date_from"
                      name="date_from"
                      class="input"
                      autocomplete="off"
                    />
            </div>
          </div>
          <div class="field">
            <div class="control">
              <div class="select is-fullwidth">
                <select id="widget_time_from" name="time_from"> </select>
              </div>
            </div>
          </div>
        </div>


        <!-- Devolución -->
        <div class="field">
          <label class="label">Devolución</label>
          <div class="control widget_return_place">
            <div class="select is-fullwidth">
              <select id="widget_return_place" name="return_place"> </select>
            </div>
          </div>          
        </div>
        
        <div class="field field-body">
          <div class="field">
            <div class="control is-expanded">
              <input type="text" id="widget_date_to" name="date_to" autocomplete="off" class="input"/>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <div class="select is-fullwidth">
                <select id="widget_time_to" name="time_to"> </select>
              </div>
            </div>
          </div>
        </div>
        
        <div class="field">
          <div class="control">
            <label class="checkbox">
                <div>
                  <input type="checkbox" id="widget_accept_age" name="accept_age"/>&nbsp;Soy mayor de 21 años
                </div>
            </label>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <div class="control">
                <input class="button is-primary" type="submit" value="Buscar" />
              </div>
            </div>
          </div>
        </div>        
        
      </form>
    </section>