<?php

### Function: Page Navigation: Boxed Style Paging
function baltazar_wp_pagenavi($before = '', $after = '') {
	global $wpdb, $wp_query;
	
	$pagenavi_options = array(
		'current_text' => '%PAGE_NUMBER%',
		'page_text' => '%PAGE_NUMBER%',
		'dotright_text' => '...',
		'dotleft_text' => '...',
		'style' => 1,
		'num_pages' => 4,
		'always_show' => 0,
		'num_larger_page_numbers' => 3,
		'larger_page_numbers_multiple' => 10,
		'use_pagenavi_css' => 1,
	);
	add_option('pagenavi_options', $pagenavi_options);
	if (is_single()) 
		return;
	$pagenavi_options = get_option('pagenavi_options');
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = intval($wp_query->max_num_pages);
	if (empty($paged) || $paged == 0)
		$paged = 1;
	$pages_to_show = intval(4);
	$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
	$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if ($start_page <= 0)
		$start_page = 1;
	$end_page = $paged + $half_page_end;
	if (($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if ($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if ($start_page <= 0)
		$start_page = 1;
	$larger_pages_array = array();
	if ( $larger_page_multiple )
		for ( $i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple )
			$larger_pages_array[] = $i;
	if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
		$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), esc_attr__('Page %CURRENT_PAGE% of %TOTAL_PAGES%','baltazar'));
		$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
		echo '<div class="wp-pagenavi">'."\n";
		switch(intval($pagenavi_options['style'])) {
			// Normal
			case 1:
				if (!empty($pages_text)) {
					echo '<span class="pages">'.$pages_text.'</span>';
				}
				if ($start_page >= 2 && $pages_to_show < $max_page) {
					$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), esc_attr__('&laquo; First','baltazar'));
					echo '<a href="'.get_pagenum_link().'" class="first" title="'.$first_page_text.'">'.$first_page_text.'</a>';
					if (!empty($pagenavi_options['dotleft_text'])) {
						echo '<span class="extend">'.$pagenavi_options['dotleft_text'].'</span>';
					}
				}
				$larger_page_start = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="'.get_pagenum_link($larger_page).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
						$larger_page_start++;
					}
				}
				previous_posts_link(esc_attr__('&laquo;','baltazar'));
				for($i = $start_page; $i  <= $end_page; $i++) {						
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<span class="current">'.$current_page_text.'</span>';
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<a href="'.get_pagenum_link($i).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
					}
				}
				next_posts_link(esc_attr__('&raquo;','baltazar'), $max_page);
				$larger_page_end = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="'.get_pagenum_link($larger_page).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
						$larger_page_end++;
					}
				}
				if ($end_page < $max_page) {
					if (!empty($pagenavi_options['dotright_text'])) {
						echo '<span class="extend">'.$pagenavi_options['dotright_text'].'</span>';
					}
					$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), esc_attr__('Last &raquo;','baltazar'));
					echo '<a href="'.get_pagenum_link($max_page).'" class="last" title="'.$last_page_text.'">'.$last_page_text.'</a>';
				}
				break;
	
			
		}
		echo '</div>'.$after."\n";
	}
}

### Function: Round To The Nearest Value
function n_round($num, $tonearest) {
   return floor($num/$tonearest)*$tonearest;
}
### Function: Filters for Previous and Next Posts Link CSS Class
add_filter('previous_posts_link_attributes','previous_posts_link_class');
function previous_posts_link_class() {
	return 'class="previouspostslink"';
}
add_filter('next_posts_link_attributes','next_posts_link_class');
function next_posts_link_class() {
	return 'class="nextpostslink"';
}
