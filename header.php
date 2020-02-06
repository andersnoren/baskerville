<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
						 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		
		$background_image_url = get_header_image() ? get_header_image() : get_template_directory_uri() . '/images/header.jpg'; 
		
		?>

		<a class="skip-link button" href="#site-content"><?php _e( 'Skip to the content', 'chaplin' ); ?></a>
	
		<div class="header section small-padding bg-dark bg-image" style="background-image: url( <?php echo esc_url( $background_image_url ); ?> );">
		
			<div class="cover"></div>
			
			<div class="header-search-block bg-graphite hidden">
				<?php get_search_form(); ?>
			</div><!-- .header-search-block -->
					
			<div class="header-inner section-inner">
			
				<?php if ( get_theme_mod( 'baskerville_logo' ) ) : ?>
				
					<div class="blog-logo">
					
				        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				        	<img src="<?php echo esc_url( get_theme_mod( 'baskerville_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>">
				        </a>
			        
					</div>
			
				<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>

					<?php 
					
					$blog_title_elem = ( ( is_front_page() || is_home() ) && ! is_page() ) ? 'h1' : 'div';

					?>
								
					<<?php echo $blog_title_elem; ?> class="blog-title">
						<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo get_bloginfo( 'title' ); ?></a>
					</<?php echo $blog_title_elem; ?>>
					
					<?php if ( get_bloginfo( 'description' ) ) : ?>
					
						<h3 class="blog-description"><?php echo get_bloginfo( 'description' ); ?></h3>
						
					<?php endif; ?>
										
				<?php endif; ?>
							
			</div><!-- .header-inner -->
						
		</div><!-- .header -->
		
		<div class="navigation section no-padding bg-dark">
		
			<div class="navigation-inner section-inner">
			
				<button class="nav-toggle toggle fleft hidden">
					
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
					
				</button>
						
				<ul class="main-menu">
				
					<?php 
					
					if ( has_nav_menu( 'primary' ) ) {

						$nav_args = array( 
							'container' 		=> '', 
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary', 
							'walker' 			=> new baskerville_nav_walker,
						);
																		
						wp_nav_menu( $nav_args ); 

					} else {

						$list_pages_args = array(
							'container' => '',
							'title_li' 	=> '',
						);
					
						wp_list_pages( $list_pages_args );
						
					} 
					
					?>
											
				</ul><!-- .main-menu -->
				 
				<button class="search-toggle toggle fright">
					<span class="screen-reader-text"><?php _e( 'Toggle search field', 'baskerville' ); ?></span>
				</button>
				 
				<div class="clear"></div>
				 
			</div><!-- .navigation-inner -->
			
		</div><!-- .navigation -->
		
		<div class="mobile-navigation section bg-graphite no-padding hidden">
					
			<ul class="mobile-menu">
			
				<?php

				if ( has_nav_menu( 'primary' ) ) {
																	
					wp_nav_menu( $nav_args ); 

				} else {
				
					wp_list_pages( $list_pages_args );
					
				} 
				
				?>
										
			 </ul><!-- .main-menu -->
		
		</div><!-- .mobile-navigation -->