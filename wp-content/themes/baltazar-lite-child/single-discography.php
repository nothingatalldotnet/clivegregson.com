<?php
	get_header();
	if(have_posts()) {
		while (have_posts()) {
			the_post(); 
			$post_id = get_the_ID();
			$post_title = get_the_title();
			$post_release = get_field('release_date');
			$post_artist = get_field('artist-band');
			$post_tracklist = get_field('tracklisting');
			$post_image = get_the_post_thumbnail_url($post_id, 'discog-thumbnail');
			$post_content = get_the_content();

?>
<style>
	#breadcrumbs {
		border-bottom: solid #292929;
		margin-bottom: 12px !important;
	}

	.row {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		width: 100%;
	}

	.col {
		display: flex;
		flex-direction: column;
		flex-basis: 100%;
		flex: 1;
	}

	.col img {
		margin-left: 20px;
	}

	ul {
		list-style: none;
	}
</style>


<div class="mainwrap">
	<div class="main clearfix">
		<div class="content singlepage">
			<div class="posttext" style="float:none;">
<?php
	if(function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs" style="margin: 0 0;">','</p>');
	}

	echo '<h1>'.$post_artist.' - '.$post_title.'</h1>';

	echo '<div class="row">';
	if(have_rows('tracklisting')) {
		echo '<div class="col">';
		echo '	<h2>Tracklisting</h2>';
		echo '	<ul>';
		while(have_rows('tracklisting') ) {
			the_row();
			$position = get_sub_field('position');
			$title = get_sub_field('title');
			echo '<li><span>'.$position.'</span> - '.$title.'</li>';
		}
		echo '	</ul>';
		echo '</div>';
		echo '<div class="col">';
		echo '	<img src="'.$post_image.'">';
		echo '</div>';

		echo wpautop($post_content);

	} else {
		echo '<div class="col">';
		the_content();
		echo '</div>';
		echo '<div class="col">';
		echo '	<img src="'.$post_image.'">';
		echo '</div>';
	}
	echo '</div>';

	






	if(have_rows('links')) {
		echo '<h2>Useful Links</h2>';
		echo '<ul>';
		while(have_rows('links') ) {
			the_row();
			$link = get_sub_field('link');
			$title = get_sub_field('title');

			echo '<li><span>'.$title.'</span> - <a href="'.$link.'" target="_blank" title="'.$title.'">'.$link.'</a></li>';
		}
		echo '</ul>';
	}

?>

			</div>
		</div>
	</div>
</div>
	
<?php
		}
	}

