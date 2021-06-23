<?php
/**
 * The template for homepage posts with custom style
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.50
 */

tornados_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	$tornados_blog_style = tornados_get_theme_option( 'blog_style' );
	$tornados_parts      = explode( '_', $tornados_blog_style );
	$tornados_columns    = ! empty( $tornados_parts[1] ) ? max( 1, min( 6, (int) $tornados_parts[1] ) ) : 1;
	$tornados_blog_id    = tornados_get_custom_blog_id( $tornados_blog_style );
	$tornados_blog_meta  = tornados_get_custom_layout_meta( $tornados_blog_id );
	if ( ! empty( $tornados_blog_meta['margin'] ) ) {
		tornados_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( tornados_prepare_css_value( $tornados_blog_meta['margin'] ) ) ) );
	}
	$tornados_custom_style = ! empty( $tornados_blog_meta['scripts_required'] ) ? $tornados_blog_meta['scripts_required'] : 'none';

	tornados_blog_archive_start();

	$tornados_classes    = 'posts_container blog_custom_wrap' 
							. ( ! tornados_is_off( $tornados_custom_style )
								? sprintf( ' %s_wrap', $tornados_custom_style )
								: ( $tornados_columns > 1 
									? ' columns_wrap columns_padding_bottom' 
									: ''
									)
								);
	$tornados_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$tornados_sticky_out = tornados_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $tornados_stickies ) && count( $tornados_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $tornados_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $tornados_sticky_out ) {
		if ( tornados_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( tornados_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}
		?>
		<div class="<?php echo esc_attr( $tornados_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $tornados_sticky_out && ! is_sticky() ) {
			$tornados_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $tornados_classes ); ?>">
			<?php
		}
		$tornados_part = $tornados_sticky_out && is_sticky() ? 'sticky' : 'custom';
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', $tornados_part ), $tornados_part );
	}
	?>
	</div>
	<?php

	tornados_show_pagination();

	tornados_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
