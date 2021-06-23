<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.50
 */

$tornados_template_args = get_query_var( 'tornados_template_args' );
if ( is_array( $tornados_template_args ) ) {
	$tornados_columns    = empty( $tornados_template_args['columns'] ) ? 2 : max( 1, $tornados_template_args['columns'] );
	$tornados_blog_style = array( $tornados_template_args['type'], $tornados_columns );
} else {
	$tornados_blog_style = explode( '_', tornados_get_theme_option( 'blog_style' ) );
	$tornados_columns    = empty( $tornados_blog_style[1] ) ? 2 : max( 1, $tornados_blog_style[1] );
}
$tornados_blog_id       = tornados_get_custom_blog_id( join( '_', $tornados_blog_style ) );
$tornados_blog_style[0] = str_replace( 'blog-custom-', '', $tornados_blog_style[0] );
$tornados_expanded      = ! tornados_sidebar_present() && tornados_is_on( tornados_get_theme_option( 'expand_content' ) );
$tornados_animation     = tornados_get_theme_option( 'blog_animation' );
$tornados_components    = tornados_array_get_keys_by_value( tornados_get_theme_option( 'meta_parts' ) );

$tornados_post_format   = get_post_format();
$tornados_post_format   = empty( $tornados_post_format ) ? 'standard' : str_replace( 'post-format-', '', $tornados_post_format );

$tornados_blog_meta     = tornados_get_custom_layout_meta( $tornados_blog_id );
$tornados_custom_style  = ! empty( $tornados_blog_meta['scripts_required'] ) ? $tornados_blog_meta['scripts_required'] : 'none';

if ( ! empty( $tornados_template_args['slider'] ) || $tornados_columns > 1 || ! tornados_is_off( $tornados_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $tornados_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo ( tornados_is_off( $tornados_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $tornados_custom_style ) ) . '-1_' . esc_attr( $tornados_columns );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" 
<?php
	post_class(
			'post_item post_format_' . esc_attr( $tornados_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $tornados_columns )
					. ' post_layout_' . esc_attr( $tornados_blog_style[0] )
					. ' post_layout_' . esc_attr( $tornados_blog_style[0] ) . '_' . esc_attr( $tornados_columns )
					. ( ! tornados_is_off( $tornados_custom_style )
						? ' post_layout_' . esc_attr( $tornados_custom_style )
							. ' post_layout_' . esc_attr( $tornados_custom_style ) . '_' . esc_attr( $tornados_columns )
						: ''
						)
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
	// Custom layout
	do_action( 'tornados_action_show_layout', $tornados_blog_id );
	?>
</article><?php
if ( ! empty( $tornados_template_args['slider'] ) || $tornados_columns > 1 || ! tornados_is_off( $tornados_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
