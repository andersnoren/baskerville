<?php get_header(); ?>

<div class="wrapper section medium-padding">

	<div class="page-title section-inner">
		
		<?php if ( is_day() ) : ?>
			<h5><?php _e( 'Date', 'baskerville' ); ?></h5> <h3><?php echo get_the_date(); ?></h3>

		<?php elseif ( is_month() ) : ?>
			<h5><?php _e( 'Month', 'baskerville' ); ?></h5> <h3><?php echo get_the_date('F Y'); ?></h3>

		<?php elseif ( is_year() ) : ?>
			<h5><?php _e( 'Year', 'baskerville' ); ?></h5> <h3><?php echo get_the_date('Y'); ?></h3>

		<?php elseif ( is_category() ) : ?>
			<h5><?php _e( 'Category', 'baskerville' ); ?></h5> <h3><?php echo single_cat_title( '', false ); ?></h3>

		<?php elseif ( is_tag() ) : ?>
			<h5><?php _e( 'Tag', 'baskerville' ); ?></h5> <h3><?php echo single_tag_title( '', false ); ?></h3>

		<?php elseif ( is_author() ) : ?>
			<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
			<h5><?php _e( 'Author', 'baskerville' ); ?></h5> <h3><?php echo $curauth->display_name; ?></h3>

		<?php else : ?>
			<h5><?php _e( 'Archive', 'baskerville' ); ?></h5>

		<?php endif;

		$tag_description = tag_description();

		if ( ! empty( $tag_description ) ) {
			echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
		}

		?>
		
	</div><!-- .page-title -->
	
	<div class="content section-inner">
	
		<?php if ( have_posts() ) : ?>
	
			<div class="posts">
			
				<?php while ( have_posts() ) : the_post(); ?>
				
					<div class="post-container">
				
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
							<?php get_template_part( 'content', get_post_format() ); ?>
							
							<div class="clear"></div>
							
						</div><!-- .post -->
					
					</div>
					
				<?php endwhile; ?>
							
			</div><!-- .posts -->
						
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
				<div class="archive-nav">
				
					<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'baskerville' ) ); ?>
						
					<?php echo get_previous_posts_link( __( 'Newer posts', 'baskerville' ) . ' &raquo;' ); ?>
					
					<div class="clear"></div>
					
				</div><!-- .post-nav archive-nav -->
				
				<div class="clear"></div>
				
			<?php endif; ?>
					
		<?php endif; ?>
	
	</div><!-- .content -->

</div><!-- .wrapper -->

<?php get_footer(); ?>