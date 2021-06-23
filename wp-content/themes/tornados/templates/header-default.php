<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

$tornados_header_css   = '';
$tornados_header_image = get_header_image();
$tornados_header_video = tornados_get_header_video();
if ( ! empty( $tornados_header_image ) && tornados_trx_addons_featured_image_override( is_singular() || tornados_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$tornados_header_image = tornados_get_current_mode_image( $tornados_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $tornados_header_image ) || ! empty( $tornados_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $tornados_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $tornados_header_image ) {
		echo ' ' . esc_attr( tornados_add_inline_css_class( 'background-image: url(' . esc_url( $tornados_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( tornados_is_on( tornados_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight tornados-full-height';
	}
	if ( ! tornados_is_inherit( tornados_get_theme_option( 'header_scheme' ) ) ) {
		echo ' scheme_' . esc_attr( tornados_get_theme_option( 'header_scheme' ) );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $tornados_header_video ) ) {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	if ( tornados_get_theme_option( 'menu_style' ) == 'top' ) {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-navi' ) );
	}

	// Mobile header
	if ( tornados_is_on( tornados_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-mobile' ) );
	}

	if ( !is_single() || ( tornados_get_theme_option( 'post_header_position' ) == 'default' && tornados_get_theme_option( 'post_thumbnail_type' ) == 'default' ) ) {
		// Page title and breadcrumbs area
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-title' ) );
	}

	?>
</header>
