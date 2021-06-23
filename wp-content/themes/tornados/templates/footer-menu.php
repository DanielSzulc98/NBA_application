<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.10
 */

// Footer menu
$tornados_menu_footer = tornados_get_nav_menu( 'menu_footer' );
if ( ! empty( $tornados_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php
			tornados_show_layout(
				$tornados_menu_footer,
				'<nav class="menu_footer_nav_area sc_layouts_menu sc_layouts_menu_default"'
					. ' itemscope itemtype="http://schema.org/SiteNavigationElement"'
					. '>',
				'</nav>'
			);
			?>
		</div>
	</div>
	<?php
}
