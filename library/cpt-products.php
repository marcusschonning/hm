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
		'menu_name'				=> __('product', 'hm')
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



add_action('init', 'my_product_taxonomies');


add_action('init', 'products_init');


?>