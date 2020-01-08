<?php
/**
*		Template Name: Mybooking Product Loop
*  	-------------------------------------
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

<div class="wrapper page_content" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main" id="main">

        <?php
          $args=array(
          'post_type' => 'product',
        );
        $product_item = new WP_Query($args);
        if( $product_item->have_posts() ) { ?>
          <?php  while ( $product_item->have_posts() ) : $product_item->the_post(); ?>

            <article class="row article">
              <div class="col-md-3">
                <div class="product_image">
                  <a href="<?php the_permalink(); ?>" title="<?php esc_attr__('Ver','mybooking'); ?> <?php the_title(); ?>">

                    <?php the_post_thumbnail(); ?>

                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="product_body">
                  <h2 class="product_title">
                    <a href="<?php the_permalink(); ?>" title="<?php esc_attr__('Ver','mybooking'); ?> <?php the_title(); ?>">

                      <?php the_title(); ?>

                    </a>
                  </h2>
                  <div class="product_excerpt">

                    <?php the_excerpt(); ?>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
								<hr>
								<h4 class="product_price">

									<?php
										$info_price_auto = get_post_meta(
											get_the_id(),
											'product_info_price_auto',
											true
										);
	                  echo $info_price_auto;

										$info_price_manual = get_post_meta(
											get_the_id(),
											'product_info_price_manual',
											true
										);
	                  echo $info_price_manual;

										$info_price_diesel = get_post_meta(
											get_the_id(),
											'product_info_price_diesel',
											true
										);
	                  echo $info_price_diesel
									?>

                </h4>
                <p>

									<?php
										$info_fuel = get_post_meta(
											get_the_id(),
											'product_info_fuel',
											true
										);
                		echo $info_fuel ?>

								<br>

									<?php
										$info_drive = get_post_meta(
											get_the_id(),
											'product_info_drive',
											true
										);
                		echo $info_drive ?>

								<br>

									<?php
										$info_km = get_post_meta(
											get_the_id(),
											'product_info_km',
											true
										);
                		echo $info_km ?> km

                 </p>
								 <hr>
              </div>
            </article>

          <?php endwhile; ?>
        <?php } ?>

			</main>

			<?php understrap_pagination(); ?>

		</div>
	</div>
</div>

<?php get_footer();
