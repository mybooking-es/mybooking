<?php if ( $args['total'] == 0 ) { ?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info">
      <?php echo _x( 'No results found', 'activities_list', 'mybooking' ) ?>
    </div>
  </div>
</div>
<?php } else { ?>
<!-- Products -->
<section class="cards-static-container fleet">
  <?php foreach( $args['data']->data as $mybooking_activity ) { ?>
  <div class="card-static-wrapper">
    <div class="card-static">
      <?php if ( !empty( $mybooking_activity->photo_url_full ) ) { ?>
      <div class="card-static_image">
        <img src="<?php echo $mybooking_activity->photo_url_full?>" alt="<?php echo $mybooking_activity->name?>">
      </div>
      <?php } else { ?>
      <div class="text-center no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
      <?php } ?>
      <div class="card-static_body">
        <div class="card-static_header-catalog">
          <h2 class="card-static_product-name "><?php echo $mybooking_activity->name ?></h2>
          <?php if ( isset( $mybooking_activity->address) ) { ?>
          <div class="text-center"><i class="fa fa-map-marker"
              aria-hidden="true"></i>&nbsp;<?php echo $mybooking_activity->address->street ?>,
            <?php echo $mybooking_activity->address->city ?> <?php echo $mybooking_activity->address->zip ?></div>
          <?php } ?>
          <?php if ( $mybooking_activity->use_rates ) { ?>
          <p>
            <span
              class="text-muted"><small><?php echo _x( 'From', 'activities_list', 'mybooking' ) ?></small></span>
            <span class="h5 mt-10 color-brand-primary">
              <strong><?php echo $mybooking_activity->from_price_formatted ?></strong></span>
          </p>
          <?php } ?>
        </div>

        <?php if ( !empty( $mybooking_activity->slug) ) {
                    $mybooking_activityIdAnchor = $mybooking_activity->slug;
                  } else {
                    $mybooking_activityIdAnchor = $mybooking_activity->id;
                  }
              ?>
        <div class="card-static_btn mt-5">
          <a href="/<?php echo $args['url_detail']?>/<?php echo $mybooking_activityIdAnchor?>"
            class="button btn btn-choose-product"><?php echo _x( 'More information', 'activities_list', 'mybooking' ) ?></a>
        </div>
      </div>
    </div>
  </div>
  <?php  } ?>
</section>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="alert alert-primary" role="alert" style="width: fit-content;">
        <?php printf( _nx( '<b>%s</b> result found', '<b>%s</b> results found', intval( $args['total'] ), 'activity_shopping_cart', 'mybooking' ), number_format_i18n( $args['total'] ) ) ?>
      </div>
    </div>
  </div>
</div>
<!-- Pagination -->
<?php if ($args['total_pages'] > 1) { ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="<?php echo esc_attr_x( 'Page navigation', 'activities_list', 'mybooking' ); ?>" class="pull-right">
        <ul class="pagination">
          <li class="page-item <?php if ($args['current_page'] == 1) { ?>disabled<?php } ?>">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']-1 ?><?php echo $args['querystring']?>"><?php echo _x( 'Previous', 'activities_list', 'mybooking' ) ?></a>
          </li>
          <?php foreach ($args['pages'] as $mybooking_page) { ?>
          <?php if ($mybooking_page == $args['current_page']) { ?>
          <li class="page-item active" aria-current="page">
            <span class="page-link">
              <?php echo $mybooking_page ?>
            </span>
          </li>
          <?php } else { ?>
          <li class="page-item">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $mybooking_page ?><?php echo $args['querystring']?>"><?php echo $mybooking_page ?></a>
          </li>
          <?php } ?>
          <?php } ?>
          <li class="page-item <?php if ($args['current_page'] == $args['total_pages']) { ?>disabled<?php } ?>">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']+1 ?><?php echo $args['querystring']?>"><?php echo _x( 'Next', 'activities_list', 'mybooking' ) ?></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>