<?php
	get_header();
?>
<div class="mainwrap">
	<div class="main clearfix">
		<div class="content singlepage">
			<div class="posttext" style="float:none;">
<?php
	if(function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs" style="margin: 0 0;">','</p>');
	}
?>
				<h1>404!</h1>
				<p>Oh no! That page doesnt exist!</p>
			</div>
		</div>
	</div>
</div>
<?php
	get_footer();





