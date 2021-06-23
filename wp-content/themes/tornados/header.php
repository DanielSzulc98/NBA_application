<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js
									<?php
										// Class scheme_xxx need in the <html> as context for the <body>!
										echo ' scheme_' . esc_attr( tornados_get_theme_option( 'color_scheme' ) );
									?>
										">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>

	<?php do_action( 'tornados_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap">
			<?php
			// Desktop header
			$tornados_header_type = tornados_get_theme_option( 'header_type' );
			if ( 'custom' == $tornados_header_type && ! tornados_is_layouts_available() ) {
				$tornados_header_type = 'default';
			}
			get_template_part( apply_filters( 'tornados_filter_get_template_part', "templates/header-{$tornados_header_type}" ) );

			// Side menu
			if ( in_array( tornados_get_theme_option( 'menu_style' ), array( 'left', 'right' ) ) ) {
				get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-navi-side' ) );
			}

			// Mobile menu
			get_template_part( apply_filters( 'tornados_filter_get_template_part', 'templates/header-navi-mobile' ) );
			
			// Single posts banner after header
			tornados_show_post_banner( 'header' );
			?>

			<div class="page_content_wrap">
				<?php
				// Single posts banner on the background
				if ( is_singular( 'post' ) || is_singular( 'attachment' ) ) {

					tornados_show_post_banner( 'background' );

					$tornados_post_thumbnail_type  = tornados_get_theme_option( 'post_thumbnail_type' );
					$tornados_post_header_position = tornados_get_theme_option( 'post_header_position' );
					$tornados_post_header_align    = tornados_get_theme_option( 'post_header_align' );

					// Boxed post thumbnail
					if ( in_array( $tornados_post_thumbnail_type, array( 'boxed', 'fullwidth') ) ) {
						ob_start();
						?>
						<div class="header_content_wrap header_align_<?php echo esc_attr( $tornados_post_header_align ); ?>">
							<?php
							if ( 'boxed' === $tornados_post_thumbnail_type ) {
								?>
								<div class="content_wrap">
								<?php
							}

							// Post title and meta
							if ( 'above' === $tornados_post_header_position ) {
								tornados_show_post_title_and_meta();
							}

							// Featured image
							tornados_show_post_featured_image();

							// Post title and meta
							if ( in_array( $tornados_post_header_position, array( 'under', 'on_thumb' ) ) ) {
								tornados_show_post_title_and_meta();
							}

							if ( 'boxed' === $tornados_post_thumbnail_type ) {
								?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
						$tornados_post_header = ob_get_contents();
						ob_end_clean();
						if ( strpos( $tornados_post_header, 'post_featured' ) !== false || strpos( $tornados_post_header, 'post_title' ) !== false ) {
							tornados_show_layout( $tornados_post_header );
						}
					}
				}

				// Widgets area above page content
				$tornados_body_style   = tornados_get_theme_option( 'body_style' );
				$tornados_widgets_name = tornados_get_theme_option( 'widgets_above_page' );
				$tornados_show_widgets = ! tornados_is_off( $tornados_widgets_name ) && is_active_sidebar( $tornados_widgets_name );
				if ( $tornados_show_widgets ) {
					if ( 'fullscreen' != $tornados_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					tornados_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $tornados_body_style ) {
						?>
						</div><!-- </.content_wrap> -->
						<?php
					}
				}

				// Content area
				if ( 'fullscreen' != $tornados_body_style ) {
					?>
					<div class="content_wrap">
						<?php
				}
				?>

				<div class="content">
					<?php
					// Widgets area inside page content
					tornados_create_widgets_area( 'widgets_above_content' );
