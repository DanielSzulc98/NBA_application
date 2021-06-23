<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0
 */

$tornados_link        = get_permalink();
$tornados_post_format = get_post_format();
$tornados_post_format = empty( $tornados_post_format ) ? 'standard' : str_replace( 'post-format-', '', $tornados_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $tornados_post_format ) ); ?>>
	<?php
	tornados_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'tornados_filter_related_thumb_size', tornados_get_thumb_size( (int) tornados_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'extra' ) ),
			'show_no_image' => tornados_get_no_image() != '',
            'thumb_ratio'   => '600:394',
		)
	);
	?>
	<div class="post_header entry-header">
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
            tornados_show_post_meta(
                apply_filters(
                    'tornados_filter_post_meta_args', array(
                    'components' => 'categories,date',
                    'seo'        => false,
                ), 'related', 1
                )
            );
		}
		?>
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $tornados_link ); ?>"><?php the_title(); ?></a></h6>
        <?php
        $tornados_template_args['excerpt_length'] = 19;
        tornados_show_post_content( $tornados_template_args, '<div class="post_content_inner">', '</div>' );
        ?>
	</div>
</div>