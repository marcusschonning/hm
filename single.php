 <?php echo "single.php!"; ?>

<?php get_header(); ?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		

		echo the_title()."<br />";
		echo the_id()." <- id. <br />";

		echo get_post_meta($post->ID, "product_price", true) . ":-" ."<br />";

		print_r(get_post_meta($post->ID, "product_color", true));

		$colors = get_post_meta($post->ID, "product_color", true);

		foreach ($variable as $key => $value) {
			# code...
		}


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
		if (has_post_thumbnail( $post->ID )) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			echo $image[0];
		}

		$media = get_attached_media( 'image' );

		foreach ($media as $value) {
			 echo wp_get_attachment_url( $value->ID );
		}

		
	} // end while
} // end if
?>






<?php get_footer(); ?>