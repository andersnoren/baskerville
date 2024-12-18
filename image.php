<?php get_header(); ?>

<div class="wrapper section medium-padding" id="site-content">

	<div class="section-inner">

		<div class="content fleft">
												        
			<?php 
			
			if ( have_posts() ) : 
			
				while ( have_posts() ) : 
				
					the_post(); 
					
					?>
				
					<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
															
						<div class="featured-media">
						
							<?php $image_array = wp_get_attachment_image_src( $post->ID, 'full' ); ?>
						
							<a href="<?php echo esc_url( $image_array[0] ); ?>" rel="attachment">
								<?php echo wp_get_attachment_image( $post->ID, 'post-image' ); ?>
							</a>
						
						</div><!-- .featured-media -->
						
						<div class="post-header">
						
							<h1 class="post-title"><?php echo basename( get_attached_file( $post->ID ) ); ?></h1>
						
						</div><!-- .post-header -->
																		
						<div class="post-meta-container">
						
							<div class="post-author">
							
								<div class="post-author-content">
								
									<h4><?php _e( 'About the attachment', 'baskerville' ); ?></h4>
									
									<p><?php the_excerpt(); ?></p>
								
								</div><!-- .post-author-content -->
							
							</div><!-- .post-author -->
							
							<div class="post-meta">
							
								<p class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></p>
								<p class="image-resolution"><?php echo $image_array[1] . ' <span style="text-transform:lowercase;">x</span>' . $image_array[2] . ' px'; ?></p>
							
							</div><!-- .post-meta -->
							
							<div class="clear"></div>
						
						</div><!-- .post-meta-container -->
						
						<?php 
						
						comments_template( '', true );
					
					endwhile;
			
				endif;
				
				?>
					
			</div><!-- .post -->
				
		</div><!-- .content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>
	
	</div><!-- .section-inner -->

</div><!-- .wrapper -->
		
<?php get_footer(); ?>
