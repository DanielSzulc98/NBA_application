<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_instagram_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_instagram_feed_theme_setup9', 9 );
	function tornados_instagram_feed_theme_setup9() {
		if ( tornados_exists_instagram_feed() ) {
			add_action( 'wp_enqueue_scripts', 'tornados_instagram_responsive_styles', 2000 );
			add_filter( 'tornados_filter_merge_styles_responsive', 'tornados_instagram_merge_styles_responsive' );
		}
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_instagram_feed_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_instagram_feed_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_instagram_feed_tgmpa_required_plugins');
	function tornados_instagram_feed_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'instagram-feed' ) && tornados_storage_get_array( 'required_plugins', 'instagram-feed', 'install' ) !== false ) {
			$list[] = array(
				'name'     => tornados_storage_get_array( 'required_plugins', 'instagram-feed', 'title' ),
				'slug'     => 'instagram-feed',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if Instagram Feed installed and activated
if ( ! function_exists( 'tornados_exists_instagram_feed' ) ) {
	function tornados_exists_instagram_feed() {
		return defined( 'SBIVER' );
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'tornados_instagram_responsive_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_instagram_responsive_styles', 2000 );
	function tornados_instagram_responsive_styles() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/instagram/instagram-responsive.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-instagram-responsive', $tornados_url, array(), null );
			}
		}
	}
}

// Merge responsive styles
if ( ! function_exists( 'tornados_instagram_merge_styles_responsive' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles_responsive', 'tornados_instagram_merge_styles_responsive');
	function tornados_instagram_merge_styles_responsive( $list ) {
		$list[] = 'plugins/instagram/instagram-responsive.css';
		return $list;
	}
}

