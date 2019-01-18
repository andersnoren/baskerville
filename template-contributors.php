<?php
/*
Template Name: Contributors template
*/

$all_users = get_users( 'orderby=post_count&order=DESC' );

$user_num = 0;
$users = array();

foreach ( $all_users as $user_obj ) {
	if ( ! in_array( 'subscriber', $user_obj->roles ) // If the user isn't a subscriber...
	&& ( ! count_user_posts( $user_obj->ID ) == 0 )  // ...and the user has published one post or more...
	&& ( ! $user_obj->hideauthor == "yes" ) ) { // ...and the user hasn't been checked as hidden on the user profile...
		
		$users[] = $user_obj; // ...add the user to the array of users that is going to be displayed
			
	}
} ?>

<?php get_header(); ?>

<div class="wrapper section medium-padding">						

	<div class="section-inner">
	
		<div class="content fleft">
					
			<div <?php post_class('single post'); ?>>
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
																		
					<div class="post-header">
												
					    <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
					    				    
				    </div><!-- .post-header -->
				   				        			        		                
					<div class="post-content">

						<?php the_content(); ?>

					</div><!-- .post-content -->
					
					<div class="contributors-container">
					
						<?php 
						
						$i = 0;
						
						foreach( $users as $user ) {
						
							if ( $i % 2 == 0 ) {
								echo $i > 0 ? "<div class='clear'></div></div>" : ""; // close div if it's not the first
								echo "<div class='authors-row row'>";
							}
							?>
														
							<div class="one-half author-info">
							
								<a href="<?php echo get_author_posts_url( $user->ID ); ?>" class="author-avatar"><?php echo get_avatar( $user->user_email, '256' ); ?></a>
							
								<h4><a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo $user->display_name; ?></a></h4>
								
								<h5>
								
									<a href="<?php echo get_author_posts_url( $user->ID ); ?>">

										<?php 
										$user_posts_count = count_user_posts( $user->ID );
										printf( _n( '%s post', '%s posts', $user_posts_count, 'baskerville' ), $user_posts_count );
										?>
										
									</a>
									
								</h5>
								
								<div class="author-description">
								
									<?php echo wpautop( get_user_meta( $user->ID, 'description', true ) ); ?>
									
								</div>
			
								<div class="author-links">

									<?php

									$show_mail = get_the_author_meta( 'showemail' );
																	
									if ( ! empty( $author_mail ) && ( $show_mail == "yes" ) ) : ?>
										<a class="author-link-mail" href="mailto:<?php echo $user->user_email; ?>"><?php _e( 'E-mail', 'baskerville' ); ?></a>
									<?php endif; ?>
									
									<?php if ( ! empty($user->user_url) ) : ?>
										<a class="author-link-website" href="<?php echo $user->user_url; ?>"><?php _e( 'Website', 'baskerville' ); ?></a>
									<?php endif; ?>

									<?php if ( ! empty($user->twitter) ) : ?>
										<a class="author-link-twitter" href="http://www.twitter.com/<?php echo $user->twitter; ?>"><?php _e( 'Twitter', 'baskerville' ); ?></a>
									<?php endif; ?>
									
								</div><!-- .author-links -->
								
							</div><!-- .author-info -->
							
							<?php $i++; ?>
															
						<?php } ?>
						
						<div class="clear"></div>
																		
					</div><!-- .authors-row -->
					
				</div><!-- .contributors-container -->
				
				<?php comments_template( '', true ); ?>
						
				<?php endwhile; endif; ?>
	
			</div><!-- .post -->
				
		</div><!-- .content -->
		
		<?php get_sidebar(); ?>
			
		<div class="clear"></div>
	
	</div><!-- .section-inner -->
	
</div><!-- .wrapper -->
								
<?php get_footer(); ?>