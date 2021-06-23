<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

$tornados_template_args = get_query_var( 'tornados_template_args' );
if ( is_array( $tornados_template_args ) ) {
	$tornados_columns    = empty( $tornados_template_args['columns'] ) ? 2 : max( 1, $tornados_template_args['columns'] );
	$tornados_blog_style = array( $tornados_template_args['type'], $tornados_columns );
} else {
	$tornados_blog_style = explode( '_', tornados_get_theme_option( 'blog_style' ) );
	$tornados_columns    = empty( $tornados_blog_style[1] ) ? 2 : max( 1, $tornados_blog_style[1] );
}
$tornados_post_format = get_post_format();
$tornados_post_format = empty( $tornados_post_format ) ? 'standard' : str_replace( 'post-format-', '', $tornados_post_format );
$tornados_animation   = tornados_get_theme_option( 'blog_animation' );
$tornados_image       = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?><div class="
<?php
if ( ! empty( $tornados_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo 'masonry_item masonry_item-1_' . esc_attr( $tornados_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_format_' . esc_attr( $tornados_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $tornados_columns )
		. ' post_layout_gallery'
		. ' post_layout_gallery_' . esc_attr( $tornados_columns )
	);
	echo ( ! tornados_is_off( $tornados_animation ) && empty( $tornados_template_args['slider'] ) ? ' data-animation="' . esc_attr( tornados_get_animation_classes( $tornados_animation ) ) . '"' : '' );
	?>
	data-size="
		<?php
		if ( ! empty( $tornados_image[1] ) && ! empty( $tornados_image[2] ) ) {
			echo intval( $tornados_image[1] ) . 'x' . intval( $tornados_image[2] );}
		?>
	"
	data-src="
		<?php
		if ( ! empty( $tornados_image[0] ) ) {
			echo esc_url( $tornados_image[0] );}
		?>
	"
>
<?php

	// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	// Featured image
	$tornados_image_hover = 'icon';
if ( in_array( $tornados_image_hover, array( 'icons', 'zoom' ) ) ) {
	$tornados_image_hover = 'dots';
}
$tornados_components = tornados_array_get_keys_by_value( tornados_get_theme_option( 'meta_parts' ) );
tornados_show_post_featured(
	array(
		'hover'         => $tornados_image_hover,
		'no_links'      => ! empty( $tornados_template_args['no_links'] ),
		'thumb_size'    => tornados_get_thumb_size( strpos( tornados_get_theme_option( 'body_style' ), 'full' ) !== false || $tornados_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only'    => true,
		'show_no_image' => true,
		'post_info'     => '<div class="post_details">'
						. '<h2 class="post_title">'
							. ( empty( $tornados_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>'
								: esc_html( get_the_title() )
								)
						. '</h2>'
						. '<div class="post_description">'
							. ( ! empty( $tornados_components )
								? tornados_show_post_meta(
									apply_filters(
										'tornados_filter_post_meta_args', array(
											'components' => $tornados_components,
											'seo'      => false,
											'echo'     => false,
										), $tornados_blog_style[0], $tornados_columns
									)
								)
								: ''
								)
							. ( empty( $tornados_template_args['hide_excerpt'] )
								? '<div class="post_description_content">' . get_the_excerpt() . '</div>'
								: ''
								)
							. ( empty( $tornados_template_args['no_links'] )
								? '<a href="' . esc_url( get_permalink() ) . '" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__( 'Learn more', 'tornados' ) . '</span></a>'
								: ''
								)
						. '</div>'
					. '</div>',
	)
);
?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
