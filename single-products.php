
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
		<div class="close fa fa-close"></div>
		<h1 class="title" product-id="<?php echo get_the_ID(); ?>"><?php echo the_title(); ?></h1>
		<div class="price"><?php echo get_post_meta($post->ID, "product_price", true); ?></div>
		<div class="colors">
		<?php
		$colors = get_post_meta($post->ID, "product_color", true);
		if($colors > 1){
			foreach ($colors as $color) {
			?>
				<input type="radio" name="color" value="<?php echo $color; ?>" id="<?php echo $color ?>">
				<label for="<?php echo $color; ?>"><?php echo $color ?></label>
				<?php
			}
		}
		?>				
		</div>
		<?php
		if (get_post_meta($post->ID, "product_size", true) === "onesize") {
			echo "Onesize";
		} else if (get_post_meta($post->ID, "product_size", true) === "multiple") {
			?>
			<div class="sizes">
				<input type="radio" name="size" value='XS' id="xs" />
				<label for="xs">XS</label>
				<input type="radio" name="size" value='S' id="s" />
				<label for="s">S</label>
				<input type="radio" name="size" value='M' id="m" checked />
				<label for="m">M</label>
				<input type="radio" name="size" value='L' id="l" />
				<label for="l">L</label>
				<input type="radio" name="size" value='XL' id="xl" />
				<label for="xl">XL</label>
			</div>
			<?php
		}
		$media = get_attached_media( 'image' );
		foreach ($media as $value) {
			?>
				<img src="<?php echo wp_get_attachment_url( $value->ID ); ?>" width="200">
			<?php
		}

		?>
		<div class="add-to-cart">add to cart</div>
		



		<?php
	} // end while
} // end if
?>

