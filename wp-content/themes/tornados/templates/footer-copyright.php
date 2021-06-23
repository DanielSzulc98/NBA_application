<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
if ( ! tornados_is_inherit( tornados_get_theme_option( 'copyright_scheme' ) ) ) {
	echo ' scheme_' . esc_attr( tornados_get_theme_option( 'copyright_scheme' ) );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$tornados_copyright = tornados_get_theme_option( 'copyright' );
			if ( ! empty( $tornados_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$tornados_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $tornados_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$tornados_copyright = tornados_prepare_macros( $tornados_copyright );
				// Display copyright
				echo wp_kses_post( nl2br( $tornados_copyright ) );
			}
			?>
			</div>
		</div>
	</div>
</div>
