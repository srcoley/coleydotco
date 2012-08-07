<?php

add_action( 'init', 'cpt' );

function cpt() {
	register_cpt_taxonomy();
	register_cpt_project();
}

function register_cpt_project() {

    $labels = array( 
        'name' => _x( 'Projects', 'project' ),
        'singular_name' => _x( 'Project', 'project' ),
        'add_new' => _x( 'Add New', 'project' ),
        'add_new_item' => _x( 'Add New Project', 'project' ),
        'edit_item' => _x( 'Edit Project', 'project' ),
        'new_item' => _x( 'New Project', 'project' ),
        'view_item' => _x( 'View Project', 'project' ),
        'search_items' => _x( 'Search Projects', 'project' ),
        'not_found' => _x( 'No projects found', 'project' ),
        'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
        'parent_item_colon' => _x( 'Parent Project:', 'project' ),
        'menu_name' => _x( 'Projects', 'project' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor' ),
        //'taxonomies' => array( 'folders'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}

function register_cpt_taxonomy() {
	$labels = array(
		 'name'                          => 'Folders',
		 'singular_name'                 => 'Folder',
		 'search_items'                  => 'Search Folders',
		 'popular_items'                 => 'Popular Folders',
		 'all_items'                     => 'All Folders',
		 'parent_item'                   => 'Parent Folder',
		 'edit_item'                     => 'Edit Folder',
		 'update_item'                   => 'Update Folder',
		 'add_new_item'                  => 'Add New Folder',
		 'new_item_name'                 => 'New Folder',
		 'separate_items_with_commas'    => 'Separate Folders with commas',
		 'add_or_remove_items'           => 'Add or remove Folders',
		 'choose_from_most_used'         => 'Choose from most used Folders'
		 );

	$args = array(
		 'label'                         => 'Folders',
		 'labels'                        => $labels,
		 'public'                        => true,
		 'hierarchical'                  => true,
		 'show_ui'                       => true,
		 'show_in_nav_menus'             => true,
		 'args'                          => array( 'orderby' => 'term_order' ),
		 'rewrite'                       => array( 'slug' => 'projects/folders', 'with_front' => false ),
		 'query_var'                     => true
	 );

	//register_taxonomy( 'folder', 'project', array( 'hierarchical' => true, 'label' => 'Folder', 'query_var' => true, 'rewrite' => true ) );
	

	register_taxonomy( 'folder', 'project', $args );
	
}

/**
 * Sets the post excerpt length.
 */
function excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'excerpt_length' );

/**
 * Replaces "[...]".
 */
function auto_excerpt_more( $more ) {
	return ' &hellip;' . ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) . '</a>';
}
add_filter( 'excerpt_more', 'auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) . '</a>';
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 */
function remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'remove_gallery_css' );


/**
 *	Widget Areas
 */
function widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'boilerplate' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'boilerplate' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running boilerplate_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'widgets_init' );


if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

?>
