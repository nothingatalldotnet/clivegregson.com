


<?php get_header();
 ?>

<!-- main content start -->
<div class="mainwrap">
	<!--rev slider-->

	<?php $postmeta = get_post_custom(get_the_id()); 
	if(!empty($postmeta["baltazar_sigle_option_revslider"][0]) && function_exists('putRevSlider')) { ?>
		<div id="baltazar-slider-wrapper" class="baltazar-rev-slider">
		<?php putRevSlider(esc_attr($postmeta["baltazar_sigle_option_revslider_alias"][0])); ?>
		</div>
	<?php } ?>
	<div class="blogsingleimage">			
			<?php echo baltazar_getImage(get_the_id(), 'baltazar-postBlock'); ?>
	</div>
	<div class="main clearfix">
		
		<div class="content  singlepage">
			<div class="postcontent">
				<div class="posttext">
<?php
	if(function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<p id="breadcrumbs" style="margin: 0 0;">','</p>');
	}
?>
					<h1><?php the_title(); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="usercontent"><?php the_content(); ?></div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="baltazar-page-navigation">
				<?php wp_link_pages(); ?> 
			</div>
		</div>
		<?php comments_template(); ?>	
	</div>
</div>
<?php get_footer(); ?>