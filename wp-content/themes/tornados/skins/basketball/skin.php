<?php
/**
 * Skins support: Main skin file for the skin 'Basketball'
 *
 * Setup skin-dependent fonts and colors, load scripts and styles,
 * and other operations that affect the appearance and behavior of the theme
 * when the skin is activated
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.46
 */


// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'tornados_skin_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'tornados_skin_theme_setup3', 3 );
	function tornados_skin_theme_setup3() {
		// ToDo: Add / Modify theme options, required plugins, etc.
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_skin_tgmpa_required_plugins' ) ) {
	add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_skin_tgmpa_required_plugins' );
	function tornados_skin_tgmpa_required_plugins( $list = array() ) {
		// ToDo: Check if plugin is in the 'required_plugins' and add his parameters to the TGMPA-list
		//       Replace 'skin-specific-plugin-slug' to the real slug of the plugin
		if ( tornados_storage_isset( 'required_plugins', 'sportspress' ) && tornados_storage_get_array( 'required_plugins', 'sportspress', 'install' ) !== false ) {
			$list[] = array(
                'name'     => tornados_storage_get_array( 'required_plugins', 'sportspress-for-basketball', 'title' ),
                'slug'     => 'sportspress-for-basketball',
                'required' => false,
            );
		}
		return $list;
	}
}


// Enqueue skin-specific styles and scripts
// Priority 1150 - after plugins-specific (1100), but before child theme (1200)
if ( ! function_exists( 'tornados_skin_frontend_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'tornados_skin_frontend_scripts', 1150 );
	function tornados_skin_frontend_scripts() {
		$tornados_url = tornados_get_file_url( TORNADOS_SKIN_DIR . 'skin.css' );
		if ( '' != $tornados_url ) {
			wp_enqueue_style( 'tornados-skin-' . esc_attr( TORNADOS_SKIN_NAME ), $tornados_url, array(), null );
		}
		if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
			$tornados_url = tornados_get_file_url( TORNADOS_SKIN_DIR . 'skin.js' );
			if ( '' != $tornados_url ) {
				wp_enqueue_script( 'tornados-skin-' . esc_attr( TORNADOS_SKIN_NAME ), $tornados_url, array( 'jquery' ), null, true );
			}
		}
	}
}

// Enqueue skin-specific responsive styles
// Priority 2050 - after theme responsive 2000
if ( ! function_exists( 'tornados_skin_styles_responsive' ) ) {
	add_action( 'wp_enqueue_scripts', 'tornados_skin_styles_responsive', 2050 );
	function tornados_skin_styles_responsive() {
		$tornados_url = tornados_get_file_url( TORNADOS_SKIN_DIR . 'skin-responsive.css' );
		if ( '' != $tornados_url ) {
			wp_enqueue_style( 'tornados-skin-' . esc_attr( TORNADOS_SKIN_NAME ) . '-responsive', $tornados_url, array(), null );
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'tornados_skin_merge_scripts' ) ) {
	add_filter( 'tornados_filter_merge_scripts', 'tornados_skin_merge_scripts' );
	function tornados_skin_merge_scripts( $list ) {
		if ( tornados_get_file_dir( TORNADOS_SKIN_DIR . 'skin.js' ) != '' ) {
			$list[] = TORNADOS_SKIN_DIR . 'skin.js';
		}
		return $list;
	}
}

// Set theme specific importer options
if ( ! function_exists( 'tornados_skin_importer_set_options' ) ) {
	add_filter('trx_addons_filter_importer_options', 'tornados_skin_importer_set_options', 9);
	function tornados_skin_importer_set_options($options = array()) {
		if ( is_array( $options ) ) {
			$options['demo_type'] = 'basketball';
			$options['files']['basketball'] = $options['files']['default'];
			$options['files']['basketball']['title'] = esc_html__('Basketball Demo', 'tornados');
			$options['files']['basketball']['domain_demo'] = esc_url( tornados_get_protocol() . '://tornados.ancorathemes.com' );   // Demo-site domain
			unset($options['files']['default']);
		}
		return $options;
	}
}
if ( ! function_exists( 'tornados_customizer_theme_setup' ) ) {
	add_action( 'after_setup_theme', 'tornados_customizer_theme_setup', 4 );
	function tornados_customizer_theme_setup() {

		tornados_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Open Sans',
					'family' => 'sans-serif',
					'styles' => '300,300i,400,400i,500,500i,600,600i,700,700i,800',    
				),
				array(
					'name'   => 'Arvo',
					'family' => 'sans-serif',
					'styles' => '400,400i,700,700i', 
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		tornados_storage_set( 'load_fonts_subset', 'latin,latin-ext' );


		tornados_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'tornados' ),
					'font-family'     => '"Open Sans",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.76em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.6em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'tornados' ),
					'font-family'     => '"Arvo",sans-serif',
					'font-size'       => '4.286em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.69em',
					'margin-bottom'   => '0.63em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'tornados' ),
					'font-family'     => '"Arvo",sans-serif',
					'font-size'       => '3.2143em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.82em',
					'margin-bottom'   => '0.52em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'tornados' ),
					'font-family'     => '"Arvo",sans-serif',
					'font-size'       => '2.571em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '2.2em',
					'margin-bottom'   => '0.92em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'tornados' ),
					'font-family'     => '"Arvo",sans-serif',
					'font-size'       => '2.143em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.06em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '2.3em',
					'margin-bottom'   => '0.6em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'tornados' ),
					'font-family'     => '"Arvo",sans-serif',
					'font-size'       => '1.714em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.06em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '2.9em',
					'margin-bottom'   => '0.7em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'tornados' ),
					'font-family'     => '"Open Sans",sans-serif',
					'font-size'       => '1.286em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.23em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '3.25em',
					'margin-bottom'   => '0.69em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'tornados' ),
					'font-family'     => '"Arvo",sans-serif',
					'font-size'       => '1.9em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.1em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'tornados' ),
					'font-family'     => '"Open Sans",sans-serif',
					'font-size'       => '14px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '18px',
					'text-decoration' => 'none',
					'text-transform'  => '',
					'letter-spacing'  => '0',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'tornados' ),
					'font-family'     => 'inherit',
					'font-size'       => '1em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'tornados' ),
					'font-family'     => 'inherit',
					'font-size'       => '13px',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.4em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'tornados' ),
					'font-family'     => '"Open Sans",sans-serif',
					'font-size'       => '16px',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '0.18px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'tornados' ),
					'font-family'     => '"Open Sans",sans-serif',
					'font-size'       => '14px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.35em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.18px',
				),
			)
		);



	tornados_storage_set(
			'schemes', array(

				// Color scheme: 'default'
				'default' => array(
					'title'    => esc_html__( 'Default', 'tornados' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#ffffff', 
						'bd_color'         => '#e3e3e3', 

						// Text and links colors
						'text'             => '#797e87', 
						'text_light'       => '#797e87',  
						'text_dark'        => '#262f3e', 
						'text_link'        => '#EA592E', 
						'text_hover'       => '#081324', 
						'text_link2'       => '#80d572',
						'text_hover2'      => '#8be77c',
						'text_link3'       => '#ddb837',
						'text_hover3'      => '#eec432',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#ffffff', 
						'alter_bg_hover'   => '#f4f4f4', 
						'alter_bd_color'   => '#e3e3e3', 
						'alter_bd_hover'   => '#EBEBEB', 
						'alter_text'       => '#797e87', 
						'alter_light'      => '#b7b7b7',
						'alter_dark'       => '#1d1d1d',
						'alter_link'       => '#EA592E',
						'alter_hover'      => '#EA592E',
						'alter_link2'      => '#ffffff',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#F2D653',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#0134BD', 
						'extra_bg_hover'   => '#28272e',
						'extra_bd_color'   => '#262f3e', 
						'extra_bd_hover'   => '#3d3d3d',
						'extra_text'       => '#9d9ea1', 
						'extra_light'      => '#797e87',
						'extra_dark'       => '#8c9097', 
						'extra_link'       => '#ffffff', 
						'extra_hover'      => '#EA592E',
						'extra_link2'      => '#0134bd',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#0A080B',
						'extra_hover3'     => '#EA592E',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#f4f4f4', 
						'input_bg_hover'   => '#f4f4f4', 
						'input_bd_color'   => '#e4e4e4', 
						'input_bd_hover'   => '#262f3e', 
						'input_text'       => '#797e87', 
						'input_light'      => '#797e87', 
						'input_dark'       => '#262f3e', 

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#67bcc1',
						'inverse_bd_hover' => '#5aa4a9',
						'inverse_text'     => '#1d1d1d',
						'inverse_light'    => '#333333',
						'inverse_dark'     => '#000000',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#ffffff',
					),
				),
				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'tornados' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#0134BD', 
						'bd_color'         => '#262F3E', 

						// Text and links colors
						'text'             => '#848992', 
						'text_light'       => '#6f6f6f',
						'text_dark'        => '#ffffff', 
						'text_link'        => '#EA592E', 
						'text_hover'       => '#ffffff', 
						'text_link2'       => '#80d572',
						'text_hover2'      => '#8be77c',
						'text_link3'       => '#ddb837',
						'text_hover3'      => '#eec432',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#0134BD', 
						'alter_bg_hover'   => '#333333',
						'alter_bd_color'   => '#848992',  
						'alter_bd_hover'   => '#262F3E',  
						'alter_text'       => '#a6a6a6',
						'alter_light'      => '#6f6f6f',
						'alter_dark'       => '#ffffff',
						'alter_link'       => '#EA592E', 
						'alter_hover'      => '#262F3E',
						'alter_link2'      => '#EA592E',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#F2D653',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#ffffff', 
						'extra_bg_hover'   => '#224452',
						'extra_bd_color'   => '#464646',
						'extra_bd_hover'   => '#4a4a4a',
						'extra_text'       => '#a6a6a6',
						'extra_light'      => '#6f6f6f',
						'extra_dark'       => '#262f3e', 
						'extra_link'       => '#0134BD', 
						'extra_hover'      => '#EA592E', 
						'extra_link2'      => '#0134bd',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#0134BD',
						'extra_hover3'     => '#262f3e',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#ffffff',
						'input_bg_hover'   => '#262F3E',
						'input_bd_color'   => '#262F3E',
						'input_bd_hover'   => '#353535',
						'input_text'       => '#b7b7b7',
						'input_light'      => '#6f6f6f',
						'input_dark'       => '#ffffff',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#e36650',
						'inverse_bd_hover' => '#cb5b47',
						'inverse_text'     => '#1d1d1d',
						'inverse_light'    => '#6f6f6f',
						'inverse_dark'     => '#000000',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#262f3e', 
					),
				),

			)
		);

	}
}

// Add slin-specific colors and fonts to the custom CSS
require_once TORNADOS_THEME_DIR . TORNADOS_SKIN_DIR . 'skin-styles.php';