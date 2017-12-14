<?php get_header(); ?>

	<div class="wrapper section medium-padding">
	
		<div class="page-title section-inner">
			
				<h5><?php _e( 'Search results', 'baskerville'); ?></h5>
				
				<h3><?php echo ' "' . get_search_query() . '"'; ?></h3>
				
			</div>
	
		<div class="content section-inner">

			<?php if ( have_posts() ) : ?>
						
				<div class="posts">
		
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="post-container">
					
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										
								<?php get_template_part( 'content', get_post_format() ); ?>						
							
							</div><!-- .post -->
						
						</div><!-- .post-container -->
						
					<?php endwhile; ?>
								
				</div><!-- .posts -->
				
				<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				
					<div class="archive-nav">
					
						<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'baskerville' ) ); ?>
						
						<?php echo get_previous_posts_link( __( 'Newer posts', 'baskerville') . ' &raquo;' ); ?>
						
						<div class="clear"></div>
						
					</div>
					
				<?php endif; ?>
		
			<?php else : ?>
				
				<div class="section-inner">
			
					<div class="post-content">
					
						<p><?php _e( 'No results. Try again, would you kindly?', 'baskerville' ); ?></p>
											
					</div><!-- .post-content -->
				
				</div><!-- .section-inner -->
				
				<div class="clear"></div>
							
			<?php endif; ?>
		
		</div><!-- .content -->
				
		<div class="clear"></div>
		
	</div><!-- .wrapper -->
		
<?php get_footer(); ?>