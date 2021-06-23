<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

// Header sidebar
$tornados_header_name    = tornados_get_theme_option( 'header_widgets' );
$tornados_header_present = ! tornados_is_off( $tornados_header_name ) && is_active_sidebar( $tornados_header_name );
if ( $tornados_header_present ) {
	tornados_storage_set( 'current_sidebar', 'header' );
	$tornados_header_wide = tornados_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $tornados_header_name ) ) {
		dynamic_sidebar( $tornados_header_name );
	}
	$tornados_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $tornados_widgets_output ) ) {
		$tornados_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $tornados_widgets_output );
		$tornados_need_columns   = strpos( $tornados_widgets_output, 'columns_wrap' ) === false;
		if ( $tornados_need_columns ) {
			$tornados_columns = max( 0, (int) tornados_get_theme_option( 'header_columns' ) );
			if ( 0 == $tornados_columns ) {
				$tornados_columns = min( 6, max( 1, tornados_tags_count( $tornados_widgets_output, 'aside' ) ) );
			}
			if ( $tornados_columns > 1 ) {
				$tornados_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $tornados_columns ) . ' widget', $tornados_widgets_output );
			} else {
				$tornados_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $tornados_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $tornados_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $tornados_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'tornados_action_before_sidebar' );
				tornados_show_layout( $tornados_widgets_output );
				do_action( 'tornados_action_after_sidebar' );
				if ( $tornados_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $tornados_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
