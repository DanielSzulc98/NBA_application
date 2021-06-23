<?php
/**
 * The Front Page template file.
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.31
 */

get_header();

// If front-page is a static page
if ( get_option( 'show_on_front' ) == 'page' ) {

	// If Front Page Builder is enabled - display sections
	if ( tornados_is_on( tornados_get_theme_option( 'front_page_enabled' ) ) ) {

		if ( have_posts() ) {
			the_post();
		}

		$tornados_sections = tornados_array_get_keys_by_value( tornados_get_theme_option( 'front_page_sections' ), 1, false );
		if ( is_array( $tornados_sections ) ) {
			foreach ( $tornados_sections as $tornados_section ) {
				get_template_part( apply_filters( 'tornados_filter_get_template_part', 'front-page/section', $tornados_section ), $tornados_section );
			}
		}

		// Else if this page is blog archive
	} elseif ( is_page_template( 'blog.php' ) ) {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'blog' ) );

		// Else - display native page content
	} else {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'page' ) );
	}

	// Else get index template to show posts
} else {
	get_template_part( apply_filters( 'tornados_filter_get_template_part', 'index' ) );
}

get_footer();
