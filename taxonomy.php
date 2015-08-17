
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?><a class="product-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><br /><?php
	}
}
?>

