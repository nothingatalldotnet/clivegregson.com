<?php
	get_header();
?>

<style>
	.usercontent {
		display: flex;
		flex-wrap: wrap;
		align-items: stretch;
	}
	.card {
		position: relative;
		flex: 0 0 200px;
		margin: 7px;
		border: 1px solid #ccc;
		box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
	} 
	.card img {
		max-width: 100%;
	}
	.card .text {
		padding: 0 20px 20px;
		height: 100%;
	}
	.card .text a {
		background: gray;
		border: 0;
		color: white;
		padding: 10px;
		text-align: center;
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
?>
				<h1>Discography</h1>
				

<?php
	echo get_field('discography_information','option');


	////////////
	$group_array = array();
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			$this_artist = get_field('artist-band');

			if(!in_array($this_artist, $group_array)) {
				$group_array[] = $this_artist;
			}
		}
	}

	$group_array = array_unique($group_array);
	sort($group_array);

	for($i=0; $i < count($group_array); $i++) {
		$args = array(
			'numberposts' => -1,
			'post_type' => 'discography',
			'meta_key' => 'artist-band',
			'meta_value' => $group_array[$i]
		);
		$query = new WP_Query($args);

		if($query->have_posts()) {
			echo '<h2>'.$group_array[$i].'</h2>';
			echo '<div class="usercontent">';
			while($query->have_posts()) {
				$query->the_post();
				$this_id = get_the_id();
				$this_permalink = get_the_permalink();
				$this_image = get_the_post_thumbnail($this_id, 'discog-thumbnail');
				$this_title = get_the_title();
				$this_artist = get_field('artist-band');
?>
	<article class="card">
		<?php echo $this_image; ?>
		<div class="text">
			<h3><?php echo $this_artist; ?></h3>
			<h4><?php echo $this_title; ?></h4>
			<a href="<?php echo $this_permalink; ?>">More Info</a>
		</div>
	</article>
<?php
			}
			echo '</div>';
		}
	}
?>
			</div>
		</div>
	</div>
</div>
<?php
	get_footer();
	