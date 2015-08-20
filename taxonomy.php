
<div class="back">
	<p>back</p>
</div>

<div class="product-slider">
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

<!-- <div class="your-slider">
	<div>your content</div>
	<div>your content</div>
	<div>your content</div>
	<div>your content</div>
</div> -->
<div class="sidebar">
	<div class="steps">
		Steg för att köpa
	</div>
	<div class="info">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nesciunt cumque corrupti, perspiciatis maxime quam veritatis libero maiores accusamus fugiat assumenda fugit iste, animi earum nostrum, fuga voluptatem temporibus dignissimos.
	</div>
	<div class="shopping-cart">
		<ul class="cart">
		</ul>
	</div>
	<div class="qr"></div>
</div>

<div class="categories-menu">
	<ul>
		<li class="cat all" category="man">ALL</li>
		<li class="cat insp" category="insp">Inspiration</li>
		<li class="cat shirt" category="tshirts"></li>
		<li class="cat pants" category="pants"></li>
		<li class="cat shoes" category="shoes"></li>
		<li class="cat misc" category="misc">Övrigt</li>
	</ul>
</div>

