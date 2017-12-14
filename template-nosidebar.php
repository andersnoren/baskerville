<?php
/*
Template Name: No sidebar template
*/
?>

<?php get_header(); ?>

<div class="wrapper section medium-padding">
										
	<div class="section-inner">
	
		<div class="content center">
	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				<div class="post">
				
					<div class="post-header">
												
					    <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
					    				    
				    </div><!-- .post-header -->
				
					<?php if ( has_post_thumbnail() ) : ?>
						
						<div class="featured-media">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							
								<?php the_post_thumbnail( 'post-image' ); ?>
								
								<?php if ( ! empty( get_post( get_post_thumbnail_id() )->post_excerpt ) ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?></p>
										
									</div>
									
								<?php endif; ?>
								
							</a>
									
						</div><!-- .featured-media -->
							
					<?php endif; ?>

					<div class="post-content">

						<?php the_content(); ?>
						
					</div><!-- .post-content -->
					
					<?php comments_template( '', true ); ?>
									
				</div><!-- .post -->
			
			<?php endwhile; else: ?>
			
				<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "baskerville" ); ?></p>
		
			<?php endif; ?>
		
			<div class="clear"></div>
			
		</div><!-- .content -->
				
		<div class="clear"></div>
	
	</div><!-- .section-inner -->

</div><!-- .wrapper -->
								
<?php get_footer(); ?>