<?php
/**
 * Plugin Name: Gaurmet Artistry Post Types & Taxonomies
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: Custom Post types to sites.
 * Version:     1.0
 * Author:      Kishan Jasani
 * Author URI:  https://developer.wordpress.org/
 * Text Domain: ga
 * Domain Path: /languages
 * License:     GPL2
 *
 * Gaurmet Artistry Post Types & Taxonomies is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.

 * Gaurmet Artistry Post Types & Taxonomies is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gaurmet Artistry Post Types & Taxonomies. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 *
 * @package Gaurmet_Artistry
 */

/**
 * Register Custom Post Types called 'recipe'.
 *
 * @return void
 */
function ga_recipe_post_type() {
	$labels = array(
		'name'                  => _x( 'Recipes', 'Post type general name', 'ga' ),
		'singular_name'         => _x( 'Recipe', 'Post type singular name', 'ga' ),
		'menu_name'             => _x( 'Recipes', 'Admin Menu text', 'ga' ),
		'name_admin_bar'        => _x( 'Recipe', 'Add New on Toolbar', 'ga' ),
		'add_new'               => __( 'Add New', 'ga' ),
		'add_new_item'          => __( 'Add New Recipe', 'ga' ),
		'new_item'              => __( 'New Recipe', 'ga' ),
		'edit_item'             => __( 'Edit Recipe', 'ga' ),
		'view_item'             => __( 'View Recipe', 'ga' ),
		'all_items'             => __( 'All Recipes', 'ga' ),
		'search_items'          => __( 'Search Recipes', 'ga' ),
		'parent_item_colon'     => __( 'Parent Recipes:', 'ga' ),
		'not_found'             => __( 'No Recipes found.', 'ga' ),
		'not_found_in_trash'    => __( 'No Recipes found in Trash.', 'ga' ),
		'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ga' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ga' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ga' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ga' ),
		'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ga' ),
		'insert_into_item'      => _x( 'Insert into Recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ga' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ga' ),
		'filter_items_list'     => _x( 'Filter Recipe list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ga' ),
		'items_list_navigation' => _x( 'Recipe list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ga' ),
		'items_list'            => _x( 'Recipe list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ga' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'recipe' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-page',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'recipe', $args );
}

/**
 * Register Custom Post Types called 'event'.
 *
 * @return void
 */
function ga_event_post_type() {
	$labels = array(
		'name'                  => _x( 'Events', 'Post type general name', 'ga' ),
		'singular_name'         => _x( 'Event', 'Post type singular name', 'ga' ),
		'menu_name'             => _x( 'Event', 'Admin Menu text', 'ga' ),
		'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'ga' ),
		'add_new'               => __( 'Add New', 'ga' ),
		'add_new_item'          => __( 'Add New Event', 'ga' ),
		'new_item'              => __( 'New Event', 'ga' ),
		'edit_item'             => __( 'Edit Event', 'ga' ),
		'view_item'             => __( 'View Event', 'ga' ),
		'all_items'             => __( 'All Events', 'ga' ),
		'search_items'          => __( 'Search Events', 'ga' ),
		'parent_item_colon'     => __( 'Parent Events:', 'ga' ),
		'not_found'             => __( 'No Events found.', 'ga' ),
		'not_found_in_trash'    => __( 'No Events found in Trash.', 'ga' ),
		'featured_image'        => _x( 'Event Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'ga' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'ga' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'ga' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'ga' ),
		'archives'              => _x( 'Event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'ga' ),
		'insert_into_item'      => _x( 'Insert into Event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'ga' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'ga' ),
		'filter_items_list'     => _x( 'Filter Event list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'ga' ),
		'items_list_navigation' => _x( 'Event list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'ga' ),
		'items_list'            => _x( 'Event list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'ga' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'event' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-calendar-alt',
		'supports'           => array( 'title', 'editor' ),
	);

	register_post_type( 'event', $args );
}

/**
 * Add new taxonomy, Course hierarchical (like category).
 *
 * @return void
 */
function ga_course_taxonomy() {

	$labels = array(
		'name'                  => _x( 'Courses', 'taxonomy general name', 'ga' ),
		'singular_name'         => _x( 'Course', 'taxonomy singular name', 'ga' ),
		'search_items'          => __( 'Search Courses', 'ga' ),
		'all_items'             => __( 'All Courses', 'ga' ),
		'parent_item'           => __( 'Parent Course', 'ga' ),
		'parent_item_colon'     => __( 'Parent Course:', 'ga' ),
		'edit_item'             => __( 'Edit Course', 'ga' ),
		'update_item'           => __( 'Update Course', 'ga' ),
		'add_new_item'          => __( 'Add New Course', 'ga' ),
		'new_item_name'         => __( 'New Course Name', 'ga' ),
		'choose_from_most_used' => __( 'Choose from the most used Courses', 'ga' ),
		'not_found'             => __( 'No Courses found.', 'ga' ),
		'menu_name'             => __( 'Courses', 'ga' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'course' ),
	);

	register_taxonomy( 'course', 'recipe', $args );
}

/**
 * Add new taxonomy Meal Type, hierarchical (like Category).
 *
 * @return void
 */
function ga_meal_type_taxonomy() {

	$labels = array(
		'name'                  => _x( 'Meal Type', 'taxonomy general name', 'ga' ),
		'singular_name'         => _x( 'Meal Type', 'taxonomy singular name', 'ga' ),
		'search_items'          => __( 'Search Meal Types', 'ga' ),
		'all_items'             => __( 'All Meal Types', 'ga' ),
		'parent_item'           => __( 'Parent Meal Type', 'ga' ),
		'parent_item_colon'     => __( 'Parent Meal Type:', 'ga' ),
		'edit_item'             => __( 'Edit Meal Type', 'ga' ),
		'update_item'           => __( 'Update Meal Type', 'ga' ),
		'add_new_item'          => __( 'Add New Meal Type', 'ga' ),
		'new_item_name'         => __( 'New Meal Type Name', 'ga' ),
		'choose_from_most_used' => __( 'Choose from the most used Meal Types', 'ga' ),
		'not_found'             => __( 'No Meal Types found.', 'ga' ),
		'menu_name'             => __( 'Meal Types', 'ga' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'meal' ),
	);

	register_taxonomy( 'meal-type', 'recipe', $args );
}

/**
 * Add new taxonomy, Mood NOT hierarchical (like tags).
 *
 * @return void
 */
function ga_mood_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Mood', 'taxonomy general name', 'ga' ),
		'singular_name'              => _x( 'Mood', 'taxonomy singular name', 'ga' ),
		'search_items'               => __( 'Search Moods', 'ga' ),
		'popular_items'              => __( 'Popular Moods', 'ga' ),
		'all_items'                  => __( 'All Moods', 'ga' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Mood', 'ga' ),
		'update_item'                => __( 'Update Mood', 'ga' ),
		'add_new_item'               => __( 'Add New Mood', 'ga' ),
		'new_item_name'              => __( 'New Mood Name', 'ga' ),
		'separate_items_with_commas' => __( 'Separate Moods with commas', 'ga' ),
		'add_or_remove_items'        => __( 'Add or remove Moods', 'ga' ),
		'choose_from_most_used'      => __( 'Choose from the most used Moods', 'ga' ),
		'not_found'                  => __( 'No Moods found.', 'ga' ),
		'menu_name'                  => __( 'Moods', 'ga' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'mood' ),
	);
	register_taxonomy( 'mood', 'recipe', $args );
}

add_action( 'init', 'ga_recipe_post_type' );
add_action( 'init', 'ga_event_post_type' );
add_action( 'init', 'ga_course_taxonomy' );
add_action( 'init', 'ga_meal_type_taxonomy' );
add_action( 'init', 'ga_mood_taxonomy' );
