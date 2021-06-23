<?php
/* Mail Chimp support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_mailchimp_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_mailchimp_theme_setup9', 9 );
	function tornados_mailchimp_theme_setup9() {
		if ( tornados_exists_mailchimp() ) {
			add_action( 'wp_enqueue_scripts', 'tornados_mailchimp_frontend_scripts', 1100 );
			add_filter( 'tornados_filter_merge_styles', 'tornados_mailchimp_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_mailchimp_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_mailchimp_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_mailchimp_tgmpa_required_plugins');
	function tornados_mailchimp_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'mailchimp-for-wp' ) && tornados_storage_get_array( 'required_plugins', 'mailchimp-for-wp', 'install' ) !== false ) {
			$list[] = array(
				'name'     => tornados_storage_get_array( 'required_plugins', 'mailchimp-for-wp', 'title' ),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'tornados_exists_mailchimp' ) ) {
	function tornados_exists_mailchimp() {
		return function_exists( '__mc4wp_load_plugin' ) || defined( 'MC4WP_VERSION' );
	}
}



// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue styles for frontend
if ( ! function_exists( 'tornados_mailchimp_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_mailchimp_frontend_scripts', 1100 );
	function tornados_mailchimp_frontend_scripts() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/mailchimp-for-wp/mailchimp-for-wp.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-mailchimp', $tornados_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'tornados_mailchimp_merge_styles' ) ) {
	//Handler of the add_filter( 'tornados_filter_merge_styles', 'tornados_mailchimp_merge_styles');
	function tornados_mailchimp_merge_styles( $list ) {
		$list[] = 'plugins/mailchimp-for-wp/mailchimp-for-wp.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( tornados_exists_mailchimp() ) {
	require_once TORNADOS_THEME_DIR . 'plugins/mailchimp-for-wp/mailchimp-for-wp-styles.php'; }

