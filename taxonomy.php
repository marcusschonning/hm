
<div class="back">
	<p>back</p>
</div>

<div class="product-slider">
>>>>>>> Stashed changes
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
<div class="sidebar">
	
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
>>>>>>> Stashed changes

</div>
