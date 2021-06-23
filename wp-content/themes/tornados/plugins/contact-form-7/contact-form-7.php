<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_cf7_theme_setup9', 9 );
	function tornados_cf7_theme_setup9() {
		if ( tornados_exists_cf7() ) {
			add_action( 'wp_enqueue_scripts', 'tornados_cf7_frontend_scripts', 1100 );
			add_filter( 'tornados_filter_merge_scripts', 'tornados_cf7_merge_scripts' );
		}
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_cf7_tgmpa_required_plugins' );
			add_filter( 'tornados_filter_theme_plugins', 'tornados_cf7_theme_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_cf7_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_cf7_tgmpa_required_plugins');
	function tornados_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'contact-form-7' ) && tornados_storage_get_array( 'required_plugins', 'contact-form-7', 'install' ) !== false ) {
			// CF7 plugin
			$list[] = array(
				'name'     => tornados_storage_get_array( 'required_plugins', 'contact-form-7', 'title' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
		}
		return $list;
	}
}

// Filter theme-supported plugins list
if ( ! function_exists( 'tornados_cf7_theme_plugins' ) ) {
	//Handler of the add_filter( 'tornados_filter_theme_plugins', 'tornados_cf7_theme_plugins' );
	function tornados_cf7_theme_plugins( $list = array() ) {
		if ( ! empty( $list['contact-form-7']['group'] ) ) {
			foreach ( $list as $k => $v ) {
				if ( substr( $k, 0, 15 ) == 'contact-form-7-' ) {
					if ( empty( $v['group'] ) ) {
						$list[ $k ]['group'] = $list['contact-form-7']['group'];
					}
					if ( ! empty( $list['contact-form-7']['logo'] ) ) {
						$list[ $k ]['logo'] = strpos( $list['contact-form-7']['logo'], '//' ) !== false
												? $list['contact-form-7']['logo']
												: tornados_get_file_url( "plugins/contact-form-7/{$list['contact-form-7']['logo']}" );
					}
				}
			}
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'tornados_exists_cf7' ) ) {
	function tornados_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'tornados_cf7_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_cf7_frontend_scripts', 1100 );
	function tornados_cf7_frontend_scripts() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
			if ( '' != $tornados_url ) {
				wp_enqueue_script( 'tornados-cf7', $tornados_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'tornados_cf7_merge_scripts' ) ) {
	//Handler of the add_filter('tornados_filter_merge_scripts', 'tornados_cf7_merge_scripts');
	function tornados_cf7_merge_scripts( $list ) {
		$list[] = 'plugins/contact-form-7/contact-form-7.js';
		return $list;
	}
}
