<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

$tornados_template_args = get_query_var( 'tornados_template_args' );
if ( is_array( $tornados_template_args ) ) {
	$tornados_columns    = empty( $tornados_template_args['columns'] ) ? 1 : max( 1, min( 3, $tornados_template_args['columns'] ) );
	$tornados_blog_style = array( $tornados_template_args['type'], $tornados_columns );
} else {
	$tornados_blog_style = explode( '_', tornados_get_theme_option( 'blog_style' ) );
	$tornados_columns    = empty( $tornados_blog_style[1] ) ? 1 : max( 1, min( 3, $tornados_blog_style[1] ) );
}
$tornados_expanded    = ! tornados_sidebar_present() && tornados_is_on( tornados_get_theme_option( 'expand_content' ) );
$tornados_post_format = get_post_format();
$tornados_post_format = empty( $tornados_post_format ) ? 'standard' : str_replace( 'post-format-', '', $tornados_post_format );
$tornados_animation   = tornados_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $tornados_columns )
										. ' post_format_' . esc_attr( $tornados_post_format )
										. ( ! empty( $tornados_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! tornados_is_off( $tornados_animation ) && empty( $tornados_template_args['slider'] ) ? ' data-animation="' . esc_attr( tornados_get_animation_classes( $tornados_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $tornados_columns && ! is_array( $tornados_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . esc_attr( get_the_title() ) . '" icon="' . esc_attr( tornados_get_post_icon() ) . '"]' );
	}

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	$tornados_hover = ! empty( $tornados_template_args['hover'] ) && ! tornados_is_inherit( $tornados_template_args['hover'] )
						? $tornados_template_args['hover']
						: tornados_get_theme_option( 'image_hover' );
	tornados_show_post_featured(
		array(
			'class'         => 1 == $tornados_columns && ! is_array( $tornados_template_args ) ? 'tornados-full-height' : '',
			'hover'         => $tornados_hover,
			'no_links'      => ! empty( $tornados_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => tornados_get_thumb_size(
				strpos( tornados_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $tornados_columns ? 'huge' : 'original' )
										: ( 2 < $tornados_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'tornados_action_before_post_title' );

			// Post title
			if ( empty( $tornados_template_args['no_links'] ) ) {
				the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			} else {
				the_title( '<h3 class="post_title entry-title">', '</h3>' );
			}

			do_action( 'tornados_action_before_post_meta' );

			// Post meta
			$tornados_components = tornados_array_get_keys_by_value( tornados_get_theme_option( 'meta_parts' ) );
			$tornados_post_meta  = empty( $tornados_components ) || in_array( $tornados_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: tornados_show_post_meta(
											apply_filters(
												'tornados_filter_post_meta_args', array(
													'components' => $tornados_components,
													'seo'  => false,
													'echo' => false,
												), $tornados_blog_style[0], $tornados_columns
											)
										);
			tornados_show_layout( $tornados_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
			<?php
			// Post content area
			if ( empty( $tornados_template_args['hide_excerpt'] ) && ! empty( tornados_get_theme_option( 'excerpt_length' ) ) && tornados_get_theme_option( 'excerpt_length' ) > 0 ) {
				tornados_show_post_content( $tornados_template_args, '<div class="post_content_inner">', '</div>' );
			}
			// Post meta
			if ( in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				tornados_show_layout( $tornados_post_meta );
			}
			// More button
			if ( false && empty( $tornados_template_args['no_links'] ) && ! in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
				tornados_show_post_more_link( $tornados_template_args, '<p>', '</p>' );
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
