<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

tornados_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	tornados_blog_archive_start();

	$tornados_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$tornados_sticky_out = tornados_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $tornados_stickies ) && count( $tornados_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	if ( $tornados_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $tornados_sticky_out ) {
		?>
		<div class="chess_wrap posts_container">
		<?php
	}
	
	while ( have_posts() ) {
		the_post();
		if ( $tornados_sticky_out && ! is_sticky() ) {
			$tornados_sticky_out = false;
			?>
			</div><div class="chess_wrap posts_container">
			<?php
		}
		$tornados_part = $tornados_sticky_out && is_sticky() ? 'sticky' : 'chess';
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
