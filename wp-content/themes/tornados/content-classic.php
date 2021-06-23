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
	$tornados_columns    = empty( $tornados_template_args['columns'] ) ? 2 : max( 1, $tornados_template_args['columns'] );
	$tornados_blog_style = array( $tornados_template_args['type'], $tornados_columns );
} else {
	$tornados_blog_style = explode( '_', tornados_get_theme_option( 'blog_style' ) );
	$tornados_columns    = empty( $tornados_blog_style[1] ) ? 2 : max( 1, $tornados_blog_style[1] );
}
$tornados_expanded   = ! tornados_sidebar_present() && tornados_is_on( tornados_get_theme_option( 'expand_content' ) );
$tornados_animation  = tornados_get_theme_option( 'blog_animation' );
$tornados_components = tornados_array_get_keys_by_value( tornados_get_theme_option( 'meta_parts' ) );

$tornados_post_format = get_post_format();
$tornados_post_format = empty( $tornados_post_format ) ? 'standard' : str_replace( 'post-format-', '', $tornados_post_format );

?><div class="
<?php
if ( ! empty( $tornados_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $tornados_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $tornados_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
		post_class(
			'post_item post_format_' . esc_attr( $tornados_post_format )
					. ' post_layout_classic post_layout_classic_' . esc_attr( $tornados_columns )
					. ' post_layout_' . esc_attr( $tornados_blog_style[0] )
					. ' post_layout_' . esc_attr( $tornados_blog_style[0] ) . '_' . esc_attr( $tornados_columns )
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

	// Featured image
	$tornados_hover = ! empty( $tornados_template_args['hover'] ) && ! tornados_is_inherit( $tornados_template_args['hover'] )
						? $tornados_template_args['hover']
						: tornados_get_theme_option( 'image_hover' );
	tornados_show_post_featured(
		array(
			'thumb_size' => tornados_get_thumb_size(
				'classic' == $tornados_blog_style[0]
						? ( strpos( tornados_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $tornados_columns > 2 ? 'big' : 'huge' )
								: ( $tornados_columns > 2
									? ( $tornados_expanded ? 'med' : 'small' )
									: ( $tornados_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( tornados_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $tornados_columns > 2 ? 'masonry-big' : 'full' )
								: ( $tornados_columns <= 2 && $tornados_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $tornados_hover,
			'no_links'   => ! empty( $tornados_template_args['no_links'] ),
		)
	);
    ?>
    <div class="post_layout_classic_wrap">
        <?php
        if ( ! in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
            ?>
            <div class="post_header entry-header">
                <?php

                do_action( 'tornados_action_before_post_meta' );

                // Post meta
                if ( ! empty( $tornados_components ) && ! in_array( $tornados_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
                    tornados_show_post_meta(
                        apply_filters(
                            'tornados_filter_post_meta_args', array(
                            'components' => $tornados_components,
                            'seo'        => false,
                        ), $tornados_blog_style[0], $tornados_columns
                        )
                    );
                }

                do_action( 'tornados_action_after_post_meta' );

                do_action( 'tornados_action_before_post_title' );

                // Post title
                if ( empty( $tornados_template_args['no_links'] ) ) {
                    the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
                } else {
                    the_title( '<h4 class="post_title entry-title">', '</h4>' );
                }
                ?>
            </div><!-- .entry-header -->
            <?php
        }
        ?>

        <div class="post_content entry-content">
            <?php
            if ( empty( $tornados_template_args['hide_excerpt'] ) && ! empty( tornados_get_theme_option( 'excerpt_length' ) ) && tornados_get_theme_option( 'excerpt_length' ) > 0 ) {
                // Post content area
                tornados_show_post_content( $tornados_template_args, '<div class="post_content_inner">', '</div>' );
            }

            // Post meta
            if ( in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
                if ( ! empty( $tornados_components ) ) {
                    tornados_show_post_meta(
                        apply_filters(
                            'tornados_filter_post_meta_args', array(
                                'components' => $tornados_components,
                            ), $tornados_blog_style[0], $tornados_columns
                        )
                    );
                }
            }

            // More button
            if ( empty( $tornados_template_args['no_links'] ) && ! empty( $tornados_template_args['more_text'] ) && ! in_array( $tornados_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
                tornados_show_post_more_link( $tornados_template_args, '<p>', '</p>' );
            }
            ?>
        </div><!-- .entry-content -->
    </div>
</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
