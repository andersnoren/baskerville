<?php


/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_setup' ) ) {

	function baskerville_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
			
		// Post thumbnails
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 600, 9999 );
		add_image_size( 'post-image', 945, 9999 );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

		// Custom background
		add_theme_support( 'custom-background', array(
			'default-color'	=> '#f1f1f1'
		) );

		// Custom header
		add_theme_support( 'custom-header', array(
			'width'         => 1440,
			'height'        => 221,
			'default-image' => get_template_directory_uri() . '/images/header.jpg',
			'uploads'       => true,
			'header-text'  	=> false
		) );

		// Custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		
		// Add support for title_tag
		add_theme_support( 'title-tag' );

		// Set content width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 676;

		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'baskerville' ) );
		
		// Make the theme translation ready
		load_theme_textdomain( 'baskerville', get_template_directory() . '/languages' );
		
	}
	add_action( 'after_setup_theme', 'baskerville_setup' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_load_javascript_files' ) ) :
	function baskerville_load_javascript_files() {

		$theme_version = wp_get_theme( 'baskerville' )->get( 'Version' );

		wp_register_script( 'baskerville_flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '2.7.2' );

		wp_enqueue_script( 'baskerville_global', get_template_directory_uri() . '/js/global.js', array( 'jquery', 'masonry', 'imagesloaded', 'baskerville_flexslider' ), $theme_version );

		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'baskerville_load_javascript_files' );
endif;


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'baskerville_load_style' ) ) :
	function baskerville_load_style() {

		if ( is_admin() ) return;

		$dependencies = array();
		$theme_version = wp_get_theme( 'baskerville' )->get( 'Version' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'baskerville' );

		if ( 'off' !== $google_fonts ) {

			// Register Google Fonts
			wp_register_style( 'baskerville_googleFonts', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400italic,700,700italic,300|Pacifico:400', array(), $theme_version );
			$dependencies[] = 'baskerville_googleFonts';

		}

		// Enqueue the styles
		wp_enqueue_style( 'baskerville_style', get_template_directory_uri() . '/style.css', $dependencies, $theme_version );

	}
	add_action( 'wp_print_styles', 'baskerville_load_style' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_add_editor_styles' ) ) {
	function baskerville_add_editor_styles() {

		add_editor_style( 'baskerville-editor-style.css' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'baskerville' );

		if ( 'off' !== $google_fonts ) {
			$font_url = '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400italic,700,700italic,300';
			add_editor_style( str_replace( ',', '%2C', $font_url ) );
		}

	}
	add_action( 'init', 'baskerville_add_editor_styles' );
}


/* ---------------------------------------------------------------------------------------------
   ADD FOOTER WIDGET AREAS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_sidebar_registration' ) ) :
	function baskerville_sidebar_registration() {

		register_sidebar( array(
			'name' 			=> __( 'Footer A', 'baskerville' ),
			'id' 			=> 'footer-a',
			'description' 	=> __( 'Widgets in this area will be shown in the left column in the footer.', 'baskerville' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer B', 'baskerville' ),
			'id' 			=> 'footer-b',
			'description' 	=> __( 'Widgets in this area will be shown in the middle column in the footer.', 'baskerville' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer C', 'baskerville' ),
			'id' 			=> 'footer-c',
			'description' 	=> __( 'Widgets in this area will be shown in the right column in the footer.', 'baskerville' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Sidebar', 'baskerville' ),
			'id'			=> 'sidebar',
			'description' 	=> __( 'Widgets in this area will be shown in the sidebar.', 'baskerville' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

	}
	add_action( 'widgets_init', 'baskerville_sidebar_registration' ); 
endif;
	

/* ---------------------------------------------------------------------------------------------
   ADD THEME WIDGETS
   --------------------------------------------------------------------------------------------- */


require_once( get_template_directory() . '/widgets/dribbble-widget.php' );
require_once( get_template_directory() . '/widgets/flickr-widget.php' );


/* ---------------------------------------------------------------------------------------------
   ADD CLASSES TO PAGINATION
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_pagination_classes_next' ) ) {
	function baskerville_pagination_classes_next() {

		return 'class="post-nav-older fleft"';

	}
	add_filter( 'next_posts_link_attributes', 'baskerville_pagination_classes_next' );
}

if ( ! function_exists( 'baskerville_pagination_classes_prev' ) ) {
	function baskerville_pagination_classes_prev() {

		return 'class="post-nav-newer fright"';

	}
	add_filter( 'previous_posts_link_attributes', 'baskerville_pagination_classes_prev' );
}


/* ---------------------------------------------------------------------------------------------
   CUSTOM NAV WALKER WITH HAS-CHILDREN CLASS
   --------------------------------------------------------------------------------------------- */


class baskerville_nav_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( ! empty( $children_elements[$element->$id_field] ) ) {
            $element->classes[] = 'has-children';
        }
        Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}


/* ---------------------------------------------------------------------------------------------
   BODY CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_body_classes' ) ) {
	function baskerville_body_classes( $classes ) {
		
		// If has post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';

		// If is mobile
		if ( wp_is_mobile() ) {
			$classes[] = 'is_mobile';
		}

		// Replicate single classes on other pages
		if ( is_singular() || is_404() ) {
			$classes[] = 'single single-post';
		}

		return $classes;

	}
	add_action( 'body_class', 'baskerville_body_classes' );
}


/* ---------------------------------------------------------------------------------------------
   CUSTOM EXCERPT LENGTH
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_custom_excerpt_length' ) ) {
	function baskerville_custom_excerpt_length( $length ) {

		return 40;

	}
	add_filter( 'excerpt_length', 'baskerville_custom_excerpt_length', 999 );
}


/* ---------------------------------------------------------------------------------------------
   CUSTOM EXCERPT OUTPUT
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_new_excerpt_more' ) ) {
	function baskerville_new_excerpt_more( $more ) {

		return '... <a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Continue Reading', 'baskerville' ) . ' &rarr;</a>';

	}
	add_filter( 'excerpt_more', 'baskerville_new_excerpt_more' );
}


/* ---------------------------------------------------------------------------------------------
   BASKERVILLE META FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'baskerville_meta' ) ) :
	function baskerville_meta() {
		
		?>

		<div class="post-meta">
		
			<a class="post-date" href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
			
			<?php
			
			if ( function_exists( 'zilla_likes' ) ) zilla_likes(); 
		
			if ( comments_open() ) {
				comments_popup_link( '0', '1', '%', 'post-comments' );
			}
			
			edit_post_link(); 
			
			?>
			
			<div class="clear"></div>
		
		</div><!-- .post-meta -->
		
	<?php

	}
endif;


/* ---------------------------------------------------------------------------------------------
   REMOVE ARCHIVE PREFIXES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'baskerville_remove_archive_title_prefix' ) ) :
	function baskerville_remove_archive_title_prefix( $title ) {

		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'F Y' );
		} elseif ( is_day() ) {
			$title = get_the_date( get_option( 'date_format' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'baskerville' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'baskerville' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_search() ) {
			$title = '&lsquo;' . get_search_query() . '&rsquo;';
		} else {
			$title = __( 'Archives', 'baskerville' );
		} // End if().

		return $title;

	}
	add_filter( 'get_the_archive_title', 'baskerville_remove_archive_title_prefix' );
endif;


/* ---------------------------------------------------------------------------------------------
   GET ARCHIVE PREFIX
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'baskerville_get_archive_title_prefix' ) ) :
	function baskerville_get_archive_title_prefix() {

		if ( is_category() ) {
			$title_prefix = __( 'Category', 'baskerville' );
		} elseif ( is_tag() ) {
			$title_prefix = __( 'Tag', 'baskerville' );
		} elseif ( is_author() ) {
			$title_prefix = __( 'Author', 'baskerville' );
		} elseif ( is_year() ) {
			$title_prefix = __( 'Year', 'baskerville' );
		} elseif ( is_month() ) {
			$title_prefix = __( 'Month', 'baskerville' );
		} elseif ( is_day() ) {
			$title_prefix = __( 'Day', 'baskerville' );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			$title_prefix = $tax->labels->singular_name;
		} elseif ( is_search() ) {
			$title_prefix = __( 'Search', 'baskerville' );
		} else {
			$title_prefix = __( 'Archives', 'baskerville' );
		}
		return $title_prefix;

	}
endif;


/* ---------------------------------------------------------------------------------------------
   FLEXSLIDER OUTPUT
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_flexslider' ) ) {
	function baskerville_flexslider( $size = 'post-thumbnail' ) {

		$attachment_parent = is_page() ? $post->ID : get_the_ID();

		$images = get_posts( array(
			'orderby'        	=> 'menu_order',
			'order'          	=> 'ASC',
			'post_mime_type' 	=> 'image',
			'post_parent'   	=> $attachment_parent,
			'post_status'    	=> null,
			'post_type'     	=> 'attachment',
			'posts_per_page'    => -1,
		) );

		if ( $images ) { ?>
		
			<div class="flexslider">
			
				<ul class="slides">
		
					<?php 
					foreach( $images as $image ) :
						$attimg = wp_get_attachment_image( $image->ID, $size ); ?>
						
						<li>
							<?php echo $attimg; ?>
							<?php if ( ! empty( $image->post_excerpt ) && is_single() ) : ?>
								<div class="media-caption-container">
									<p class="media-caption"><?php echo $image->post_excerpt; ?></p>
								</div>
							<?php endif; ?>
						</li>
						
						<?php 
					endforeach; 
					?>
			
				</ul>
				
			</div><!-- .flexslider -->
			
			<?php
			
		}

	}
}


/* ---------------------------------------------------------------------------------------------
   BASKERVILLE COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'baskerville_comment' ) ) {
	function baskerville_comment( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		
			<?php __( 'Pingback:', 'baskerville' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'baskerville' ), '<span class="edit-link">', '</span>' ); ?>
			
		</li>
		<?php
				break;
			default :
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		
			<div id="comment-<?php comment_ID(); ?>" class="comment">
			
				<?php echo get_avatar( $comment, 80 ); ?>
			
				<div class="comment-inner">

					<div class="comment-header">
												
						<?php printf( '<cite class="fn">%1$s</cite>',
							get_comment_author_link()
						); ?>
						
						<p><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(  _x( '%1$s at %2$s', '[date] at [time of day]', 'baskerville' ), get_comment_date(), get_comment_time() ); ?></a></p>
						
						<div class="comment-actions">
						
							<?php edit_comment_link( __( 'Edit', 'baskerville' ), '', '' ); ?>
							
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'baskerville' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							
							<div class="clear"></div>
						
						</div><!-- .comment-actions -->
						
					</div><!-- .comment-header -->

					<div class="comment-content">
					
						<?php if ( '0' == $comment->comment_approved ) : ?>
						
							<p class="comment-awaiting-moderation"><?php _e( 'Awaiting moderation', 'baskerville' ); ?></p>
							
						<?php endif; ?>
					
						<?php comment_text(); ?>
						
					</div><!-- .comment-content -->
					
					<div class="comment-actions-below hidden">
						
						<?php edit_comment_link( __( 'Edit', 'baskerville' ), '', '' ); ?>
						
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'baskerville' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						
						<div class="clear"></div>
					
					</div><!-- .comment-actions -->
					
				</div><!-- .comment-inner -->

			</div><!-- .comment-## -->
		<?php
			break;
		endswitch;

	}
}


/* ---------------------------------------------------------------------------------------------
   BASKERVILLE THEME OPTIONS
   --------------------------------------------------------------------------------------------- */

if ( ! class_exists( 'Baskerville_Customize' ) ) :
	class Baskerville_Customize {

		public static function register( $wp_customize ) {

			// Only display the Customizer section for the baskerville_logo setting if it already has a value.
			// This means that site owners with existing logos can remove them, but new site owners can't add them.
			// Since v2.1.0, the core custom_logo setting (in the Site Identity Customizer panel) should be used instead.
			if ( ! get_theme_mod( 'baskerville_logo' ) ) return;

			// Register the logo section, setting, and control
			$wp_customize->add_section( 'baskerville_logo_section', array(
				'title'				=> __( 'Logo', 'baskerville' ),
				'priority'			=> 40,
				'description'		=> 'Upload a logo to replace the default site name and description in the header',
			) );

			$wp_customize->add_setting( 'baskerville_logo', array( 
				'sanitize_callback'	=> 'esc_url_raw' 
			) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'baskerville_logo', array(
				'label'				=> __( 'Logo', 'baskerville' ),
				'section'			=> 'baskerville_logo_section',
				'settings'			=> 'baskerville_logo',
			) ) );

		}

	}
	add_action( 'customize_register', array( 'Baskerville_Customize', 'register' ) );
endif;


/* ---------------------------------------------------------------------------------------------
   SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */


if ( ! function_exists( 'baskerville_add_gutenberg_features' ) ) :
	function baskerville_add_gutenberg_features() {

		add_theme_support( 'align-wide' );

		/* Gutenberg Palette --------------------------------------- */

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Cyan', 'Name of the cyan color in the Gutenberg palette', 'baskerville' ),
				'slug' 	=> 'accent',
				'color' => '#13C4A5',
			),
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'baskerville' ),
				'slug' 	=> 'black',
				'color' => '#222',
			),
			array(
				'name' 	=> _x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'baskerville' ),
				'slug' 	=> 'dark-gray',
				'color' => '#444',
			),
			array(
				'name' 	=> _x( 'Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'baskerville' ),
				'slug' 	=> 'medium-gray',
				'color' => '#666',
			),
			array(
				'name' 	=> _x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'baskerville' ),
				'slug' 	=> 'light-gray',
				'color' => '#888',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'baskerville' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

		/* Gutenberg Font Sizes --------------------------------------- */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'baskerville' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'baskerville' ),
				'size' 		=> 16,
				'slug' 		=> 'small',
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'baskerville' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'baskerville' ),
				'size' 		=> 18,
				'slug' 		=> 'regular',
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'baskerville' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'baskerville' ),
				'size' 		=> 24,
				'slug' 		=> 'large',
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'baskerville' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'baskerville' ),
				'size' 		=> 32,
				'slug' 		=> 'larger',
			),
		) );

	}
	add_action( 'after_setup_theme', 'baskerville_add_gutenberg_features' );
endif;


/* ---------------------------------------------------------------------------------------------
   GUTENBERG EDITOR STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'baskerville_block_editor_styles' ) ) :
	function baskerville_block_editor_styles() {

		$dependencies = array();

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'baskerville' );

		if ( 'off' !== $google_fonts ) {

			// Register Google Fonts
			wp_register_style( 'baskerville-block-editor-styles-font', '//fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400italic,700,700italic,300', false, 1.0, 'all' );
			$dependencies[] = 'baskerville-block-editor-styles-font';

		}

		// Enqueue the editor styles
		wp_enqueue_style( 'baskerville-block-editor-styles', get_theme_file_uri( '/baskerville-gutenberg-editor-style.css' ), $dependencies, '1.0', 'all' );

	}
	add_action( 'enqueue_block_editor_assets', 'baskerville_block_editor_styles', 1 );
endif;
