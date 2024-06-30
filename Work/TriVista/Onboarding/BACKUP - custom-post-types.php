<?php
defined( 'ABSPATH' ) or die();
// Register Custom Post Type
function offers_post_type() {

	$labels = array(
		'name'                  => _x( 'Offers', 'Post Type General Name', 'jtptheme' ),
		'singular_name'         => _x( 'Offer', 'Post Type Singular Name', 'jtptheme' ),
		'menu_name'             => __( 'Offers', 'jtptheme' ),
		'name_admin_bar'        => __( 'Offers', 'jtptheme' ),
		'archives'              => __( 'Offer Archives', 'jtptheme' ),
		'attributes'            => __( 'Offer Attributes', 'jtptheme' ),
		'parent_item_colon'     => __( 'Parent Offer:', 'jtptheme' ),
		'all_items'             => __( 'All Offers', 'jtptheme' ),
		'add_new_item'          => __( 'Add New Offer', 'jtptheme' ),
		'add_new'               => __( 'Add New Offer', 'jtptheme' ),
		'new_item'              => __( 'New Offer', 'jtptheme' ),
		'edit_item'             => __( 'Edit Offer', 'jtptheme' ),
		'update_item'           => __( 'Update Offer', 'jtptheme' ),
		'view_item'             => __( 'View Offer', 'jtptheme' ),
		'view_items'            => __( 'View Offer', 'jtptheme' ),
		'search_items'          => __( 'Search Offer', 'jtptheme' ),
		'not_found'             => __( 'Not found', 'jtptheme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'jtptheme' ),
		'featured_image'        => __( 'Featured Image', 'jtptheme' ),
		'set_featured_image'    => __( 'Set featured image', 'jtptheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'jtptheme' ),
		'use_featured_image'    => __( 'Use as featured image', 'jtptheme' ),
		'insert_into_item'      => __( 'Insert into Offer', 'jtptheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Offer', 'jtptheme' ),
		'items_list'            => __( 'Items list', 'jtptheme' ),
		'items_list_navigation' => __( 'Items list navigation', 'jtptheme' ),
		'filter_items_list'     => __( 'Filter items list', 'jtptheme' ),
	);
	$args = array(
		'label'                 => __( 'Offer', 'jtptheme' ),
		'description'           => __( 'Offers', 'jtptheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		// 'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'offers', $args );

}
add_action( 'init', 'offers_post_type', 0 );

add_action( 'init', 'library_post_type', 0 );

function library_post_type() {

	$labels = array(
		'name'                  => _x( 'Library', 'Post Type General Name', 'jtptheme' ),
		'singular_name'         => _x( 'Library', 'Post Type Singular Name', 'jtptheme' ),
		'menu_name'             => __( 'Library', 'jtptheme' ),
		'name_admin_bar'        => __( 'Library', 'jtptheme' ),
		'archives'              => __( 'Library Archives', 'jtptheme' ),
		'attributes'            => __( 'Library Attributes', 'jtptheme' ),
		'parent_item_colon'     => __( 'Parent Library:', 'jtptheme' ),
		'all_items'             => __( 'All Library', 'jtptheme' ),
		'add_new_item'          => __( 'Add New Library', 'jtptheme' ),
		'add_new'               => __( 'Add New Library', 'jtptheme' ),
		'new_item'              => __( 'New Library', 'jtptheme' ),
		'edit_item'             => __( 'Edit Library', 'jtptheme' ),
		'update_item'           => __( 'Update Library', 'jtptheme' ),
		'view_item'             => __( 'View Library', 'jtptheme' ),
		'view_items'            => __( 'View Library', 'jtptheme' ),
		'search_items'          => __( 'Search Library', 'jtptheme' ),
		'not_found'             => __( 'Not found', 'jtptheme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'jtptheme' ),
		'featured_image'        => __( 'Featured Image', 'jtptheme' ),
		'set_featured_image'    => __( 'Set featured image', 'jtptheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'jtptheme' ),
		'use_featured_image'    => __( 'Use as featured image', 'jtptheme' ),
		'insert_into_item'      => __( 'Insert into Library', 'jtptheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Library', 'jtptheme' ),
		'items_list'            => __( 'Items list', 'jtptheme' ),
		'items_list_navigation' => __( 'Items list navigation', 'jtptheme' ),
		'filter_items_list'     => __( 'Filter items list', 'jtptheme' ),
	);
	$args = array(
		'label'                 => __( 'Library', 'jtptheme' ),
		'description'           => __( 'Library', 'jtptheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','author','thumbnail', 'page-attributes'),
		//'taxonomies'            => array( 'categories' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'library', $args );

}
add_action( 'init', 'Library_post_type', 0 );

function my_taxonomies_library() {
  $labels = array(
    'name'              => _x( 'Library Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Library Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Library Categories' ),
    'all_items'         => __( 'All Library Categories' ),
    'parent_item'       => __( 'Parent Library Category' ),
    'parent_item_colon' => __( 'Parent Library Category:' ),
    'edit_item'         => __( 'Edit Library Category' ), 
    'update_item'       => __( 'Update Library Category' ),
    'add_new_item'      => __( 'Add New Library Category' ),
    'new_item_name'     => __( 'New Library Category' ),
    'menu_name'         => __( 'Library Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'library_category', 'library', $args );
}
add_action( 'init', 'my_taxonomies_library', 0 );

function Leadership_post_type() {

	$labels = array(
		'name'                  => _x( 'Leadership', 'Post Type General Name', 'jtptheme' ),
		'singular_name'         => _x( 'Leadership', 'Post Type Singular Name', 'jtptheme' ),
		'menu_name'             => __( 'Leadership', 'jtptheme' ),
		'name_admin_bar'        => __( 'Leadership', 'jtptheme' ),
		'archives'              => __( 'Leadership Archives', 'jtptheme' ),
		'attributes'            => __( 'Leadership Attributes', 'jtptheme' ),
		'parent_item_colon'     => __( 'Parent Leadership:', 'jtptheme' ),
		'all_items'             => __( 'All Leadership', 'jtptheme' ),
		'add_new_item'          => __( 'Add New Leadership', 'jtptheme' ),
		'add_new'               => __( 'Add New Leadership', 'jtptheme' ),
		'new_item'              => __( 'New Leadership', 'jtptheme' ),
		'edit_item'             => __( 'Edit Leadership', 'jtptheme' ),
		'update_item'           => __( 'Update Leadership', 'jtptheme' ),
		'view_item'             => __( 'View Leadership', 'jtptheme' ),
		'view_items'            => __( 'View Leadership', 'jtptheme' ),
		'search_items'          => __( 'Search Leadership', 'jtptheme' ),
		'not_found'             => __( 'Not found', 'jtptheme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'jtptheme' ),
		'featured_image'        => __( 'Featured Image', 'jtptheme' ),
		'set_featured_image'    => __( 'Set featured image', 'jtptheme' ),
		'remove_featured_image' => __( 'Remove featured image', 'jtptheme' ),
		'use_featured_image'    => __( 'Use as featured image', 'jtptheme' ),
		'insert_into_item'      => __( 'Insert into Leadership', 'jtptheme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Leadership', 'jtptheme' ),
		'items_list'            => __( 'Items list', 'jtptheme' ),
		'items_list_navigation' => __( 'Items list navigation', 'jtptheme' ),
		'filter_items_list'     => __( 'Filter items list', 'jtptheme' ),
	);
	$args = array(
		'label'                 => __( 'Leadership', 'jtptheme' ),
		'description'           => __( 'Leadership', 'jtptheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','author','thumbnail', 'page-attributes'),
		'taxonomies'            => array( 'leadership-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',

		//'has_archive' 			=> true,
		'rewrite'				=> array(
									'slug' => 'team',
									'with_front' => true,
								),
	);
	register_post_type( 'leadership', $args );

}
add_action( 'init', 'Leadership_post_type', 0 );

// project tpes //

