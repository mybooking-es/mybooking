<?php
  /**
   * The Template for the planning
   *
   * This template can be overridden by copying it to yourtheme/mybooking-templates/mybooking-plugin-planning-tmpl.php
   *
   * @phpcs:disable PHPCompatibility.Miscellaneous.RemovedAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPOpenTagFound
   * @phpcs:disable Generic.PHP.DisallowAlternativePHPTags.MaybeASPShortOpenTagFound
   */
?>

<!-- PRODUCT DETAIL MODAL ----------------------------------------------------->
<script type="text/tmpl" id="script_product_modal">
  <div class="container">
    <div class="row">
      <div class="mybooking-modal_image-container col-md-7">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <% for (var idx=0; idx<product.photos.length; idx++) { %>
            <div class="carousel-item <% if (idx==0) {%>active<%}%>">
              <img class="d-block w-100" src="<%=product.photos[idx].full_photo_path%>" alt="<%=product.name%>">
            </div>
            <% } %>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">&lt;</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">&gt;</span>
          </a>
        </div>
      </div>
      <div class="mybooking-modal_info-container col-md-5">
        <div class="mybooking-modal_product-description">
          <%=product.short_description%>
        </div>
        <div class="mybooking-modal_product-short-description">
          <%=product.description%>
        </div>
      </div>
    </div>
  </div>
</script>