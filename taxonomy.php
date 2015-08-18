
<div class="back">
	<p>back</p>
</div>

<div class="product-slider">
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			?>
			<a class="product-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
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
		<li>Inspiration</li>
		<li>T-shirts</li>
		<li>Byxor</li>
		<li>Skor</li>
		<li>Övrigt</li>
		<li><?php get_search_form(); ?></li>
	</ul>
</div>

