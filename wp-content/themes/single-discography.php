<?php get_header();  ?>
<!-- top bar with breadcrumb and post navigation -->
<?php if (have_posts()) : while (have_posts()) : the_post(); 
	if(function_exists('ot_setPostViews')) { 
		ot_setPostViews(get_the_ID());
	} 
?>
	<div class="mainwrap single-default">
		<div class="main clearfix">	
			<div class="content fullwidth">
				<div class="postcontent singledefult" id="post-<?php  get_the_id(); ?>" <?php post_class(); ?>>		
					<div class="blogpost">				
						<div class="posttext">
<?php
	if(function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs" style="margin: 0 0;">','</p>');
	}
?>
							<div class="blogsingleimage">				
<?php
	echo baltazar_getImage(get_the_id(), 'baltazar-postBlock');
?>
							</div>
<?php
	get_template_part('includes/loops/loop-top-blog','single');
	the_content();
?>
							<div class="blog-info">
								<div class="blog_social"> <?php  baltazar_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
