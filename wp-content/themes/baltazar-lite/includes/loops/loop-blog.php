<?php $postmeta = get_post_custom(get_the_id());   ?>
<div class="entry">
	<div class = "meta">		
		<div class="blogContent">
			<div class="blogcontent"><?php the_content('') ?></div>
		
			<div class="bottomBlog">
				<div class="baltazar-read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php esc_attr_e('Continue reading','baltazar') ?></a></div>
				<?php if(baltazar_globals('display_reading')) { ?>
				<div class="blog_time_read">
					<?php if(empty($postmeta["baltazar_sigle_option_recipe"][0])){ ?>
						<?php if(function_exists('ot_estimated_reading_time')) { ?>
							<?php echo esc_attr__('Reading time: ','baltazar') . esc_attr(ot_estimated_reading_time(get_the_ID())) . esc_attr__(' min','baltazar') ; ?>
						<?php } ?>
					<?php } else { ?>
						<?php echo esc_attr__('Cooking time: ','baltazar') . esc_attr(baltazar_recipe('wprm_total_time')) . esc_attr__(' min','baltazar') ; ?>
					<?php } ?>
				</div>
				<?php } ?>
				<!-- end of reading -->
				<?php if(baltazar_globals('display_socials')) { ?>
				<div class="blog_socials">
					<?php  baltazar_socialLinkSingle(get_the_permalink(),get_the_title())  ?>
				</div>
				<?php } ?>	
				<!-- end of socials -->
				<?php if(baltazar_globals('display_post_meta')) { ?>
				<div class="blog_author">
					<a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_attr_e('Written by: ','baltazar'); echo get_the_author(); ?></a>
				</div>
				<?php } ?>				
				<!-- end of author -->
			</div> 
		</div>
	</div>		
</div>
