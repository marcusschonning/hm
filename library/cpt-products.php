<?php 

//Custom post type

function products_init(){
	$labels = array(
		'name' 					=> _x('Products', 'hm'),
		'singular_name' 		=> _x('Product', 'hm'),
		'add_new' 				=> _x('Add New', 'hm'),
		'add_new_item'			=> __('Add new product', 'hm'),
		'edit_item'				=> __('Edit product', 'hm'),
		'new_item'				=> __('New product', 'hm'),
		'all_items'				=> __('All products', 'hm'),
		'view_item'				=> __('View product', 'hm'),
		'search_items'			=> __('Search products', 'hm'),
		'not_found'				=> __('No product found', 'hm'),
		'not_found_in trash' 	=> __('No product found in the trash', 'hm'),
		'parent_item_colon'		=> '',
		'menu_name'				=> __('Products', 'hm')
		);

	$args = array(
		'labels'			=> $labels,
		'description'		=> 'Holds our products and product specific data',
		'public'			=> true,
		'menu_position'		=> 5,
		'supports'			=> array( 	'title',
										'editor',
										'thumbnail',
										'comments' ),
		'has_archive'		=> true,
		'capability_type' 	=> 'post',
		'menu_icon'			=> 'dashicons-exerpt-view'


		);
	register_post_type('products', $args);

}

//Taxonomies

function my_product_taxonomies() {
	$labels = array(
		'name'              => _x( 'Product Categories', 'hm' ),
		'singular_name'     => _x( 'Product Category', 'hm' ),
		'search_items'      => __( 'Search Product Categories', 'hm' ),
		'all_items'         => __( 'All Product Categories', 'hm' ),
		'parent_item'       => __( 'Parent Product Category', 'hm' ),
		'parent_item_colon' => __( 'Parent Product Category:', 'hm' ),
		'edit_item'         => __( 'Edit Product Category', 'hm' ), 
		'update_item'       => __( 'Update Product Category', 'hm' ),
		'add_new_item'      => __( 'Add New Product Category', 'hm' ),
		'new_item_name'     => __( 'New Product Category', 'hm' ),
		'menu_name'         => __( 'Product Categories', 'hm' ),
  );
	$args = array(
		'hierarchical' 		=> true,
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_admin_column' => true,
		'rewrite' 			=> array('slug' => 'product_categories')
		);

	register_taxonomy('product_categories', 'products', $args);
}

function product_meta_box() {
	add_meta_box( 
		'product_meta_box', // id
		__( 'Product Meta', // title
		'myplugin_textdomain' ),
		'product_meta_box_content', //callback
		'products', //page
		'side', //context
		'high' //priority
	);
}

function product_meta_box_content( $post ) {
	$old = get_post_meta($post->ID, "product_price", true);
	$old2 = get_post_meta($post->ID, "product_size", true);
	$old3 = get_post_meta($post->ID, "product_color", true);

	wp_nonce_field( plugin_basename( __FILE__ ), 'product_meta_box_content_nounce' );
	?>
	<label for="product_price"><?php _e('Enter the price of the product'); ?></label>
	<input type="number" id="product_price" name="product_price" value="<?php echo $old ?>"/> <br><br>

	<label><?php _e('Enter the size of the product'); ?></label><br>
	<input type="radio" id="product_size" name="product_size" value="onesize" <?php if($old2 === 'onesize') echo 'checked' ?>/>Onesize<br>
	<input type="radio" id="product_size" name="product_size" value="multiple" <?php if($old2 === 'multiple') echo 'checked' ?>/>Multiple<br><br>

	<label for="product_color"><?php _e('Enter the colors of the product'); ?></label><br>
	<input type="checkbox" id="product_color" name="product_color" value="red"/>RÖD!<br>
	<input type="checkbox" id="product_color" name="product_color" value="blue"/>Blå<br>
	<input type="checkbox" id="product_color" name="product_color" value="green"/>GRÖN<br>
	<input type="checkbox" id="product_color" name="product_color" value="yellow"/>GUL<br>
	<input type="checkbox" id="product_color" name="product_color" value="white"/>VI!!!t<br>
	<input type="checkbox" id="product_color" name="product_color" value="black"/>Scvart<br>
	<input type="checkbox" id="product_color" name="product_color" value="gray"/>Grå...<br>
	<input type="checkbox" id="product_color" name="product_color" value="orange"/>Orange<br>

	<?php
}

function product_meta_box_save($post_id) {   
	update_post_meta($post_id, "product_price", sanitize_text_field($_POST["product_price"]));
	update_post_meta($post_id, "product_size", sanitize_text_field($_POST["product_size"]));
}


add_action( 'add_meta_boxes', 'product_meta_box' );
add_action( 'save_post', 'product_meta_box_save' );
add_action('init', 'my_product_taxonomies');
add_action('init', 'products_init');


?>