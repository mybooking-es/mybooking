<?php
/**
*		MYBOOKING HOME NEWS PARTIAL
*  	-----------------------------
*
* 	Versión: 0.0.4
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/
?>

<?php $news_visible = get_option("home_news_visibility");
if ($news_visible == 1) { ?>

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
                <a href="<?php echo get_the_permalink( $news_item ) ?>">
                  <?php echo get_the_post_thumbnail( $news_item ); ?>
                </a>
              </div>
              <h2 class="news_title">
                <?php echo $news_item->post_title; ?>
              </h2>
              <div class="news_extract">
                <?php echo get_the_excerpt( $news_item ); ?>
              </div>
            </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

<?php } ?>
