<div class="post-excerpt">

	<?php the_excerpt( 100 ); ?>

</div><!-- .post-excerpt -->

<?php if ( is_sticky() ) echo '<span class="sticky-post">' . __( 'Sticky post', 'baskerville' ) . '</span>'; ?>

<?php baskerville_meta(); ?>