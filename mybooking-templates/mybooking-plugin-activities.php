<?php
  /**
   * The Template for showing the index of activities
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-activities.php
   *
   */
?>
<?php if ( $args['total'] == 0 ) { ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-info">
        <?php echo esc_html_x( 'No results found', 'activities_list', 'mybooking' ) ?>
      </div>
    </div>
  </div>
<?php } else { ?>
  <!-- Activities -->
  <section class="cards-static-container mybooking-catalog">
    <?php foreach( $args['data']->data as $mybooking_activity ) { ?>
      <div class="card-static-wrapper">
        <div class="card-static">
          <div class="card-static_image-container">
            <?php if ( !empty( $mybooking_activity->photo_url_full ) ) { ?>
              <img class="card-static_image" src="<?php echo esc_url( $mybooking_activity->photo_url_full ) ?>" alt="<?php echo esc_attr( $mybooking_activity->name )?>">
            <?php } else { ?>
              <div class="no-product-photo">
                <img class="card-static_image" src="<?php echo esc_url( get_stylesheet_directory_uri().'/images/default-image-product.png') ?>" alt="<?php echo esc_attr( $mybooking_activity->name )?>"/>
              </div>
            <?php } ?>
          </div>
          <div class="card-static_body">
            <div class="mybooking-catalog_header">
              <h2 class="card-static_product-name "><?php echo esc_html( $mybooking_activity->name ) ?></h2>

              <?php if ( isset( $mybooking_activity->address) ) { ?>
              <div class="text-center"><i class="fa fa-map-marker"
                  aria-hidden="true"></i>&nbsp;<?php echo esc_html( $mybooking_activity->address->street ) ?>,
                <?php echo esc_html( $mybooking_activity->address->city ) ?> <?php echo esc_html( $mybooking_activity->address->zip ) ?></div>
              <?php } ?>

              <?php if ( $mybooking_activity->use_rates ) { ?>
                <span class="text-muted">
                  <small><?php echo esc_html_x( 'From', 'activities_list', 'mybooking' ) ?></small>
                </span>
                <span class="h5">
                  <strong><?php echo esc_html( $mybooking_activity->from_price_formatted ) ?></strong>
                </span>
              <?php } ?>
            </div>

            <?php if ( $args['use_detail_pages'] ) { ?>
              <?php $mybooking_activityIdAnchor = $mybooking_activity->id;
                    if ( !empty( $mybooking_activity->slug) ) {
                          $mybooking_activityIdAnchor = $mybooking_activity->slug;
                    }
               ?>
              <div class="card-static_btn mt-5">
                <a href="<?php echo esc_url( $args['url_detail'].'/'.$mybooking_activityIdAnchor ) ?>"
                  class="button btn btn-choose-product"><?php echo esc_html_x( 'More information', 'activities_list', 'mybooking' ) ?></a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php  } ?>
  </section>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="alert alert-primary" role="alert">
          <div class="text-center">
            <?php /* translators: 1: Number of results, 2: Number of results */ ?>
            <?php echo wp_kses( sprintf( _nx( '<b>%s</b> result found',
                                         '<b>%s</b> results found',
                                         intval( $args['total'] ),
                                         'activity_shopping_cart',
                                         'mybooking' ),
                                     number_format_i18n( $args['total'] ) ),
                                array( 'b' => array() ) ) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pagination -->
  <?php if ($args['total_pages'] > 1) { ?>
    <?php $mybooking_querystring = array_key_exists('querystring', $args) ? $args['querystring'] : '' ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav aria-label="<?php echo esc_attr_x( 'Page navigation', 'activities_list', 'mybooking' ); ?>" class="pull-right">
            <ul class="pagination">
              <?php $mybooking_disabled_previous = ($args['current_page'] == 1 ? 'disabled' : '') ?>
              <li class="page-item <?php echo esc_attr( $mybooking_disabled_previous ) ?>">
                <a class="page-link"
                   href="<?php echo esc_url( $args['url'].'?offsetpage='.($args['current_page']-1).$mybooking_querystring ) ?>">
                   <?php echo esc_html_x( 'Previous', 'activities_list', 'mybooking' ) ?></a>
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
                       href="<?php echo esc_url( $args['url'].'?offsetpage='.($mybooking_page).$mybooking_querystring )?>">
                      <?php echo esc_html( $mybooking_page ) ?></a>
                  </li>
                <?php } ?>
              <?php } ?>
              <?php $mybooking_disabled_next = ($args['current_page'] == $args['total_pages'] ? 'disabled' : '') ?>
              <li class="page-item <?php echo esc_attr( $mybooking_disabled_next ) ?>">
                <a class="page-link"
                   href="<?php echo esc_url( $args['url'].'?offsetpage='.($args['current_page']+1).$mybooking_querystring )?>">
                  <?php echo esc_html_x( 'Next', 'activities_list', 'mybooking' ) ?></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  <?php } ?>
<?php } ?>
