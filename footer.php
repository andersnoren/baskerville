<div class="footer section medium-padding bg-graphite">

	<?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b' ) || is_active_sidebar( 'footer-c' ) ) : ?>
	
		<div class="section-inner row">
		
			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
			
				<div class="column column-1 one-third">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-a' ); ?>
											
					</div>
					
				</div><!-- .column-1 -->
				
			<?php endif; ?>
				
			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
			
				<div class="column column-2 one-third">
				
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-b' ); ?>
											
					</div><!-- .widgets -->
					
				</div><!-- .column-2 -->
				
			<?php endif; ?>
								
			<?php if ( is_active_sidebar( 'footer-c' ) ) : ?>
			
				<div class="column column-3 one-third">
			
					<div class="widgets">
			
						<?php dynamic_sidebar( 'footer-c' ); ?>
											
					</div><!-- .widgets -->
					
				</div>
				
			<?php endif; ?><!-- .footer-c -->
			
			<div class="clear"></div>
		
		</div><!-- .section-inner -->

	<?php endif; ?>

</div><!-- .footer -->

<div class="credits section bg-dark small-padding">

	<div class="credits-inner section-inner">

		<p class="credits-left fleft">
		
			&copy; <?php echo date("Y") ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a><span> &mdash; <?php printf( __( 'Powered by <a href="%s">WordPress</a>', 'baskerville'), 'http://www.wordpress.org' ); ?></span>
		
		</p>
		
		<p class="credits-right fright">
			
			<span><?php printf( __( 'Theme by <a href="%s">Anders Noren</a>', 'baskerville' ), 'https://www.andersnoren.se' ); ?> &mdash; </span><a class="tothetop" title="<?php _e( 'To the top', 'baskerville' ); ?>" href="#"><?php _e( 'Up', 'baskerville' ); ?> &uarr;</a>
			
		</p>
		
		<div class="clear"></div>
	
	</div><!-- .credits-inner -->
	
</div><!-- .credits -->

<?php wp_footer(); ?>

</body>
</html>