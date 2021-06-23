<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_revslider_theme_setup9', 9 );
	function tornados_revslider_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_revslider_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_revslider_tgmpa_required_plugins');
	function tornados_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'revslider' ) && tornados_storage_get_array( 'required_plugins', 'revslider', 'install' ) !== false && tornados_is_theme_activated() ) {
			$path = tornados_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || tornados_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => tornados_storage_get_array( 'required_plugins', 'revslider', 'title' ),
					'slug'     => 'revslider',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'tornados_exists_revslider' ) ) {
	function tornados_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}
