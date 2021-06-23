<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

$tornados_template_args = get_query_var( 'tornados_template_args' );
if ( is_array( $tornados_template_args ) ) {
	$tornados_columns    = empty( $tornados_template_args['columns'] ) ? 1 : max( 1, $tornados_template_args['columns'] );
	$tornados_blog_style = array( $tornados_template_args['type'], $tornados_columns );
	if ( ! empty( $tornados_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $tornados_columns > 1 ) {
		?>
		<div class="column-1_<?php echo esc_attr( $tornados_columns ); ?>">
		<?php
	}
}
$tornados_expanded    = ! tornados_sidebar_present() && tornados_is_on( tornados_get_theme_option( 'expand_content' ) );
$tornados_post_format = get_post_format();
$tornados_post_format = empty( $tornados_post_format ) ? 'standard' : str_replace( 'post-format-', '', $tornados_post_format );
$tornados_animation   = tornados_get_theme_option( 'blog_animation' );
?>
<article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_' . esc_attr( $tornados_post_format ) ); ?>
	<?php echo ( ! tornados_is_off( $tornados_animation ) && empty( $tornados_template_args['slider'] ) ? ' data-animation="' . esc_attr( tornados_get_animation_classes( $tornados_animation ) ) . '"' : '' ); ?>
>
	<?php

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
			'no_links'   => ! empty( $tornados_template_args['no_links'] ),
			'hover'      => $tornados_hover,
			'thumb_size' => tornados_get_thumb_size( strpos( tornados_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $tornados_expanded ? 'huge' : 'big' ) ),
		)
	);

	if( in_array($tornados_post_format, array('link', 'aside', 'status', 'quote')) && tornados_get_theme_option( 'blog_content' ) != 'fullpost' ) {
	    tornados_show_post_content( $tornados_template_args, '<div class="post_content_inner">', '</div>' );
	}

    ?>
    <div class="post_layout_excerpt_wrap">
    <?php
    $go_link = false;
	// Title and post meta
	if ( get_the_title() != '' ) {
		?>
		<div class="post_header entry-header">
			<?php

			do_action( 'tornados_action_before_post_meta' );

			// Post meta
			$tornados_components = tornados_array_get_keys_by_value( tornados_get_theme_option( 'meta_parts' ) );

			if ( ! empty( $tornados_components ) && ! in_array( $tornados_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				tornados_show_post_meta(
					apply_filters(
						'tornados_filter_post_meta_args', array(
							'components' => $tornados_components,
							'seo'        => false,
						), 'excerpt', 1
					)
				);
			}

			do_action( 'tornados_action_before_post_title' );

			// Post title
			if ( empty( $tornados_template_args['no_links'] ) ) {
				the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			} else {
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			}
			?>
		</div><!-- .post_header -->
		<?php
	} else {
	    $go_link = true;
	}

	// Post content
	if ( ! in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) && tornados_get_theme_option( 'blog_content' ) != 'fullpost' &&
	        empty( $tornados_template_args['hide_excerpt'] ) && ! empty( tornados_get_theme_option( 'excerpt_length' ) ) && tornados_get_theme_option( 'excerpt_length' ) > 0 ) {
		?>
		<div class="post_content entry-content">
			<?php
			if ( tornados_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'tornados_action_before_full_post_content' );
					the_content( '' );
					do_action( 'tornados_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'tornados' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'tornados' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				// Post content area
				tornados_show_post_content( $tornados_template_args, '<div class="post_content_inner">', '</div>' );
				// More button
				if ( $go_link && ! in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
					tornados_show_post_more_link( $tornados_template_args, '<p>', '</p>' );
				}
			}
			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
	</div>
</article>
<?php

if ( is_array( $tornados_template_args ) ) {
	if ( ! empty( $tornados_template_args['slider'] ) || $tornados_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
