<?php echo "archive-products.php!"; ?>

<?php get_header(); ?>


<?php 


$args = array( 'post_type' => 'products', 'posts_per_page' => -1);
$loop = new WP_Query( $args );
while ( $loop -> have_posts() ) {
	$loop -> the_post();

	?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br /> <?php  
}

?>






<?php get_footer(); ?>