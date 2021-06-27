<?php
	get_header();
?>
<div class="mainwrap">
	<div class="main clearfix">
		<div class="content fullwidth">
			<div class="posttext">
<?php
	if(function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs" style="margin: 0 0;">','</p>');
	}
?>
				<h1>Tour Dates</h1>
			</div>
		</div>
	</div>
</div>
				
<?php
	get_footer();