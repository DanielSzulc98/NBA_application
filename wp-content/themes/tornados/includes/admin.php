<?php
/**
 * Admin utilities
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.1
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }


//-------------------------------------------------------
//-- Theme init
//-------------------------------------------------------

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)

if ( ! function_exists( 'tornados_admin_theme_setup' ) ) {
	add_action( 'after_setup_theme', 'tornados_admin_theme_setup' );
	function tornados_admin_theme_setup() {
		// Add theme icons
		add_action( 'admin_footer', 'tornados_admin_footer' );

		// Enqueue scripts and styles for admin
		add_action( 'admin_enqueue_scripts', 'tornados_admin_scripts' );
		add_action( 'admin_footer', 'tornados_admin_localize_scripts' );

		// Show admin notice with control panel
		add_action( 'admin_notices', 'tornados_admin_notice' );
		add_action( 'wp_ajax_tornados_hide_admin_notice', 'tornados_callback_hide_admin_notice' );

		// Show admin notice with "Rate Us" panel
		add_action( 'after_switch_theme', 'tornados_save_activation_date' );
		add_action( 'admin_notices', 'tornados_rate_notice' );
		add_action( 'wp_ajax_tornados_hide_rate_notice', 'tornados_callback_hide_rate_notice' );

		// TGM Activation plugin
		add_action( 'tgmpa_register', 'tornados_register_plugins' );

		// Init internal admin messages
		tornados_init_admin_messages();
	}
}


//-------------------------------------------------------
//-- Welcome notice
//-------------------------------------------------------

// Show admin notice
if ( ! function_exists( 'tornados_admin_notice' ) ) {
	//Handler of the add_action('admin_notices', 'tornados_admin_notice', 2);
	function tornados_admin_notice() {
		if ( tornados_exists_trx_addons()
			|| in_array( tornados_get_value_gp( 'action' ), array( 'vc_load_template_preview' ) )
			|| tornados_get_value_gp( 'page' ) == 'tornados_about'
			|| ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}
		$show = get_option( 'tornados_admin_notice' );
		if ( false !== $show && 0 == (int) $show ) {
			return;
		}
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/admin-notice' ) );
	}
}

// Hide admin notice
if ( ! function_exists( 'tornados_callback_hide_admin_notice' ) ) {
	//Handler of the add_action('wp_ajax_tornados_hide_admin_notice', 'tornados_callback_hide_admin_notice');
	function tornados_callback_hide_admin_notice() {
		if ( wp_verify_nonce( tornados_get_value_gp( 'nonce' ), admin_url( 'admin-ajax.php' ) ) ) {
			update_option( 'tornados_admin_notice', '0' );
		}
		wp_die();
	}
}


//-------------------------------------------------------
//-- "Rate Us" notice
//-------------------------------------------------------

// Save activation date
if ( ! function_exists( 'tornados_save_activation_date' ) ) {
	//Handler of the add_action('after_switch_theme', 'tornados_save_activation_date');
	function tornados_save_activation_date() {
		$theme_time = (int) get_option( 'tornados_theme_activated' );
		if ( 0 == $theme_time ) {
			$theme_slug      = get_option( 'template' );
			$stylesheet_slug = get_option( 'stylesheet' );
			if ( $theme_slug == $stylesheet_slug ) {
				update_option( 'tornados_theme_activated', time() );
			}
		}
	}
}

// Show Rate Us notice
if ( ! function_exists( 'tornados_rate_notice' ) ) {
	//Handler of the add_action('admin_notices', 'tornados_rate_notice', 2);
	function tornados_rate_notice() {
		if ( in_array( tornados_get_value_gp( 'action' ), array( 'vc_load_template_preview' ) ) ) {
			return;
		}
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}
		// Display the message only on specified screens
		$allowed = array( 'dashboard', 'theme_options', 'trx_addons_options' );
		$screen  = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( ( is_object( $screen ) && ! empty( $screen->id ) && in_array( $screen->id, $allowed ) ) || in_array( tornados_get_value_gp( 'page' ), $allowed ) ) {
			$show  = get_option( 'tornados_rate_notice' );
			$start = get_option( 'tornados_theme_activated' );
			if ( ( false !== $show && 0 == (int) $show ) || ( $start > 0 && ( time() - $start ) / ( 24 * 3600 ) < 14 ) ) {
				return;
			}
			get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/admin-rate' ) );
		}
	}
}

// Hide rate notice
if ( ! function_exists( 'tornados_callback_hide_rate_notice' ) ) {
	//Handler of the add_action('wp_ajax_tornados_hide_rate_notice', 'tornados_callback_hide_rate_notice');
	function tornados_callback_hide_rate_notice() {
		if ( wp_verify_nonce( tornados_get_value_gp( 'nonce' ), admin_url( 'admin-ajax.php' ) ) ) {
			update_option( 'tornados_rate_notice', '0' );
		}
		wp_die();
	}
}


//-------------------------------------------------------
//-- Internal messages
//-------------------------------------------------------

// Init internal admin messages
if ( ! function_exists( 'tornados_init_admin_messages' ) ) {
	function tornados_init_admin_messages() {
		$msg = get_option( 'tornados_admin_messages' );
		if ( is_array( $msg ) ) {
			update_option( 'tornados_admin_messages', '' );
		} else {
			$msg = array();
		}
		tornados_storage_set( 'admin_messages', $msg );
	}
}

// Add internal admin message
if ( ! function_exists( 'tornados_add_admin_message' ) ) {
	function tornados_add_admin_message( $text, $type = 'success', $cur_session = false ) {
		if ( ! empty( $text ) ) {
			$new_msg = array(
				'message' => $text,
				'type'    => $type,
			);
			if ( $cur_session ) {
				tornados_storage_push_array( 'admin_messages', '', $new_msg );
			} else {
				$msg = get_option( 'tornados_admin_messages' );
				if ( ! is_array( $msg ) ) {
					$msg = array();
				}
				$msg[] = $new_msg;
				update_option( 'tornados_admin_messages', $msg );
			}
		}
	}
}

// Show internal admin messages
if ( ! function_exists( 'tornados_show_admin_messages' ) ) {
	function tornados_show_admin_messages() {
		$msg = tornados_storage_get( 'admin_messages' );
		if ( ! is_array( $msg ) || count( $msg ) == 0 ) {
			return;
		}
		?>
		<div class="tornados_admin_messages">
			<?php
			foreach ( $msg as $m ) {
				?>
				<div class="tornados_admin_message_item <?php echo esc_attr( str_replace( 'success', 'updated', $m['type'] ) ); ?>">
					<p><?php echo wp_kses_data( $m['message'] ); ?></p>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
}


//-------------------------------------------------------
//-- Styles and scripts
//-------------------------------------------------------

// Load inline styles
if ( ! function_exists( 'tornados_admin_footer' ) ) {
	//Handler of the add_action('admin_footer', 'tornados_admin_footer');
	function tornados_admin_footer() {
		// Get current screen
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( is_object( $screen ) && 'nav-menus' == $screen->id ) {
			tornados_show_layout(
				tornados_show_custom_field(
					'tornados_icons_popup',
					array(
						'type'   => 'icons',
						'style'  => tornados_get_theme_setting( 'icons_type' ),
						'button' => false,
						'icons'  => true,
					),
					null
				)
			);
		}
	}
}

// Load required styles and scripts for admin mode
if ( ! function_exists( 'tornados_admin_scripts' ) ) {
	//Handler of the add_action("admin_enqueue_scripts", 'tornados_admin_scripts');
	function tornados_admin_scripts( $all = false ) {

		// Add theme styles
		wp_enqueue_style( 'tornados-admin', tornados_get_file_url( 'css/admin.css' ), array(), null );

		// Links to selected fonts
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( $all || is_object( $screen ) ) {
			if ( $all || tornados_options_allow_override( ! empty( $screen->post_type ) ? $screen->post_type : $screen->id ) ) {
				// Load font icons
				wp_enqueue_style( 'fontello-icons', tornados_get_file_url( 'css/font-icons/css/fontello.css' ), array(), null );
				wp_enqueue_style( 'tornados-icons-animation', tornados_get_file_url( 'css/font-icons/css/animation.css' ), array(), null );
				// Load theme fonts
				$links = tornados_theme_fonts_links();
				if ( count( $links ) > 0 ) {
					foreach ( $links as $slug => $link ) {
						wp_enqueue_style( sprintf( 'tornados-font-%s', $slug ), $link, array(), null );
					}
				}
			} elseif ( apply_filters( 'tornados_filter_allow_theme_icons', is_customize_preview() || 'nav-menus' == $screen->id, ! empty( $screen->post_type ) ? $screen->post_type : $screen->id ) ) {
				// Load font icons
				wp_enqueue_style( 'fontello-icons', tornados_get_file_url( 'css/font-icons/css/fontello.css' ), array(), null );
			}
		}

		// Add theme scripts
		wp_enqueue_script( 'tornados-utils', tornados_get_file_url( 'js/theme-utils.js' ), array( 'jquery' ), null, true );
		wp_enqueue_script( 'tornados-admin', tornados_get_file_url( 'js/theme-admin.js' ), array( 'jquery' ), null, true );
	}
}

// Add variables in the admin mode
if ( ! function_exists( 'tornados_admin_localize_scripts' ) ) {
	//Handler of the add_action("admin_footer", 'tornados_admin_localize_scripts');
	function tornados_admin_localize_scripts() {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		wp_localize_script(
			'tornados-admin', 'TORNADOS_STORAGE', apply_filters(
				'tornados_filter_localize_script_admin', array(
					'admin_mode'                 => true,
					'screen_id'                  => is_object( $screen ) ? esc_attr( $screen->id ) : '',
					'user_logged_in'             => true,
					'ajax_url'                   => esc_url( admin_url( 'admin-ajax.php' ) ),
					'ajax_nonce'                 => esc_attr( wp_create_nonce( admin_url( 'admin-ajax.php' ) ) ),
					'msg_ajax_error'             => esc_html__( 'Server response error', 'tornados' ),
					'msg_icon_selector'          => esc_html__( 'Select the icon for this menu item', 'tornados' ),
					'msg_scheme_reset'           => esc_html__( 'Reset all changes of the current color scheme?', 'tornados' ),
					'msg_scheme_copy'            => esc_html__( 'Enter the name for a new color scheme', 'tornados' ),
					'msg_scheme_delete'          => esc_html__( 'Do you really want to delete the current color scheme?', 'tornados' ),
					'msg_scheme_delete_last'     => esc_html__( 'You cannot delete the last color scheme!', 'tornados' ),
					'msg_scheme_delete_internal' => esc_html__( 'You cannot delete the built-in color scheme!', 'tornados' ),
				)
			)
		);
	}
}



//-------------------------------------------------------
//-- Third party plugins
//-------------------------------------------------------

// Register optional plugins
if ( ! function_exists( 'tornados_register_plugins' ) ) {
	//Handler of the add_action('tgmpa_register', 'tornados_register_plugins');
	function tornados_register_plugins() {
		tgmpa(
			apply_filters(
				'tornados_filter_tgmpa_required_plugins', array(
				// Plugins to include in the autoinstall queue.
				)
			),
			array(
				'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.
				'message'      => '',                       // Message to output right before the plugins table.
			)
		);
	}
}


// Return path to the plugin source
if ( ! function_exists( 'tornados_get_plugin_source_path' ) ) {
	function tornados_get_plugin_source_path( $path ) {
		$local = tornados_get_file_dir( $path );
		$path  = empty( $local ) && ! tornados_get_theme_setting( 'tgmpa_upload' ) ? tornados_get_plugin_source_url( $path ) : $local;
		return $path;
	}
}


// Return URL to the plugin download
if ( ! function_exists( 'tornados_get_plugin_source_url' ) ) {
	function tornados_get_plugin_source_url( $path ) {
		$code = tornados_get_theme_activation_code();
		$url  = '';
		if ( ! empty( $code ) ) {
			$theme = wp_get_theme();
			$url   = sprintf(
				'http://upgrade.themerex.net/upgrade.php?key=%1$s&src=%2$s&theme_slug=%3$s&theme_name=%4$s&action=install_plugin&plugin=%5$s',
				urlencode( $code ),
				urlencode( tornados_storage_get( 'theme_pro_key' ) ),
				urlencode( get_option( 'template' ) ),
				urlencode( $theme->name ),
				urlencode( str_replace( 'plugins/', '', $path ) )
			);
		}
		return $url;
	}
}
