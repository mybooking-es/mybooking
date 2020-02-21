<section class="container-fluid">
		<!-- Products -->
		<div class="row">
			<?php foreach( $args['data']->data as $product ) { ?>
			  <div class="col-md-3">
					<div class="card text-center">
					  <img class="card-img-top" src="<?php echo $product->photo_path?>" alt="?php echo $product->name?>">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $product->name ?></h5>
					    <p class="card-text"><?php echo $product->short_description ?></p>
					    <a href="/<?php echo $args['url_detail']?>/<?php echo $product->code?>" class="btn btn-primary">Más información</a>
					  </div>
					</div>
			  </div>
			<?php  } ?>
		</div>
	  
	  <!-- Pagination -->
	  <?php if ($args['total_pages'] > 1) { ?>
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="Page navigation example" class="pull-right">
				  <ul class="pagination">
				    <li class="page-item <?php if ($args['current_page'] == 1) { ?>disabled<?php } ?>">
				    	  <a class="page-link" href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']-1 ?>">Previous</a>
				    </li>
	          <?php foreach ($args['pages'] as $page) { ?>
		          <?php if ($page == $args['current_page']) { ?>
						    <li class="page-item active" aria-current="page">
						      <span class="page-link">
						        <?php echo $page ?>
						      </span>
						    </li>			          
		          <?php } else { ?> 
		            <li class="page-item">
		      	      <a class="page-link" href="/<?php echo $args['url']?>?offsetpage=<?php echo $page ?>"><?php echo $page ?></a>
		      	    </li>  
		      	  <?php } ?>
				    <?php } ?>	    
				    <li class="page-item <?php if ($args['current_page'] == $args['total_pages']) { ?>disabled<?php } ?>">
				    	  <a class="page-link" href="/<?php echo $args['url']?>?offsetpage=<?php echo $args['current_page']+1 ?>">Next</a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>
		<?php } ?>

</section>