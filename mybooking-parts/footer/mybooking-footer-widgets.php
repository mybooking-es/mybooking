<?php
/**
*		MYBOOKING FOOTER WIDGETS PARTIAL
*  	--------------------------------
*
* 	Versión: 0.0.1
*   @package WordPress
*   @subpackage Understrap Mybooking Child
*   @since Understrap Mybooking Child 0.0.2
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Footer widgets -->

<div class="row mybooking-widgets_footer">

    <?php if ( is_active_sidebar( 'mybooking_global_footer_1' ) ) : ?>
      <div class="col">
        <?php dynamic_sidebar( 'mybooking_global_footer_1' ); ?>
      </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'mybooking_global_footer_2' ) ) : ?>
      <div class="col">
        <?php dynamic_sidebar( 'mybooking_global_footer_2' ); ?>
      </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'mybooking_global_footer_3' ) ) : ?>
      <div class="col">
        <?php dynamic_sidebar( 'mybooking_global_footer_3' ); ?>
      </div>
    <?php endif; ?>

</div>
