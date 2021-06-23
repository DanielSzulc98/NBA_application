<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.10
 */


// Socials
if ( tornados_is_on( tornados_get_theme_option( 'socials_in_footer' ) ) ) {
	$tornados_output = tornados_get_socials_links();
	if ( '' != $tornados_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php tornados_show_layout( $tornados_output ); ?>
			</div>
		</div>
		<?php
	}
}
