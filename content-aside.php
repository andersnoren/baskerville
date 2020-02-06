<?php if ( get_the_content() ) : ?>
	<div class="post-excerpt">
		<?php the_excerpt( 100 ); ?>
	</div><!-- .post-excerpt -->
<?php endif; ?>

<?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>

<?php baskerville_meta(); ?>