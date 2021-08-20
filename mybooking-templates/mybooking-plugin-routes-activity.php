<?php
  /** 
   * The Template for showing the activity detail page
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-routes-activity.php
   *
   */
?>
<?php
get_header();?>
<div class="container" id="content">
  <div class="row">
    <div class="col-md-8">
      <?php if (sizeof($args->photos) > 1) { ?>
      <h1 class="activity-title"><?php echo esc_html( $args->name ) ?></h1>
      <div id="carouselActivitiesControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <!-- Product -->
          <?php foreach( $args->photos as $mybooking_key => $mybooking_photo ) { ?>
          <div class="carousel-item <?php if ($mybooking_key == key($args->photos)) { ?>active<?php } ?>">
            <div class="activity-img">
              <img class="d-block" src="<?php echo esc_url ( $mybooking_photo->full_photo_path ) ?>"
                alt="<?php echo esc_attr( $args->name )?>" style="height:400px;">
            </div>
          </div>
          <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselActivitiesControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">
            <?php echo esc_html_x('Previous', 'activity_detail', 'mybooking' ) ?></span>
        </a>
        <a class="carousel-control-next" href="#carouselActivitiesControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">
            <?php echo esc_html_x('Next', 'activity_detail', 'mybooking' ) ?></span>
        </a>
      </div>

      <div class="activity-description">
        <?php echo wp_kses_post( $args->description ) ?>
      </div>

      <?php } else if (sizeof($args->photos) == 1) { ?>
      <h1 class="activity-card-title"><?php echo esc_html( $args->name ) ?></h1>
      <div class="activity-img">
        <img class="d-block" src="<?php echo esc_url( $args->photos[0]->full_photo_path )?>"
          alt="<?php echo esc_attr( $args->name ) ?>" style="height:400px;">
      </div>
      <div class="activity-description">
        <?php echo wp_kses_post( $args->description ) ?>
      </div>
      <?php } else { ?>
      <div class="text-center no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
      <?php } ?>

      <!-- media objects -->

      <div class="activity-media-objects">

      <?php if (!empty($args->detailed_info_timetable_duration)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('Dates and timetables','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_timetable_duration )?>
        </div>
        <i class="far fa-clock align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_price)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('Prices','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_price ) ?>
        </div>
        <i class="fas fa-money-bill-wave align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_ages)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('Ages','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_ages )?>
        </div>
        <i class="fas fa-user-friends align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_meeting_point)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('Meeting point','activity_routes','mybooking'); ?></h2>
            <?php echo esc_html( $args->detailed_info_meeting_point ) ?>
        </div>
        <i class="fas fa-map-marked-alt align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_difficulty_level)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('Difficulty','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_difficulty_level ) ?>
        </div>
        <i class="fas fa-sort-numeric-up align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if ( !empty( $args->address ) ) { ?>
      <div class="media">
        <div class="media-body">
          <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo esc_html( $args->address->street ) ?>,
          <?php echo esc_html( $args->address->city ) ?> <?php echo esc_html( $args->address->zip ) ?>
        </div>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_what_includes)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('What\'s included?','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_what_includes ) ?>
        </div>
        <i class="fas fa-boxes align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_what_to_bring)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('What to bring?','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_what_to_bring ) ?>
        </div>
        <i class="fas fa-highlighter align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_recommendations)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo esc_html_x('Recomendations','activity_routes','mybooking'); ?></h5>
          <?php echo wp_kses_post( $args->detailed_info_recommendations ) ?>
        </div>
        <i class="fas fa-comment-alt align-self-center ml-3"></i>
      </div>
      <?php } ?>

      </div><!--/ media-objects -->

    </div><!-- /col-md-8 -->

    <div class="col-md-4">
      <p class="mt-1 text-muted">
        <?php echo esc_html_x('Please choose your dates in the availability calendar', 'activity_detail', 'mybooking' ) ?>
        <hr>
        <?php mybooking_engine_get_template('mybooking-plugin-activities-activity-widget.php', array('activity_id' => $args->id)) ?>
    </div>

  </div>
</div>

<?php get_footer();