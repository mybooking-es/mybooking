<!-- SECTION PROMO ----------------------------------------------------------->

<?php $promo_visible = get_option("home_promo_visibility");
if ($promo_visible == 1) { ?>

<div class="container">
  <div class="">

      <?php
      $promo_args = array(
        'post_type' => 'promo',
        'tax_query' => array(
          array(
            'taxonomy' => 'estado',
            'field' => 'slug',
            'terms' => array( 'activo' )
          ),
        ),
        'posts_per_page'=> 1,
      );
      $promo_item = new WP_Query($promo_args); ?>
      <?php  while ( $promo_item->have_posts() ) : $promo_item->the_post(); ?>

        <br>
        <div class="row">
          <div class="col text-center">

            <?php the_post_thumbnail(); ?>
            <h2 class="promo_title display-4"><?php the_title(); ?></h2>

            <?php
            $promo_button_visible = get_option("home_promo_button_visibility");
            $promo_button_text = get_option("home_promo_button_text");
            if ($promo_button_visible == 1 && $promo_button_text !=='') { ?>

              <a class="btn btn-primary mb50" href="<?php the_permalink(); ?>" >
                <?php esc_html_e( $promo_button_text, 'mybookinges' ); ?>
              </a>

            <?php } ?>

          </div>
        </div>
        <br>

    <?php endwhile; ?>

  </div>
</div>

<?php } ?>
