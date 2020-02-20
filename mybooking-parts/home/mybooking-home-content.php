<?php
/**
*		MYBOOKING HOME CONTENT PARTIAL
*  	--------------------------------
*
* 	Versión: 0.0.2
*   @package WordPress
*   @subpackage Mybooking WordPress Theme
*   @since Mybooking WordPress Theme 0.0.1
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="container page_content">
  <div class="row">
    <div class="col">

      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile;?>
      
    </div>
  </div>
</div>
