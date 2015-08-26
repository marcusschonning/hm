
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
		<div class="lightbox-product">
			<div class="close fa fa-close"></div>
			<h1 class="title" product-id="<?php echo get_the_ID(); ?>"><?php echo the_title(); ?></h1>
			<div class="description"><?php echo the_content(); ?></div>
			<?php
			if (get_post_meta($post->ID, "product_size", true) === "onesize") {
				echo "<span class='sizes'>Onesize</span>";
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
				<div class="price">Pris: <span><?php echo get_post_meta($post->ID, "product_price", true); ?></span>:-</div>
				<?php
			}

			?>
			<div class="img" imageLink="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>"></div>
			<div class="add-to-cart">Add to cart<i class="fa fa-cart-plus"></i></div>
		

	</div>

		<?php
	} // end while
} // end if
?>

