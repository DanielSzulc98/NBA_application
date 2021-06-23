<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	// Prepare theme-specific vars:

	// Position of the related posts
	$tornados_related_position = tornados_get_theme_option( 'related_position' );

	// Type of the prev/next posts navigation
	$tornados_posts_navigation = tornados_get_theme_option( 'posts_navigation' );
	if ( 'scroll' == $tornados_posts_navigation ) {
		$tornados_prev_post = get_previous_post( true );         // Get post from same category
		if ( ! $tornados_prev_post ) {
			$tornados_prev_post = get_previous_post( false );    // Get post from any category
			if ( ! $tornados_prev_post ) {
				$tornados_posts_navigation = 'links';
			}
		}
		// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
		if ( $tornados_prev_post && tornados_get_value_gp( 'action' ) == 'prev_post_loading' ) {
			tornados_storage_set_array( 'options_meta', 'post_thumbnail_type', 'default' );
			if ( tornados_get_theme_option( 'post_header_position' ) != 'below' ) {
				tornados_storage_set_array( 'options_meta', 'post_header_position', 'above' );
			}
			tornados_sc_layouts_showed( 'featured', false );
			tornados_sc_layouts_showed( 'title', false );
			tornados_sc_layouts_showed( 'postmeta', false );
		}
	}

	// If related posts should be inside the content
	if ( strpos( $tornados_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// If related posts should be inside the content
	if ( strpos( $tornados_related_position, 'inside' ) === 0 ) {
		$tornados_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'tornados_action_related_posts' );
		$tornados_related_content = ob_get_contents();
		ob_end_clean();

		$tornados_related_position_inside = max( 0, min( 9, tornados_get_theme_option( 'related_position_inside' ) ) );
		if ( 0 == $tornados_related_position_inside ) {
			$tornados_related_position_inside = mt_rand( 1, 9 );
		}
		
		$tornados_p_number = 0;
		$tornados_related_inserted = false;
		for ( $i = 0; $i < strlen( $tornados_content ) - 3; $i++ ) {
			if ( $tornados_content[ $i ] == '<' && $tornados_content[ $i + 1 ] == 'p' && in_array( $tornados_content[ $i + 2 ], array( '>', ' ' ) ) ) {
				$tornados_p_number++;
				if ( $tornados_related_position_inside == $tornados_p_number ) {
					$tornados_related_inserted = true;
					$tornados_content = ( $i > 0 ? substr( $tornados_content, 0, $i ) : '' )
										. $tornados_related_content
										. substr( $tornados_content, $i );
				}
			}
		}
		if ( ! $tornados_related_inserted ) {
			$tornados_content .= $tornados_related_content;
		}

		tornados_show_layout( $tornados_content );
	}

	// Author bio
	if ( tornados_get_theme_option( 'show_author_info' ) == 1
		&& ! is_attachment()
		&& get_the_author_meta( 'description' )
		&& ( 'scroll' != $tornados_posts_navigation || tornados_get_theme_option( 'posts_navigation_scroll_hide_author' ) == 0 )
	) {
		do_action( 'tornados_action_before_post_author' );
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'tornados_action_after_post_author' );
	}

	// Previous/next post navigation.
	if ( 'links' == $tornados_posts_navigation ) {
		do_action( 'tornados_action_before_post_navigation' );
		?>
		<div class="nav-links-single<?php
			if ( ! tornados_is_off( tornados_get_theme_option( 'posts_navigation_fixed' ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
			<?php
			the_post_navigation(
				array(
					'next_text' => '<span class="nav-arrow"></span>'
						. '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'tornados' ) . '</span> '
						. '<h6 class="post-title">%title</h6>',
					'prev_text' => '<span class="nav-arrow"></span>'
						. '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'tornados' ) . '</span> '
						. '<h6 class="post-title">%title</h6>',
				)
			);
			?>
		</div>
		<?php
		do_action( 'tornados_action_after_post_navigation' );
	}

	// Related posts
	if ( 'below_content' == $tornados_related_position && ( 'scroll' != $tornados_posts_navigation || tornados_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 ) ) {
	    do_action( 'tornados_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( ( comments_open() || get_comments_number() ) && ( 'scroll' != $tornados_posts_navigation || tornados_get_theme_option( 'posts_navigation_scroll_hide_comments' ) == 0 ) ) {
		do_action( 'tornados_action_before_comments' );
		comments_template();
		do_action( 'tornados_action_after_comments' );
	}

	if ( 'scroll' == $tornados_posts_navigation ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $tornados_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $tornados_prev_post ) ); ?>"
			data-post-title="<?php echo esc_attr( get_the_title( $tornados_prev_post ) ); ?>">
		</div>
		<?php
	}
}

get_footer();
