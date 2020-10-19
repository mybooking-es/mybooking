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
        <img src="<?php echo esc_url( $mybooking_product->photo_path ) ?>" alt="?php echo esc_attr( $mybooking_product->name )?>">
      </div>
      <div class="card-static_body">
        <div class="card-static_header-catalog">
          <h2 class="card-static_product-name"><?php echo esc_html( $mybooking_product->name ) ?></h2>
          <?php if ( !empty( $mybooking_product->short_description ) ) { ?>
            <h3 class="card-static_product-short-description"><?php echo wp_kses_post( $mybooking_product->short_description ) ?></h3>
          <?php } ?>
        </div>
        <div class="card-static_btn mt-5">
          <a href="<?php echo esc_url( '/'.$args['url_detail'].'/'.$mybooking_product->code ) ?>"
             class="button btn btn-choose-product">
            <?php echo esc_html_x('More information','renting_products','mybooking'); ?></a>
        </div>
      </div>
    </div>
  </div>
  <?php  } ?>

  <!-- Pagination -->
  <?php if ($args['total_pages'] > 1) { ?>
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="<?php echo esc_attr_x( 'Page navigation', 'renting_products_list', 'mybooking' ); ?>" class="pull-right">
        <ul class="pagination">
          <?php $mybooking_disabled_previous = ($args['current_page'] == 1 ? 'disabled' : '') ?>
          <li class="page-item <?php echo esc_attr( $mybooking_disabled_previous ) ?>">
            <a class="page-link"
               href="<?php echo esc_url( '/'.$args['url'].'?offsetpage='.($args['current_page']-1).$args['querystring'] ) ?>">
              <?php echo esc_html_x('Previous','renting_products','mybooking'); ?></a>
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
                  href="<?php echo esc_url( '/'.$args['url'].'?offsetpage='.($mybooking_page).$args['querystring'] ) ?>">
                  <?php echo esc_html( $mybooking_page ) ?></a>
              </li>
            <?php } ?>
          <?php } ?>
          <?php $mybooking_disabled_next = ($args['current_page'] == $args['total_pages'] ? 'disabled' : '') ?>
          <li class="page-item <?php echo esc_attr( $mybooking_disabled_next ) ?> ?>">
            <a class="page-link"
               href="<?php echo esc_url( '/'.$args['url'].'?offsetpage='.($args['current_page']+1).$args['querystring'] ) ?>">
              <?php echo esc_html_x('Next','renting_products','mybooking'); ?></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <?php } ?>

</section>
