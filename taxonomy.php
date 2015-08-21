
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
			href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
			<?php

		}
	}
	?>
</div>

<div class="sidebar">
	<div class="steps">

		<h1>Steg för att köpa</h1>
	</div>
	<div class="info">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nesciunt cumque corrupti, perspiciatis maxime quam veritatis libero maiores accusamus fugiat assumenda fugit iste, animi earum nostrum, fuga voluptatem temporibus dignissimos.</p>

		<div class="cart">
			<ul>
				<li>T-Shirt 199:-</li>
				<li>Pants 299:-</li>
				<li>Thong 79:-</li>
			</ul>
		</div>
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

