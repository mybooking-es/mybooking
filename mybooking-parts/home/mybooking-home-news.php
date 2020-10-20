<?php
/**
*		MYBOOKING HOME NEWS PARTIAL
*  	-----------------------------
*
* 	@version 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<?php $mybooking_news_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_news_visibility" ); ?>

<?php if ($mybooking_news_visible == "1") { ?>
  <div class="news_container">
    <div class="container">
      <div class="row">

        <?php
        $mybooking_news_args = array(
          'post_type' => 'post',
          'posts_per_page'=> 3,
        );

        $mybooking_query = new WP_Query($mybooking_news_args);
        $mybooking_news_items = $mybooking_query->get_posts();
        foreach($mybooking_news_items as $mybooking_news_item) :
        ?>
          <?php $mybooking_permalink = get_permalink( $mybooking_news_item ); ?>
          <div class="col-md-4">
            <div class="news_thumbnail">
              <?php if ( !has_post_thumbnail( $mybooking_news_item->ID ) ) { ?>
                <a class="news_post-image"
                   href="<?php echo esc_attr( esc_url( $mybooking_permalink ) ) ?>"
                   rel="bookmark"
                   style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri().'/images/default-image.png') ?>')">
                </a>
              <?php } else { ?>
                <?php $mybooking_featured_img_url = get_the_post_thumbnail_url( $mybooking_news_item, 'full' ); ?>
                <a class="news_post-image"
                   href="<?php echo esc_attr( esc_url( $mybooking_permalink ) ) ?>"
                   rel="bookmark"
                   style="background-image: url('<?php echo esc_attr( esc_url( $mybooking_featured_img_url ) ) ?>')">
                </a>
              <?php } ?>
            </div>
            <h2 class="news_title">
              <?php echo wp_kses_post( get_the_title( $mybooking_news_item ) ); ?>
            </h2>
            <div class="news_extract">
              <?php echo wp_kses_post( get_the_excerpt( $mybooking_news_item ) ); ?>
              <p>
                <a class="btn btn-secondary mybooking-read-more-link" href="<?php echo esc_attr( esc_url( $mybooking_permalink ) ) ?>">
                  <?php echo esc_html_x( 'Read', 'home-news-button','mybooking' ) ?>
                </a>
              </p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

<?php } ?>
