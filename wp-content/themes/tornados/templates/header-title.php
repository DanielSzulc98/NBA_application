<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

// Page (category, tag, archive, author) title

if ( tornados_need_page_title() ) {
	tornados_sc_layouts_showed( 'title', true );
	tornados_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_left">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_left">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								tornados_show_post_meta(
									apply_filters(
										'tornados_filter_post_meta_args', array(
											'components' => tornados_array_get_keys_by_value( tornados_get_theme_option( 'meta_parts' ) ),
											'counters'   => tornados_array_get_keys_by_value( tornados_get_theme_option( 'counters' ) ),
											'seo'        => tornados_is_on( tornados_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$tornados_blog_title           = tornados_get_blog_title();
							$tornados_blog_title_text      = '';
							$tornados_blog_title_class     = '';
							$tornados_blog_title_link      = '';
							$tornados_blog_title_link_text = '';
							if ( is_array( $tornados_blog_title ) ) {
								$tornados_blog_title_text      = $tornados_blog_title['text'];
								$tornados_blog_title_class     = ! empty( $tornados_blog_title['class'] ) ? ' ' . $tornados_blog_title['class'] : '';
								$tornados_blog_title_link      = ! empty( $tornados_blog_title['link'] ) ? $tornados_blog_title['link'] : '';
								$tornados_blog_title_link_text = ! empty( $tornados_blog_title['link_text'] ) ? $tornados_blog_title['link_text'] : '';
							} else {
								$tornados_blog_title_text = $tornados_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $tornados_blog_title_class ); ?>">
								<?php
								$tornados_top_icon = tornados_get_term_image_small();
								if ( ! empty( $tornados_top_icon ) ) {
									$tornados_attr = tornados_getimagesize( $tornados_top_icon );
									?>
									<img src="<?php echo esc_url( $tornados_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'tornados' ); ?>"
										<?php
										if ( ! empty( $tornados_attr[3] ) ) {
											tornados_show_layout( $tornados_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $tornados_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $tornados_blog_title_link ) && ! empty( $tornados_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $tornados_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $tornados_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'tornados_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
