<?php

$post_categories = wp_get_post_categories( get_the_ID() );
$cats = array();
     
foreach($post_categories as $c){
    $cat = get_category( $c );
    $cats[] = $cat->term_id;
}
$cats = implode(",", $cats);


$args = array( 
		'category__and' => $cats,
		'posts_per_page' => 50,
		'orderby' => 'rand',
		'exclude' => array( get_the_id(),
		
		)
	);

$postslist = get_posts( $args ); 
$postmeta = get_post_custom(get_the_id());  
$baltazar_fullwidth = !empty($postmeta["baltazar_sigle_option_fullwidth"][0]) ? $postmeta["baltazar_sigle_option_fullwidth"][0] : '';
?>

<?php if(baltazar_globals('display_related') && count($postslist) > 0) { ?>



	<div class="relatedPosts <?php if(baltazar_globals('use_fullwidth') || baltazar_globals('singe_fullwidth') || !empty($baltazar_fullwidth)) echo 'baltazar_fullwidth' ?>">
		<div class="relatedtitle">
			<h4><?php  esc_attr_e('Related Posts','baltazar'); ?></h4>
		</div>
		<div class="related">	
		<?php
		$count = 0;
		foreach($postslist as $baltazar_post) {
			$image_related = '';
			setup_postdata( $baltazar_post );
			if(!has_post_format( 'quote' , $baltazar_post->ID) && !has_post_format( 'link' , $baltazar_post->ID)) {
			if(baltazar_getImage($baltazar_post->ID, 'baltazar-related') !=''){
				$image_related = baltazar_getImage($baltazar_post->ID, 'baltazar-related');
			}
			if($count != 2){ ?>
				<div class="one_third">
			<?php } else { ?>
				<div class="one_third last">
			<?php } ?>
					<?php if(!empty($image_related)){ ?>
						<div class="image"><a href="<?php echo esc_url(get_permalink($baltazar_post->ID)) ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','baltazar')?> <?php echo esc_attr($baltazar_post->post_title); ?>"><?php baltazar_security($image_related) ?></a></div>
					<?php } ?>
					<h4><a href="<?php echo esc_url(get_permalink($baltazar_post->ID)) ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','baltazar')?> <?php echo esc_attr($baltazar_post->post_title); ?>"><?php echo esc_attr($baltazar_post->post_title); ?></a></h4>
					<?php
					$day = get_the_time('d',$baltazar_post->ID);
					$month= get_the_time('m',$baltazar_post->ID);
					$year= get_the_time('Y',$baltazar_post->ID);
					
					?>
					<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php echo esc_attr(date('F j, Y', strtotime($baltazar_post->post_date))) ?></a>						
				</div>
					
			<?php 
			$count++;
			if($count == 3) {break;}
			}
	} ?>
		</div>
	</div>
	<?php  wp_reset_postdata(); ?>	
<?php } ?> <!-- end of related -->