<?php
/* WPBakery PageBuilder support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_vc_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_vc_theme_setup9', 9 );
	function tornados_vc_theme_setup9() {

		if ( tornados_exists_vc() ) {
		
			add_action( 'wp_enqueue_scripts', 'tornados_vc_frontend_scripts', 1100 );
			add_action( 'wp_enqueue_scripts', 'tornados_vc_responsive_styles', 2000 );
			add_filter( 'tornados_filter_merge_styles', 'tornados_vc_merge_styles' );
			add_filter( 'tornados_filter_merge_styles_responsive', 'tornados_vc_merge_styles_responsive' );

			// Add/Remove params in the standard VC shortcodes
			//-----------------------------------------------------
			add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tornados_vc_add_params_classes', 10, 3 );
			add_filter( 'vc_iconpicker-type-fontawesome', 'tornados_vc_iconpicker_type_fontawesome' );

			// Color scheme
			$scheme  = array(
				'param_name'  => 'scheme',
				'heading'     => esc_html__( 'Color scheme', 'tornados' ),
				'description' => wp_kses_data( __( 'Select color scheme to decorate this block', 'tornados' ) ),
				'group'       => esc_html__( 'Colors', 'tornados' ),
				'admin_label' => true,
				'value'       => array_flip( tornados_get_list_schemes( true ) ),
				'type'        => 'dropdown',
			);
			$sc_list = apply_filters( 'tornados_filter_add_scheme_in_vc', array( 'vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text' ) );
			foreach ( $sc_list as $sc ) {
				vc_add_param( $sc, $scheme );
			}

			// Load custom VC styles for blog archive page
			add_filter( 'tornados_filter_blog_archive_start', 'tornados_vc_add_inline_css' );
		}

		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_vc_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_vc_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_vc_tgmpa_required_plugins');
	function tornados_vc_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'js_composer' ) && tornados_storage_get_array( 'required_plugins', 'js_composer', 'install' ) !== false && tornados_is_theme_activated() ) {
			$path = tornados_get_plugin_source_path( 'plugins/js_composer/js_composer.zip' );
			if ( ! empty( $path ) || tornados_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => tornados_storage_get_array( 'required_plugins', 'js_composer', 'title' ),
					'slug'     => 'js_composer',
					'source'   => ! empty( $path ) ? $path : 'upload://js_composer.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'tornados_exists_vc' ) ) {
	function tornados_exists_vc() {
		return class_exists( 'Vc_Manager' );
	}
}

// Check if plugin in frontend editor mode
if ( ! function_exists( 'tornados_vc_is_frontend' ) ) {
	function tornados_vc_is_frontend() {
		return ( isset( $_GET['vc_editable'] ) && 'true' == $_GET['vc_editable'] )
			|| ( isset( $_GET['vc_action'] ) && 'vc_inline' == $_GET['vc_action'] );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'tornados_vc_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_vc_frontend_scripts', 1100 );
	function tornados_vc_frontend_scripts() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/js_composer/js_composer.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-vc', $tornados_url, array(), null );
			}
		}
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'tornados_vc_responsive_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_vc_responsive_styles', 2000 );
	function tornados_vc_responsive_styles() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/js_composer/js_composer-responsive.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-vc-responsive', $tornados_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'tornados_vc_merge_styles' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles', 'tornados_vc_merge_styles');
	function tornados_vc_merge_styles( $list ) {
		$list[] = 'plugins/js_composer/js_composer.css';
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'tornados_vc_merge_styles_responsive' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles_responsive', 'tornados_vc_merge_styles_responsive');
	function tornados_vc_merge_styles_responsive( $list ) {
		$list[] = 'plugins/js_composer/js_composer-responsive.css';
		return $list;
	}
}

// Add VC custom styles to the inline CSS
if ( ! function_exists( 'tornados_vc_add_inline_css' ) ) {
	//Handler of the add_filter('tornados_filter_blog_archive_start', 'tornados_vc_add_inline_css');
	function tornados_vc_add_inline_css( $html ) {
		$vc_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $vc_custom_css ) ) {
			tornados_add_inline_css( strip_tags( $vc_custom_css ) );
		}
		return $html;
	}
}



// Shortcodes support
//------------------------------------------------------------------------

// Add params to the standard VC shortcodes
if ( ! function_exists( 'tornados_vc_add_params_classes' ) ) {
	//Handler of the add_filter( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tornados_vc_add_params_classes', 10, 3 );
	function tornados_vc_add_params_classes( $classes, $sc, $atts ) {
		// Add color scheme
		if ( in_array( $sc, apply_filters( 'tornados_filter_add_scheme_in_vc', array( 'vc_section', 'vc_row', 'vc_row_inner', 'vc_column', 'vc_column_inner', 'vc_column_text' ) ) ) ) {
			if ( ! empty( $atts['scheme'] ) && ! tornados_is_inherit( $atts['scheme'] ) ) {
				$classes .= ( $classes ? ' ' : '' ) . 'scheme_' . $atts['scheme'];
			}
		}
		return $classes;
	}
}

// Add theme icons to the VC iconpicker list
if ( ! function_exists( 'tornados_vc_iconpicker_type_fontawesome' ) ) {
	//Handler of the add_filter( 'vc_iconpicker-type-fontawesome',	'tornados_vc_iconpicker_type_fontawesome' );
	function tornados_vc_iconpicker_type_fontawesome( $icons ) {
		$list = tornados_get_list_icons_classes();
		if ( ! is_array( $list ) || count( $list ) == 0 ) {
			return $icons;
		}
		$rez = array();
		foreach ( $list as $icon ) {
			$rez[] = array( $icon => str_replace( 'icon-', '', $icon ) );
		}
		return array_merge( $icons, array( esc_html__( 'Theme Icons', 'tornados' ) => $rez ) );
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( tornados_exists_vc() ) {
	require_once TORNADOS_THEME_DIR . 'plugins/js_composer/js_composer-styles.php'; }

