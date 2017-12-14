<div class="post-header">

	<?php if ( get_the_title() ) : ?>
	
	    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

	<?php endif; ?>
    
    <?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>
    
</div><!-- .post-header -->

<div class="post-quote">

	<?php
		
	// Fetch post content
	$content = get_post_field( 'post_content', get_the_ID() );
	
	// Get content parts
	$content_parts = get_extended( $content );
	
	// Output part before <!--more--> tag
	echo $content_parts['main'];
	
	?>

</div><!-- .post-quote -->

<div class="post-excerpt">
		
	<?php 
		if ( $pos = strpos( $post->post_content, '<!--more-->' ) ) {
			echo '<p>' . mb_strimwidth( $content_parts['extended'], 0, 200, '...' ) . '</p>';
		} else {
			the_excerpt( 100 );
		}
	?>

</div><!-- .post-excerpt -->

<?php baskerville_meta(); ?>
            
<div class="clear"></div>