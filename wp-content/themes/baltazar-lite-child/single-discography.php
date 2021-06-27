<?php
	get_header();
	if(have_posts()) {
		while (have_posts()) {
			the_post(); 
			$post_title = get_the_title();
			$post_info = 
			$post_release = get_field('release_date');
			$post_artist = get_field('artist-band');
			$post_tracklist = get_field('tracklisting');
?>
<style>
	#breadcrumbs {
		border-bottom: solid #292929;
		margin-bottom: 12px !important;
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
	the_content();


	if(have_rows('post_tracklist')) {
		echo '<h2>Tracklisting</h2>';
		echo '<ul>';
		while(have_rows('links') ) {
			the_row();
			$postition = get_sub_field('position');
			$title = get_sub_field('title');
			
			echo '<li><span>'.$position.'</span> - '.$title.'<li>';
		}
		echo '</ul>';
	}

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

