<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_gutenberg_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_gutenberg_theme_setup9', 9 );
	function tornados_gutenberg_theme_setup9() {

		// Add wide and full blocks support
		add_theme_support( 'align-wide' );

		// Add editor styles to backend
		add_theme_support( 'editor-styles' );
		if ( tornados_exists_gutenberg() ) {
			if ( ! tornados_get_theme_setting( 'gutenberg_add_context' ) ) {
				add_editor_style( tornados_get_file_url( 'plugins/gutenberg/gutenberg-preview.css' ) );
			}
		} else {
			add_editor_style( tornados_get_file_url( 'css/editor-style.css' ) );
		}

		if ( tornados_exists_gutenberg() ) {
			add_action( 'wp_enqueue_scripts', 'tornados_gutenberg_frontend_scripts', 1100 );
			add_action( 'wp_enqueue_scripts', 'tornados_gutenberg_responsive_styles', 2000 );
			add_filter( 'tornados_filter_merge_styles', 'tornados_gutenberg_merge_styles' );
			add_filter( 'tornados_filter_merge_styles_responsive', 'tornados_gutenberg_merge_styles_responsive' );
		}
		add_action( 'enqueue_block_editor_assets', 'tornados_gutenberg_editor_scripts' );
		add_filter( 'tornados_filter_localize_script_admin',	'tornados_gutenberg_localize_script');
		add_action( 'after_setup_theme', 'tornados_gutenberg_add_editor_colors' );
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_gutenberg_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_gutenberg_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_gutenberg_tgmpa_required_plugins');
	function tornados_gutenberg_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'gutenberg' ) && tornados_storage_get_array( 'required_plugins', 'gutenberg', 'install' ) !== false ) {
			if ( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ) {
				$list[] = array(
					'name'     => tornados_storage_get_array( 'required_plugins', 'gutenberg', 'title' ),
					'slug'     => 'gutenberg',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if Gutenberg is installed and activated
if ( ! function_exists( 'tornados_exists_gutenberg' ) ) {
	function tornados_exists_gutenberg() {
		return function_exists( 'register_block_type' );
	}
}

// Return true if Gutenberg exists and current mode is preview
if ( ! function_exists( 'tornados_gutenberg_is_preview' ) ) {
	function tornados_gutenberg_is_preview() {
		return tornados_exists_gutenberg() 
				&& (
					tornados_gutenberg_is_block_render_action()
					||
					tornados_is_post_edit()
					);
	}
}

// Return true if current mode is "Block render"
if ( ! function_exists( 'tornados_gutenberg_is_block_render_action' ) ) {
	function tornados_gutenberg_is_block_render_action() {
		return tornados_exists_gutenberg() 
				&& tornados_check_url( 'block-renderer' ) && ! empty( $_GET['context'] ) && 'edit' == $_GET['context'];
	}
}

// Return true if content built with "Gutenberg"
if ( ! function_exists( 'tornados_gutenberg_is_content_built' ) ) {
	function tornados_gutenberg_is_content_built($content) {
		return tornados_exists_gutenberg() 
				&& has_blocks( $content );
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'tornados_gutenberg_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_gutenberg_frontend_scripts', 1100 );
	function tornados_gutenberg_frontend_scripts() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/gutenberg/gutenberg.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-gutenberg', $tornados_url, array(), null );
			}
		}
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'tornados_gutenberg_responsive_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_gutenberg_responsive_styles', 2000 );
	function tornados_gutenberg_responsive_styles() {
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( 'plugins/gutenberg/gutenberg-responsive.css' );
			if ( '' != $tornados_url ) {
				wp_enqueue_style( 'tornados-gutenberg-responsive', $tornados_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'tornados_gutenberg_merge_styles' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles', 'tornados_gutenberg_merge_styles');
	function tornados_gutenberg_merge_styles( $list ) {
		$list[] = 'plugins/gutenberg/gutenberg.css';
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'tornados_gutenberg_merge_styles_responsive' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles_responsive', 'tornados_gutenberg_merge_styles_responsive');
	function tornados_gutenberg_merge_styles_responsive( $list ) {
		$list[] = 'plugins/gutenberg/gutenberg-responsive.css';
		return $list;
	}
}


// Load required styles and scripts for Gutenberg Editor mode
if ( ! function_exists( 'tornados_gutenberg_editor_scripts' ) ) {
	//Handler of the add_action( 'enqueue_block_editor_assets', 'tornados_gutenberg_editor_scripts');
	function tornados_gutenberg_editor_scripts() {
		tornados_admin_scripts(true);
		tornados_admin_localize_scripts();
		// Editor styles
		if ( tornados_get_theme_setting( 'gutenberg_add_context' ) ) {
			wp_enqueue_style( 'tornados-gutenberg-preview', tornados_get_file_url( 'plugins/gutenberg/gutenberg-preview.css' ), array(), null );
		}
		// Editor scripts
		wp_enqueue_script( 'tornados-gutenberg-preview', tornados_get_file_url( 'plugins/gutenberg/gutenberg-preview.js' ), array( 'jquery' ), null, true );
	}
}

// Add plugin's specific variables to the scripts
if ( ! function_exists( 'tornados_gutenberg_localize_script' ) ) {
	//Handler of the add_filter( 'tornados_filter_localize_script_admin',	'tornados_gutenberg_localize_script');
	function tornados_gutenberg_localize_script( $arr ) {
		// Color scheme
		$arr['color_scheme'] = tornados_get_theme_option( 'color_scheme' );
		// Sidebar position on the single posts
		$arr['sidebar_position'] = 'inherit';
		$arr['expand_content'] = 'inherit';
		$post_type = 'post';
		if ( tornados_gutenberg_is_preview() && ! empty( $_GET['post'] ) ) {
			$post_type = tornados_get_edited_post_type();
			$meta = get_post_meta( $_GET['post'], 'tornados_options', true );
			if ( 'page' != $post_type && ! empty( $meta['sidebar_position_single'] ) ) {
				$arr['sidebar_position'] = $meta['sidebar_position_single'];
			} elseif ( 'page' == $post_type && ! empty( $meta['sidebar_position'] ) ) {
				$arr['sidebar_position'] = $meta['sidebar_position'];
			}
			if ( isset( $meta['expand_content'] ) ) {
				$arr['expand_content'] = $meta['expand_content'];
			}
		}
		if ( 'inherit' == $arr['sidebar_position'] ) {
			if ( 'page' != $post_type ) {
				$arr['sidebar_position'] = tornados_get_theme_option( 'sidebar_position_single' );
				if ( 'inherit' == $arr['sidebar_position'] ) {
					$arr['sidebar_position'] = tornados_get_theme_option( 'sidebar_position_blog' );
				}
			}
			if ( 'inherit' == $arr['sidebar_position'] ) {
				$arr['sidebar_position'] = tornados_get_theme_option( 'sidebar_position' );
			}
		}
		if ( 'inherit' == $arr['expand_content'] ) {
			$arr['expand_content'] = tornados_get_theme_option( 'expand_content_single' );
			if ( 'inherit' == $arr['expand_content'] && 'post' == $post_type ) {
				$arr['expand_content'] = tornados_get_theme_option( 'expand_content_blog' );
			}
			if ( 'inherit' == $arr['expand_content'] ) {
				$arr['expand_content'] = tornados_get_theme_option( 'expand_content' );
			}
		}
		$arr['expand_content'] = (int) $arr['expand_content'];
		return $arr;
	}
}

// Save CSS with custom colors and fonts to the gutenberg-editor-style.css
if ( ! function_exists( 'tornados_gutenberg_save_css' ) ) {
	add_action( 'tornados_action_save_options', 'tornados_gutenberg_save_css', 30 );
	add_action( 'trx_addons_action_save_options', 'tornados_gutenberg_save_css', 30 );
	function tornados_gutenberg_save_css() {

		$msg = '/* ' . esc_html__( "ATTENTION! This file was generated automatically! Don't change it!!!", 'tornados' )
				. "\n----------------------------------------------------------------------- */\n";

		// Get main styles
		$css = tornados_fgc( tornados_get_file_dir( 'style.css' ) );

		// Append supported plugins styles
		$css .= tornados_fgc( tornados_get_file_dir( 'css/__plugins.css' ) );

		// Append theme-vars styles
		$css .= tornados_customizer_get_css(
			array(
				'colors' => tornados_get_theme_setting( 'separate_schemes' ) ? false : null,
			)
		);
		
		// Append color schemes
		if ( tornados_get_theme_setting( 'separate_schemes' ) ) {
			$schemes = tornados_get_sorted_schemes();
			if ( is_array( $schemes ) ) {
				foreach ( $schemes as $scheme => $data ) {
					$css .= tornados_customizer_get_css(
						array(
							'fonts'  => false,
							'colors' => $data['colors'],
							'scheme' => $scheme,
						)
					);
				}
			}
		}

		// Append responsive styles
		$css .= tornados_fgc( tornados_get_file_dir( 'css/__responsive.css' ) );

		// Add context class to each selector
		if ( tornados_get_theme_setting( 'gutenberg_add_context' ) && function_exists( 'trx_addons_css_add_context' ) ) {
			$css = trx_addons_css_add_context(
						$css,
						array(
							'context' => '.edit-post-visual-editor ',
							'context_self' => array( 'html', 'body', '.edit-post-visual-editor' )
							)
					);
		} else {
			$css = apply_filters( 'tornados_filter_prepare_css', $css );
		}

		// Save styles to the file
		tornados_fpc( tornados_get_file_dir( 'plugins/gutenberg/gutenberg-preview.css' ), $msg . $css );
	}
}


// Add theme-specific colors to the Gutenberg color picker
if ( ! function_exists( 'tornados_gutenberg_add_editor_colors' ) ) {
	//Hamdler of the add_action( 'after_setup_theme', 'tornados_gutenberg_add_editor_colors' );
	function tornados_gutenberg_add_editor_colors() {
		$scheme = tornados_get_scheme_colors();
		$groups = tornados_storage_get( 'scheme_color_groups' );
		$names  = tornados_storage_get( 'scheme_color_names' );
		$colors = array();
		foreach( $groups as $g => $group ) {
			foreach( $names as $n => $name ) {
				$c = 'main' == $g ? $n : $g . '_' . str_replace( 'text_', '', $n );
				if ( isset( $scheme[ $c ] ) ) {
					$colors[] = array(
						'name'  => ( 'main' == $g ? '' : $group['title'] . ' ' ) . $name['title'],
						'slug'  => $c,
						'color' => $scheme[ $c ]
					);
				}
			}
			if ( 'main' == $g ) {
				break;
			}
		}
		add_theme_support( 'editor-color-palette', $colors );
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( tornados_exists_gutenberg() ) {
	require_once TORNADOS_THEME_DIR . 'plugins/gutenberg/gutenberg-styles.php';
}
