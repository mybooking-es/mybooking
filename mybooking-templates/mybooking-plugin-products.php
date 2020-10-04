<section class="cards-static-container fleet">
  <!-- Products -->
  <?php foreach( $args['data']->data as $product ) { ?>
  <div class="card-static-wrapper">
    <div class="card-static">
      <div class="card-static_image">
        <img src="<?php echo $product->photo_path?>" alt="?php echo $product->name?>">
      </div>
      <div class="card-static_body">
        <div class="card-static_header">
          <h2 class="card-static_product-name"><?php echo $product->name ?></h2>
          <h3 class="card-static_product-short-description"><?php echo $product->short_description ?></h3>
        </div>
        <div class="card-static_btn">
          <a href="/<?php echo $args['url_detail']?>/<?php echo $product->code?>" class="button btn">Más
            información</a>
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
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']-1 ?>">Previous</a>
          </li>
          <?php foreach ($args['pages'] as $page) { ?>
          <?php if ($page == $args['current_page']) { ?>
          <li class="page-item active" aria-current="page">
            <span class="page-link">
              <?php echo $page ?>
            </span>
          </li>
          <?php } else { ?>
          <li class="page-item">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $page ?>"><?php echo $page ?></a>
          </li>
          <?php } ?>
          <?php } ?>
          <li class="page-item <?php if ($args['current_page'] == $args['total_pages']) { ?>disabled<?php } ?>">
            <a class="page-link"
              href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']+1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <?php } ?>

</section>