<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.10
 */

// Logo
if ( tornados_is_on( tornados_get_theme_option( 'logo_in_footer' ) ) ) {
	$tornados_logo_image = tornados_get_logo_image( 'footer' );
	$tornados_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $tornados_logo_image['logo'] ) || ! empty( $tornados_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $tornados_logo_image['logo'] ) ) {
					$tornados_attr = tornados_getimagesize( $tornados_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $tornados_logo_image['logo'] ) . '"'
								. ( ! empty( $tornados_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $tornados_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'tornados' ) . '"'
								. ( ! empty( $tornados_attr[3] ) ? ' ' . wp_kses_data( $tornados_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $tornados_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $tornados_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
