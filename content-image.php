<?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>

<?php if ( has_post_thumbnail() ) : ?>

	<div class="featured-media">
	
		<?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>
	
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		
			<?php the_post_thumbnail('post-thumbnail'); ?>
			
		</a>
				
	</div><!-- .featured-media -->
		
<?php endif; ?>

<div class="post-excerpt">

	<?php 

	$image_caption = '';

	if ( has_post_thumbnail() ) {
		$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
	}
	
	if ( $image_caption ) {
		echo '<p class="image-caption">' . $image_caption . '</p>';
	} else {
		the_excerpt( 100 ); 
	}

	?>
		
</div><!-- .post-excerpt -->
									                                    	    
<?php baskerville_meta(); ?>
            
<div class="clear"></div>