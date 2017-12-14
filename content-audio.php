<?php $audio_url = get_post_meta($post->ID, 'audio_url', true); ?>

<div class="post-header">

	<?php if ( get_the_title() ) : ?>
	
	    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

	<?php endif; ?>
    
    <?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>
    
</div><!-- .post-header -->

<?php if($post->post_content != "") : ?>
									                                    	    
	<div class="post-excerpt">
		    		            			            	                                                                                            
		<?php the_excerpt('100'); ?>
	
	</div><!-- .post-excerpt -->

<?php endif; ?>
									                                    	    
<?php baskerville_meta(); ?>
            
<div class="clear"></div>