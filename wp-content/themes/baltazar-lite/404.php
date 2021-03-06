<?php get_header(); ?>
<?php $baltazar_data = get_option(OPTIONS); ?>
<!-- top bar with breadcrumb -->
<div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<p><?php  echo baltazar_breadcrumb(); ?></p>
			</div>
		</div>
	</div>
</div> 

<!-- main content start -->			
<div id="mainwrap">
	<div id="main" class="clearfix">
		<div class="content fullwidth errorpage">
			<div class="postcontent">
				<h2><?php baltazar_security($baltazar_data['errorpagetitle']) ?></h2>
				<div class="posttext">
					<?php baltazar_security($baltazar_data['errorpage']) ?>
				</div>
				<div class="homeIcon"><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-home"></i></a></div>
			</div>							
		</div>
	</div>
</div>

<?php get_footer(); ?>