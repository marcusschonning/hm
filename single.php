 <?php echo "single.php!"; ?>

<?php get_header(); ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		

		echo the_title()."<br />";
		echo the_id()." <- id. <br />";

		echo get_post_meta($post->ID, "product_price", true) . ":-" ."<br />";


		if (get_post_meta($post->ID, "product_size", true) === "onesize") {
			echo "Onesize";
		} else if (get_post_meta($post->ID, "product_size", true) === "multiple") {
			echo "Multiple";
			?>
			<input type='radio' name='size' value='XS' />
			<input type='radio' name='size' value='S' />
			<input type='radio' name='size' value='M' />
			<input type='radio' name='size' value='L' />
			<input type='radio' name='size' value='XL' />
			<?php


		}


		
	} // end while
} // end if
?>






<?php get_footer(); ?>