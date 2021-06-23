<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_essential_grid_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_essential_grid_theme_setup9', 9 );
	function tornados_essential_grid_theme_setup9() {
		if ( tornados_exists_essential_grid() ) {
			add_action( 'wp_enqueue_scripts', 'tornados_essential_grid_frontend_scripts', 1100 );
			add_filter( 'tornados_filter_merge_styles', 'tornados_essential_grid_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_essential_grid_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_essential_grid_tgmpa_required_plugins');
	function tornados_essential_grid_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'essential-grid' ) && tornados_storage_get_array( 'required_plugins', 'essential-grid', 'install' ) !== false && tornados_is_theme_activated() ) {
			$path = tornados_get_plugin_source_path( 'plugins/essential-grid/essential-grid.zip' );
			if ( ! empty( $path ) || tornados_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => tornados_storage_get_array( 'required_plugins', 'essential-grid', 'title' ),
					'slug'     => 'essential-grid',
					'source'   => ! empty( $path ) ? $path : 'upload://essential-grid.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'tornados_exists_essential_grid' ) ) {
	function tornados_exists_essential_grid() {
		return defined( 'EG_PLUGIN_PATH' );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'tornados_essential_grid_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_essential_grid_frontend_scripts', 1100 );
	function tornados_essential_grid_frontend_scripts() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/essential-grid/essential-grid.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-essential-grid', $tornados_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'tornados_essential_grid_merge_styles' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles', 'tornados_essential_grid_merge_styles');
	function tornados_essential_grid_merge_styles( $list ) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}

