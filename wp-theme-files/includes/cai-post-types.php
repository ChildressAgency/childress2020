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
    'taxonomies' => array('category'),
    'supports' => array(
      'title',
      'editor',
      'custom-fields',
      'revisions', 
      'thumbnail'
    )
    );
    register_post_type('case_studies', $case_study_args);
}