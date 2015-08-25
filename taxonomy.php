
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

<div class="sidebar">
	<div class="steps">
		<div class="step">
			<div><p class="number">1</p><p class="option">Välj</p></div>
			<div><p class="number">2</p><p class="option">Skanna</p></div>
			<div><p class="number">3</p><p class="option">Betala</p></div>
			<!-- <h1>1</h1><p>Välj</p> -->
			<!-- <h1>2</h1><p>Skanna</p> -->
			<!-- <h1>3</h1><p>Betala i H&M-appen</p> -->
		</div>
	</div>
	<br />

	<div class="info">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nesciunt cumque corrupti, perspiciatis maxime quam veritatis libero maiores accusamus fugiat assumenda fugit iste, animi earum nostrum, fuga voluptatem temporibus dignissimos.</p>
	</div>
	<div class="shopping-cart">
		<ul class="cart">
		</ul>
	</div>
	<div class="qr"></div>
	<div class="back">
		<p>back</p>
	</div>
</div>

<div class="categories-menu">
	<ul>
		<li class="cat insp" category="insp"></li>
		<li class="cat shirt" category="tshirts"></li>
		<li class="cat pants" category="pants"></li>
		<li class="cat shoes" category="shoes"></li>
		<li class="cat misc" category="misc"></li>
	</ul>
</div>

