<?php 
get_header();?>
<br>
<div class="container">
	<div class="row">
    <div class="col-md-8">
    	<?php if (sizeof($args->photos) > 1) { ?>
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">
				  	<?php foreach( $args->photos as $key => $photo ) { ?>
				    <div class="carousel-item <?php if ($key == key($args->photos)) { ?>active<?php } ?>">
				      <img class="d-block w-100" src="<?php echo $photo->full_photo_path?>" alt="<?php echo $args->name?>">
				    </div>
				    <?php } ?>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only"><? echo _x('Previous', 'activity_detail', 'mybooking-wp-plugin' ) ?></span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only"><? echo _x('Next', 'activity_detail', 'mybooking-wp-plugin' ) ?></span>
				  </a>
				</div>
			<?php } else if (sizeof($args->photos) == 1) { ?>
					<img class="d-block product-photo" src="<?php echo $args->photos[0]->full_photo_path?>" alt="<?php echo $args->name?>">
			<?php } else { ?>
			    <div class="text-center no-product-photo pt-3"><i class="fa fa-camera" aria-hidden="true"></i></div>
			<?php } ?>
			<h1 class="h2 mt-3"><?php echo $args->name ?></h1>
      <hr>
      <?php if ($args->address) { ?>
	      <div><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php echo $args->address->street ?>, <?php echo $args->address->city ?> <?php echo $args->address->zip ?></div>
	    	<br>
	    <?php } ?>
      <?php echo $args->description ?>

 
      <div class="row">

	      <?php if (!empty($args->detailed_info_what_includes)) { ?>
	        <div class="col-lg-6">
			      <h2 class="h5 mt-3">¿Qué incluye?</h2>
			      <div><?php echo $args->detailed_info_what_includes ?></div>
		    	</div>
	      <?php } ?>

	      <?php if (!empty($args->detailed_info_recommendations)) { ?>
	      	<div class="col-lg-6">
			      <h2 class="h5 mt-3">Recomendaciones</h2>
			      <div><?php echo $args->detailed_info_recommendations ?></div>
			    </div>
	      <?php } ?>

	      <?php if (!empty($args->detailed_info_what_to_bring)) { ?>
	      	<div class="col-lg-6">
			      <h2 class="h5 mt-3">¿Qué traer?</h2>
			      <div><?php echo $args->detailed_info_what_to_bring ?></div>
			    </div>
	      <?php } ?>
	    
	      <?php if (!empty($args->detailed_info_timetable_duration)) { ?>
	      	<div class="col-lg-6">
			      <h2 class="h5 mt-3">Fechas y horarios</h2>
			      <div class="alert alert-info">
			      	<?php echo $args->detailed_info_timetable_duration ?>
			    	</div>
			    </div>
		    <?php } ?>

	      <?php if (!empty($args->detailed_info_ages)) { ?>
					<div class="col-lg-6">	      
			      <h2 class="h5 mt-3">Edades</h2>
			      <div><?php echo $args->detailed_info_ages ?></div>
		    	</div>
	      <?php } ?>		    

	      <?php if (!empty($args->detailed_info_difficulty_level)) { ?>
	      	<div class="col-lg-6">
			      <h2 class="h5 mt-3">Dificultad</h2>
			      <div><?php echo $args->detailed_info_difficulty_level ?></div>
			    </div>
	      <?php } ?>	 

	      <?php if (!empty($args->detailed_info_price)) { ?>
	      	<div class="col-lg-6">
			      <h2 class="h5 mt-3">Precios</h2>
			      <div><?php echo $args->detailed_info_price ?></div>
			    </div>
	      <?php } ?>	      

	      <?php if (!empty($args->detailed_info_meeting_point)) { ?>
	      	<div class="col-lg-6">
			      <h2 class="h5 mt-3">Lugar de encuentro</h2>
			      <div class="alert alert-secondary">
			     	 <div><?php echo $args->detailed_info_meeting_point ?></div>
			    	</div>
			    </div>
	      <?php } ?>

    	</div>

		</div>
		<div class="col-md-4">
			<h2 class="h2"><?php echo $args->name ?></h2>
			<p class="mt-1 text-muted"><? echo _x('Please choose your dates in the availability calendar', 'activity_detail', 'mybooking-wp-plugin' ) ?>
			<hr>
      <?php mybooking_engine_get_template('mybooking-plugin-activities-activity-widget.php', array('activity_id' => $args->id)) ?>			
		</div>
	</div>
</div>

<?php get_footer();