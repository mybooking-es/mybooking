<section class="cards-static-container fleet">
  <!-- Products -->
  <?php foreach( $args['data']->data as $mybooking_product ) { ?>
  <div class="card-static-wrapper">
    <div class="card-static">
      <div class="card-static_image">
        <img src="<?php echo $mybooking_product->photo_path?>" alt="?php echo $mybooking_product->name?>">
      </div>
      <div class="card-static_body">
        <div class="card-static_header">
          <h2 class="card-static_product-name"><?php echo $mybooking_product->name ?></h2>
          <h3 class="card-static_product-short-description"><?php echo $mybooking_product->short_description ?></h3>
        </div>
        <div class="card-static_btn">
          <a href="/<?php echo $args['url_detail']?>/<?php echo $mybooking_product->code?>" class="button btn"><?php _ex('More information','renting_products','mybooking'); ?></a>
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
          <li class="page-item <?php if ($args['current_page'] == 1) { ?>disabled<?php } ?>">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']-1 ?>"><?php _ex('Previous','renting_products','mybooking'); ?></a>
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
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $mybooking_page ?>"><?php echo $mybooking_page ?></a>
          </li>
          <?php } ?>
          <?php } ?>
          <li class="page-item <?php if ($args['current_page'] == $args['total_pages']) { ?>disabled<?php } ?>">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']+1 ?>"><?php _ex('Next','renting_products','mybooking'); ?></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <?php } ?>

</section>
