<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'tornados_wpml_get_css' ) ) {
	add_filter( 'tornados_filter_get_css', 'tornados_wpml_get_css', 10, 2 );
	function tornados_wpml_get_css( $css, $args ) {
		return $css;
	}
}

