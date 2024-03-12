<?php
add_action( 'init', 'register_chronos_Portfolio' );
function register_chronos_Portfolio() {
    
    $labels = array( 
        'name' => __( 'Portfolio', 'chronos' ),
        'singular_name' => __( 'Portfolio', 'chronos' ),
        'add_new' => __( 'Add New Portfolio', 'chronos' ),
        'add_new_item' => __( 'Add New Portfolio', 'chronos' ),
        'edit_item' => __( 'Edit Portfolio', 'chronos' ),
        'new_item' => __( 'New Portfolio', 'chronos' ),
        'view_item' => __( 'View Portfolio', 'chronos' ),
        'search_items' => __( 'Search Portfolios', 'chronos' ),
        'not_found' => __( 'No Portfolios found', 'chronos' ),
        'not_found_in_trash' => __( 'No Portfolios found in Trash', 'chronos' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'chronos' ),
        'menu_name' => __( 'Portfolio', 'chronos' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Portfolio',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats' ),
        'taxonomies' => array( 'Portfolio_category','categories','tags' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => get_stylesheet_directory_uri(). '/images/admin_ico.png', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Portfolio', $args );
}
add_action( 'init', 'create_Categories_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Categories_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Categories', 'chronos' ),
    'singular_name' => __( 'Categories', 'chronos' ),
    'search_items' =>  __( 'Search Categories','chronos' ),
    'all_items' => __( 'All Categories','chronos' ),
    'parent_item' => __( 'Parent Categories','chronos' ),
    'parent_item_colon' => __( 'Parent Categories:','chronos' ),
    'edit_item' => __( 'Edit Categories','chronos' ), 
    'update_item' => __( 'Update Categories','chronos' ),
    'add_new_item' => __( 'Add New Categories','chronos' ),
    'new_item_name' => __( 'New Categories Name','chronos' ),
    'menu_name' => __( 'Categories','chronos' ),
  );     

// Now register the taxonomy

  register_taxonomy('categories',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'categories' ),
  ));

}
add_action( 'init', 'create_Tags_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Tags_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Tags', 'chronos' ),
    'singular_name' => __( 'Tags', 'chronos' ),
    'search_items' =>  __( 'Search Tags','chronos' ),
    'all_items' => __( 'All Tags','chronos' ),
    'parent_item' => __( 'Parent Tags','chronos' ),
    'parent_item_colon' => __( 'Parent Tags:','chronos' ),
    'edit_item' => __( 'Edit Tags','chronos' ), 
    'update_item' => __( 'Update Tags','chronos' ),
    'add_new_item' => __( 'Add New Tags','chronos' ),
    'new_item_name' => __( 'New Tags Name','chronos' ),
    'menu_name' => __( 'Tags','chronos' ),
  );     

// Now register the taxonomy

  register_taxonomy('tags',array('Portfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tags' ),
  ));

}

?>