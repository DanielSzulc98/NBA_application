<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

						// Widgets area inside page content
						tornados_create_widgets_area( 'widgets_below_content' );
						?>
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					$tornados_body_style = tornados_get_theme_option( 'body_style' );
					if ( 'fullscreen' != $tornados_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}

					// Widgets area below page content and related posts below page content
					$tornados_widgets_name = tornados_get_theme_option( 'widgets_below_page' );
					$tornados_show_widgets = ! tornados_is_off( $tornados_widgets_name ) && is_active_sidebar( $tornados_widgets_name );
					$tornados_show_related = is_single() && tornados_get_theme_option( 'related_position' ) == 'below_page';

					if ( $tornados_show_widgets || $tornados_show_related ) {
						if ( 'fullscreen' != $tornados_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $tornados_show_related ) {
							do_action( 'tornados_action_related_posts' );
						}

						// Widgets area below page content
						if ( $tornados_show_widgets ) {
							tornados_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $tornados_body_style ) {
							?>
							</div><!-- </.content_wrap> -->
							<?php
						}
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Single posts banner before footer
			if ( is_singular( 'post' ) ) {
				tornados_show_post_banner('footer');
			}
			// Footer
			$tornados_footer_type = tornados_get_theme_option( 'footer_type' );
			if ( 'custom' == $tornados_footer_type && ! tornados_is_layouts_available() ) {
				$tornados_footer_type = 'default';
			}
			get_template_part( apply_filters( 'tornados_filter_get_template_part', "templates/footer-{$tornados_footer_type}" ) );
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php wp_footer(); ?>

</body>
</html>