<?php
/**
*		SINGLE PRODUCT POST
*  	-------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.1.4
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper page_content" id="single-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<main class="site-main" id="main">

			<?php
        $args=array(
        'post_type' => 'product',
      );
      $product_item = new WP_Query($args);
      if( $product_item->have_posts() ) { ?>
        <?php  while ( $product_item->have_posts() ) : $product_item->the_post(); ?>

				<!-- Product post -->
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry-content">
						<div class="row no-gutters">
							<div class="col-md-8 product_image">

								<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

							</div>
							<div class="col-md-4 product_info">

								<?php the_title( '<h5 class="entry-title">', '</h5>' ); ?>

								<hr>
								<h2 class="product_price">

									<?php
										$info_price_auto = get_post_meta(
											get_the_id(),
											'product_info_price_auto',
											true
										);
	                  echo $info_price_auto

										$info_price_manual = get_post_meta(
											get_the_id(),
											'product_info_price_manual',
											true
										);
	                  echo $info_price_manual
										
										$info_price_diesel = get_post_meta(
											get_the_id(),
											'product_info_price_diesel',
											true
										);
	                  echo $info_price_diesel
									?>

                </h2>
								<hr>
                <h5>

									<?php
										$info_fuel = get_post_meta(
											get_the_id(),
											'product_info_fuel',
											true
										);
                		echo $info_fuel ?>

								</h5>
								<h5>

									<?php
										$info_drive = get_post_meta(
											get_the_id(),
											'product_info_drive',
											true
										);
                		echo $info_drive ?>

								</h5>
								<h5>

									<?php
										$info_km = get_post_meta(
											get_the_id(),
											'product_info_km',
											true
										);
                		echo $info_km ?> km
								</h5>
								<h5>
									Año
									<?php
										$info_year = get_post_meta(
											get_the_id(),
											'product_info_year',
											true
										);
                		echo $info_year ?>

                 </h5>
								 <p>
                  <strong>

										<?php
											$info_power = get_post_meta(
												get_the_id(),
												'product_info_power',
												true
											);
                  		echo $info_power ?>
											CV
                  </strong>
                  <br>
                  <strong>

										<?php
											$info_displacement = get_post_meta(
												get_the_id(),
												'product_info_displacement',
												true
											);
                  		echo $info_displacement ?>
											cc
									</strong>
                  <br>
                  <strong>

										<?php
											$info_places = get_post_meta(
												get_the_id(),
												'product_info_places',
												true
											);
                  		echo $info_places ?>
											Plazas
									</strong>
                  <br>
                  <strong>
										<?php
											$info_color = get_post_meta(
												get_the_id(),
												'product_info_color',
												true
											);
                  		echo $info_color ?>
                  </strong>
                </p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 product_description">
								<br>

								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								<?php the_content(); ?>

							</div>
							<div class="col_md_12">

								<?php	wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Páginas:', 'understrap' ),
										'after'  => '</div>',
									)); ?>

							</div>
						</div>
					</div>
					<footer class="entry-footer">

						<?php understrap_entry_footer(); ?>

					</footer>
				</article>

				<?php understrap_post_nav(); ?>

				<?php endwhile; ?>
			<?php } ?>

		</main>
	</div>
</div>

<?php get_footer();
