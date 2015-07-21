<?php get_header(); ?>
<p>penis</p>
<video class="bg-vid" autoplay loop>
	<source src="<?php echo get_template_directory_uri();?>/img/test-bg-loop.mp4" />
</video>
<?php 
$args = array( 'post_type' => 'products', 'posts_per_page' => -1);
$loop = new WP_Query( $args );
while ( $loop -> have_posts() ) {
	$loop -> the_post();
	?>
	<a class="product-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a><br />
	<?php  
}
?>
<div class="content" style="background: white"></div>

<?php get_footer(); ?>