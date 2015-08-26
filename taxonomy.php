
<div class="product-slider"></div>
<div style="display: none;" id="all-products-container">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			$posttags = get_the_terms($post->ID, 'product_categories');
			?>
			<a class="product-link 
			<?php
			foreach ($posttags as $term) {
				echo ' ' . $term->name;
			}
			?>"
			href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
			<?php

		}
	}
	?>
</div>

<div class="back">
	<i class="fa fa-arrow-left"></i>
</div>
<div class="logo2">
	<img src="<?php echo get_template_directory_uri(); ?>/img/icons/hm.png" alt="Logo">
</div>

<div class="sidebar">
	<div class="steps">
		<div class="step">
			<div><span><p class="number">1</p><p class="option">Välj kläder</p></span></div>
			<div><span><p class="number">2</p><p class="option">Skanna QR-koden</p></span></div>
			<div><span><p class="number">3</p><p class="option">Betala i appen</p></span></div>
			<!-- <h1>1</h1><p>Välj</p> -->
			<!-- <h1>2</h1><p>Skanna</p> -->
			<!-- <h1>3</h1><p>Betala i H&M-appen</p> -->
		</div>
	</div>
	<div class="info">
		<h4>Titel</h4>
		<p>Proactively architect proactive innovation via bricks-and-clicks ROI. Synergistically impact fully tested core competencies before market-driven niches. Enthusiastically reconceptualize top-line strategic theme areas whereas innovative scenarios.</p>
	</div>
	<div class="shopping-cart">
		<ul class="cart">
		</ul>

		<div class="total">
			Totalt: <span>0</span>:-
		</div>
	</div>
	
	<div class="qr"></div>
</div>

<div class="shadow"></div>
<div class="categories-menu">
	<ul>
		<li class="cat insp" category="insp"><span class="active"></span></li>
		<li class="cat shirt" category="tshirts"><span></span></li>
		<li class="cat pants" category="pants"><span></span></li>
		<li class="cat shoes" category="shoes"><span></span></li>
		<li class="cat misc" category="misc"><span></span></li>
	</ul>
</div>

