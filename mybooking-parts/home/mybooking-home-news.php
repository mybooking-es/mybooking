<?php
/**
*		MYBOOKING HOME NEWS PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.3
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<?php $news_visible = MyBookingCustomizer::getInstance()->get_theme_option( "mybooking_home_news_visibility" );
if ($news_visible) { ?>

  <div class="news_container">
    <div class="container">
      <div class="row">

        <?php
        $news_args = array(
          'post_type' => 'post',
          'category_name' => 'mybooking-home',
          'posts_per_page'=> 3,
        );

        $query = new WP_Query($news_args);
        $news_items = $query->get_posts();
        foreach($news_items as $news_item) :
        ?>
          <div class="col-md-4">
            <div class="news_thumbnail">
              <?php $permalink = get_permalink( $news_item ); ?>
              <?php if ( !has_post_thumbnail( $news_item->ID ) ) { ?>
                <a class="news_post-image"
                   href="<?php echo $permalink ?>"
                   rel="bookmark"
                   style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.png')">
                </a>
              <?php } else { ?>
                <?php $featured_img_url = get_the_post_thumbnail_url( $news_item, 'full' ); ?>
                <a class="news_post-image"
                   href="<?php echo $permalink ?>"
                   rel="bookmark"
                   style="background-image: url('<?php echo esc_url( $featured_img_url ) ?>')">
                </a>
              <?php } ?>
            </div>
            <h2 class="news_title">
              <?php echo $news_item->post_title; ?>
            </h2>
            <div class="news_extract">
              <?php echo get_the_excerpt( $news_item ); ?>
              <p>
                <a class="btn btn-secondary mybooking-read-more-link" href="<?php echo esc_url( get_permalink( $news_item ) ) ?>">
                  <?php echo _x( 'Read', 'home-news-button','mybooking' ) ?>
                </a>
              </p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

<?php } ?>
