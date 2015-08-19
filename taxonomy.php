
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
		<li class="cat" category="insp">Inspiration</li>
		<li class="cat" category="tshirts">T-shirts</li>
		<li class="cat" category="pants">Byxor</li>
		<li class="cat" category="shoes">Skor</li>
		<li class="cat" category="misc">Övrigt</li>
		<li class="search"><?php get_search_form(); ?></li>
	</ul>
</div>

