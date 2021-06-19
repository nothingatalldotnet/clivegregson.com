<?php
add_action( 'after_setup_theme', 'baltazar_theme_setup' );
function baltazar_theme_setup() {

	/*feed support*/
	add_theme_support( 'automatic-feed-links' );
	/*post thumb support*/
	add_theme_support( 'post-thumbnails' ); // this enable thumbnails and stuffs

	/*title*/
	add_theme_support( 'title-tag' );
	/*lang*/
	load_theme_textdomain( 'baltazar', get_template_directory() . '/lang' );
	/*setting thumb size*/
	add_image_size( 'baltazar-gallery', 120,80, true ); 
	add_image_size( 'baltazar-widget', 360,193, true );
	add_image_size( 'baltazar-postBlock', 1500, 800, true );
	add_image_size( 'baltazar-related', 345,230, true );
	add_image_size( 'baltazar-postGridBlock', 400,245, true );

	register_nav_menus(array(
	
			'baltazar_mainmenu' => esc_attr__('Main Menu','baltazar'),
			'baltazar_respmenu' => esc_attr__('Responsive Menu','baltazar'),	
			'baltazar_scrollmenu' => esc_attr__('Scroll Menu','baltazar'),	
			
	));	
		
		
    register_sidebar(array(
        'id' => 'baltazar_sidebar',
        'name' => esc_attr__('Sidebar main','baltazar'),
        'description' => esc_attr__('This is main sidebar used in category, single post view and all pages with sidebar','baltazar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'baltazar-sidebar-single',
        'name' => esc_attr__('Sidebar for single blog posts','baltazar'),
        'description' => esc_attr__('This sidebar is for single blog posts. You can disable this options via Theme Options','baltazar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
	$baltazar_crypto_top_bar = baltazar_globals('show_crypto_slider_top_bar') ? esc_attr__('You have set SHOW CRYPTO SLIDER IN TOP BAR TO ON: Because of this, you can not use this sidebar!','baltazar') : '';
    register_sidebar(array(
        'id' => 'baltazar_sidebar-top-left',
        'name' => esc_attr__('Top sidebar left','baltazar'),
        'description' => esc_attr__('This sidebar is located above header section and it on the left side.','baltazar'). $baltazar_crypto_top_bar,		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		  

    register_sidebar(array(
        'id' => 'baltazar_sidebar-top-right',
        'name' => esc_attr__('Top sidebar right','baltazar'),
        'description' => esc_attr__('This sidebar is located above header section and it on the right side.','baltazar') . $baltazar_crypto_top_bar,			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		
	
    register_sidebar(array(
        'id' => 'baltazar_sidebar-logo',
        'name' => esc_attr__('Sidebar for advert in logo area','baltazar'),
        'description' => esc_attr__('This sidebar is located inside the header on the right side of logo.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));			

    register_sidebar(array(
        'id' => 'baltazar-sidebar-under-header-left',
        'name' => esc_attr__('Sidebar under header left','baltazar'),
        'description' => esc_attr__('This sidebar is located just after header section on the left side.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'baltazar-sidebar-under-header-right',
        'name' => esc_attr__('Sidebar under header right','baltazar'),
        'description' => esc_attr__('This sidebar is located just after header section on the right side.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'baltazar-sidebar-under-header-fullwidth',
        'name' => esc_attr__('Sidebar under header full width','baltazar'),
        'description' => esc_attr__('This sidebar is located just after header and it is fullwidth.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
	
	
    register_sidebar(array(
        'id' => 'baltazar-sidebar-footer-fullwidth',
        'name' => esc_attr__('Sidebar above footer full width','baltazar'),
        'description' => esc_attr__('This sidebar is located above footer and it is fullwidth.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'baltazar-sidebar-footer-left',
        'name' => esc_attr__('Sidebar above footer left','baltazar'),
        'description' => esc_attr__('This sidebar is located above footer on the left side.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'baltazar-sidebar-footer-right',
        'name' => esc_attr__('Sidebar above footer right','baltazar'),
        'description' => esc_attr__('This sidebar is located above footer on the right side.','baltazar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));			
	
		
 
		
    register_sidebar(array(
        'id' => 'baltazar_footer1',
        'name' => esc_attr__('Footer sidebar 1','baltazar'),
        'description' => esc_attr__('This sidebar is located inside footer as first sidebar.','baltazar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'id' => 'baltazar_footer2',
        'name' => esc_attr__('Footer sidebar 2','baltazar'),
        'description' => esc_attr__('This sidebar is located inside footer as second sidebar.','baltazar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
    
    register_sidebar(array(
        'id' => 'baltazar_footer3',
        'name' => esc_attr__('Footer sidebar 3','baltazar'),
        'description' => esc_attr__('This sidebar is located inside footer as third sidebar.','baltazar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    

	// Responsive walker menu
	class baltazar_Walker_Responsive_Menu extends Walker_Nav_Menu {
		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;		
			$item_output = $attributes = $prepend ='';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( '', array_filter( $classes ), $item ) );			
			$class_names = ' class="'. esc_attr( $class_names ) . '"';			   
			// Create a visual indent in the list if we have a child item.
			$visual_indent = ( $depth ) ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>', $depth) : '';
			// Load the item URL
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
			// If we have hierarchy for the item, add the indent, if not, leave it out.
			// Loop through and output each menu item as this.
			if($depth != 0) {
				$item_output .= '<a '. $class_names . $attributes .'>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>' . $item->title. '</a><br>';
			} else {
				$item_output .= '<a ' . $class_names . $attributes .'>'.$prepend.$item->title. '</a><br>';
			}
			// Make the output happen.
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	
	// Main walker menu	
	class baltazar_Walker_Main_Menu extends Walker_Nav_Menu
	{		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		   $this->curItem = $item;
		   global $wp_query;
		   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		   $class_names = $value = '';
		   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		   $class_names = ' class="'. esc_attr( $class_names ) . '"';
		   $image  = ! empty( $item->custom )     ? ' <img src="'.esc_attr($item->custom).'">' : '';
		   $output .= $indent . '<li id="menu-item-'.rand(0,9999).'-'. $item->ID . '"' . $value . $class_names .'>';
		   $attributes_title  = ! empty( $item->attr_title ) ? ' <i class="fa '  . esc_attr( $item->attr_title ) .'"></i>' : '';
		   $attributes  = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   $prepend = '';
		   $append = '';
		   if($depth != 0)
		   {
				$append = $prepend = '';
		   }
			$item_output = $args->before;
			$item_output .= '<a '. $attributes .'>';
			$item_output .= $attributes_title.$args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $args->link_after;
			$item_output .= '</a>';	
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	

}

define('BOX_PATH', get_template_directory() . '/includes/boxes/');
define('OPTIONS', 'of_options_pmc'); // Name of the database row where your options are stored

add_option('IMPORT_SIGYN_OPTION', 'false');

require_once (get_template_directory() . '/import/plugins/options-importer.php');   // Options panel settings and custom settings
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	if(get_option('IMPORT_SIGYN_OPTION') == 'false'){
		import(get_template_directory() . '/import/options.json');
		update_option('IMPORT_SIGYN_OPTION', 'true');		
	}

}


	

// Build Options

$includes =  get_template_directory() . '/includes/';
$widget_includes =  get_template_directory() . '/includes/widgets/';
/* include custom widgets */
require_once ($widget_includes . 'recent_post_widget.php'); 
require_once ($widget_includes . 'popular_post_widget.php');
require_once ($widget_includes . 'social_widget.php');
require_once ($widget_includes . 'post_widget.php');
require_once ($widget_includes . 'post_slider_widget.php');
require_once ($widget_includes . 'video_widget.php');
/* include scripts */
function baltazar_scripts() {
	/*scripts*/
	wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'),true,false);	
	wp_enqueue_script('retinaimages', get_template_directory_uri() . '/js/retina.min.js', array('jquery'),true,true);		
	wp_enqueue_script('jquery-scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'),true,false);	
	wp_enqueue_script('baltazar-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'),true,false);  	
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),true,true);
	wp_enqueue_script('jquery-cycle-all', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array('jquery'),true,true);		
	wp_register_script('jquery-li-scrollwe', get_template_directory_uri() . '/js/jquery.li-scroller.1.0.js', array('jquery'),true,true);  
	wp_enqueue_script('gistfile', get_template_directory_uri() . '/js/gistfile.js', array('jquery') ,true,true);  
	wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') ,true,false);  	
	wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery') ,true,true);  
	wp_enqueue_script('infinity', get_template_directory_uri() . '/js/infinity.js', array('jquery') ,true,false);  	
	if(baltazar_globals('show_crypto_particles')) {
		wp_enqueue_script('particles', get_template_directory_uri() . '/js/particles.js', array('jquery') ,true,true);  		
	}
	if(function_exists('ot_get_option')) {
		$share_options = ot_get_option( 'single_display_share_select' );
		if(!empty($share_options[0])){	
			wp_enqueue_script('baltazar_addthis', 'https://s7.addthis.com/js/300/addthis_widget.js', array('jquery') ,true,false); 
		}
	}
	if ( is_singular() && get_option( 'thread_comments' ) ) {wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script('jquery-ui-tabs');
	/*style*/
	
	wp_enqueue_style( 'baltazar-style', get_template_directory_uri() . '/style.css' );

	$css_dir = get_template_directory() . '/css/'; // Shorten code, save 1 call
	ob_start(); // Capture all output (output buffering)
	require($css_dir . 'style_options.php'); // Generate CSS
	$css = ob_get_clean(); // Get generated CSS (output buffering)
    wp_add_inline_style( 'baltazar-style', $css );

	
	if(!function_exists('ot_get_option')) {
	$baltazar_data = get_option(OPTIONS); 
	if(isset($baltazar_data['body_font'])){			
		if(($baltazar_data['body_font']['face'] != 'verdana') and ($baltazar_data['body_font']['face'] != 'trebuchet') and 
			($baltazar_data['body_font']['face'] != 'georgia') and ($baltazar_data['body_font']['face'] != 'Helvetica Neue') and 
			($baltazar_data['body_font']['face'] != 'times,tahoma') and ($baltazar_data['body_font']['face'] != 'arial')) {	
				if(isset($baltazar_data['google_body_custom']) && $baltazar_data['google_body_custom'] != ''){
					$font_explode = explode(' ' , $baltazar_data['google_body_custom']);
					$font_body  = '';
					$size = count($font_explode);
					$count = 0;
					if(count($font_explode) > 0){
						foreach($font_explode as $font){
							if($count < $size-1){
								$font_body .= $font_explode[$count].'+';
							}
							else{
								$font_body .= $font_explode[$count];
							}
							$count++;
						}
					}else{
					}
				}else{
					
					$font_body = ucfirst ($baltazar_data['body_font']['face']);
				}					
		}						
	}		
	if(isset($baltazar_data['heading_font'])){			
		if(($baltazar_data['heading_font']['face'] != 'verdana') and ($baltazar_data['heading_font']['face'] != 'trebuchet') and 
			($baltazar_data['heading_font']['face'] != 'georgia') and ($baltazar_data['heading_font']['face'] != 'Helvetica Neue') and 
			($baltazar_data['heading_font']['face'] != 'times,tahoma') and ($baltazar_data['heading_font']['face'] != 'arial')) {	
				if(isset($baltazar_data['google_heading_custom']) && $baltazar_data['google_heading_custom'] != ''){
					$font_explode = explode(' ' , $baltazar_data['google_heading_custom']);
					$font_heading  = '';
					$size = count($font_explode);
					$count = 0;
					if(count($font_explode) > 0){
						foreach($font_explode as $font){
							if($count < $size-1){
								$font_heading .= $font_explode[$count].'+';
							}
							else{
								$font_heading .= $font_explode[$count];
							}
							$count++;
						}
					}else{

					}
				}else{
					$font_heading = $baltazar_data['heading_font']['face'];
				}
		
				$font_heading = '|'.ucfirst ($font_heading);		
		}						
	}
	if(!empty($baltazar_data['menu_font'])){			
		$font_explode = explode(' ' , esc_attr($baltazar_data['menu_font']['face']));
		$font_menu  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_menu .= $font_explode[$count].'+';
				}
				else{
					$font_menu .= $font_explode[$count];
				}
				$count++;
			}
		}else{
			$font_menu = esc_attr($baltazar_data['menu_font']['face']);
		}
		$font_menu = '|'. ucfirst ($baltazar_data['menu_font']['face']);		
	}	
	

	wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family='.$font_body . $font_heading . $font_menu . $font_quote, false);	
	}
}
add_action( 'wp_enqueue_scripts', 'baltazar_scripts' );



function baltazar_load_admin_style() {
	wp_enqueue_style( 'baltazar-style-admin', get_template_directory_uri() . '/css/admin_style.css' );
}

add_action( 'admin_enqueue_scripts', 'baltazar_load_admin_style' );
require_once ($includes . 'class-tgm-plugin-activation.php');



/*add boxed to body class*/

add_filter('body_class','baltazar_body_class');

function baltazar_body_class($classes) {
	$baltazar_data = get_option(OPTIONS);
	$class = '';
	if(!empty($baltazar_data['use_boxed'])){
		$classes[] = 'baltazar_boxed';
		$classes[] = 'particles-js';
	}
	if(baltazar_globals('use_fullwidth')) {
		$classes[] = 'baltazar_fullwidth';
	}
	return $classes;
}

/* custom breadcrumb */
function baltazar_breadcrumb($title = false) {
	$baltazar_data = get_option(OPTIONS);
	$breadcrumb = '';
	if (!is_home()) {
		if (is_single()) {
			if (is_single()) {
				$name = '';
				if($title == false){
					$breadcrumb .= $name .' <span>'. get_the_title().'</span>';
				}
				else{
					$breadcrumb .= get_the_title();
				}
			}	
		} elseif (is_page()) {
			$breadcrumb .=  '<span>'.get_the_title().'</span>';
		}
		else if(is_tag()){
			$tag = get_query_var('tag');
			$tag = str_replace('-',' ',$tag);
			$breadcrumb .=  '<span>'.$tag.'</span>';
		}
		else if(is_search()){
			$breadcrumb .= esc_attr__('Search results for ', 'baltazar') .'<span>'.get_search_query().'</span>';			
		} 
		else if(is_category()){
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$breadcrumb .=  '<span>'.$cat->name.'</span>';
		}
		else if(is_archive()){
			$breadcrumb .=  '<span>'.esc_attr__('Archive','baltazar').'</span>';
		}	
		else{
			$breadcrumb .=  esc_attr__('Home','baltazar');
		}

	}
	return $breadcrumb ;
}

/*remove post type from search*/
add_action( 'init', 'baltazar_remove_from_search', 99 );
 
function baltazar_remove_from_search() {
	global $wp_post_types;
	if ( post_type_exists( 'essential_grid' ) ) {
	    // exclude from search results
		$wp_post_types['essential_grid']->exclude_from_search = true;
	}
	if ( post_type_exists( 'nutrition-label' ) ) {
		// exclude from search results
		$wp_post_types['nutrition-label']->exclude_from_search = true;
	}	
}


/* social share links */
function baltazar_socialLinkSingle($link,$title) {
	if(function_exists('ot_get_option')) {
		$social = '';
		$social  .= '<div class="addthis_toolbox">';
		$social .= '<div class="baltazar-share">' . esc_attr__('Share: ','baltazar') .  '</div><div class="custom_images">';
		$share_options = ot_get_option( 'single_display_share_select' );
		if(!empty($share_options[0])){
		$social .= '<a class="addthis_button_facebook" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'" ><i class="fa fa-facebook"></i></a>';
		}
		if(!empty($share_options[1])){
		$social .= '<a class="addthis_button_twitter" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-twitter"></i></a>';  
		}
		if(!empty($share_options[2])){
		$social .= '<a class="addthis_button_google_plusone_share" addthis:url="'.esc_url($link).'" g:plusone:count="false" addthis:title="'.esc_attr($title).'"><i class="fa fa-google-plus"></i></a>'; 	
		}	
		if(!empty($share_options[3])){
		$social .= '<a class="addthis_button_pinterest_share" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-pinterest"></i></a>'; 
		}
		if(!empty($share_options[4])){
		$social .= '<a class="addthis_button_stumbleupon" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-stumbleupon"></i></a>';
		}
		if(!empty($share_options[5])){
		$social .= '<a class="addthis_button_vk" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-vk"></i></a>';
		}	
		if(!empty($share_options[6])){
		$social .= '<a class="addthis_button_whatsapp" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-whatsapp"></i></a>';
		}	
		$social .='</div>';	
		$social .= '</div>'; 
		baltazar_security($social);
	}
	
	
}
/* links to social profile */
function baltazar_socialLink() {
	$social = '';
	$baltazar_data = get_option(OPTIONS); 
	$icons = $baltazar_data['socialicons'];
	if(is_array($icons)){
		foreach ($icons as $icon){
			$social .= '<a target="_blank"  href="'.esc_url($icon['link']).'" title="'.esc_attr($icon['title']).'"><i class="fa '.esc_attr($icon['url']).'"></i></a>';	
		}
	}
	baltazar_security($social);
}

function baltazar_security($string){
	echo wp_kses(stripslashes($string),array('i' => array('class'=>array()),'button' => array('class'=>array()),'h3' => array('class'=>array()),'h4' => array('class'=>array()),'form' => array('id' => array(),'method'=>array(),'action'=>array()),'ul' => array('id' => array(),'class'=>array()),'li' => array('id' => array(),'class'=>array()), 'img' => array('src' => array(),'alt'=>array()),'a' => array('href' => array(),'target'=> array(), 'title' =>array(),'class'=>array(),'ddthis:url'=>array(),'addthis:title'=>array()),'span' => array(),'div' => array('data-condition'=> array(),'data-operator'=> array(),'class' => array(),'id' => array()),'b' => array(),'strong' => array(),'br' => array(),'p' => array())); 

}

if( !function_exists( 'baltazar_fallback_menu' ) )
{

	function baltazar_fallback_menu()
	{
		echo "<div class='fallback_menu'>";
		echo "<ul class='Baltazar_fallback menu'>";
		echo "<li><a href='".esc_url(esc_url(home_url('/')))."'>".esc_attr__('Home','baltazar')."</a></li>";
		wp_list_pages('title_li=&sort_column=menu_order');
		echo "</ul></div>";
	}
}

/* get image from post */
function baltazar_getImage($id, $image){
	$return = '';
	if ( has_post_thumbnail($id) ){
		$return = get_the_post_thumbnail($id,$image);
		}
	else
		$return = '';
	
	return 	$return;
}

if ( ! isset( $content_width ) ) $content_width = 1180;

/*script for search text*/
function baltazar_add_this_script_footer(){ 

	$baltazar_script = '	
		"use strict"; 
		jQuery(document).ready(function($){	
			jQuery(".searchform #s").attr("value","'. esc_attr__("Search and hit enter...","baltazar").'");	
			jQuery(".searchform #s").focus(function() {
				jQuery(".searchform #s").val("");
			});
			
			jQuery(".searchform #s").focusout(function() {
				if(jQuery(".searchform #s").attr("value") == "")
					jQuery(".searchform #s").attr("value","'. esc_attr__("Search and hit enter...","baltazar") .'");
			});		
			';	
			
			if(baltazar_globals('show_crypto_particles')) {
			$baltazar_script .= '
			particlesJS("particles-js", {
			  "particles": {
				"number": {
				  "value": 10,
				  "density": {
					"enable": true,
					"value_area": 100
				  }
				},
				"color": {
				  "value": "'.baltazar_data("crypto_particles_color").'"
				},
				"shape": {
				  "type": "circle",
				  "stroke": {
					"width": 0,
					"color": "'.baltazar_data("crypto_particles_color").'"
				  },
				  "polygon": {
					"nb_sides": 5
				  },

				},
				"opacity": {
				  "value": 0.5,
				  "random": false,
				  "anim": {
					"enable": false,
					"speed": 1,
					"opacity_min": 0.1,
					"sync": false
				  }
				},
				"size": {
				  "value": 3,
				  "random": true,
				  "anim": {
					"enable": false,
					"speed": 40,
					"size_min": 0.1,
					"sync": false
				  }
				},
				"line_linked": {
				  "enable": true,
				  "distance": 100,
				  "color": "'.baltazar_data("crypto_particles_color").'",
				  "opacity": 0.4,
				  "width": 1
				},
				"move": {
				  "enable": true,
				  "speed": 6,
				  "direction": "none",
				  "random": false,
				  "straight": false,
				  "out_mode": "out",
				  "bounce": false,
				  "attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 1200
				  }
				}
			  },
			  "interactivity": {
				"detect_on": "canvas",
				"events": {
				  "onhover": {
					"enable": true,
					"mode": "grab"
				  },
				  "onclick": {
					"enable": true,
					"mode": "push"
				  },
				  "resize": true
				},
				"modes": {
				  "grab": {
					"distance": 100,
					"line_linked": {
					  "opacity": 1
					}
				  },
				  "bubble": {
					"distance": 30,
					"size": 40,
					"duration": 2,
					"opacity": 8,
					"speed": 3
				  },
				  "repulse": {
					"distance": 200,
					"duration": 0.4
				  },
				  "push": {
					"particles_nb": 4
				  },
				  "remove": {
					"particles_nb": 2
				  }
				}
			  },
			  "retina_detect": true
			});';
			}
				
		$baltazar_script .= '});';	

	wp_add_inline_script( 'baltazar-custom', $baltazar_script );
}

add_action( 'wp_enqueue_scripts', 'baltazar_add_this_script_footer' );



/* baltazar security for escaping variables*/


/* SEARCH FORM */
function baltazar_search_form( $form ) {
	$form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<i class="fa fa-search search-desktop"></i>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'baltazar_search_form' );


/*change excerpt end display*/
function baltazar_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'baltazar_excerpt_more' );


add_filter( 'the_content_more_link', 'baltazar_modify_read_more_link' );
function baltazar_modify_read_more_link() {
	$postmeta = get_post_custom(get_the_id()); 
	/*if not recipe post*/
	if(empty($postmeta["baltazar_sigle_option_recipe"][0])){
		return '<div class="baltazar-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_attr__('Continue reading','baltazar').'</a></div>';
	/*if recipe post*/
	 } else { 
		return '<div class="baltazar-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_attr__('Check out the recipe','baltazar').'</a></div>'; 
	} 	
}
/* get recipe meta*/
function baltazar_recipe($meta){
	if(class_exists('WPRM_Recipe_Manager')){
		$post_content = get_post(get_the_id());
		$content = $post_content->post_content;
		$recipes = WPRM_Recipe_Manager::get_recipe_ids_from_content( $content  );
		$recipe_out = WPRM_Recipe_Manager::get_recipe( $recipes[0]);
		$recipe = new WPRM_Recipe($recipes[0]);
		$recipe_meta = get_post_custom( $recipes[0] );
		if($meta == 'wprm_rating'){
			$rating = unserialize( $recipe_meta['wprm_rating'][0]);
			if($rating['count'] > 0 ){
				$rating_out = new WPRM_Template_Helper();
				return $rating_out->rating_stars( $rating, false );
			} else {
				return '<div class="wprm-recipe-rating">'. esc_attr__('Not yet rated','baltazar'). '</div>';
			}
		} else {
			return 	$recipe_meta[$meta][0];
		}
	}
}
/*show recipe on image hover*/
function baltazar_recipe_hover(){
	if(class_exists('WPRM_Recipe_Manager')){
		$post_content = get_post(get_the_id());
		$content = $post_content->post_content;
		$recipes = WPRM_Recipe_Manager::get_recipe_ids_from_content( $content  );
		$recipe_out = WPRM_Recipe_Manager::get_recipe( $recipes[0]);
		$recipe = new WPRM_Recipe($recipes[0]);
		$recipe_meta = get_post_custom( $recipes[0] );
		$ingredients = unserialize( $recipe_meta['wprm_ingredients'][0]); 
		if ( count( $ingredients ) > 0 ) : ?>
		<div class="wprm-recipe-ingredients-container baltazar-hover-recipe">
			<h3 class="wprm-recipe-header"><?php echo esc_attr(WPRM_Template_Helper::label( 'ingredients' )); ?></h3>
			<?php foreach ( $ingredients as $ingredient_group ) : ?>
			<div class="wprm-recipe-ingredient-group">
				<?php if ( $ingredient_group['name'] ) : ?>
				<h4 class="wprm-recipe-group-name wprm-recipe-ingredient-group-name"><?php echo esc_attr($ingredient_group['name']); ?></h4>
				<?php endif; // Ingredient group name. ?>
				<ul class="wprm-recipe-ingredients">
					<?php foreach ( $ingredient_group['ingredients'] as $ingredient ) : ?>
					<li class="wprm-recipe-ingredient" itemprop="recipeIngredient">
						<?php if ( $ingredient['amount'] ) : ?>
						<span class="wprm-recipe-ingredient-amount"><?php echo esc_attr($ingredient['amount']); ?></span>
						<?php endif; // Ingredient amount. ?>
						<?php if ( $ingredient['unit'] ) : ?>
						<span class="wprm-recipe-ingredient-unit"><?php echo esc_attr($ingredient['unit']); ?></span>
						<?php endif; // Ingredient unit. ?>
						<span class="wprm-recipe-ingredient-name"><?php echo esc_attr(WPRM_Template_Helper::ingredient_name( $ingredient, true )); ?></span>
						<?php if ( $ingredient['notes'] ) : ?>
						<span class="wprm-recipe-ingredient-notes"><?php echo esc_attr($ingredient['notes']); ?></span>
						<?php endif; // Ingredient notes. ?>
					</li>
					<?php endforeach; // Ingredients. ?>
				</ul>
			</div>
		 <?php endforeach; // Ingredient groups. ?>

		</div>
		<?php endif; // Ingredients. 
	}
}


/*set excerpt lenght for grid layout*/
if(!function_exists('baltazar_custom_excerpt_length')){
	function baltazar_custom_excerpt_length( $length ) {
		return 999;
	}
	add_filter( 'excerpt_length', 'baltazar_custom_excerpt_length', 999 );
}

add_filter('dynamic_sidebar_params','baltazar_blog_widgets');
 
/* Register our callback function */
function baltazar_blog_widgets($params) {	 
 
     global $blog_widget_num; //Our widget counter variable
 
     //Check if we are displaying "Footer Sidebar"
      if(isset($params[0]['id']) && $params[0]['id'] == 'sidebar-delas-blog'){
         $blog_widget_num++;
		$divider = 2; //This is number of widgets that should fit in one row		
 
         //If it's third widget, add last class to it
         if($blog_widget_num % $divider == 0){
	    $class = 'class="last '; 
	    $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);
	 }
 
	}
 
      return $params;
}



/*globals*/
function baltazar_globals($var){
	$baltazar_data = get_option(OPTIONS);
	if(!empty($baltazar_data[$var])){
		return true;
	}
	else{
		return false;
	}

}

/*get data from options*/
function baltazar_data($data){
	$baltazar_data = get_option(OPTIONS);
	if(isset($baltazar_data[$data])){
		return $baltazar_data[$data];	
	} else {
		return '';	
	}
}


function baltazar_block_one(){
$baltazar_data = get_option(OPTIONS);
$categories = $baltazar_data['featured_categories']; ?>
<div class="block1"> 
<?php
	foreach ($categories as $key => $category) {
		?>
		<a <?php if( ($key-1) % 3 == 0) echo 'class="last"';?>href="<?php echo esc_url($category['link']) ?>" >
		
			<div class="block1_img">
				<img src="<?php echo esc_url($category['image']) ?>" alt="<?php echo esc_attr($category['title']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_attr($category['title']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_attr($category['lower_title']) ?></p>
				</div>
			</div>									
		</a>						
	<?php
	} ?>
</div>
<?php
}


function baltazar_block_two(){
$baltazar_data = get_option(OPTIONS);
?>
	<div class="block2">
		<div class="block2_content">
					
			<div class="block2_img">
				<img class="block2_img_big" src="<?php echo esc_url($baltazar_data['block2_img']) ?>" >
			</div>						
			
			<div class="block2_text">
				<p><?php baltazar_security($baltazar_data['block2_text']) ?></p>
			</div>
		</div>								
	</div>
<?php
}

/*baltazar logo output*/
function baltazar_logo(){?>
	<div class="logo-inner">
	    <div id="logo" class="<?php if(is_active_sidebar( 'baltazar_sidebar-logo' )) { echo 'logo-sidebar'; } ?>">
			<?php if(!baltazar_globals('use_site_title')) { ?>
				<?php $logo = esc_url(baltazar_data('logo')); ?>
				<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php if (!empty($logo)) {?>
				<?php echo esc_url($logo); ?><?php } else {?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php }?>"  alt="<?php esc_attr(bloginfo('name')); ?> - <?php esc_attr(bloginfo('description')) ?>" /></a>
			<?php } else { ?>
				<a class = "blog-name" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_attr(bloginfo('name')); ?></a>
			<?php } ?>
		</div>	
		<?php if(is_active_sidebar( 'baltazar_sidebar-logo' )) { ?> 
			<div class="logo-advertise">
				<?php if(is_active_sidebar( 'baltazar_sidebar-logo' )) { ?>
					<?php dynamic_sidebar( 'baltazar_sidebar-logo' ); ?>
				<?php } ?>
			</div>
		<?php } ?>									
	</div>	
<?php
}

function baltazar_revslider($position){
	if(function_exists( 'putRevSlider')){						
		if(baltazar_globals('use_rev_slider_home') && is_front_page() &&  baltazar_data('revsldier_position') == $position){ ?>
			<div id="baltazar-slider-wrapper">
				<div id="baltazar-slider">
					<?php putRevSlider(baltazar_data('rev_slider'),"homepage") ?>
				</div>
			</div>
		<?php } 
	 } 	
}

/* remove double // char */
function baltazar_stripText($string) 
{ 
    return str_replace("\\",'',$string);
} 

/*import plugins*/

add_action( 'tgmpa_register', 'baltazar_required_plugins' );

function baltazar_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
			

        array(
            'name'               => esc_attr__('Theme Options PMC','baltazar'), // The plugin name.
            'slug'               => 'option-tree-pmc', // The plugin slug (typically the folder name).
            'source'             => 'option-tree-pmc.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),			
		
		
		
		array(
				'name'      => esc_attr__('Shortcode Ultimate','baltazar'),
				'slug'      => 'shortcodes-ultimate',
				'required'  => false,
			),		
		array(
				'name'      => esc_attr__('Contact Form 7','baltazar'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),					
		array(
				'name'      => esc_attr__('MailPoet Newsletters','baltazar'),
				'slug'      => 'wysija-newsletters',
				'required'  => false,
			),													
		array(
				'name'      => esc_attr__('Sticky Sidebar','baltazar'),
				'slug'      => 'mystickysidebar',
				'required'  => false,
			),				
				
    );

    $config = array(
 		'id'           => 'baltazar',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => get_template_directory() . '/includes/plugins/',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );

}


?>