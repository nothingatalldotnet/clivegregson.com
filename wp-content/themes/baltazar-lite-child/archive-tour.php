<?php
	get_header();
?>
<style>
	.accordion {
	}
	 .accordion dt, .accordion dd {
		 padding: 10px;
		 border: 1px solid #292929;
		 border-bottom: 0;
	}

	.accordion dt {
		background: #292929;
		border-top: 0px solid #292929;
		border-bottom: 0px solid #292929;
	}

	.accordion dt:last-of-type, .accordion dd:last-of-type {
		 border-bottom: 1px solid #292929;
	}

	.accordion dt a {
		color: #ffffff;
	}

	.accordion dt a span {
		color: #ad6c60;
		margin-right: 50px;
	}

	.accordion dt a, .accordion dd a {
		 display: block;
		 font-weight: bold;
	}
	 .accordion dd {
		 border-top: 0;
		 font-size: 12px;
	}
	 .accordion dd:last-of-type {
		 border-top: 1px solid white;
		 position: relative;
		 top: -1px;
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
				<h1>Tour Dates</h1>

				<h2>Current</h2>
<?php
	$date_now = date('Ymd');
    $args = array(
        'post_type' => 'tour',
        'post_status' => 'publish',
        'meta_key' => 'date',
        'order' => 'ASC',
		'orderby' => 'meta_value',
		'meta_query' => array(array(
			'key' => 'date',
			'compare' => '>',
			'value' => $date_now,
		))
	);

    $query = new WP_Query($args);
	if($query->have_posts()) {
		echo '<dl class="accordion">';
		while($query->have_posts()) {
			$query->the_post();
			$date_title = get_the_title();
			$date_date = get_field('date');
			$date_time = get_field('date');
			$date_tickets = get_field('date');
?>
			<dt>
				<a href="">
<?php
	echo '<span>'.$date_date.'</span>';
	echo $date_title;
?>
					
				</a>
			</dt>
			<dd>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.</dd>
<?php
		}
		echo '</dl>';
	} else {

	}
?>

				<h2>Past</h2>

			</div>
		</div>
	</div>
</div>
<script>
	(function($) {
		var allPanels = $('.accordion > dd').hide();

		$('.accordion > dt > a').click(function() {
			allPanels.slideUp();
			$(this).parent().next().slideDown();
			return false;
		});

	})(jQuery);
</script>
<?php
	get_footer();





