<?php get_header(); ?>

<div class="wrapper section medium-padding" id="site-content">
										
	<div class="section-inner">
	
		<div class="content fleft">
												        
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php
					
					$format = get_post_format();
				
					if ( $format == 'quote' || $format == 'link' || $format == 'audio' || $format == 'status' || $format == 'chat' ) : ?>
					
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
					
							<div class="featured-media">
							
								<?php 
								
								the_post_thumbnail( 'post-image' );

								$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
								
								if ( $image_caption ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo $image_caption; ?></p>
										
									</div>
									
								<?php endif; ?>
										
							</div><!-- .featured-media -->
						
						<?php endif; ?>
					
					<?php endif; ?>
				
					<div class="post-header">

						<?php if ( get_the_title() ) : ?>
						
						    <h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

						<?php endif; ?>
					    
					</div><!-- .post-header -->
					
					<?php if ( $format == 'link' ) : ?> 
					
						<div class="post-link">
						
							<?php
							
							// Fetch post content
							$content = get_post_field( 'post_content', get_the_ID() );
							
							// Get content parts
							$content_parts = get_extended( $content );
							
							echo $content_parts['main']; 
							?>
						
						</div><!-- .post-link -->
						
					<?php elseif ( $format == 'quote' ) : ?> 
					
						<div class="post-quote">
							
							<?php
							
							// Fetch post content
							$content = get_post_field( 'post_content', get_the_ID() );
							
							// Get content parts
							$content_parts = get_extended( $content );
							
							echo $content_parts['main']; 
								
							?>

						</div>
						
					<?php elseif ( $format == 'gallery' && ! post_password_required() ) : ?> 
					
						<div class="featured-media">

							<?php baskerville_flexslider( 'post-image' ); ?>
											
						</div><!-- .featured-media -->
						
					<?php elseif ( $format == 'video' && ! post_password_required() ) : ?>
					
						<?php if ( strpos( $post->post_content, '<!--more-->' ) ) : ?>
						
							<div class="featured-media">
							
								<?php
										
								// Fetch post content
								$content = get_post_field( 'post_content', get_the_ID() );
								
								// Get content parts
								$content_parts = get_extended( $content );
								
								// oEmbed part before <!--more--> tag
								$embed_code = wp_oembed_get( $content_parts['main'] ); 
								
								echo $embed_code;
								
								?>
							
							</div><!-- .featured-media -->
						
						<?php endif; ?>
				
					<?php elseif ( has_post_thumbnail() && ! post_password_required() ) : ?>
					
						<div class="featured-media">
						
							<?php 
								
							the_post_thumbnail( 'post-image' );

							$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
							
							if ( $image_caption ) : ?>
											
								<div class="media-caption-container">
								
									<p class="media-caption"><?php echo $image_caption; ?></p>
									
								</div>
								
							<?php endif; ?>
									
						</div><!-- .featured-media -->
					
					<?php endif; ?>
														                                    	    
					<div class="post-content">
						
						<?php 
						if ( isset( $content_parts ) && $content_parts && ( $format == 'link' || $format == 'quote' || $format == 'video' ) ) { 
							$content = $content_parts['extended'];
							$content = apply_filters( 'the_content', $content );
							echo $content;
						} else {
							the_content();
						}																																	
						wp_link_pages();
						?>
						
						<div class="clear"></div>
									        
					</div><!-- .post-content -->
					            					
					<div class="post-meta-container">
						
						<div class="post-author">
						
							<div class="post-author-content">
							
								<h4><?php the_author_meta( 'display_name' ); ?></h4>
								
								<?php 
								
								if ( get_the_author_meta( 'description' ) ) { 
									echo wpautop( get_the_author_meta( 'description' ) );
								}

								?>
								
								<div class="author-links">
									
									<a class="author-link-posts" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php _e( 'Author archive', 'baskerville' ); ?></a>
									
									<?php 
									
									$author_url = get_the_author_meta( 'user_url' ); 
																									
									if ( ! empty( $author_url ) ) : ?>
									
										<a class="author-link-website" href="<?php echo esc_url( $author_url ); ?>"><?php _e( 'Author website', 'baskerville' ); ?></a>
										
									<?php endif;
									
									$author_mail = get_the_author_meta( 'email' ); 
									$show_mail = get_the_author_meta( 'showemail' );
																	
									if ( $author_mail && $show_mail == "yes" ) : ?>
									
										<a class="author-link-mail" href="mailto:<?php echo esc_attr( $author_mail ); ?>"><?php echo $author_mail; ?></a>
										
									<?php endif;
									
									$author_twitter = get_the_author_meta( 'twitter' ); 
																	
									if ( $author_twitter ) : ?>
									
										<a class="author-link-twitter" href="http://www.twitter.com/<?php echo esc_attr( $author_twitter ); ?>"><?php printf( __( '@%s on Twitter', 'baskerville' ), $author_twitter ); ?></a>
										
									<?php endif; ?>
									
								</div><!-- .author-links -->
							
							</div><!-- .post-author-content -->
						
						</div><!-- .post-author -->
						
						<div class="post-meta">
						
							<p class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></p>
							
							<?php if ( function_exists( 'zilla_likes' ) ) zilla_likes(); ?>
							
							<p class="post-categories"><?php the_category( ', ' ); ?></p>
							
							<?php if ( has_tag() ) : ?>
							
								<p class="post-tags"><?php the_tags( '', ', ' ); ?></p>
							
							<?php endif; ?>
							
							<div class="clear"></div>
							
							<div class="post-nav">
							
								<?php

								$prev_post = get_previous_post();
								$next_post = get_next_post();

								if ( $prev_post ) :
									?>
								
									<a class="post-nav-prev" href="<?php the_permalink( $prev_post->ID ); ?>"><?php _e( 'Previous post', 'baskerville' ); ?></a>
							
									<?php 
								endif; 

								if ( $next_post ) :
									?>
									
									<a class="post-nav-next" href="<?php the_permalink( $next_post->ID ); ?>"><?php _e( 'Next post', 'baskerville' ); ?></a>
							
									<?php 
								endif; 
								
								edit_post_link( __( 'Edit post', 'baskerville' ) ); 
								
								?>
									
								<div class="clear"></div>
							
							</div><!-- .post-nav -->
						
						</div><!-- .post-meta -->
						
						<div class="clear"></div>
							
					</div><!-- .post-meta-container -->
																		
					<?php comments_template( '', true ); ?>
												                        
				<?php endwhile; endif; ?>
		
			</div><!-- .post -->
		
		</div><!-- .content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
		
	</div><!-- .section-inner -->

</div><!-- .wrapper -->
		
<?php get_footer(); ?>