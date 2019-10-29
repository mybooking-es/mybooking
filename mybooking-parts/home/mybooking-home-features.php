<?php
/**
*		MYBOOKING HOME FEATURES PARTIAL
*  	---------------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php $features_visible = get_option("home_features_visibility");
if ($features_visible == 1) { ?>

  <div class="gradient-section">
    <div class="container">

        <!-- Header -->
        <div class="title-wrapper">
          <div class="title">
        <?php $title_features_header = get_option("home_features_header_title");
            if ($title_features_header !== '') { ?>
              <h1 class="color-white"><?php echo $title_features_header ?></h1>
        <?php } ?>

        <?php $text_features_header = get_option("home_features_header_text");
            if ($text_features_header !== '') { ?>
              <p class="color-white"><?php echo $text_features_header ?></p>
        <?php } ?>
        </div>
      </div>

      <div class="text-center">

        <?php $imagen_features_header = get_option("home_features_header_image");
            if ($imagen_features_header !== '') { ?>
              <img class="image-fluid" src="<?php echo $imagen_features_header ?>" alt="">
        <?php } ?>

      </div>

      <!-- Points -->

      <div class="feature">
        <div class="features__item">
          <span class="stopa stopa-1">1</span>

          <?php $title_features_one = get_option("home_features_one_title");
              if ($title_features_one !== '') { ?>
                <h3><?php echo $title_features_one ?></h3>
          <?php } ?>

          <hr />

          <?php $text_features_one = get_option("home_features_one_text");
              if ($text_features_one !== '') { ?>
                <p><?php echo $text_features_one ?></p>
          <?php } ?>

        </div>

        <div class="features__item">
          <span class="stopa stopa-2">2</span>

          <?php $title_features_two = get_option("home_features_two_title");
              if ($title_features_two !== '') { ?>
                <h3><?php echo $title_features_two ?></h3>
          <?php } ?>

          <hr />

          <?php $text_features_two = get_option("home_features_two_text");
              if ($text_features_two !== '') { ?>
                <p><?php echo $text_features_two ?></p>
          <?php } ?>

        </div>

        <div class="features__item">
          <span class="stopa stopa-3">3</span>

          <?php $title_features_three = get_option("home_features_three_title");
              if ($title_features_three !== '') { ?>
                <h3><?php echo $title_features_three ?></h3>
          <?php } ?>

          <hr />

          <?php $text_features_three = get_option("home_features_three_text");
              if ($text_features_three !== '') { ?>
                <p><?php echo $text_features_three ?></p>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>

<?php } ?>
