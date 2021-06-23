<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

if ( tornados_sidebar_present() ) {
	ob_start();
	$tornados_sidebar_name = tornados_get_theme_option( 'sidebar_widgets' );
	tornados_storage_set( 'current_sidebar', 'sidebar' );
	if ( is_active_sidebar( $tornados_sidebar_name ) ) {
		dynamic_sidebar( $tornados_sidebar_name );
	}
	$tornados_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $tornados_out ) ) {
		$tornados_sidebar_position    = tornados_get_theme_option( 'sidebar_position' );
		$tornados_sidebar_position_ss = tornados_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $tornados_sidebar_position );
			echo ' sidebar_' . esc_attr( $tornados_sidebar_position_ss );

			if ( 'float' == $tornados_sidebar_position_ss ) {
				echo ' sidebar_float';
			}

			if ( ! tornados_is_inherit( tornados_get_theme_option( 'sidebar_scheme' ) ) && !empty(tornados_get_theme_option( 'sidebar_scheme' )) ) {
				echo ' scheme_' . esc_attr( tornados_get_theme_option( 'sidebar_scheme' ) );
			}
			?>
		" role="complementary">
			<?php
			// Single posts banner before sidebar
			tornados_show_post_banner( 'sidebar' );
			// Button to show/hide sidebar on mobile
			if ( in_array( $tornados_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$tornados_title = apply_filters( 'tornados_filter_sidebar_control_title', 'float' == $tornados_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'tornados' ) : '' );
				$tornados_text  = apply_filters( 'tornados_filter_sidebar_control_text', 'above' == $tornados_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'tornados' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $tornados_title ); ?>"><?php echo esc_html( $tornados_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'tornados_action_before_sidebar' );
				tornados_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $tornados_out ) );
				do_action( 'tornados_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<div class="clearfix"></div>
		<?php
	}
}
