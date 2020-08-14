<div class="jumbotron jumbotron-fluid">
  <div class="container-fluid">
    <form name="search_activities_form" class="form-horizontal" method="get" <?php if ( array_key_exists('search_path', $args) && $args['search_path'] != '') { ?>
          action="<?php $args['search_path']?>"
          <?php } ?>>
      <div class="row">
        <div class="col-md-12">
          <div class="form-row search_fields_container">
            <div class="form-group col-md-5">
              <input type="text" size="50" class="form-control"  
                     <?php if ( array_key_exists('q', $args) && $args['q'] != '') { ?>value="<?php echo $args['q']?>"<?php } ?>
                     name="q" id="search_q" placeholder="<?php echo _x( 'Search', 'activities_search', 'mybooking-wp-plugin' ) ?>">
            </div>
            <div class="form-group col-md-1">
              <button type="submit" class="btn btn-primary mb-2 w-100"><i class="fa fa-search"></i>&nbsp;</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>