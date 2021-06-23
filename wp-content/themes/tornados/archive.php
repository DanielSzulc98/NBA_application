<?php
/**
 * The template file to display taxonomies archive
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.57
 */

// Redirect to the template page (if exists) for output current taxonomy
if ( is_category() || is_tag() || is_tax() ) {
	$tornados_term = get_queried_object();
	global $wp_query;
	if ( ! empty( $tornados_term->taxonomy ) && ! empty( $wp_query->posts[0]->post_type ) ) {
		$tornados_taxonomy  = tornados_get_post_type_taxonomy( $wp_query->posts[0]->post_type );
		if ( $tornados_taxonomy == $tornados_term->taxonomy ) {
			$tornados_template_page_id = tornados_get_template_page_id( array(
				'post_type'  => $wp_query->posts[0]->post_type,
				'parent_cat' => $tornados_term->term_id
			) );
			if ( 0 < $tornados_template_page_id ) {
				wp_safe_redirect( get_permalink( $tornados_template_page_id ) );
				exit;
			}
		}
	}
}
// If template page is not exists - display default blog archive template
get_template_part( apply_filters( 'tornados_filter_get_template_part', tornados_blog_archive_get_template() ) );
