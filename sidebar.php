<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

	<div class="sidebar fright" role="complementary">
	
		<?php dynamic_sidebar( 'sidebar' ); ?>
		
	</div><!-- .sidebar -->

<?php else : ?>
		
	<div class="sidebar fright" role="complementary">
	
		<div id="search" class="widget widget_search">
		
			<div class="widget-content">
	            <?php get_search_form(); ?>
			</div>
			
	    </div><!-- .widget_search -->
	    
	    <div class="widget widget_recent_entries">
	    
	        <div class="widget-content">
	        
	            <h3 class="widget-title"><?php _e("Latest posts", "baskerville") ?></h3>

				<?php

				$recent_posts = get_posts( array( 
					'numberposts' 	=> '5', 
					'post_status' 	=> 'publish' 
				) );

				if ( $recent_posts ) : ?>
	            
					<ul>
						<?php
						foreach ( $recent_posts as $recent_post ) {
							echo '<li><a href="' . get_permalink( $recent_post->ID ) . '">' . get_the_title( $recent_post->ID ) . '</a></li>';
						}
						?>
					</ul>

				<?php endif; ?>
				
			</div>
			
			<div class="clear"></div>
			
		</div><!-- .widget_recent_entries -->
		
		<div class="widget widget_text">
	    
	        <div class="widget-content">
	        
	        	<h3 class="widget-title"><?php _e( "Text widget", "baskerville" ); ?></h3>
	        
	        	<div class="textwidget">
	        	
	        		<p><?php _e( "These widgets are displayed because you haven't added any widgets of your own yet. You can do so at Appearance > Widgets in the WordPress settings.", "baskerville" ); ?></p>
				
				</div>
				
			</div>
			
			<div class="clear"></div>
			
		</div><!-- .widget_recent_entries -->
								
	</div><!-- .sidebar -->

<?php endif; ?>