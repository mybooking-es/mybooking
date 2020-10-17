<?php get_header();?>
<br>
<div class="container" id="content">
	<div class="row">
    <div class="col-md-8">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<?php foreach( $args->photos as $mybooking_key => $mybooking_photo ) { ?>
			    <div class="carousel-item <?php if ($mybooking_key == key($args->photos)) { ?>active<?php } ?>">
			      <img class="d-block w-100" src="<?php echo esc_attr( esc_url ( $mybooking_photo->full_photo_path ) )?>" alt="<?php echo esc_attr( $args->name )?>">
			    </div>
			    <?php } ?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only"><?php echo esc_html_x('Previous','activity_routes','mybooking'); ?></span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only"><?php echo esc_html_x('Next','activity_routes','mybooking'); ?></span>
			  </a>
			</div>
			<h1 class="h2 mt-3"><?php echo esc_html( $args->name ) ?></h1>
			<h2 class="h4 mt-2"><?php echo esc_html_x('About','activity_routes','mybooking'); ?></h2>
      <?php echo wp_kses_post( $args->description ) ?>
		</div>
		<div class="col-md-4">
      <?php mybooking_engine_get_template('mybooking-plugin-product-widget.php', array('code' => $args->code)) ?>
		</div>
	</div>
</div>

<?php get_footer();
