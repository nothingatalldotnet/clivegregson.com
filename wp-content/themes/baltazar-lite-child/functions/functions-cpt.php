<?php
    function remove_default_post_type() {
        remove_menu_page('edit.php');
    }
    add_action('admin_menu', 'remove_default_post_type');

    function remove_default_post_type_menu_bar($wp_admin_bar) {
        $wp_admin_bar->remove_node('new-post');
    }
    add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

    function remove_draft_widget() {
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }
    add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

    function add_post_types() {

        register_post_type('news', array(
                'labels' => array(
                    'name' => __('News'),
                    'singular_name' => __('News')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'news'),
                'hierarchical' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-admin-post',
                'can_export' => false,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'supports' => array(
                    'title',
                    'thumbnail',
                    'editor',
                    'comments'
                ),
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'excerpt')
            )
        );

        register_post_type('discography', array(
                'labels' => array(
                    'name' => __('Discography'),
                    'singular_name' => __('Discography')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'discography'),
                'hierarchical' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-admin-post',
                'can_export' => false,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'supports' => array(
                    'title',
                    'thumbnail',
                    'editor',
                    'comments'
                ),
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'excerpt')
            )
        );

        register_post_type('tour', array(
                'labels' => array(
                    'name' => __('Tour Dates'),
                    'singular_name' => __('Tour Dates')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'tour-dates'),
                'hierarchical' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_in_admin_bar' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-admin-post',
                'can_export' => false,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'capability_type' => 'post',
                'supports' => array(
                    'title',
                    'thumbnail',
                    'editor',
                    'comments'
                ),
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'excerpt')
            )
        );

    }
    add_action('init', 'add_post_types');