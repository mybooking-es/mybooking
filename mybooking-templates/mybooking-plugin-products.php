<?php
  /** 
   * The Template for showing the index of products
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-products.php
   *
   */
?>
<section class="cards-static-container fleet">
  <!-- Products -->
  <?php foreach( $args['data']->data as $mybooking_product ) { ?>

    <div class="card-static-wrapper">
      <div class="card-static">
        <div class="card-static_image">
          <?php if ( !empty( $mybooking_product->photo_path ) ) { ?>
            <img src="<?php echo esc_url( $mybooking_product->photo_path ) ?>" alt="?php echo esc_attr( $mybooking_product->name )?>">
          <?php } else { ?>
            <div class="text-center no-product-photo pt-3">
              <img class="activity-card-img card-img-top" src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/default-image-product.png') ?>" alt="<?php echo esc_attr( $mybooking_product->name )?>"/>
            </div>
          <?php } ?>          
        </div>
        <div class="card-static_body">
          <div class="card-static_header-catalog">
            <h2 class="card-static_product-name"><?php echo esc_html( $mybooking_product->name ) ?></h2>
            <?php if ( !empty( $mybooking_product->short_description ) ) { ?>
              <h3 class="card-static_product-short-description"><?php echo wp_kses_post( $mybooking_product->short_description ) ?></h3>
            <?php } ?>
          </div>
          <?php if ( $args['use_detail_pages'] ) { ?>
            <?php  $mybooking_productIdAnchor = $mybooking_product->code;
              if ( !empty( $mybooking_product->slug) ) {
                $mybooking_productIdAnchor = $mybooking_product->slug;
              }
            ?>
            <div class="card-static_btn mt-5">
              <a href="<?php echo esc_url( $args['url_detail'].'/'.$mybooking_productIdAnchor ) ?>"
                 class="button btn btn-choose-product">
                <?php echo esc_html_x('More information','renting_products','mybooking'); ?></a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php  } ?>

  <!-- Pagination -->
  <?php if ($args['total_pages'] > 1) { ?>
    <?php $mybooking_querystring = array_key_exists('querystring', $args) ? $args['querystring'] : '' ?>
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
  <?php } ?>

</section>
