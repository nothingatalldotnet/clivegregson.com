<?php


function set_discography_columns($columns) {
	$columns['artist'] = __('Artist/Band', 'cg');
	return $columns;
}
add_filter('manage_discography_posts_columns', 'set_discography_columns');

function set_tour_columns($columns) {
	$columns['tour-date'] = __('Tour Date', 'cg');
	return $columns;
}
add_filter('manage_tour_posts_columns', 'set_tour_columns');

function discography_column($column, $post_id) {
	switch ($column) {
		case 'artist' :
			$artist = get_field('artist-band',$post_id);
			echo $artist;
			break;
	}
}
add_action('manage_discography_posts_custom_column' , 'discography_column', 10, 2 );

function tour_column($column, $post_id) {
	switch ($column) {
		case 'tour-date' :
			$date = get_field('date',$post_id);
			echo $date;
			break;
	}
}
add_action('manage_tour_posts_custom_column' , 'tour_column', 10, 2 );
