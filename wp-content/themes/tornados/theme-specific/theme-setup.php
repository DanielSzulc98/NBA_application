<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'TORNADOS_THEME_FREE' ) ) {
	define( 'TORNADOS_THEME_FREE', false );
}
if ( ! defined( 'TORNADOS_THEME_FREE_WP' ) ) {
	define( 'TORNADOS_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'TORNADOS_ALLOW_SKINS' ) ) {
	define( 'TORNADOS_ALLOW_SKINS', true );
}
if ( ! defined( 'TORNADOS_DEFAULT_SKIN' ) ) {
	define( 'TORNADOS_DEFAULT_SKIN', 'basketball' );
}



// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
//-------------------------------------------------------------------------
$GLOBALS['TORNADOS_STORAGE'] = array(

	
	'theme_pro_key'      => 'env-ancora',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => '',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => 'http://tornados.ancorathemes.com/',
	'theme_doc_url'      => 'http://tornados.ancorathemes.com/doc',
	
	'theme_rate_url'     => 'https://themeforest.net/download',

    'theme_custom_url'   => '',

    
	'theme_download_url'  => '//themeforest.net/user/ancorathemes/portfolio',        

	'theme_support_url'   => '//ancorathemes.com/theme-support/',                    

	'theme_video_url'     => '//www.youtube.com/channel/UCdIjRh7-lPVHqTTKpaf8PLA',   

	'theme_privacy_url'   => '//ancorathemes.com/privacy-policy/',                   

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array(
			'min' => 768
		),
		'mobile'     => array(
			'max' => 767
		),
	),
);



// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$tornados_theme_required_plugins_group = esc_html__( 'Core', 'tornados' );
$tornados_theme_required_plugins = array(
	// Section: "CORE" (required plugins)
	// DON'T COMMENT OR REMOVE NEXT LINES!
	'trx_addons'         => array(
								'title'       => esc_html__( 'ThemeREX Addons', 'tornados' ),
								'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'tornados' ),
								'required'    => true,
								'logo'        => 'logo.png',
								'group'       => $tornados_theme_required_plugins_group,
							),
);

// Section: "PAGE BUILDERS"
$tornados_theme_required_plugins_group = esc_html__( 'Page Builders', 'tornados' );
$tornados_theme_required_plugins['elementor'] = array(
	'title'       => esc_html__( 'Elementor', 'tornados' ),
	'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'tornados' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $tornados_theme_required_plugins_group,
);
$tornados_theme_required_plugins['gutenberg'] = array(
	'title'       => esc_html__( 'Gutenberg', 'tornados' ),
	'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'tornados' ),
	'required'    => false,
	'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
	'logo'        => 'logo.png',
	'group'       => $tornados_theme_required_plugins_group,
);

if ( ! TORNADOS_THEME_FREE ) {
    $tornados_theme_required_plugins['js_composer']          = array(
        'title'       => esc_html__( 'WPBakery PageBuilder', 'tornados' ),
        'description' => esc_html__( "Popular PageBuilder which allows you to create excellent pages", 'tornados' ),
        'required'    => false,
        'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
        'logo'        => 'logo.jpg',
        'group'       => $tornados_theme_required_plugins_group,
    );
}


// Section: "E-COMMERCE"
$tornados_theme_required_plugins_group = esc_html__( 'E-Commerce', 'tornados' );
$tornados_theme_required_plugins['woocommerce']              = array(
	'title'       => esc_html__( 'WooCommerce', 'tornados' ),
	'description' => esc_html__( "Connect the store to your website and start selling now", 'tornados' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $tornados_theme_required_plugins_group,
);


// Section: "SOCIALS & COMMUNITIES"
$tornados_theme_required_plugins_group = esc_html__( 'Socials and Communities', 'tornados' );
$tornados_theme_required_plugins['instagram-feed']   = array(
	'title'       => esc_html__( 'Instagram Feed', 'tornados' ),
	'description' => esc_html__( "Displays the latest photos from your profile on Instagram", 'tornados' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $tornados_theme_required_plugins_group,
);
$tornados_theme_required_plugins['mailchimp-for-wp'] = array(
	'title'       => esc_html__( 'MailChimp for WP', 'tornados' ),
	'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'tornados' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $tornados_theme_required_plugins_group,
);

// Section: "EVENTS & TIMELINES"
$tornados_theme_required_plugins_group = esc_html__( 'Events and Appointments', 'tornados' );
if ( ! TORNADOS_THEME_FREE ) {
	$tornados_theme_required_plugins['the-events-calendar']    = array(
		'title'       => esc_html__( 'The Events Calendar', 'tornados' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $tornados_theme_required_plugins_group,
	);
}

// Section: "CONTENT"
$tornados_theme_required_plugins_group = esc_html__( 'Content', 'tornados' );
$tornados_theme_required_plugins['contact-form-7'] = array(
	'title'       => esc_html__( 'Contact Form 7', 'tornados' ),
	'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'tornados' ),
	'required'    => false,
	'logo'        => 'logo.jpg',
	'group'       => $tornados_theme_required_plugins_group,
);
if ( ! TORNADOS_THEME_FREE ) {
    $tornados_theme_required_plugins['sportspress']             = array(
        'title'       => esc_html__( 'SportsPress', 'tornados' ),
        'description' => '',
        'required'    => false,
        'logo'        => 'logo.png',
        'group'       => $tornados_theme_required_plugins_group,
    );
    $tornados_theme_required_plugins['sportspress-for-basketball']             = array(
        'title'       => esc_html__( 'SportsPress for Basketball', 'tornados' ),
        'description' => '',
        'required'    => false,
        'logo'        => 'logo.png',
        'group'       => $tornados_theme_required_plugins_group,
    );
	$tornados_theme_required_plugins['essential-grid']             = array(
		'title'       => esc_html__( 'Essential Grid', 'tornados' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $tornados_theme_required_plugins_group,
	);
	$tornados_theme_required_plugins['revslider']                  = array(
		'title'       => esc_html__( 'Revolution Slider', 'tornados' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'logo.png',
		'group'       => $tornados_theme_required_plugins_group,
	);
	$tornados_theme_required_plugins['sitepress-multilingual-cms'] = array(
		'title'       => esc_html__( 'WPML - Sitepress Multilingual CMS', 'tornados' ),
		'description' => esc_html__( "Allows you to make your website multilingual", 'tornados' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'logo.png',
		'group'       => $tornados_theme_required_plugins_group,
	);
}

// Section: "OTHER"
$tornados_theme_required_plugins_group = esc_html__( 'Other', 'tornados' );
$tornados_theme_required_plugins['wp-gdpr-compliance'] = array(
	'title'       => esc_html__( 'WP GDPR Compliance', 'tornados' ),
	'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'tornados' ),
	'required'    => false,
	'logo'        => 'logo.png',
	'group'       => $tornados_theme_required_plugins_group,
);
$tornados_theme_required_plugins['trx_updater'] = array(
	'title'       => esc_html__( 'ThemeREX Updater', 'tornados' ),
	'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'tornados' ),
	'required'    => false,
	'logo'        => 'trx_updater.png',
	'group'       => $tornados_theme_required_plugins_group,
);

// Add plugins list to the global storage
$GLOBALS['TORNADOS_STORAGE']['required_plugins'] = $tornados_theme_required_plugins;

// THEME-SPECIFIC BLOG LAYOUTS
//----------------------------------------------
$tornados_theme_blog_styles = array(
	'excerpt' => array(
		'title'   => esc_html__( 'Standard', 'tornados' ),
		'archive' => 'index-excerpt',
		'item'    => 'content-excerpt',
		'styles'  => 'excerpt',
	),
	'classic' => array(
		'title'   => esc_html__( 'Classic', 'tornados' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'classic',
	),
);
if ( ! TORNADOS_THEME_FREE ) {
	$tornados_theme_blog_styles['masonry']   = array(
		'title'   => esc_html__( 'Masonry', 'tornados' ),
		'archive' => 'index-classic',
		'item'    => 'content-classic',
		'columns' => array( 2, 3 ),
		'styles'  => 'masonry',
	);
	$tornados_theme_blog_styles['portfolio'] = array(
		'title'   => esc_html__( 'Portfolio', 'tornados' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio',
		'columns' => array( 2, 3, 4 ),
		'styles'  => 'portfolio',
	);
	$tornados_theme_blog_styles['gallery']   = array(
		'title'   => esc_html__( 'Gallery', 'tornados' ),
		'archive' => 'index-portfolio',
		'item'    => 'content-portfolio-gallery',
		'columns' => array( 2, 3, 4 ),
		'styles'  => array( 'portfolio', 'gallery' ),
	);
	$tornados_theme_blog_styles['chess']     = array(
		'title'   => esc_html__( 'Chess', 'tornados' ),
		'archive' => 'index-chess',
		'item'    => 'content-chess',
		'columns' => array( 1, 2, 3 ),
		'styles'  => 'chess',
	);
}

// Add list of blog styles to the global storage
$GLOBALS['TORNADOS_STORAGE']['blog_styles'] = $tornados_theme_blog_styles;


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'tornados_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'tornados_customizer_theme_setup1', 1 );
	function tornados_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		tornados_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',                    // none  - use separate options for the main and the child-theme
																		// child - duplicate theme options from the main theme to the child-theme only
																		// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',                     // Refresh method for preview area in the Appearance - Customize:
																		// auto - refresh preview area on change each field with Theme Options
																		// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                          // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,                       // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,                       // Display author's avatar in the post meta

				'icons_selector'         => 'internal',                 // Icons selector in the shortcodes:
																		// vc  default  - standard VC (very slow) or Elementor's icons selector (not support images and svg)
																		// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',                    // Type of icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present icons
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',                    // Type of socials icons (if 'icons_selector' is 'internal'):
																		// icons  - use font icons to present social networks
																		// images - use images from theme's folder trx_addons/css/icons.png
																		// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,                       // Check if exists a .min version of .css and .js and return path to it
																		// instead the path to the original file
																		// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,                      // Show any menu if no menu selected in the location 'main_menu'
																		// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,                      // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,                       // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,                      // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,                      // Allow to use theme-specific image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,                       // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,                      // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																		// In the Page Options this styles are present always
																		// (can be removed if filter 'tornados_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,                      // Add arrows on the single attachment page to navigate to the prev/next attachment

				'gutenberg_safe_mode'    => array(),                    // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'gutenberg_add_context'  => false,                      // Add context to the Gutenberg editor styles with our method (if true - use if any problem with editor styles) or use native Gutenberg way via add_editor_style() (if false - used by default)

				'allow_gutenberg_blocks' => true,                       // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,                       // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',                  // Add our breakpoints to the Responsive section of each element
																		// 'add' - add our breakpoints after Elementor's
																		// 'replace' - add our breakpoints instead Elementor's
																		// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		tornados_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Poppins',
					'family' => 'sans-serif',
					'styles' => '100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800',     // Parameter 'style' used only for the Google fonts
				),
				// Font-face packed with theme
				array(
					'name'   => 'BebasNeue',
					'family' => 'sans-serif',
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
					'font-family'     => '"Poppins",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.76em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.26px',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.6em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'tornados' ),
					'font-family'     => '"BebasNeue",sans-serif',
					'font-size'       => '4.286em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '0.93em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '2.1px',
					'margin-top'      => '1.69em',
					'margin-bottom'   => '0.63em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'tornados' ),
					'font-family'     => '"BebasNeue",sans-serif',
					'font-size'       => '3.429em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '0.96em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '1.75px',
					'margin-top'      => '1.82em',
					'margin-bottom'   => '0.52em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'tornados' ),
					'font-family'     => '"BebasNeue",sans-serif',
					'font-size'       => '2.571em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '0.91em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '1.3px',
					'margin-top'      => '2.2em',
					'margin-bottom'   => '0.92em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'tornados' ),
					'font-family'     => '"BebasNeue",sans-serif',
					'font-size'       => '2.143em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.06em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '1.1px',
					'margin-top'      => '2.3em',
					'margin-bottom'   => '0.6em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'tornados' ),
					'font-family'     => '"BebasNeue",sans-serif',
					'font-size'       => '1.714em',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.06em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.85px',
					'margin-top'      => '2.9em',
					'margin-bottom'   => '0.7em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'tornados' ),
					'font-family'     => '"Poppins",sans-serif',
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
					'font-family'     => '"BebasNeue",sans-serif',
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
					'font-family'     => '"Poppins",sans-serif',
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
					'font-family'     => '"Poppins",sans-serif',
					'font-size'       => '14px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.18px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'tornados' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'tornados' ),
					'font-family'     => '"Poppins",sans-serif',
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

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		tornados_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'tornados' ),
					'description' => esc_html__( 'Colors of the main content area', 'tornados' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'tornados' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'tornados' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'tornados' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'tornados' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'tornados' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'tornados' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'tornados' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'tornados' ),
				),
			)
		);
		tornados_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'tornados' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'tornados' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'tornados' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'tornados' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'tornados' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'tornados' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'tornados' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'tornados' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'tornados' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'tornados' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'tornados' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'tornados' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'tornados' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'tornados' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'tornados' ),
					'description' => esc_html__( 'Color of the links inside this block', 'tornados' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'tornados' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'tornados' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'tornados' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'tornados' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'tornados' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'tornados' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'tornados' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'tornados' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'tornados' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'tornados' ),
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
						'text_link'        => '#ff0000', 
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
						'alter_link'       => '#ff0000', 
						'alter_hover'      => '#ff0000',
						'alter_link2'      => '#ffffff',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#eec432',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#081224', 
						'extra_bg_hover'   => '#28272e',
						'extra_bd_color'   => '#262f3e', 
						'extra_bd_hover'   => '#3d3d3d',
						'extra_text'       => '#9d9ea1', 
						'extra_light'      => '#797e87',
						'extra_dark'       => '#8c9097', 
						'extra_link'       => '#ffffff', 
						'extra_hover'      => '#ff0000',
						'extra_link2'      => '#80d572',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ddb837',
						'extra_hover3'     => '#eec432',

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

                // Color scheme: 'alter'
                'alter' => array(
                    'title'    => esc_html__( 'Alter', 'tornados' ),
                    'internal' => true,
                    'colors'   => array(

                        // Whole block border and background
                        'bg_color'         => '#ffffff', 
                        'bd_color'         => '#e3e3e3', 

                        // Text and links colors
                        'text'             => '#797e87', 
                        'text_light'       => '#797e87',  
                        'text_dark'        => '#262f3e', 
                        'text_link'        => '#ff0000', 
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
                        'alter_link'       => '#ff0000', 
                        'alter_hover'      => '#ff0000',
                        'alter_link2'      => '#ffffff',
                        'alter_hover2'     => '#80d572',
                        'alter_link3'      => '#eec432',
                        'alter_hover3'     => '#ddb837',

                        // Extra blocks (submenu, tabs, color blocks, etc.)
                        'extra_bg_color'   => '#224452', 
                        'extra_bg_hover'   => '#28272e',
                        'extra_bd_color'   => '#262f3e', 
                        'extra_bd_hover'   => '#3d3d3d',
                        'extra_text'       => '#797e87', 
                        'extra_light'      => '#797e87',
                        'extra_dark'       => '#8c9097', 
                        'extra_link'       => '#ffffff', 
                        'extra_hover'      => '#ff0000',
                        'extra_link2'      => '#80d572',
                        'extra_hover2'     => '#8be77c',
                        'extra_link3'      => '#ddb837',
                        'extra_hover3'     => '#eec432',

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
						'bg_color'         => '#081224', 
						'bd_color'         => '#262F3E', 

						// Text and links colors
						'text'             => '#848992', 
						'text_light'       => '#6f6f6f',
						'text_dark'        => '#ffffff', 
						'text_link'        => '#ff0000', 
						'text_hover'       => '#ffffff', 
						'text_link2'       => '#80d572',
						'text_hover2'      => '#8be77c',
						'text_link3'       => '#ddb837',
						'text_hover3'      => '#eec432',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#081224', 
						'alter_bg_hover'   => '#333333',
						'alter_bd_color'   => '#848992',  
						'alter_bd_hover'   => '#262F3E',  
						'alter_text'       => '#a6a6a6',
						'alter_light'      => '#6f6f6f',
						'alter_dark'       => '#ffffff',
						'alter_link'       => '#ff0000', 
						'alter_hover'      => '#262F3E',
						'alter_link2'      => '#ff0000',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#eec432',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#ffffff', 
						'extra_bg_hover'   => '#224452',
						'extra_bd_color'   => '#464646',
						'extra_bd_hover'   => '#4a4a4a',
						'extra_text'       => '#a6a6a6',
						'extra_light'      => '#6f6f6f',
						'extra_dark'       => '#262f3e', 
						'extra_link'       => '#081224', 
						'extra_hover'      => '#ff0000', 
						'extra_link2'      => '#80d572',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ddb837',
						'extra_hover3'     => '#eec432',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#262F3E',
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




        tornados_storage_set( 'schemes_original', tornados_storage_get( 'schemes' ) );




		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		tornados_storage_set(
			'schemes_simple', array(
				'text_link'        => array(),
				'text_hover'       => array(),
				'text_link2'       => array(),
				'text_hover2'      => array(),
				'text_link3'       => array(),
				'text_hover3'      => array(),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		tornados_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
                'text_dark_04'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.4,
                ),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		tornados_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		tornados_storage_set(
			'theme_thumbs', apply_filters(
				'tornados_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'tornados-thumb-huge'        => array(
						'size'  => array( 1278, 719, true ),
						'title' => esc_html__( 'Huge image', 'tornados' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'tornados-thumb-big'         => array(
						'size'  => array( 818, 461, true ),
						'title' => esc_html__( 'Large image', 'tornados' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'tornados-thumb-med'         => array(
						'size'  => array( 406, 228, true ),
						'title' => esc_html__( 'Medium image', 'tornados' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'tornados-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'tornados' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'tornados-thumb-masonry-big' => array(
						'size'  => array( 818, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'tornados' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'tornados-thumb-masonry'     => array(
						'size'  => array( 406, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'tornados' ),
						'subst' => 'trx_addons-thumb-masonry',
					),

                    'tornados-thumb-extra'         => array(
                        'size'  => array( 600, 394, true ),
                        'title' => esc_html__( 'Extra image', 'tornados' ),
                        'subst' => 'trx_addons-thumb-extra',
                    ),
                    'tornados-thumb-alternate'         => array(
                        'size'  => array( 650, 720, true ),
                        'title' => esc_html__( 'Alternate image', 'tornados' ),
                        'subst' => 'trx_addons-thumb-alternate',
                    ),
                    'tornados-thumb-height'         => array(
                        'size'  => array( 380, 495, true ),
                        'title' => esc_html__( 'Height image', 'tornados' ),
                        'subst' => 'trx_addons-thumb-height',
                    ),
                    'tornados-thumb-plain'         => array(
                        'size'  => array( 260, 240, true ),
                        'title' => esc_html__( 'Plain image', 'tornados' ),
                        'subst' => 'trx_addons-thumb-plain',
                    ),
				)
			)
		);
	}
}



//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'tornados_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'tornados_importer_set_options', 9 );
	function tornados_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( tornados_get_protocol() . '://demofiles.ancorathemes.com/tornados/' );
			// Required plugins
			$options['required_plugins'] = array_keys( tornados_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 0;
			// Default demo
			$options['files']['basketball']['title']       = esc_html__( 'Tornados Demo', 'tornados' );
			$options['files']['basketball']['domain_dev']  = '';       // Developers domain
			$options['files']['basketball']['domain_demo'] = esc_url( tornados_get_protocol() . '://tornados.ancorathemes.com' );       // Demo-site domain
			$options['banners'] = array();
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'tornados_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'tornados_ocdi_set_options', 9 );
	function tornados_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( tornados_get_protocol() . '://demofiles.ancorathemes.com/tornados/' );
			// Required plugins
			$options['required_plugins'] = array_keys( tornados_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'FC United OCDI Demo', 'tornados' );
			$options['files']['ocdi']['domain_demo'] = esc_url( tornados_get_protocol() . '://tornados.ancorathemes.com' );
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'tornados_create_theme_options' ) ) {

	function tornados_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = esc_html__( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'tornados' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( tornados_storage_get( 'schemes' ) ) < 2;

		tornados_storage_set(

			'options', array(

				// 'Logo & Site Identity'
				//---------------------------------------------
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'tornados' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'tornados' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'tornados' ),
					'desc'     => wp_kses_data( esc_html__( 'Use the site title and tagline as a text logo if no image is selected', 'tornados' ) ),
					'class'    => 'tornados_column-1_2 tornados_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'tornados' ) ),
					'class'    => 'tornados_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'tornados' ),
					'desc'    => wp_kses_post(
									__( 'Zoom the logo (set 1 to leave original size).', 'tornados' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'tornados' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'tornados' )
								),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'tornados' ) ),
					'class'      => 'tornados_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'tornados' ) ),
					'class' => 'tornados_column-1_2 tornados_new_row',
					'std'   => '',
					'type'  => 'hidden'
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'tornados' ) ),
					'class'      => 'tornados_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
                    'type'  => 'hidden'
                ),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'tornados' ) ),
					'class' => 'tornados_column-1_2 tornados_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'tornados' ) ),
					'class'      => 'tornados_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_side'                     => array(
					'title' => esc_html__( 'Logo for the side menu', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu', 'tornados' ) ),
					'class' => 'tornados_column-1_2 tornados_new_row',
					'std'   => '',
					'type'  => 'hidden',
				),
				'logo_side_retina'              => array(
					'title'      => esc_html__( 'Logo for the side menu on Retina', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'tornados' ) ),
					'class'      => 'tornados_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
                    'type'  => 'hidden',
				),



				// 'General settings'
				//---------------------------------------------
				'general'                       => array(
					'title'    => esc_html__( 'General', 'tornados' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'tornados' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'tornados' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => tornados_get_list_body_styles( false ),
					'type'     => 'select',
				),
                'body_color'                    => array(
                    'title'    => esc_html__( 'Body color', 'tornados' ),
                    'desc'     => wp_kses_data( __( 'Body background color', 'tornados' ) ),
                    'override' => array(
                        'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
                        'section' => esc_html__( 'Content', 'tornados' ),
                    ),
                    'qsetup'   => esc_html__( 'General', 'tornados' ),
                    'refresh'  => false,
                    'std'      => '#F4F4F4',
                    'type'     => 'color',
                ),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'tornados' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1278,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),
				'page_boxed_extra'             => array(
					'title'      => esc_html__( 'Boxed page extra spaces', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Width of the extra side space on boxed pages', 'tornados' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'std'        => 60,
					'min'        => 0,
					'max'        => 300,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page_boxed_extra',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'tornados' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'tornados' ),
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_ss'       => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'tornados' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'tornados' ) ),
					'std'        => 435,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'tornados' ) ),
					'std'        => 25,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'tornados' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_widgets_info'          => array(
					'title' => esc_html__( 'Additional widgets', 'tornados' ),
					'desc'  => '',
					'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page'            => array(
					'title'    => esc_html__( 'Widgets at the top of the page', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content'         => array(
					'title'    => esc_html__( 'Widgets above the content', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content'         => array(
					'title'    => esc_html__( 'Widgets below the content', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page'            => array(
					'title'    => esc_html__( 'Widgets at the bottom of the page', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'tornados' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',
					'type'       => 'hidden',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'tornados' ),
					'desc'  => '',
					'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'tornados' ) ),
					'std'   => 0,
					'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'tornados'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'tornados') ),
					"std"   => wp_kses_post( __( 'I agree that my submitted data is being collected and stored.', 'tornados') ),
					"type"  => "text"
				),



				// 'Header'
				//---------------------------------------------
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'tornados' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'std'      => 'default',
					'options'  => tornados_get_list_header_footer_types(),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'tornados' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => TORNADOS_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight'             => array(
					'title'    => esc_html__( 'Header fullheight', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'std'      => 0,
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header zoom', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'tornados' ) ),
					'std'     => 1,
					'min'     => 0.3,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),

				'header_widgets_info'           => array(
					'title' => esc_html__( 'Header widgets', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Here you can place a widget slider, advertising banners, etc.', 'tornados' ) ),
					'type'  => 'info',
				),
				'header_widgets'                => array(
					'title'    => esc_html__( 'Header widgets', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select set of widgets to show in the header on each page', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
						'desc'    => wp_kses_data( __( 'Select set of widgets to show in the header on this page', 'tornados' ) ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => 'select',
				),
				'header_columns'                => array(
					'title'      => esc_html__( 'Header columns', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'dependency' => array(
						'header_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => tornados_get_list_range( 0, 6 ),
					'type'       => 'select',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'tornados' ) ),
					'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'tornados' ),
					),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'tornados' ) ),
					'std'   => 1,
					'type'  => 'hidden',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'tornados' ),
					'desc'  => '',
					'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'tornados' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'tornados' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'std'      => 0,
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'tornados' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => 'hidden',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'tornados' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
                    'type'       => 'hidden',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'tornados' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
                    'type'       => 'hidden',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'tornados' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
                    'type'       => 'hidden',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'tornados' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
                    'type'       => 'hidden',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'tornados' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
                    'type'       => 'hidden',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'tornados' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
                    'type'       => 'hidden',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'tornados' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
                    'type'       => 'hidden',
				),



				// 'Footer'
				//---------------------------------------------
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'tornados' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'tornados' ),
					),
					'std'      => 'default',
					'options'  => tornados_get_list_header_footer_types(),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'tornados' ),
					'desc'       => wp_kses_post( __( 'Select custom footer from Layouts Builder', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'tornados' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => TORNADOS_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'tornados' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'tornados' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => tornados_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'tornados' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'tornados' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'hidden',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'tornados' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'tornados' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'tornados' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'hidden',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'tornados' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by AncoraThemes. All rights reserved.', 'tornados' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),



				// 'Mobile version'
				//---------------------------------------------
				'mobile'                        => array(
					'title'    => esc_html__( 'Mobile', 'tornados' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 55,
					'type'     => 'section',
				),

				'mobile_header_info'            => array(
					'title' => esc_html__( 'Header on the mobile device', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_mobile'            => array(
					'title'    => esc_html__( 'Header style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => tornados_get_list_header_footer_types( true ),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_mobile'           => array(
					'title'      => esc_html__( 'Select custom layout', 'tornados' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'tornados' ) ),
					'dependency' => array(
						'header_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_mobile'        => array(
					'title'    => esc_html__( 'Header position', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_sidebar_info'           => array(
					'title' => esc_html__( 'Sidebar on the mobile device', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_mobile'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on mobile devices', 'tornados' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_mobile'         => array(
					'title'   => esc_html__( 'Expand content', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden on mobile devices', 'tornados' ) ),
					'refresh' => false,
					'dependency' => array(
						'sidebar_position_mobile' => array( 'hide', 'inherit' ),
					),
					'std'     => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),

				'mobile_footer_info'           => array(
					'title' => esc_html__( 'Footer on the mobile device', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'footer_type_mobile'           => array(
					'title'    => esc_html__( 'Footer style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => tornados_get_list_header_footer_types(true),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'tornados' ),
					'desc'       => wp_kses_post( __( 'Select custom footer from Layouts Builder', 'tornados' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets_mobile'        => array(
					'title'      => esc_html__( 'Footer widgets', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'tornados' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns_mobile'        => array(
					'title'      => esc_html__( 'Footer columns', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'tornados' ) ),
					'dependency' => array(
						'footer_type_mobile'    => array( 'default' ),
						'footer_widgets_mobile' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => tornados_get_list_range( 0, 6 ),
					'type'       => 'select',
				),



				// 'Blog'
				//---------------------------------------------
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'tornados' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),


				// Blog - Posts page
				//---------------------------------------------
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'tornados' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'tornados' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'tornados' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'tornados' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'tornados' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'tornados' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'tornados' ),
						'fullpost' => esc_html__( 'Full post', 'tornados' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'tornados' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 39,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'tornados' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'tornados' ) ),
					'std'     => 2,
					'options' => tornados_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'tornados' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'tornados' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'tornados' ),
						'links'    => esc_html__( 'Older/Newest', 'tornados' ),
						'more'     => esc_html__( 'Load more', 'tornados' ),
						'infinite' => esc_html__( 'Infinite scroll', 'tornados' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => tornados_get_list_header_footer_types( true ),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'tornados' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'tornados' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => TORNADOS_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'tornados' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'tornados' ) ),
					'std'     => 'inherit',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'tornados' ),
					'type'    => 'switch',
				),
				'sidebar_position_ss_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'tornados' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'tornados' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'tornados' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'tornados' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_widgets_info'             => array(
					'title' => esc_html__( 'Additional widgets', 'tornados' ),
					'desc'  => '',
					'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'tornados' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_above_content_blog'    => array(
					'title'   => esc_html__( 'Widgets above the content', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'tornados' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_content_blog'    => array(
					'title'   => esc_html__( 'Widgets below the content', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'tornados' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'tornados' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'tornados' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'tornados' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'tornados' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'tornados' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'tornados' ),
						'columns' => esc_html__( 'Mini-cards', 'tornados' ),
					),
					'type'    => 'hidden'
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'tornados' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'tornados' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|views=0|likes=0|comments=0|author=0|share=0|edit=0',
					'options'    => tornados_get_list_meta_parts(),
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'checklist',
				),


				// Blog - Single posts
				//---------------------------------------------
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'tornados' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_single'            => array(
					'title'    => esc_html__( 'Header style', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => tornados_get_list_header_footer_types( true ),
					'type'     => TORNADOS_THEME_FREE || ! tornados_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_single'           => array(
					'title'      => esc_html__( 'Select custom layout', 'tornados' ),
					'desc'       => wp_kses_post( __( 'Select custom header from Layouts Builder', 'tornados' ) ),
					'dependency' => array(
						'header_type_single' => array( 'custom' ),
					),
					'std'        => TORNADOS_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_single'        => array(
					'title'    => esc_html__( 'Header position', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_single'      => array(
					'title'    => esc_html__( 'Header fullheight', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'tornados' ) ),
					'std'      => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide_single'            => array(
					'title'      => esc_html__( 'Header fullwidth', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'tornados' ) ),
					'dependency' => array(
						'header_type_single' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'tornados' ) ),
					'std'     => 'right',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_ss_single'=> array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the single posts on the small screen - above or below the content', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'tornados' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_single'           => array(
					'title'   => esc_html__( 'Expand content', 'tornados' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'tornados' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options'  => tornados_get_list_checkbox_values( true ),
					'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'tornados' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'tornados' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'tornados' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'fullwidth'   => esc_html__( 'Fullwidth', 'tornados' ),
						'boxed'       => esc_html__( 'Boxed', 'tornados' ),
						'default'     => esc_html__( 'Default', 'tornados' ),
					),
					'type'       => 'hidden',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'tornados' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 )
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'tornados' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'tornados' ),
						'default'    => esc_html__( 'Default', 'tornados' ),
					),
                    'type'       => 'hidden',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'tornados' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'tornados'),
						'tl' => esc_html__('Top Left', 'tornados'),
						'tc' => esc_html__('Top Center', 'tornados'),
						'tr' => esc_html__('Top Right', 'tornados'),
						'ml' => esc_html__('Middle Left', 'tornados'),
						'mc' => esc_html__('Middle Center', 'tornados'),
						'mr' => esc_html__('Middle Right', 'tornados'),
						'bl' => esc_html__('Bottom Left', 'tornados'),
						'bc' => esc_html__('Bottom Center', 'tornados'),
						'br' => esc_html__('Bottom Right', 'tornados'),
						'bs' => esc_html__('Bottom Stick Out', 'tornados'),
					),
                    'type'       => 'hidden',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'tornados' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'tornados' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'tornados' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_single'             => array(
					'title'      => esc_html__( 'Post meta', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'tornados' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'tornados' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|views=0|likes=0|comments=0|author=0|share=0|edit=0',
					'options'    => tornados_get_list_meta_parts(),
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'tornados' ) ),
					'std'   => 1,
					'type'  => ! tornados_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'tornados' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'tornados' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'tornados' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'classic',
					'options'    => array(
						'modern'  => esc_html__( 'Modern', 'tornados' ),
						'classic' => esc_html__( 'Classic', 'tornados' ),
						'wide'    => esc_html__( 'Wide', 'tornados' ),
						'list'    => esc_html__( 'List', 'tornados' ),
						'short'   => esc_html__( 'Short', 'tornados' ),
					),
					'type'       => 'hidden',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'inside'        => esc_html__( 'Inside the content (fullwidth)', 'tornados' ),
						'inside_left'   => esc_html__( 'At left side of the content', 'tornados' ),
						'inside_right'  => esc_html__( 'At right side of the content', 'tornados' ),
						'below_content' => esc_html__( 'After the content', 'tornados' ),
						'below_page'    => esc_html__( 'After the content & sidebar', 'tornados' ),
					),
					'type'       => 'hidden',
				),
				'related_position_inside'       => array(
					'title'      => esc_html__( 'Before # paragraph', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Before what paragraph should related posts appear? If 0 - randomly.', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'inside_left', 'inside_right' ),
					),
					'std'        => 2,
					'options'    => tornados_get_list_range( 0, 9 ),
                    'type'       => 'hidden',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'tornados' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 9,
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'slider',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'tornados' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page?', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'below_content', 'below_page' ),
					),
					'std'        => 2,
					'options'    => tornados_get_list_range( 1, 6 ),
					'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
                    'type'       => 'hidden',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'tornados'),
						'side'    => esc_html__('Side', 'tornados'),
						'outside' => esc_html__('Outside', 'tornados'),
						'top'     => esc_html__('Top', 'tornados'),
						'bottom'  => esc_html__('Bottom', 'tornados')
					),
                    'type'       => 'hidden',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'tornados'),
						'bottom'  => esc_html__('Bottom', 'tornados')
					),
                    'type'       => 'hidden',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'tornados' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'tornados' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
                    'type'       => 'hidden',
				),
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Posts navigation', 'tornados' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'posts_navigation'           => array(
					'title'   => esc_html__( 'Show posts navigation', 'tornados' ),
					'desc'    => wp_kses_data( __( "Show posts navigation on the single post's pages", 'tornados' ) ),
					'std'     => 'links',
					'options' => array(
						'none'   => esc_html__('None', 'tornados'),
						'links'  => esc_html__('Prev/Next links', 'tornados'),
					),
					'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
				),
				'posts_navigation_fixed'     => array(
					'title'      => esc_html__( 'Fixed posts navigation', 'tornados' ),
					'desc'       => wp_kses_data( __( "Make posts navigation fixed position. Display it when the content of the article is inside the window.", 'tornados' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'links' ),
					),
					'std'        => 0,
					'type'       => 'hidden',
				),
				'posts_navigation_scroll_hide_author'  => array(
					'title'      => esc_html__( 'Hide author bio', 'tornados' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when infinite scroll is used.", 'tornados' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 0,
                    'type'       => 'hidden',
                ),
				'posts_navigation_scroll_hide_related'  => array(
					'title'      => esc_html__( 'Hide related posts', 'tornados' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when infinite scroll is used.", 'tornados' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 0,
                    'type'       => 'hidden',
                ),
				'posts_navigation_scroll_hide_comments' => array(
					'title'      => esc_html__( 'Hide comments', 'tornados' ),
					'desc'       => wp_kses_data( __( "Hide comments after post content when infinite scroll is used.", 'tornados' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 1,
                    'type'       => 'hidden',
                ),
				'posts_banners_info'      => array(
					'title' => esc_html__( 'Posts banners', 'tornados' ),
					'desc'  => '',
                    'type'  => 'hidden',
				),
				'header_banner_link'     => array(
					'title' => esc_html__( 'Header banner link', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'   => '',
					'type'  => 'hidden',
				),
				'header_banner_img'     => array(
					'title' => esc_html__( 'Header banner image', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
                    'type'  => 'hidden',
                ),
				'header_banner_height'  => array(
					'title' => esc_html__( 'Header banner height', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Specify minimal height of the banner (in "px" or "em"). For example: 15em', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
                    'type'  => 'hidden',
                ),
				'header_banner_code'     => array(
					'title'      => esc_html__( 'Header banner code', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
					'allow_html' => true,
                    'type'  => 'hidden',
				),
				'footer_banner_link'     => array(
					'title' => esc_html__( 'Footer banner link', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'   => '',
                    'type'  => 'hidden',
				),
				'footer_banner_img'     => array(
					'title' => esc_html__( 'Footer banner image', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
                    'type'  => 'hidden',
				),
				'footer_banner_height'  => array(
					'title' => esc_html__( 'Footer banner height', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Specify minimal height of the banner (in "px" or "em"). For example: 15em', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
                    'type'  => 'hidden',
				),
				'footer_banner_code'     => array(
					'title'      => esc_html__( 'Footer banner code', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
					'allow_html' => true,
                    'type'  => 'hidden',
				),
				'sidebar_banner_link'     => array(
					'title' => esc_html__( 'Sidebar banner link', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'   => '',
                    'type'  => 'hidden',
				),
				'sidebar_banner_img'     => array(
					'title' => esc_html__( 'Sidebar banner image', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
                    'type'  => 'hidden',
				),
				'sidebar_banner_code'     => array(
					'title'      => esc_html__( 'Sidebar banner code', 'tornados' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
					'allow_html' => true,
                    'type'  => 'hidden',
				),
				'background_banner_link'     => array(
					'title' => esc_html__( "Post's background banner link", 'tornados' ),
					'desc'  => wp_kses_data( __( 'Insert URL of the banner', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'   => '',
                    'type'  => 'hidden',
				),
				'background_banner_img'     => array(
					'title' => esc_html__( "Post's background banner image", 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select image to display at the backgound', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
                    'type'  => 'hidden',
				),
				'background_banner_code'     => array(
					'title'      => esc_html__( "Post's background banner code", 'tornados' ),
					'desc'       => wp_kses_data( __( 'Embed html code', 'tornados' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Banners', 'tornados' ),
					),
					'std'        => '',
					'allow_html' => true,
                    'type'  => 'hidden',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),



				// 'Colors'
				//---------------------------------------------
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'tornados' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'tornados' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'tornados' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'tornados' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'tornados' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'tornados' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'tornados' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'tornados' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'tornados' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => 'hidden',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'tornados' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'tornados' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'tornados' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'tornados' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'tornados' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'tornados' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'tornados' ),
					'desc'        => '',
					'std'         => '$tornados_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);



		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			//---------------------------------------------
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'tornados' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'tornados' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'tornados' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'tornados' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'tornados' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'tornados' ) ),
				'class'   => 'tornados_column-1_3 tornados_new_row',
				'refresh' => false,
				'std'     => '$tornados_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= tornados_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( tornados_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'tornados' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'tornados' ),
				'desc'    => '',
				'class'   => 'tornados_column-1_3 tornados_new_row',
				'refresh' => false,
				'std'     => '$tornados_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'tornados' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'tornados' ) )
							: '',
				'class'   => 'tornados_column-1_3',
				'refresh' => false,
				'std'     => '$tornados_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'tornados' ),
					'serif'      => esc_html__( 'serif', 'tornados' ),
					'sans-serif' => esc_html__( 'sans-serif', 'tornados' ),
					'monospace'  => esc_html__( 'monospace', 'tornados' ),
					'cursive'    => esc_html__( 'cursive', 'tornados' ),
					'fantasy'    => esc_html__( 'fantasy', 'tornados' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'tornados' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'tornados' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'tornados' ) )
							: '',
				'class'   => 'tornados_column-1_3',
				'refresh' => false,
				'std'     => '$tornados_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = tornados_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'tornados' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses_post( sprintf( __( 'Font settings of the "%s" tag.', 'tornados' ), $tag ) ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'tornados' ),
						'100'     => esc_html__( '100 (Light)', 'tornados' ),
						'200'     => esc_html__( '200 (Light)', 'tornados' ),
						'300'     => esc_html__( '300 (Thin)', 'tornados' ),
						'400'     => esc_html__( '400 (Normal)', 'tornados' ),
						'500'     => esc_html__( '500 (Semibold)', 'tornados' ),
						'600'     => esc_html__( '600 (Semibold)', 'tornados' ),
						'700'     => esc_html__( '700 (Bold)', 'tornados' ),
						'800'     => esc_html__( '800 (Black)', 'tornados' ),
						'900'     => esc_html__( '900 (Black)', 'tornados' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'tornados' ),
						'normal'  => esc_html__( 'Normal', 'tornados' ),
						'italic'  => esc_html__( 'Italic', 'tornados' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'tornados' ),
						'none'         => esc_html__( 'None', 'tornados' ),
						'underline'    => esc_html__( 'Underline', 'tornados' ),
						'overline'     => esc_html__( 'Overline', 'tornados' ),
						'line-through' => esc_html__( 'Line-through', 'tornados' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'tornados' ),
						'none'       => esc_html__( 'None', 'tornados' ),
						'uppercase'  => esc_html__( 'Uppercase', 'tornados' ),
						'lowercase'  => esc_html__( 'Lowercase', 'tornados' ),
						'capitalize' => esc_html__( 'Capitalize', 'tornados' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'tornados_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$tornados_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		tornados_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			tornados_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'tornados' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'tornados' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! tornados_check_url( 'customize.php' ) ) {
			tornados_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'tornados' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'tornados' ) ),
					'class'    => 'tornados_column-1_2 tornados_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'tornados' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'tornados_options_get_list_cpt_options' ) ) {
	function tornados_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'tornados' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'tornados' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'tornados' ) ),
				'std'      => 'inherit',
				'options'  => tornados_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'tornados' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'tornados' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'tornados' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
				'std'     => 'inherit',
				'options' => tornados_get_list_header_footer_types( true ),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'tornados' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'tornados' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'tornados' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'tornados' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'tornados' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'tornados' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'tornados' ),
					1         => esc_html__( 'Yes', 'tornados' ),
					0         => esc_html__( 'No', 'tornados' ),
				),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'tornados' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select set of widgets to show in the header on the %s pages', 'tornados' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'tornados' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => sprintf( esc_html__( 'Sidebar position on the %s list', 'tornados' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf(esc_html__( 'Select position to show sidebar on the %s list', 'tornados' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_{$cpt}"=> array(
				'title'    => sprintf( esc_html__( 'Sidebar position on the %s list on the small screen', 'tornados' ), $title ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'tornados' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the %s list', 'tornados' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s list', 'tornados' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( esc_html__( 'Sidebar position on the single post', 'tornados' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the single posts of the %s', 'tornados' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_ss_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on the small screen', 'tornados' ),
				'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'tornados' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the single post', 'tornados' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select widgets to show in the sidebar on the single posts of the %s', 'tornados' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'tornados' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => tornados_get_list_checkbox_values( true ),
				'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
			),
			"expand_content_single_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content on the single post', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Expand the content width on the single post if the sidebar is hidden', 'tornados' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options'  => tornados_get_list_checkbox_values( true ),
				'type'     => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'tornados' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'tornados' ) ),
				'std'     => 'inherit',
				'options' => tornados_get_list_header_footer_types( true ),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'tornados' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'tornados' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => TORNADOS_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'tornados' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'tornados' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'tornados' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'tornados' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => tornados_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'tornados' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'tornados' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'tornados' ),
				'desc'  => '',
				'type'  => TORNADOS_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'tornados' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_above_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets above the content', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'tornados' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets below the content', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'tornados' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'tornados' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'tornados' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => TORNADOS_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'tornados_options_get_list_choises' ) ) {
	add_filter( 'tornados_filter_options_get_list_choises', 'tornados_options_get_list_choises', 10, 2 );
	function tornados_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = tornados_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = tornados_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = tornados_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = tornados_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = tornados_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_ss' ) === 0 ) {
				$list = tornados_get_list_sidebars_positions_ss( strpos( $id, 'sidebar_position_ss_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = tornados_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = tornados_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = tornados_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = tornados_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = tornados_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = tornados_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = tornados_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = tornados_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = tornados_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = tornados_array_merge( array( 0 => esc_html__( '- Select category -', 'tornados' ) ), tornados_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = tornados_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = tornados_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = tornados_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
