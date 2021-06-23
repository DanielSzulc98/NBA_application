<div class="front_page_section front_page_section_features<?php
	$tornados_scheme = tornados_get_theme_option( 'front_page_features_scheme' );
	if ( ! tornados_is_inherit( $tornados_scheme ) ) {
		echo ' scheme_' . esc_attr( $tornados_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( tornados_get_theme_option( 'front_page_features_paddings' ) );
?>"
		<?php
		$tornados_css      = '';
		$tornados_bg_image = tornados_get_theme_option( 'front_page_features_bg_image' );
		if ( ! empty( $tornados_bg_image ) ) {
			$tornados_css .= 'background-image: url(' . esc_url( tornados_get_attachment_url( $tornados_bg_image ) ) . ');';
		}
		if ( ! empty( $tornados_css ) ) {
			echo ' style="' . esc_attr( $tornados_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$tornados_anchor_icon = tornados_get_theme_option( 'front_page_features_anchor_icon' );
	$tornados_anchor_text = tornados_get_theme_option( 'front_page_features_anchor_text' );
if ( ( ! empty( $tornados_anchor_icon ) || ! empty( $tornados_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_features"'
									. ( ! empty( $tornados_anchor_icon ) ? ' icon="' . esc_attr( $tornados_anchor_icon ) . '"' : '' )
									. ( ! empty( $tornados_anchor_text ) ? ' title="' . esc_attr( $tornados_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_features_inner
	<?php
	if ( tornados_get_theme_option( 'front_page_features_fullheight' ) ) {
		echo ' tornados-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$tornados_css      = '';
			$tornados_bg_mask  = tornados_get_theme_option( 'front_page_features_bg_mask' );
			$tornados_bg_color_type = tornados_get_theme_option( 'front_page_features_bg_color_type' );
			if ( 'custom' == $tornados_bg_color_type ) {
				$tornados_bg_color = tornados_get_theme_option( 'front_page_features_bg_color' );
			} elseif ( 'scheme_bg_color' == $tornados_bg_color_type ) {
				$tornados_bg_color = tornados_get_scheme_color( 'bg_color', $tornados_scheme );
			} else {
				$tornados_bg_color = '';
			}
			if ( ! empty( $tornados_bg_color ) && $tornados_bg_mask > 0 ) {
				$tornados_css .= 'background-color: ' . esc_attr(
					1 == $tornados_bg_mask ? $tornados_bg_color : tornados_hex2rgba( $tornados_bg_color, $tornados_bg_mask )
				) . ';';
			}
			if ( ! empty( $tornados_css ) ) {
				echo ' style="' . esc_attr( $tornados_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_features_content_wrap content_wrap">
			<?php
			// Caption
			$tornados_caption = tornados_get_theme_option( 'front_page_features_caption' );
			if ( ! empty( $tornados_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_features_caption front_page_block_<?php echo ! empty( $tornados_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( $tornados_caption ); ?></h2>
				<?php
			}

			// Description (text)
			$tornados_description = tornados_get_theme_option( 'front_page_features_description' );
			if ( ! empty( $tornados_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_features_description front_page_block_<?php echo ! empty( $tornados_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses_post( wpautop( $tornados_description ) ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_features_output">
			<?php
			if ( is_active_sidebar( 'front_page_features_widgets' ) ) {
				dynamic_sidebar( 'front_page_features_widgets' );
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! tornados_exists_trx_addons() ) {
					tornados_customizer_need_trx_addons_message();
				} else {
					tornados_customizer_need_widgets_message( 'front_page_features_caption', 'ThemeREX Addons - Services' );
				}
			}
			?>
			</div>
		</div>
	</div>
</div>
