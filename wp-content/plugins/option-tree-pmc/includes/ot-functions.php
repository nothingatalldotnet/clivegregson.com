<?php if ( ! defined( 'OT_VERSION' ) ) exit( 'No direct script access allowed' );
/**
 * OptionTree functions
 *
 * @package   OptionTree
 * @author    Derek Herman <derek@valendesigns.com>
 * @copyright Copyright (c) 2013, Derek Herman
 * @since     2.0
 */

/**
 * Theme Options ID
 *
 * @return    string
 *
 * @access    public
 * @since     2.3.0
 */
 



require( OT_DIR. 'assets/theme-mode/theme-options.php' );

require( OT_DIR. 'assets/theme-mode/meta-boxes.php' );

		
function baltazar_background_filter( ) {
    // Maybe modify $example in some way.
    return array( 
          'background-color',
          'background-image'
        );
}
add_filter( 'ot_recognized_background_fields', 'baltazar_background_filter' );

function baltazar_typography_filter(){

return array( 
          'color',
          'face', 
          'size', 
          'font-weight', 
        );

}
add_filter( 'ot_recognized_typography_fields', 'baltazar_typography_filter' );


function baltazar_dimension_filter(){

return array( 
          'width',
          'unit'
        );

}
add_filter( 'ot_recognized_dimension_fields', 'baltazar_dimension_filter' );


function baltazar_check_google_font($string){
	if (strpos($string, ':') !== false) {
		$string = explode(':', $string );
		$string = $string[0];

	} 
	
	return preg_replace('/\s+/', '',strtolower($string));

}

function baltazar_in_multi_array($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && baltazar_in_multi_array($needle, $item, $strict))) {
            return true;
        }
    }
    return false; 
}

function baltazar_options($option){
	$add = array('active_layout' => $option  );
	$new = get_option('option_tree_layouts');
	$new_add = array_merge($new , $add);
	update_option('option_tree_layouts', $new_add );
	$new_options =  get_option('option_tree_layouts');
	$new_options = unserialize( baltazar_decode($new_options[$new_options['active_layout']]));
	update_option('of_options_pmc', $new_options);	
}


function baltazar_decode( $value ) {

	  $func = 'base64' . '_decode';
	  return $func( $value );
	  
}

function baltazar_custom_layout(){
	$baltazar_data = get_option(OPTIONS);
	if(!empty($baltazar_data['use_builder'])){
		/*build layout*/
		$layouts = $baltazar_data['test2'];
		echo '<div class="custom-layout"><div class="custom-layout-inner">';
		foreach($layouts as $layout){
		$title = str_replace(' ', '', esc_attr($layout['title']));
		?>
			<?php if(!empty($layout['use_sidebar'])){ ?>
				<div class="layout-sidebar <?php echo esc_attr($title) ?>">	
					<?php dynamic_sidebar( esc_attr($layout['sidebar_select']) ); ?>
				</div>
			<?php } ?>
			<?php if(!empty($layout['use_category'])){ ?>
				<div class="layout-sidebar <?php echo esc_attr($title) ?>">	
					<?php 
					global $post;
					$args = array( 'category' => $layout['category_select'] );
					$layout_posts = get_posts( $args );
					foreach( $layout_posts as  $key => $post ) : 
						if($key == $layout['category_select_number']) {break;}
						setup_postdata($post); ?>
						<div class="blogpostcategory list">
							<div class="topBlog">	
								<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'baltazar' ) ) . '</em>'; ?> </div>
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','baltazar')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<?php if(baltazar_globals('display_post_meta')) { ?>
									<div class = "post-meta">
										<?php 
										$day = get_the_time('d');
										$month= get_the_time('m');
										$year= get_the_time('Y');
										?>
										<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','baltazar'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>			
									</div>
									<?php } ?> <!-- end of post meta -->
							</div>	
						</div>
					<?php endforeach; 
					wp_reset_postdata(); 
					?>		
				</div>
			<?php } ?>		
			<?php if(!empty($layout['use_post'])){ ?>
				<div class="layout-sidebar <?php echo esc_attr($title) ?>">	
					<?php 
					global $post;
					$args = array( 'include' => $layout['single_post'] );
					$layout_posts = get_posts( $args );
					foreach( $layout_posts as $post ) :
						setup_postdata($post); ?>
						<div class="blogpostcategory">
							<div class="topBlog">	
								<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'baltazar' ) ) . '</em>'; ?> </div>
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','baltazar')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<?php if(baltazar_globals('display_post_meta')) { ?>
									<div class = "post-meta">
										<?php 
										$day = get_the_time('d');
										$month= get_the_time('m');
										$year= get_the_time('Y');
										?>
										<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','baltazar'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>			
									</div>
									<?php } ?> <!-- end of post meta -->
							</div>	
							<div class="post-layout-content"><?php the_content(esc_html__('<div class="pmc-read-more">Continue reading</div>','baltazar')) ?></div>
						</div>
					<?php endforeach; 
					wp_reset_postdata(); 
					?>				

				</div>
			<?php } ?>
		<?php
		}
		echo '</div></div>'; 
	} else {	
	?>
	
	<div class="sidebars-wrap top">
		<div class="sidebars">
			<div class="sidebar-left-right">
				<div class="left-sidebar">
					<?php dynamic_sidebar( 'baltazar-sidebar-under-header-left' ); ?>
				</div>
				<div class="right-sidebar">
					<?php dynamic_sidebar( 'baltazar-sidebar-under-header-right' ); ?>
				</div>
			</div>					
			<div class="sidebar-fullwidth">
				<?php if(class_exists('Essential_Grid')) {
					if(baltazar_globals('use_ess_grid_home') && is_front_page()) { 

						echo '<div class="widget widget_ess_grid">';
						echo do_shortcode('[ess_grid alias="'.baltazar_data('ess_grid').'"]');
						echo '</div>';
					}
				} ?>
				<?php dynamic_sidebar( 'baltazar-sidebar-under-header-fullwidth' ); ?>
			</div>				
		</div>
	</div>	
	<?php
	}
}

function baltazar_custom_layout_style(){
	$baltazar_data = get_option(OPTIONS);
	if(isset($baltazar_data['test2'])){
		$layout_style = '';
		$layouts = $baltazar_data['test2'];
		$slider_height = 0;
		if(is_array($layouts)){
		foreach($layouts as $layout){
			$top = $left = $right = $bootom = '';
			if(isset($layout['margin_select']['top'])) $top = esc_attr($layout['margin_select']['top']);
			if(isset($layout['margin_select']['left'])) $left = esc_attr($layout['margin_select']['left']);
			if(isset($layout['margin_select']['bottom'])) $bottom = esc_attr($layout['margin_select']['bottom']);
			if(isset($layout['margin_select']['right'])) $right = esc_attr($layout['margin_select']['right']);
			$title = str_replace(' ', '', esc_attr($layout['title']));
			$layout_style .= '.layout-sidebar.'.$title .'{width:'.esc_attr($layout['dimension_select']['width']).esc_attr($layout['dimension_select']['unit']).';  margin-top:'.$top .esc_attr($layout['dimension_select']['unit']).'; margin-right:'.$right.esc_attr($layout['dimension_select']['unit']).'; margin-bottom:'.$bottom.esc_attr($layout['dimension_select']['unit']).'; margin-left:'.$left.esc_attr($layout['dimension_select']['unit']).'}

		
			';	
			
		}
		$layout_style = $layout_style;
		wp_add_inline_style( 'style', $layout_style );
	}
	}
}

add_action( 'wp_enqueue_scripts', 'baltazar_custom_layout_style' );

function baltazar_custom_sidebars(){
	$baltazar_data = get_option(OPTIONS);
	/*build sidebars*/
	if(isset($baltazar_data['sidebar_builder'])){
		if(is_array($baltazar_data['sidebar_builder'])){
			$sidebars = $baltazar_data['sidebar_builder'];
			$sidebarOut = '';
				foreach($sidebars as $sidebar){
					$id = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $sidebar['title']);
					$id = strtolower(str_replace(' ', '' , $id));
					register_sidebar(array(
						'id' => 'baltazar-'.$id,
						'name' => esc_attr($sidebar['title']),
						'description' => esc_attr($sidebar['sidebar_description']),
						'before_widget' => '<div class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3>',
						'after_title' => '</h3>'
					));			
				}
			}
	}
}

add_action( 'widgets_init', 'baltazar_custom_sidebars' );

function baltazar_admin(){
	$baltazar_data = get_option(OPTIONS);
	if(!isset($baltazar_data['use_css'])){
		echo '<style>#tab_custom_style{display:none}</style>';
	}
}

add_action( 'admin_print_scripts', 'baltazar_admin' );



add_action( 'admin_init', 'baltazar_import' );
    
function baltazar_import(){
	if(isset($_GET["pmc_import"]) && $_GET["pmc_import"] == 'start'){   
		/*import setup*/
		define('ADMIN_PATH', OT_DIR);
		defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
		global $wpdb;

		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
		

			$class_wp_import =  OT_DIR . '/import/plugins/wordpress-importer.php';
			if ( file_exists( $class_wp_import ) ) {
			include $class_wp_import;

			}
		

		
		$class_widget_import = OT_DIR . '/import/plugins/class-widget-data.php';
		if ( file_exists( $class_widget_import ) ) {
			include $class_widget_import;
		}		

		if($_GET['import_content'] == 'all') { 

			/*import xml*/

			$importer = new PMC_import_WP();
			$theme_xml = OT_DIR . '/import/baltazar.xml';
									
			$importer->fetch_attachments = true;
			ob_start();
			$importer->import($theme_xml);
			ob_end_clean();					


			$locations = get_theme_mod( 'nav_menu_locations' ); 
			$menus = wp_get_nav_menus(); 
			
			if( is_array($menus) ) {

				foreach($menus as $menu) { // assign menus to theme locations
				
					$menu_items = wp_get_nav_menu_object($menu->term_id);		
					
					switch($menu_items->name){
						case 'Main menu':
							$locations['baltazar_respmenu'] = $menu->term_id;
							$locations['baltazar_mainmenu'] = $menu->term_id;
							$locations['baltazar_scrollmenu'] = $menu->term_id;										
							break;																			
					}					
				}
			}
			set_theme_mod( 'nav_menu_locations', $locations );		
			
			update_option( 'posts_per_page', 4 );
			


			global $wp_rewrite;
			$wp_rewrite->set_permalink_structure('/%postname%/');
			$wp_rewrite->flush_rules();		

			
			/*widgets+options*/
			/* demo 1 */
			if($_GET['import_demo'] == 'default-layout-sidebar') {
				$file_widget = OT_DIR . '/import/widget.json';
				baltazar_options('default-layout-sidebar');
			/* demo 2 */	
			} else if($_GET['import_demo'] == 'minimal-layout-sidebar')  {
				$file_widget = OT_DIR . '/import/widget.json';
				baltazar_options('minimal-layout-sidebar');	
			/* demo 3 */				
			} else if($_GET['import_demo'] == 'grid-layout-sidebar')  {
				$file_widget = OT_DIR . '/import/widget.json';
				baltazar_options('grid-layout-sidebar');	
			/* demo 4 */		
			} else if($_GET['import_demo'] == 'default-layout-fullwidth')  {
				$file_widget = OT_DIR . '/import/widget.json';
				baltazar_options('default-layout-fullwidth');			
			/* demo 1 */	
			}else {
				$file_widget = OT_DIR . '/import/widget.json';
				baltazar_options('default-layout-sidebar');
			}
			$class_widget_import = new Widget_Data_PMC();
			$class_widget_import->ajax_import_widget_data($file_widget);
		
		}
		

		
		wp_redirect( admin_url( 'themes.php?page=ot-theme-options&pmc_import=true#section_import' ) );
	}


}
 


if ( ! function_exists( 'ot_options_id' ) ) {

  function ot_options_id() {
    
    return apply_filters( 'ot_options_id', 'of_options_pmc' );
    
  }
  
}

/**
 * Theme Settings ID
 *
 * @return    string
 *
 * @access    public
 * @since     2.3.0
 */
if ( ! function_exists( 'ot_settings_id' ) ) {

  function ot_settings_id() {
    
    return apply_filters( 'ot_settings_id', 'option_tree_settings' );
    
  }
  
}

/**
 * Theme Layouts ID
 *
 * @return    string
 *
 * @access    public
 * @since     2.3.0
 */
if ( ! function_exists( 'ot_layouts_id' ) ) {

  function ot_layouts_id() {
    
    return apply_filters( 'ot_layouts_id', 'option_tree_layouts' );
    
  }
  
}

/**
 * Get Option.
 *
 * Helper function to return the option value.
 * If no value has been saved, it returns $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_get_option' ) ) {

  function ot_get_option( $option_id, $default = '' ) {
    
    /* get the saved options */ 
    $options = get_option( ot_options_id() );
    
    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
        
      return ot_wpml_filter( $options, $option_id );
      
    }
    
    return $default;
    
  }
  
}

/**
 * Echo Option.
 *
 * Helper function to echo the option value.
 * If no value has been saved, it echos $default.
 *
 * @param     string    The option ID.
 * @param     string    The default option value.
 * @return    mixed
 *
 * @access    public
 * @since     2.2.0
 */
if ( ! function_exists( 'ot_echo_option' ) ) {
  
  function ot_echo_option( $option_id, $default = '' ) {
    
    echo ot_get_option( $option_id, $default );
  
  }
  
}

/**
 * Filter the return values through WPML
 *
 * @param     array     $options The current options    
 * @param     string    $option_id The option ID
 * @return    mixed
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_wpml_filter' ) ) {

  function ot_wpml_filter( $options, $option_id ) {
      
    // Return translated strings using WMPL
    if ( function_exists('icl_t') ) {
      
      $settings = get_option( ot_settings_id() );
      
      if ( isset( $settings['settings'] ) ) {
      
        foreach( $settings['settings'] as $setting ) {
          
          // List Item & Slider
          if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
          
            foreach( $options[$option_id] as $key => $value ) {
          
              foreach( $value as $ckey => $cvalue ) {
                
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                
                if ( ! empty( $_string ) ) {
                
                  $options[$option_id][$key][$ckey] = $_string;
                  
                }
                
              }
            
            }
          
          // List Item & Slider
          } else if ( $option_id == $setting['id'] && $setting['type'] == 'social-links' ) {
          
            foreach( $options[$option_id] as $key => $value ) {
          
              foreach( $value as $ckey => $cvalue ) {
                
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                
                if ( ! empty( $_string ) ) {
                
                  $options[$option_id][$key][$ckey] = $_string;
                  
                }
                
              }
            
            }
          
          // All other acceptable option types
          } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {
          
            $_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
            
            if ( ! empty( $_string ) ) {
            
              $options[$option_id] = $_string;
              
            }
            
          }
          
        }
      
      }
    
    }
    
    return $options[$option_id];
  
  }

}


/**
 * Enqueue the Google Fonts CSS.
 *
 * @return    void
 *
 * @access    public
 * @since     2.5.0
 */
if ( ! function_exists( 'ot_load_google_fonts_css' ) ) {

  function ot_load_google_fonts_css() {

    /* don't load in the admin */
    if ( is_admin() )
      return;

    $ot_google_fonts      = get_theme_mod( 'ot_google_fonts', array() );
    $ot_set_google_fonts  = get_theme_mod( 'ot_set_google_fonts', array() );
    $families             = array();
    $subsets              = array();
    $append               = '';

    if ( ! empty( $ot_set_google_fonts ) ) {

      foreach( $ot_set_google_fonts as $id => $fonts ) {

        foreach( $fonts as $font ) {

          // Can't find the font, bail!
          if ( ! isset( $ot_google_fonts[$font['family']]['family'] ) ) {
            continue;
          }

          // Set variants & subsets
          if ( ! empty( $font['variants'] ) && is_array( $font['variants'] ) ) {

            // Variants string
            $variants = ':' . implode( ',', $font['variants'] );

            // Add subsets to array
            if ( ! empty( $font['subsets'] ) && is_array( $font['subsets'] ) ) {
              foreach( $font['subsets'] as $subset ) {
                $subsets[] = $subset;
              }
            }

          }

          // Add family & variants to array
          if ( isset( $variants ) ) {
            $families[] = str_replace( ' ', '+', $ot_google_fonts[$font['family']]['family'] ) . $variants;
          }

        }

      }

    }
	

    if ( ! empty( $families ) ) {

      $families = array_unique( $families );

      // Append all subsets to the path, unless the only subset is latin.
      if ( ! empty( $subsets ) ) {
        $subsets = implode( ',', array_unique( $subsets ) );
        if ( $subsets != 'latin' ) {
          $append = '&subset=' . $subsets;
        }
      }

      wp_enqueue_style( 'ot-google-fonts', esc_url( '//fonts.googleapis.com/css?family=' . implode( '%7C', $families ) ) . $append, false, null );
    }

  }

}

/**
 * Registers the Theme Option page link for the admin bar.
 *
 * @return    void
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_register_theme_options_admin_bar_menu' ) ) {

  function ot_register_theme_options_admin_bar_menu( $wp_admin_bar ) {
    
    if ( ! current_user_can( apply_filters( 'ot_theme_options_capability', 'edit_theme_options' ) ) || ! is_admin_bar_showing() )
      return;
    
    $wp_admin_bar->add_node( array(
      'parent'  => 'appearance',
      'id'      => apply_filters( 'ot_theme_options_menu_slug', 'ot-theme-options' ),
      'title'   => apply_filters( 'ot_theme_options_page_title', esc_html__( 'Theme Options', 'baltazar' ) ),
      'href'    => admin_url( apply_filters( 'ot_theme_options_parent_slug', 'themes.php' ) . '?page=' . apply_filters( 'ot_theme_options_menu_slug', 'ot-theme-options' ) )
    ) );
    
  }
  
}

if ( ! function_exists( 'ot_load_icons' ) ) {

  function ot_load_icons() {
    
      wp_enqueue_script('ot-font-awesome', 'https://use.fontawesome.com/30ede005b9.js' , '',false);
	        /* font Awsome Icons */

  
	}
}

/*reading time*/
function ot_estimated_reading_time( $id) {
	$post = get_post($id);
    $words = str_word_count( strip_tags( $post-> post_content ) );
    $minutes = floor( $words / 200 );
	if($minutes < 1) $minutes = 1;
	wp_reset_postdata(); 
    return $minutes;
}

/*post options*/
function ot_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

// function to count views.
function ot_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/* End of file ot-functions.php */
/* Location: ./includes/ot-functions.php */