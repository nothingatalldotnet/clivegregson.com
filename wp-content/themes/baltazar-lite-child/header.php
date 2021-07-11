<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" >
<!-- start -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">
	
	<?php wp_head();?>
</head>		
<!-- start body -->
<body <?php body_class(); ?> id="particles-js" >
	<!-- start header -->
			<!-- fixed menu -->		
			<?php 
			?>	
			<?php if(baltazar_globals('display_scroll')) { ?>
			<div class="pagenav fixedmenu">						
				<div class="holder-fixedmenu">							
					<div class="logo-fixedmenu">								
					<?php if(baltazar_globals('scroll_logo') && !baltazar_globals('use_site_title')){ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(baltazar_data('scroll_logo')); ?>" data-rjs="3" alt="<?php esc_attr(bloginfo('name')); ?> - <?php esc_attr(bloginfo('description')) ?>" ></a>
					<?php } else { ?>
						<a class = "blog-name-scroll" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					<?php } ?>
					</div>
						<div class="menu-fixedmenu home">
						<?php
						if ( has_nav_menu( 'baltazar_scrollmenu' ) ) {
						wp_nav_menu( array(
						'container' =>false,
						'container_class' => 'menu-scroll',
						'theme_location' => 'baltazar_scrollmenu',
						'echo' => true,
						'fallback_cb' => 'baltazar_fallback_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new baltazar_Walker_Main_Menu())
						);
						}
						?>	
					</div>
				</div>	
			</div>
			<?php } ?>
				<header>
				<?php baltazar_revslider(1); ?>
				<!-- top bar -->
				<?php if(baltazar_globals('top_bar')) { ?>
					<div class="top-wrapper">
						<?php if(!baltazar_globals('show_crypto_slider_top_bar')) { ?>
						<div class="top-wrapper-content">
							<div class="top-left">
								<?php if(is_active_sidebar( 'baltazar_sidebar-top-left' )) { ?>
									<?php dynamic_sidebar( 'baltazar_sidebar-top-left' ); ?>
								<?php } ?>
							</div>
							<div class="top-right">
								<?php if(is_active_sidebar( 'baltazar_sidebar-top-right' )) { ?>
									<?php dynamic_sidebar( 'baltazar_sidebar-top-right' ); ?>
								<?php } ?>
							</div>
						</div>
						<?php } else { ?>
							<?php if(shortcode_exists('currencyprice_pmc')){
								if(baltazar_data('crypto_options_coins_design') == 1){
									if(baltazar_globals('show_crypto_daychange')) {$daycahnge = 'yes';} else {$daycahnge = 'no';}
									echo do_shortcode(' [currencyprice_pmc currency1="'.implode( ",", baltazar_data('select_crypto_coin')).'" currency2="'.implode( ",", baltazar_data('select_crypto_coin_currency')).'" daychange="'.$daycahnge.'"]');
								}
								if(baltazar_data('crypto_options_coins_design') == 2){
									echo do_shortcode(' [currency_ticker_2 coins="'. str_replace("*", "",implode( ",", baltazar_data('select_crypto_coin'))).'" compare="'.baltazar_data('select_crypto_coin_currency_1').'"]');
								}
							} ?>
						<?php } ?>						
					</div>
					<?php } ?>			
					<div id="headerwrap">		

						<!-- logo and main menu -->
						<div id="header">
							<div class="header-image">
							<!-- respoonsive menu main-->
							<!-- respoonsive menu no scrool bar -->
							<?php if ( has_nav_menu( 'baltazar_respmenu' ) ) { ?>
							<div class="respMenu noscroll">
								<div class="resp_menu_button"><i class="fa fa-list-ul fa-2x"></i></div>
								<?php 
									$menuParameters =  array(
									  'theme_location' => 'baltazar_respmenu', 
									  'walker'         => new baltazar_Walker_Responsive_Menu(),
									  'echo'            => false,
									  'container_class' => 'menu-main-menu-container',
									  'items_wrap'     => '<div class="event-type-selector-dropdown">%3$s</div>',
									);
									echo strip_tags(wp_nav_menu( $menuParameters ), '<a>,<br>,<div>,<i>,<strong>' );
								?>	
							<?php } ?>
							</div>
							<!-- logo -->
							<div class="logo-inner">
								<div id="logo" class="">
									<a href="https://cg.nothingatall.net/">Clive Gregson</a>
								</div>	
							</div>
							<!-- main menu -->
							<div class="pagenav <?php if( baltazar_data('logo_position') == 3  ){ echo 'logo-left-menu'; } ?>"> 	
							<?php if( baltazar_data('logo_position') == 3  ){ 
									baltazar_logo();
								} ?>								
								<div class="pmc-main-menu">
								<?php
									if ( has_nav_menu( 'baltazar_mainmenu' ) ) {	
										wp_nav_menu( array(
										'container' =>false,
										'container_class' => 'menu-header home',
										'menu_id' => 'menu-main-menu-container',
										'theme_location' => 'baltazar_mainmenu',
										'echo' => true,
										'fallback_cb' => 'baltazar_fallback_menu',
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 0,
										'walker' => new baltazar_Walker_Main_Menu()));								
									} ?>											
								</div> 	
							</div> 
							<?php if(baltazar_data('logo_position') == 2){ 
								baltazar_logo();
							} ?>							
						</div>
					</div> 												
				</header>	
				<?php
				baltazar_revslider(2);			
				if(is_front_page() && baltazar_globals('use_categories')){ ?>
						<?php baltazar_block_one(); ?>
					<?php } ?>	
					<?php if(is_front_page() && baltazar_globals('use_block2') ){ ?>	
						<?php baltazar_block_two(); ?>
					<?php } ?>				
				<?php if(is_front_page()){ ?>
				<?php if(function_exists('baltazar_custom_layout')) {baltazar_custom_layout();} ?>
				<?php } ?>				
