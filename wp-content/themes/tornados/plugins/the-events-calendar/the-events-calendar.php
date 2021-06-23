<?php
/* Tribe Events Calendar support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if ( ! function_exists( 'tornados_tribe_events_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'tornados_tribe_events_theme_setup1', 1 );
	function tornados_tribe_events_theme_setup1() {
		add_filter( 'tornados_filter_list_sidebars', 'tornados_tribe_events_list_sidebars' );
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'tornados_tribe_events_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'tornados_tribe_events_theme_setup3', 3 );
	function tornados_tribe_events_theme_setup3() {
		if ( tornados_exists_tribe_events() ) {

			// Section 'Tribe Events'
			tornados_storage_merge_array(
				'options', '', array_merge(
					array(
						'events' => array(
							'title' => esc_html__( 'Events', 'tornados' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the events pages', 'tornados' ) ),
							'type'  => 'section',
						),
					),
					tornados_options_get_list_cpt_options( 'events' )
				)
			);
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_tribe_events_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'tornados_tribe_events_theme_setup9', 9 );
	function tornados_tribe_events_theme_setup9() {
		if ( tornados_exists_tribe_events() ) {
			add_action( 'wp_enqueue_scripts', 'tornados_tribe_events_frontend_scripts', 1100 );
			add_action( 'wp_enqueue_scripts', 'tornados_tribe_events_responsive_styles', 2000 );
			add_filter( 'tornados_filter_merge_styles', 'tornados_tribe_events_merge_styles' );
			add_filter( 'tornados_filter_merge_styles_responsive', 'tornados_tribe_events_merge_styles_responsive' );
			add_filter( 'tornados_filter_post_type_taxonomy', 'tornados_tribe_events_post_type_taxonomy', 10, 2 );
			if ( ! is_admin() ) {
				add_filter( 'tornados_filter_detect_blog_mode', 'tornados_tribe_events_detect_blog_mode' );
				add_filter( 'tornados_filter_get_post_categories', 'tornados_tribe_events_get_post_categories' );
				add_filter( 'tornados_filter_get_post_date', 'tornados_tribe_events_get_post_date' );
			}
		}
		if ( is_admin() ) {
			add_filter( 'tornados_filter_tgmpa_required_plugins', 'tornados_tribe_events_tgmpa_required_plugins' );
		}

	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_tribe_events_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('tornados_filter_tgmpa_required_plugins',	'tornados_tribe_events_tgmpa_required_plugins');
	function tornados_tribe_events_tgmpa_required_plugins( $list = array() ) {
		if ( tornados_storage_isset( 'required_plugins', 'the-events-calendar' ) && tornados_storage_get_array( 'required_plugins', 'the-events-calendar', 'install' ) !== false ) {
			$list[] = array(
				'name'     => tornados_storage_get_array( 'required_plugins', 'the-events-calendar', 'title' ),
				'slug'     => 'the-events-calendar',
				'required' => false,
			);
		}
		return $list;
	}
}


// Remove 'Tribe Events' section from Customizer
if ( ! function_exists( 'tornados_tribe_events_customizer_register_controls' ) ) {
	add_action( 'customize_register', 'tornados_tribe_events_customizer_register_controls', 100 );
	function tornados_tribe_events_customizer_register_controls( $wp_customize ) {
		$wp_customize->remove_panel( 'tribe_customizer' );
	}
}


// Check if Tribe Events is installed and activated
if ( ! function_exists( 'tornados_exists_tribe_events' ) ) {
	function tornados_exists_tribe_events() {
		return class_exists( 'Tribe__Events__Main' );
	}
}

// Return true, if current page is any tribe_events page
if ( ! function_exists( 'tornados_is_tribe_events_page' ) ) {
	function tornados_is_tribe_events_page() {
		$rez = false;
		if ( tornados_exists_tribe_events() ) {
			if ( ! is_search() ) {
				$rez = tribe_is_event() || tribe_is_event_query() || tribe_is_event_category() || tribe_is_event_venue() || tribe_is_event_organizer();
			}
		}
		return $rez;
	}
}

// Detect current blog mode
if ( ! function_exists( 'tornados_tribe_events_detect_blog_mode' ) ) {
	//Handler of the add_filter( 'tornados_filter_detect_blog_mode', 'tornados_tribe_events_detect_blog_mode' );
	function tornados_tribe_events_detect_blog_mode( $mode = '' ) {
		if ( tornados_is_tribe_events_page() ) {
			$mode = 'events';
		}
		return $mode;
	}
}

// Return taxonomy for current post type
if ( ! function_exists( 'tornados_tribe_events_post_type_taxonomy' ) ) {
	//Handler of the add_filter( 'tornados_filter_post_type_taxonomy',	'tornados_tribe_events_post_type_taxonomy', 10, 2 );
	function tornados_tribe_events_post_type_taxonomy( $tax = '', $post_type = '' ) {
		if ( tornados_exists_tribe_events() && Tribe__Events__Main::POSTTYPE == $post_type ) {
			$tax = Tribe__Events__Main::TAXONOMY;
		}
		return $tax;
	}
}

// Show categories of the current event
if ( ! function_exists( 'tornados_tribe_events_get_post_categories' ) ) {
	//Handler of the add_filter( 'tornados_filter_get_post_categories', 		'tornados_tribe_events_get_post_categories');
	function tornados_tribe_events_get_post_categories( $cats = '' ) {
		if ( get_post_type() == Tribe__Events__Main::POSTTYPE ) {
			$cats = tornados_get_post_terms( ', ', get_the_ID(), Tribe__Events__Main::TAXONOMY );
		}
		return $cats;
	}
}

// Return date of the current event
if ( ! function_exists( 'tornados_tribe_events_get_post_date' ) ) {
	//Handler of the add_filter( 'tornados_filter_get_post_date', 'tornados_tribe_events_get_post_date');
	function tornados_tribe_events_get_post_date( $dt = '' ) {
		if ( get_post_type() == Tribe__Events__Main::POSTTYPE ) {
			$dt = tribe_events_event_schedule_details( get_the_ID(), '', '' );
		}
		return $dt;
	}
}

// Enqueue styles for frontend
if ( ! function_exists( 'tornados_tribe_events_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_tribe_events_frontend_scripts', 1100 );
	function tornados_tribe_events_frontend_scripts() {
		if ( tornados_is_tribe_events_page() ) {
			if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
				$tornados_url = tornados_get_file_url( 'plugins/the-events-calendar/the-events-calendar.css' );
				if ( '' != $tornados_url ) {
					wp_enqueue_style( 'tornados-tribe-events', $tornados_url, array(), null );
				}
			}
		}
	}
}

// Enqueue responsive styles for frontend
if ( ! function_exists( 'tornados_tribe_events_responsive_styles' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'tornados_tribe_events_responsive_styles', 2000 );
	function tornados_tribe_events_responsive_styles() {
		if ( tornados_is_tribe_events_page() ) {
			if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
				$tornados_url = tornados_get_file_url( 'plugins/the-events-calendar/the-events-calendar-responsive.css' );
				if ( '' != $tornados_url ) {
					wp_enqueue_style( 'tornados-tribe-events-responsive', $tornados_url, array(), null );
				}
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'tornados_tribe_events_merge_styles' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles', 'tornados_tribe_events_merge_styles');
	function tornados_tribe_events_merge_styles( $list ) {
		$list[] = 'plugins/the-events-calendar/the-events-calendar.css';
		return $list;
	}
}


// Merge responsive styles
if ( ! function_exists( 'tornados_tribe_events_merge_styles_responsive' ) ) {
	//Handler of the add_filter('tornados_filter_merge_styles_responsive', 'tornados_tribe_events_merge_styles_responsive');
	function tornados_tribe_events_merge_styles_responsive( $list ) {
		$list[] = 'plugins/the-events-calendar/the-events-calendar-responsive.css';
		return $list;
	}
}



// Add Tribe Events specific items into lists
//------------------------------------------------------------------------

// Add sidebar
if ( ! function_exists( 'tornados_tribe_events_list_sidebars' ) ) {
	//Handler of the add_filter( 'tornados_filter_list_sidebars', 'tornados_tribe_events_list_sidebars' );
	function tornados_tribe_events_list_sidebars( $list = array() ) {
		$list['tribe_events_widgets'] = array(
			'name'        => esc_html__( 'Tribe Events Widgets', 'tornados' ),
			'description' => esc_html__( 'Widgets to be shown on the Tribe Events pages', 'tornados' ),
		);
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( tornados_exists_tribe_events() ) {
	require_once TORNADOS_THEME_DIR . 'plugins/the-events-calendar/the-events-calendar-styles.php'; 
}
