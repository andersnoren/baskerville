<?php get_header(); ?>

<div class="wrapper section medium-padding" id="site-content">

	<?php

	global $wp_query;
	global $paged;

	$archive_title_prefix = '';
	$archive_title = '';
	$archive_description = '';
	
	if ( is_home() && $paged ) {
		$archive_title_prefix = sprintf( __( 'Page %1$s of %2$s', 'baskerville' ), $paged, $wp_query->max_num_pages );
	} elseif ( is_search() ) {
		$archive_title_prefix = __( 'Search results', 'baskerville' );
		$archive_title = '&ldquo;' . get_search_query() . '&rdquo;';
	} elseif ( ! is_home() ) {
		$archive_title = get_the_archive_title();
		$archive_title_prefix = baskerville_get_archive_title_prefix();
		$archive_description = get_the_archive_description();
	}

	if ( $archive_title_prefix || $archive_title || $archive_description ) : ?>

		<div class="page-title section-inner">

			<?php if ( $archive_title_prefix || $archive_title ) : ?>
				<h1>
					<?php if ( $archive_title_prefix ) : ?>
						<span class="top"><?php echo $archive_title_prefix; ?></span>
					<?php endif; ?>
					<?php if ( $archive_title ) : ?>
						<span class="bottom"><?php echo $archive_title; ?></span>
					<?php endif; ?>
				</h1>
			<?php endif; ?>

			<?php if ( $archive_description ) : ?>
				<div class="tag-archive-meta"><?php echo wpautop( $archive_description ); ?></div>
			<?php endif; ?>
			
		</div><!-- .page-title -->

	<?php endif; ?>

	<div class="content section-inner">
																		                    
		<?php if ( have_posts() ) : ?>
		
			<div class="posts">
					
		    	<?php while ( have_posts() ) : the_post(); ?>
		    	
		    		<div class="post-container">
		    	
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			    	
				    		<?php get_template_part( 'content', get_post_format() ); ?>
				    				    		
			    		</div><!-- .post -->
		    		
		    		</div>
		    			        		            
		        <?php endwhile; ?>
	        	                    
			<?php elseif ( is_search() ) : ?>
				
				<div class="section-inner">
			
					<div class="post-content">
					
						<p><?php _e( 'No results. Try again, would you kindly?', 'baskerville' ); ?></p>
											
					</div><!-- .post-content -->
				
				</div><!-- .section-inner -->
				
				<div class="clear"></div>
							
			<?php endif; ?>
			
		</div><!-- .posts -->
			
	</div><!-- .content -->
	
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		
		<div class="archive-nav section-inner">
					
			<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'baskerville' ) ); ?>
						
			<?php echo get_previous_posts_link( __( 'Newer posts', 'baskerville') . ' &raquo;' ); ?>
			
			<div class="clear"></div>
			
		</div><!-- .post-nav archive-nav -->
	
	<?php endif; ?>
			
	<div class="clear"></div>

</div><!-- .wrapper -->
	              	        
<?php get_footer(); ?>