<?php
/* SportsPress support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'tornados_sportspress_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'tornados_sportspress_theme_setup9', 9 );
    function tornados_sportspress_theme_setup9() {

        if (is_admin()) {
            add_theme_support( 'sportspress' );
            add_filter('tornados_filter_tgmpa_required_plugins', 'tornados_sportspress_tgmpa_required_plugins');
            add_filter('tornados_filter_theme_plugins', 'tornados_sportspress_theme_plugins');
        }

        if(tornados_exists_sportspress()) {

            if (tornados_exists_sportspress() && tornados_is_on(tornados_get_theme_option('show_style_sportspress'))) {
                add_action('wp_enqueue_scripts', 'tornados_sportspress_frontend_scripts', 1100);
                add_filter('tornados_filter_merge_styles', 'tornados_sportspress_merge_styles');
            }
            if (!is_admin()) {
                add_filter('tornados_filter_detect_blog_mode', 'tornados_sportspress_detect_blog_mode');
            }

            // Add plugin-specific colors and fonts to the custom CSS
            if (tornados_is_on(tornados_get_theme_option('show_style_sportspress'))) {
                if (tornados_exists_sportspress()) {
                    require_once TORNADOS_THEME_DIR . 'plugins/sportspress/sportspress-styles.php';
                }
            }
        }

    }
}


// Register sidebars
add_action( 'init', 'tornados_register_size_sportspress' );
function tornados_register_size_sportspress(){
    // Reassigning the size of the cutting images of the plugin "SportsPress" - sportspress - prefix of the plugin itself
    add_image_size( 'sportspress-crop-medium',  500, 500, true );
    add_image_size( 'sportspress-fit-medium', 500, 500, false );
    add_image_size( 'sportspress-fit-icon',  400, 400, false );
    add_image_size( 'sportspress-fit-mini',  32, 32, false );
}



// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'tornados_sportspress_theme_setup3' ) ) {
    add_action( 'after_setup_theme', 'tornados_sportspress_theme_setup3', 3 );
    function tornados_sportspress_theme_setup3() {
        if ( tornados_exists_sportspress() ) {

            tornados_storage_set_array_before(
                'options', 'fonts', array_merge(
                    array(
                        'sportspress'               => array(
                            'title'      => esc_html__( 'SportsPress', 'tornados' ),
                            'desc'       => wp_kses_data( __( 'Select theme-specific parameters to display the SportsPress pages', 'tornados' ) ),
                            'priority'   => 80,
                            'type'       => 'section',
                        ),
                        'single_style_sportspress'        => array(
                            'title' => esc_html__( 'Style SportsPress', 'tornados' ),
                            'desc'  => '',
                            'type'  => 'info',
                        ),
                        'show_style_sportspress'            => array(
                            'title'    => esc_html__( 'Use theme style for SportsPress', 'tornados' ),
                            'desc'     => wp_kses_data( __( "Use theme style for plugin elements", 'tornados' ) ),
                            'std'      => 1,
                            'type'     => 'checkbox',
                        ),

                        'single_info_sportspress'        => array(
                            'title' => esc_html__( 'Single SportsPress', 'tornados' ),
                            'desc'  => '',
                            'type'  => 'info',
                        ),
                        'show_related_posts_single_sportspress'            => array(
                            'title'    => esc_html__( 'Show related posts', 'tornados' ),
                            'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single SportsPress pages", 'tornados' ) ),
                            'std'      => 0,
                            'type'     => 'checkbox',
                        ),
                        'show_share_links_single_sportspress'              => array(
                            'title' => esc_html__( 'Show share links', 'tornados' ),
                            'desc'  => wp_kses_data( __( 'Display share links on the single SportsPress', 'tornados' ) ),
                            'std'   => 0,
                            'type'  => ! tornados_exists_trx_addons() ? 'hidden' : 'checkbox',
                        ),
                        'show_author_info_single_sportspress'              => array(
                            'title' => esc_html__( 'Show author info', 'tornados' ),
                            'desc'  => wp_kses_data( __( "Display block with information about post's author", 'tornados' ) ),
                            'std'   => 0,
                            'type'  => 'checkbox',
                        ),
                    ),                       
                    tornados_options_get_list_cpt_options( 'sportspress' )
                )
            );

        }
    }
}



// Detect current blog mode
if ( ! function_exists( 'tornados_sportspress_detect_blog_mode' ) ) {
    function tornados_sportspress_detect_blog_mode( $mode = '' ) {
        if ( is_sportspress() ) {
            $mode = 'sportspress';
        }
        return $mode;
    }
}



// Filter to add in the required plugins list
if ( ! function_exists( 'tornados_sportspress_tgmpa_required_plugins' ) ) {
    function tornados_sportspress_tgmpa_required_plugins( $list = array() ) {
        if ( tornados_storage_isset( 'required_plugins', 'sportspress' ) && tornados_storage_get_array( 'required_plugins', 'sportspress', 'install' ) !== false ) {
            // SportsPress plugin
            $list[] = array(
                'name'     => tornados_storage_get_array( 'required_plugins', 'sportspress', 'title' ),
                'slug'     => 'sportspress',
                'required' => false,
            );
        }
        return $list;
    }
}

// Filter theme-supported plugins list
if ( ! function_exists( 'tornados_sportspress_theme_plugins' ) ) {
    //Handler of the add_filter( 'tornados_filter_theme_plugins', 'tornados_sportspress_theme_plugins' );
    function tornados_sportspress_theme_plugins( $list = array() ) {
        if ( ! empty( $list['sportspress']['group'] ) ) {
            foreach ( $list as $k => $v ) {
                if ( substr( $k, 0, 12 ) == 'sportspress-' ) {
                    if ( empty( $v['group'] ) ) {
                        $list[ $k ]['group'] = $list['sportspress']['group'];
                    }
                    if ( ! empty( $list['sportspress']['logo'] ) ) {
                        $list[ $k ]['logo'] = strpos( $list['sportspress']['logo'], '//' ) !== false
                            ? $list['sportspress']['logo']
                            : tornados_get_file_url( "plugins/sportspress/{$list['sportspress']['logo']}" );
                    }
                }

            }
        }
        return $list;
    }
}



// Check if sportspress installed and activated
if ( ! function_exists( 'tornados_exists_sportspress' ) ) {
    function tornados_exists_sportspress() {
        return  class_exists( 'SportsPress' );
    }
}


// Enqueue WooCommerce custom styles
if ( ! function_exists( 'tornados_sportspress_frontend_scripts' ) ) {
    function tornados_sportspress_frontend_scripts() {
        if ( tornados_is_on( tornados_get_theme_option( 'debug_mode' ) ) ) {
            $tornados_url = tornados_get_file_url( 'plugins/sportspress/sportspress.css' );
            if ( '' != $tornados_url ) {
                wp_enqueue_style( 'tornados-sportspress', $tornados_url, array(), null );
            }
        }
    }
}

// Merge custom styles
if ( ! function_exists( 'tornados_sportspress_merge_styles' ) ) {
    function tornados_sportspress_merge_styles( $list ) {
        $list[] = 'plugins/sportspress/sportspress.css';
        return $list;
    }
}





