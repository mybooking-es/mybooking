<?php
/**
*   ACTIVITIES PRODUCT TEMPLATE
*   ---------------------------
*
* 	@version 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.9.9
*/
?>
<?php
get_header();?>
<div class="container px-0">
  <div class="row">
    <div class="col-md-8">
      <?php if (sizeof($args->photos) > 1) { ?>
      <div class="activity-view-card">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <!-- Product -->
            <?php foreach( $args->photos as $key => $photo ) { ?>
            <div class="carousel-item <?php if ($key == key($args->photos)) { ?>active<?php } ?>">
              <div class="card-img-bg-color">
                <div class="activity-card__img">
                  <img class="d-block product-photo" src="<?php echo $photo->full_photo_path?>"
                    alt="<?php echo $args->name?>" style="height:400px;">
                </div>
                <div class="activity-card__img-text" style="height: 400px;">
                  <h5 class="card-title color-white"><?php echo $args->name ?></h5>
                </div>
              </div><!-- /bg-color -->
            </div>
            <?php } ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">
              <?php echo _x('Previous', 'activity_detail', 'mybooking-wp-plugin' ) ?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">
              <?php echo _x('Next', 'activity_detail', 'mybooking-wp-plugin' ) ?></span>
          </a>
        </div>
        <div class="activity-description">
          <?php echo $args->description ?>
        </div>
      </div>
      <?php } else if (sizeof($args->photos) == 1) { ?>
      <div class="activity-view-card">
        <div class="card-img-bg-color">
          <div class="activity-card__img">
            <img class="d-block product-photo" src="<?php echo $args->photos[0]->full_photo_path?>"
              alt="<?php echo $args->name?>" style="height:400px;">
          </div>
          <div class="activity-card__img-text" style="height: 400px;">
            <h5 class="card-title color-white"><?php echo $args->name ?></h5>
          </div>
        </div><!-- /bg-color -->
        <div class="activity-description">
          <?php echo $args->description ?>
        </div>
      </div> <!-- /activitie-card -->
      <?php } else { ?>
      <div class="text-center no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
      <?php } ?>

      <!-- media objects -->
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0">Calendario, horario y duración</h5>
          <p class="mb-0">De lunes a domingo, tours a las 8:00 y a las 14:00</p>
        </div>
        <i class="far fa-calendar-alt align-self-center ml-3"></i>
      </div>

      <?php if ($args->address) { ?>
      <div class="media">
        <div class="media-body">
          <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $args->address->street ?>,
          <?php echo $args->address->city ?> <?php echo $args->address->zip ?>
        </div>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_what_includes)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">¿Qué incluye?</h5>
          <?php echo $args->detailed_info_what_includes ?>
        </div>
        <i class="fas fa-boxes align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_recommendations)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">Recomendaciones</h5>
          <?php echo $args->detailed_info_recommendations ?>
        </div>
        <i class="fas fa-comment-alt align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_what_to_bring)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">¿Qué traer?</h5>
          <?php echo $args->detailed_info_what_to_bring ?>
        </div>
        <i class="fas fa-highlighter align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_timetable_duration)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">Fechas y horarios</h5>
          <?php echo $args->detailed_info_timetable_duration ?>
        </div>
          <i class="far fa-clock align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_ages)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">Edades</h5>
          <?php echo $args->detailed_info_ages ?>
        </div>
        <i class="fas fa-user-friends align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_difficulty_level)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">Dificultad</h5>
          <?php echo $args->detailed_info_difficulty_level ?>
        </div>
        <i class="fas fa-sort-numeric-up align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_price)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">Precios</h5>
          <?php echo $args->detailed_info_price ?>
        </div>
                <i class="fas fa-money-bill-wave align-self-center ml-3"></i>
      </div>
      <?php } ?>

      <?php if (!empty($args->detailed_info_meeting_point)) { ?>
      <div class="media">
        <div class="media-body">
          <h5 class="mt-0 mb-1">Lugar de encuentro</h2>
            <?php echo $args->detailed_info_meeting_point ?>
        </div>
            <i class="fas fa-map-marked-alt align-self-center ml-3"></i>
      </div>
      <?php } ?>

    </div><!-- /col-md-8 -->

    <div class="col-md-4">
      <h2 class="h5"><?php echo $args->name ?></h2>
      <p class="mt-1 text-muted">
        <?php echo _x('Please choose your dates in the availability calendar', 'activity_detail', 'mybooking-wp-plugin' ) ?>
        <hr>
        <?php mybooking_engine_get_template('mybooking-plugin-activities-activity-widget.php', array('activity_id' => $args->id)) ?>
    </div>

  </div>
</div>

<?php get_footer();
