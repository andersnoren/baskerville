<?php
/*
Template Name: Full width template
*/
?>

<?php get_header(); ?>

<div class="wrapper section medium-padding">
										
	<div class="section-inner">
	
		<div class="content full-width">
	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				<div class="post">
				
					<div class="post-header">
												
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
					    				    
				    </div><!-- .post-header -->
				
					<?php if ( has_post_thumbnail() ) : ?>
						
						<div class="featured-media">
						
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
							
								<?php 
								
								the_post_thumbnail( 'post-image' );
	
								$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
								
								if ( $image_caption ) : ?>
												
									<div class="media-caption-container">
									
										<p class="media-caption"><?php echo $image_caption; ?></p>
										
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
			
			<?php endwhile; endif; ?>
		
			<div class="clear"></div>
			
		</div><!-- .content -->
				
		<div class="clear"></div>
	
	</div><!-- .section-inner -->

</div><!-- .wrapper -->
								
<?php get_footer(); ?>