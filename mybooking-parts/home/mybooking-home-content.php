<?php
/**
*		RESERVATION HOME CONTENT PARTIAL
*  	--------------------------------
* 	Autor: Hector Asencio @Mybooking
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.1
*/
?>

<div class="content flex-block-wrapper">
  <div class="centered-flex-block">

    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile;?>

  </div>
</div>
