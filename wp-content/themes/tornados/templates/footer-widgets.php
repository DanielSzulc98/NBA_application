<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.10
 */

// Footer sidebar
$tornados_footer_name    = tornados_get_theme_option( 'footer_widgets' );
$tornados_footer_present = ! tornados_is_off( $tornados_footer_name ) && is_active_sidebar( $tornados_footer_name );
if ( $tornados_footer_present ) {
	tornados_storage_set( 'current_sidebar', 'footer' );
	$tornados_footer_wide = tornados_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $tornados_footer_name ) ) {
		dynamic_sidebar( $tornados_footer_name );
	}
	$tornados_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $tornados_out ) ) {
		$tornados_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $tornados_out );
		$tornados_need_columns = true;
		if ( $tornados_need_columns ) {
			$tornados_columns = max( 0, (int) tornados_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $tornados_columns ) {
				$tornados_columns = min( 4, max( 1, tornados_tags_count( $tornados_out, 'aside' ) ) );
			}
			if ( $tornados_columns > 1 ) {
				$tornados_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $tornados_columns ) . ' widget', $tornados_out );
			} else {
				$tornados_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $tornados_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $tornados_footer_wide ) {
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
				tornados_show_layout( $tornados_out );
				do_action( 'tornados_action_after_sidebar' );
				if ( $tornados_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $tornados_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
