<?php get_header(); ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		// Post Content here
		//
		echo "archive-products.php!";
	} // end while
} // end if

$args = array( 'post_type' => 'products', 'posts_per_page' => -1);
$loop = new WP_Query( $args );
while ( $loop -> have_posts() ) {
	$loop -> the_post();
	echo the_title();
}

?>






<?php get_footer(); ?>