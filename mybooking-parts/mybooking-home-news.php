<!-- SECTIONS NEWS ------------------------------------------------------------>

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
        $news_item = new WP_Query($news_args); ?>
        <?php  while ( $news_item->have_posts() ) : $news_item->the_post(); ?>

          <div class="col-md-4">
            <div class="news_thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>
            <h2 class="news_title"><?php the_title(); ?></h2>
            <div class="news_extract">
              <?php echo the_excerpt(); ?>
            </div>
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  </div>

<?php } ?>

<!-- PAGE CONTENT ------------------------------------------------------------->

<div class="content flex-block-wrapper">
  <div class="centered-flex-block">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile;?>

  </div>
</div>
