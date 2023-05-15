<?php
  /**
   * The Template for showing the index of products
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-products.php
   *
   */
?>
<section class="cards-static-container mybooking-catalog">
  <!-- Products -->
  <?php foreach( $args['data']->data as $mybooking_product ) { ?>

    <div class="card-static-wrapper">
      <div class="card-static">
        <div class="card-static_image-container">
          <?php if ( !empty( $mybooking_product->full_photo_path ) ) { ?>
            <img class="card-static_image" src="<?php echo esc_url( $mybooking_product->full_photo_path ) ?>" alt="<?php echo esc_attr( $mybooking_product->name )?>">
          <?php } else { ?>
            <div class="no-product-photo">
              <img class="card-static_image" src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/default-image-product.png') ?>" alt="<?php echo esc_attr( $mybooking_product->name )?>"/>
            </div>
          <?php } ?>
        </div>
        <div class="card-static_body">
          <div class="mybooking-catalog_header">
            <h2 class="card-static_product-name"><?php echo esc_html( $mybooking_product->name ) ?></h2>
            <?php if ( !empty( $mybooking_product->short_description ) ) { ?>
              <h3 class="card-static_product-short-description"><?php echo wp_kses_post( $mybooking_product->short_description ) ?></h3>
            <?php } ?>
          </div>

          <!-- Characteristics -->
          <?php if (($mybooking_product->characteristic_length &&$mybooking_product->characteristic_length != 0) ||
                    ($mybooking_product->characteristic_width && $mybooking_product->characteristic_width != 0) ||
                    ($mybooking_product->characteristic_height && $mybooking_product->characteristic_height != 0) || 
                    ($mybooking_product->optional_external_driver && $mybooking_product->optional_external_driver != '')) { ?>
            <div class="mybooking-product_detailed_characteristics">
              <!-- Length Eslora-->
              <?php if ($mybooking_product->characteristic_length &&$mybooking_product->characteristic_length != 0) { ?>
                <span class="characteristics-text"><small><?php echo esc_html( MyBookingEngineContext::getInstance()->getLength() ) ?> <?php echo esc_html( number_format_i18n($mybooking_product->characteristic_length, 2) ) ?> m.</small></span>
              <?php } ?>
              <!-- Width Manga -->
              <?php if ($mybooking_product->characteristic_width && $mybooking_product->characteristic_width != 0) { ?>
                <span class="characteristics-text"><small><?php echo esc_html( MyBookingEngineContext::getInstance()->getWidth() ) ?> <?php echo esc_html( number_format_i18n($mybooking_product->characteristic_width, 2) )?> m.</small></span>
              <?php } ?>
              <!-- Height Calado -->
              <?php if ($mybooking_product->characteristic_height && $mybooking_product->characteristic_height != 0) { ?>
                <span class="characteristics-text"><small><?php echo esc_html( MyBookingEngineContext::getInstance()->getHeight() ) ?> <?php echo esc_html( number_format_i18n($mybooking_product->characteristic_height,2) ) ?> m.</small></span>
              <?php } ?>
            </div>
            <div class="mybooking-product_detailed_characteristics">
              <!-- Optional external driver (skipper) -->
              <?php if ( !empty( $mybooking_product->optional_external_driver ) ) { ?>
                <span class="characteristics-text badge badge-secondary"><?php echo esc_html( $mybooking_product->optional_external_driver_name ) ?></span>
              <?php } ?>
              <!-- Driving license -->
              <?php if ( $mybooking_product->optional_external_driver != 'required' && 
                         !empty( $mybooking_product->driving_license_type_name ) ) { ?>
                <span class="characteristics-text badge badge-secondary"><?php echo esc_html( $mybooking_product->driving_license_type_name ) ?></span>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
        <div class="card-static_footer">
        <div class="mybooking-product_characteristics mt-3 card-static_icons">
          <?php if ( isset( $mybooking_product->key_characteristics) && is_array( (array) $mybooking_product->key_characteristics ) && !empty( (array) $mybooking_product->key_characteristics ) ) { ?>
            <?php foreach ( $mybooking_product->key_characteristics as $mybooking_key => $mybooking_value) { ?>
              <div class="mybooking-product_characteristics-item icon">
                <img class="mybooking-product_characteristics-img" src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/key_characteristics/'.$mybooking_key.'.svg' ) ?>" alt="<?php echo esc_attr( MyBookingEngineContext::getInstance()->getKeyCharacteristic( $mybooking_key ) ) ?>"/>
                <span class="characteristics-text"><?php echo esc_html( $mybooking_value ) ?></span>
              </div>
            <?php } ?>
          <?php } ?>
        </div>

          <?php if ( $args['use_detail_pages'] ) { ?>
            <?php  $mybooking_productIdAnchor = $mybooking_product->code;
              if ( !empty( $mybooking_product->slug) ) {
                $mybooking_productIdAnchor = $mybooking_product->slug;
              }
            ?>
            <div class="card-static_btn">
              <a href="<?php echo esc_url( $args['url_detail'].'/'.$mybooking_productIdAnchor ) ?>"
                 class="button btn btn-choose-product">
                <?php echo esc_html_x('More information','renting_products','mybooking'); ?></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php  } ?>
</section>
  <!-- Pagination -->
  <?php if ($args['total_pages'] > 1) { ?>
    <?php $mybooking_querystring = array_key_exists('querystring', $args) ? $args['querystring'] : '' ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="<?php echo esc_attr_x( 'Page navigation', 'renting_products_list', 'mybooking' ); ?>" class="pull-right">
            <ul class="pagination">
              <?php $mybooking_disabled_previous = ($args['current_page'] == 1 ? 'disabled' : '') ?>
              <li class="page-item <?php echo esc_attr( $mybooking_disabled_previous ) ?>">
                <?php if ( $mybooking_disabled_previous ): ?>
                  <span class="page-link">
                    <?php echo esc_html_x('Previous','renting_products','mybooking'); ?>
                  </span>
                <?php else: ?>
                  <a class="page-link"
                     href="<?php echo esc_url( $args['url'].'?offsetpage='.($args['current_page']-1).$mybooking_querystring ) ?>">
                    <?php echo esc_html_x('Previous','renting_products','mybooking'); ?></a>
                <?php endif ?>
              </li>
              <?php foreach ($args['pages'] as $mybooking_page) { ?>
                <?php if ($mybooking_page == $args['current_page']) { ?>
                  <li class="page-item active" aria-current="page">
                    <span class="page-link">
                      <?php echo esc_html( $mybooking_page ) ?>
                    </span>
                  </li>
                <?php } else { ?>
                  <li class="page-item">
                    <a class="page-link"
                      href="<?php echo esc_url( $args['url'].'?offsetpage='.($mybooking_page).$mybooking_querystring ) ?>">
                      <?php echo esc_html( $mybooking_page ) ?></a>
                  </li>
                <?php } ?>
              <?php } ?>
              <?php $mybooking_disabled_next = ($args['current_page'] == $args['total_pages'] ? 'disabled' : '') ?>
              <li class="page-item <?php echo esc_attr( $mybooking_disabled_next ) ?>">
                <?php if ( $mybooking_disabled_next ): ?>
                  <span class="page-link">
                    <?php echo esc_html_x('Next','renting_products','mybooking'); ?>
                  </span>
                <?php else: ?>
                  <a class="page-link"
                     href="<?php echo esc_url( $args['url'].'?offsetpage='.($args['current_page']+1).$mybooking_querystring ) ?>">
                    <?php echo esc_html_x('Next','renting_products','mybooking'); ?></a>
                <?php endif ?>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  <?php } ?>
