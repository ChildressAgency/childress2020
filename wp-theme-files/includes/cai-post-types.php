<?php
if(!defined('ABSPATH')){ exit; }

function cai_create_post_types(){
  $case_study_labels = array(
    'name' => esc_html_x('Case Studies', 'post type name', 'cai'),
    'singular_name' => esc_html_x('Case Study', 'post type singular name', 'cai'),
    'menu_name' => esc_html_x('Case Studies', 'post type menu name', 'cai'),
    'add_new_item' => esc_html__('Add New Case Study', 'cai'),
    'search_items' => esc_html__('Search Case Studies', 'cai'),
    'edit_item' => esc_html__('Edit Case Study', 'cai'),
    'view_item' => esc_html__('View Case Study', 'cai'),
    'all_items' => esc_html__('All Case Studies', 'cai'),
    'new_item' => esc_html__('New Case Study', 'cai'),
    'not_found' => esc_html__('No Case Studies Found', 'cai')
  );

  $case_study_args = array(
    'labels' => $case_study_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-awards',
    'query_var' => 'case_studies',
    'has_archive' => false,
    'show_in_rest' => true,
    //'taxonomies' => array('category'),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'revisions', 
      'thumbnail'
    )
  );
  register_post_type('case_studies', $case_study_args);

  register_taxonomy(
    'case_study_categories',
    'case_studies',
    array(
      'hierarchical' => true,
      'show_admin_column' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => esc_html__('Case Study Categories', 'cai'),
        'singular_name' => esc_html__('Case Study Category', 'cai'),
        'all_items' => esc_html__('All Case Study Categories', 'cai'),
        'edit_item' => esc_html__('Edit Case Study Category', 'cai'),
        'view_item' => esc_html__('View Case Study Category', 'cai'),
        'update_item' => esc_html__('Update Case Study Category', 'cai'),
        'add_new_item' => esc_html__('Add New Case Study Category', 'cai'),
        'parent_item' => esc_html__('Parent Case Study Category', 'cai'),
        'search_items' => esc_html__('Search Case Study Categories', 'cai'),
        'popular_items' => esc_html__('Popular Case Study Categories', 'cai'),
        'add_or_remove_item' => esc_html__('Add or Remove Case Study Category', 'cai'),
        'not_found' => esc_html__('No Case Study Categories Found', 'cai'),
        'back_to_items' => esc_html__('Back to Case Study Categories', 'cai')
      )
    )
  );

  $location_labels = array(
    'name' => esc_html_x('Locations', 'post type name', 'cai'),
    'singular_name' => esc_html_x('Location', 'post type singular name', 'cai'),
    'menu_name' => esc_html_x('Locations', 'post type menu name', 'cai'),
    'add_new_item' => esc_html__('Add New Location', 'cai'),
    'search_items' => esc_html__('Search Locations', 'cai'),
    'edit_item' => esc_html__('Edit Location', 'cai'),
    'view_item' => esc_html__('View Location', 'cai'),
    'all_items' => esc_html__('All Locations', 'cai'),
    'new_item' => esc_html__('New Location', 'cai'),
    'not_found' => esc_html__('No Locations Found', 'cai')
  );

  $location_args = array(
    'labels' => $location_labels,
    'capability_type' => 'post',
    'public' => true,
    'menu_position' => 7,
    'menu_icon' => 'dashicons-store',
    'query_var' => 'location',
    'has_archive' => false,
    'show_in_rest' => true,
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'revisions',
      'thumbnail'
    )
  );
  register_post_type('location', $location_args);

  register_taxonomy(
    'state',
    'location',
    array(
      'hierarchical' => true,
      'show_admin_column' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => esc_html__('States', 'cai'),
        'singular_name' => esc_html__('State', 'cai'),
        'all_items' => esc_html__('All State', 'cai'),
        'edit_item' => esc_html__('Edit State', 'cai'),
        'view_item' => esc_html__('View State', 'cai'),
        'update_item' => esc_html__('Update State', 'cai'),
        'add_new_item' => esc_html__('Add New State', 'cai'),
        'parent_item' => esc_html__('Parent State', 'cai'),
        'search_items' => esc_html__('Search States', 'cai'),
        'popular_items' => esc_html__('Popular State', 'cai'),
        'add_or_remove_item' => esc_html__('Add or Remove State', 'cai'),
        'not_found' => esc_html__('No States Found', 'cai'),
        'back_to_items' => esc_html__('Back To States', 'cai')
      )
    )
  )
}