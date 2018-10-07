<?php
/*
Template Name: Archive template
*/
?>

<?php get_header(); ?>

<div class="wrapper section medium-padding">						

	<div class="section-inner">

		<div class="content fleft">
					
			<div class="post">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<?php if ( has_post_thumbnail() ) : ?>
					
					<div class="featured-media">
					
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						
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
													
					<div class="post-header">
												
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
					    				    
				    </div><!-- .post-header -->
				   				        			        		                
					<div class="post-content">
								                                        
						<?php the_content(); ?>
						
						<div class="archive-box">
					
							<div class="archive-col">
												
								<h3><?php _e( 'Last 30 Posts', 'baskerville' ); ?></h3>
								            
					            <ul>
									<?php 
									
									$archive_30 = get_posts( array(
										'post_status'		=> 'publish',
										'posts_per_page'	=> 30,
									) );

						            foreach( $archive_30 as $recent_post ) : ?>
						                <li>
						                	<a href="<?php echo get_the_permalink( $recent_post->ID ); ?>">
						                		<?php echo get_the_title( $recent_post->ID ); ?> 
						                		<span>(<?php the_time( get_option( 'date_format' ), $recent_post->ID ); ?>)</span>
						                	</a>
						                </li>
						            <?php endforeach; ?>
					            </ul>
					            
					            <h3><?php _e( 'Archives by Categories', 'baskerville' ) ?></h3>
					            
					            <ul>
					                <?php wp_list_categories( 'title_li=' ); ?>
					            </ul>
					            
					            <h3><?php _e( 'Archives by Tags', 'baskerville' ); ?></h3>
					            
					            <ul>
					                <?php $tags = get_tags();
					                
					                if ( $tags ) {
					                    foreach ( $tags as $tag ) {
					                 	   echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s", 'baskerville' ), $tag->name ) . '"' . '>' . $tag->name.'</a></li> ';
					                    }
					                }
					                
					                wp_reset_query();?>
					            </ul>
				            
				            </div><!-- .archive-col -->
				            
				            <div class="archive-col">
				            
				            	<h3><?php _e( 'Contributors', 'baskerville' ); ?></h3>
				            	
				            	<ul>
				            		<?php wp_list_authors(); ?> 
				            	</ul>
				            	
				            	<h3><?php _e( 'Archives by Year', 'baskerville' ); ?></h3>
				            	
				            	<ul>
				            	    <?php wp_get_archives( 'type=yearly' ); ?>
				            	</ul>
				            	
				            	<h3><?php _e( 'Archives by Month', 'baskerville' ); ?></h3>
				            	
				            	<ul>
				            	    <?php wp_get_archives( 'type=monthly' ); ?>
				            	</ul>
				            
					            <h3><?php _e( 'Archives by Day', 'baskerville' ); ?></h3>
					            
					            <ul>
					                <?php wp_get_archives( 'type=daily' ); ?>
					            </ul>
				            
				            </div><!-- .archive-col -->
				            
				            <div class="clear"></div>
		            
			            </div><!-- .archive-box -->
															            			                        
					</div><!-- .post-content -->
					
					<?php wp_reset_query(); ?>
											
					<div class="clear"></div>
			
					<?php comments_template( '', true ); ?>
				
				<?php endwhile; endif; ?>
	
			</div><!-- .post -->
				
		</div><!-- .content -->
		
		<?php get_sidebar(); ?>
	
		<div class="clear"></div>
	
	</div><!-- .section-inner -->
	
</div><!-- .wrapper section-inner -->
								
<?php get_footer(); ?>