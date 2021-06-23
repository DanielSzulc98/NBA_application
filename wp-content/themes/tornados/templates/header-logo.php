<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

$tornados_args = get_query_var( 'tornados_logo_args' );

// Site logo
$tornados_logo_type   = isset( $tornados_args['type'] ) ? $tornados_args['type'] : '';
$tornados_logo_image  = tornados_get_logo_image( $tornados_logo_type );
$tornados_logo_text   = tornados_is_on( tornados_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$tornados_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $tornados_logo_image['logo'] ) || ! empty( $tornados_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $tornados_logo_image['logo'] ) ) {
			if ( empty( $tornados_logo_type ) && function_exists( 'the_custom_logo' ) && (int) $tornados_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$tornados_attr = tornados_getimagesize( $tornados_logo_image['logo'] );
				echo '<img src="' . esc_url( $tornados_logo_image['logo'] ) . '"'
						. ( ! empty( $tornados_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $tornados_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $tornados_logo_text ) . '"'
						. ( ! empty( $tornados_attr[3] ) ? ' ' . wp_kses_data( $tornados_attr[3] ) : '' )
						. '>';
			}
		} else {
			tornados_show_layout( tornados_prepare_macros( $tornados_logo_text ), '<span class="logo_text">', '</span>' );
			tornados_show_layout( tornados_prepare_macros( $tornados_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
