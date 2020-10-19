<?php
  /** 
   * The Template for showing the renting summary step
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-summary.php
   */
?>
<?php get_template_part('mybooking-parts/mybooking-reservation-steps'); ?>

<div class="reservation-step process-container reservation-step-summary custom-form">
  <div class="process-message">
    <h4 id="reservation_title"></h4>
  </div>

  <div class="container">
    <div class="row">
      <div class="col col-md-8 offset-md-2">
        <div id="reservation_detail" class="summary-detail"></div>
      </div>
    </div>
  </div>


</div>