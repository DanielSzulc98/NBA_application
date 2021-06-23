<?php
/**
 * The Portfolio template to display the content
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
		. ( is_sticky() && ! is_paged() ? ' sticky' : '' )
	);
	echo ( ! tornados_is_off( $tornados_animation ) && empty( $tornados_template_args['slider'] ) ? ' data-animation="' . esc_attr( tornados_get_animation_classes( $tornados_animation ) ) . '"' : '' );
	?>
>
<?php

// Sticky label
if ( is_sticky() && ! is_paged() ) {
	?>
		<span class="post_label label_sticky"></span>
		<?php
}

	$tornados_image_hover = ! empty( $tornados_template_args['hover'] ) && ! tornados_is_inherit( $tornados_template_args['hover'] )
								? $tornados_template_args['hover']
								: tornados_get_theme_option( 'image_hover' );
	// Featured image
	tornados_show_post_featured(
		array(
			'hover'         => $tornados_image_hover,
			'no_links'      => ! empty( $tornados_template_args['no_links'] ),
			'thumb_size'    => tornados_get_thumb_size(
				strpos( tornados_get_theme_option( 'body_style' ), 'full' ) !== false || $tornados_columns < 3
								? 'masonry-big'
				: 'masonry'
			),
			'show_no_image' => true,
			'class'         => 'dots' == $tornados_image_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $tornados_image_hover ? '<div class="post_info">' . esc_html( get_the_title() ) . '</div>' : '',
		)
	);
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!