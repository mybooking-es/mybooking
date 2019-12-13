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
                <div class="article_image">
                  <a href="<?php the_permalink(); ?>" title="<?php esc_attr__('Ver','mybooking'); ?> <?php the_title(); ?>">

                    <?php the_post_thumbnail(); ?>

                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="article_body">
                  <h2 class="article_title">
                    <a href="<?php the_permalink(); ?>" title="<?php esc_attr__('Ver','mybooking'); ?> <?php the_title(); ?>">

                      <?php the_title(); ?>

                    </a>
                  </h2>
                  <div class="article_excerpt">

                    <?php the_excerpt(); ?>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <h3 class="article_price">
                  <?php $info_price_auto = get_post_meta( get_the_id(), 'product_info_price_auto', true );
                  echo $info_price_auto
                  ?>
                </h3>
                <p>
                  Kilometraje:
                  <strong><?php $info_km = get_post_meta( get_the_id(), 'product_info_km', true );
                  echo $info_km
                  ?></strong>
                  <br>
                  Fecha de matriculación:
                  <strong><?php $info_year = get_post_meta( get_the_id(), 'product_info_year', true );
                  echo $info_year
                  ?></strong>
                  <br>
                  Potencia:
                  <strong><?php $info_power = get_post_meta( get_the_id(), 'product_info_power', true );
                  echo $info_power
                  ?></strong>
                  <br>
                  Color:
                  <strong><?php $info_color = get_post_meta( get_the_id(), 'product_info_color', true );
                  echo $info_color
                  ?></strong>
                </p>
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
