	<?php if(baltazar_data('excpert_lenght')){ $short = baltazar_data('excpert_lenght');}else{$short = 25;} ?>
	<div class="entry grid">
		<div class = "meta">		
			<div class="blogContent">
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_attr__( ' ', 'baltazar' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','baltazar')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php get_template_part('includes/loops/loop-meta-blog','category-grid'); ?>
				</div>				
				<div class="blogcontent"><?php echo wp_trim_words(do_shortcode(get_the_content()),$short,'...') ?></div>
			<?php if(baltazar_globals('display_post_meta')) { ?>
			
				<div class="bottomBlog">
			

					
					 <!-- end of socials -->
					
					<?php if(baltazar_globals('display_reading')) { ?>
					<div class="blog_time_read">
						<?php if(function_exists('ot_estimated_reading_time')) { ?>
							<?php echo esc_attr__('Reading time: ','baltazar') . esc_attr(ot_estimated_reading_time(get_the_ID())) . esc_attr__(' min','baltazar') ; ?>
						<?php } ?>
					</div>
					<?php } ?>
					<!-- end of reading -->
					<div class="baltazar-read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to ','baltazar'); ?><?php the_title_attribute(); ?>"><?php esc_attr_e('Continue reading','baltazar') ?></a></div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				</div> 
		
		<?php } ?> <!-- end of bottom blog -->
			</div>
		</div>		
	</div>
