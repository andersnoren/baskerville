<div class="post-header">

	<?php if ( get_the_title() ) : ?>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php endif; ?>
    
    <?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>
    
</div><!-- .post-header -->

<?php if ( strpos( $post->post_content, '<!--more-->' ) ) : ?>

	<div class="featured-media">
	
		<?php
			
		// Fetch post content
		$content = get_post_field( 'post_content', get_the_ID() );
		
		// Get content parts
		$content_parts = get_extended( $content );
		
		// oEmbed part before <!--more--> tag
		$embed_code = wp_oembed_get( $content_parts['main'] ); 
		
		echo $embed_code;
		
		?>
	
	</div><!-- .featured-media -->

<?php endif; ?>

<div class="post-excerpt">
	
	<?php 
	if ( strpos( $post->post_content, '<!--more-->' ) ) {
		echo '<p>' . mb_strimwidth( $content_parts['extended'], 0, 200, '...' ) . '</p>';
	} else {
		the_excerpt( 100 );
	}
	?>

</div><!-- .post-excerpt -->

<?php baskerville_meta(); ?>