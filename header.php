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

		<a class="skip-link button" href="#site-content"><?php _e( 'Skip to the content', 'baskerville' ); ?></a>
	
		<div class="header section small-padding bg-dark bg-image" style="background-image: url( <?php echo esc_url( $background_image_url ); ?> );">
		
			<div class="cover"></div>
			
			<div class="header-search-block bg-graphite hidden">
				<?php get_search_form(); ?>
			</div><!-- .header-search-block -->
					
			<div class="header-inner section-inner">
			
				<?php 

				$custom_logo_id 	= get_theme_mod( 'custom_logo' );
				$legacy_logo_url 	= get_theme_mod( 'baskerville_logo' );
				$blog_title_elem 	= ( ( is_front_page() || is_home() ) && ! is_page() ) ? 'h1' : 'div';
				$blog_title_class 	= $custom_logo_id ? 'blog-logo' : 'blog-title';

				$blog_title 		= get_bloginfo( 'title' );
				$blog_description 	= get_bloginfo( 'description' );

				if ( $custom_logo_id  || $legacy_logo_url ) : 

					$custom_logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : $legacy_logo_url;
				
					?>

					<<?php echo $blog_title_elem; ?> class="<?php echo esc_attr( $blog_title_class ); ?>">
						<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $custom_logo_url ); ?>">
							<span class="screen-reader-text"><?php echo $blog_title; ?></span>
						</a>
					</<?php echo $blog_title_elem; ?>>
		
				<?php elseif ( $blog_description || $blog_title ) : ?>

					<<?php echo $blog_title_elem; ?> class="<?php echo esc_attr( $blog_title_class ); ?>">
						<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo $blog_title; ?></a>
					</<?php echo $blog_title_elem; ?>>
				
					<?php if ( $blog_description ) : ?>
						<h3 class="blog-description"><?php echo $blog_description; ?></h3>
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