<?php
	if(function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => 'Tour Dates Settings',
			'menu_title' => 'Tour Dates Settings',
			'menu_slug' => 'tour-settings',
			'capability' => 'edit_posts',
			'parent_slug' => 'edit.php?post_type=tour',
			'autoload' => true
		));

		acf_add_options_page(array(
			'page_title' => 'Discography Settings',
			'menu_title' => 'Discography Settings',
			'menu_slug' => 'discog-settings',
			'capability' => 'edit_posts',
			'parent_slug' => 'edit.php?post_type=discography',
			'autoload' => true
		));
	}