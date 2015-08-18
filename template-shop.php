<?php
/**
* Template name: Shop Template Page
*/
?>
<?php get_header(); ?>
<div class="shop-container">

	<?php 
	$args = array( 'post_type' => 'products', 'posts_per_page' => -1);
	$loop = new WP_Query( $args );
	while ( $loop -> have_posts() ) {
		$loop -> the_post();
		echo the_taxonomies('');?>
		<a class="product-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><br />
	<?php  
	}
?>

</div>

<?php get_footer(); ?>