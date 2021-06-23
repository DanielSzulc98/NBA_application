<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.06
 */

$tornados_header_css   = '';
$tornados_header_image = get_header_image();
$tornados_header_video = tornados_get_header_video();
if ( ! empty( $tornados_header_image ) && tornados_trx_addons_featured_image_override( is_singular() || tornados_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$tornados_header_image = tornados_get_current_mode_image( $tornados_header_image );
}

$tornados_header_id = tornados_get_custom_header_id();
$tornados_header_meta = get_post_meta( $tornados_header_id, 'trx_addons_options', true );
if ( ! empty( $tornados_header_meta['margin'] ) ) {
	tornados_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( tornados_prepare_css_value( $tornados_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $tornados_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $tornados_header_id ) ) ); ?>
				<?php
				echo ! empty( $tornados_header_image ) || ! empty( $tornados_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'tornados_action_show_layout', $tornados_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
