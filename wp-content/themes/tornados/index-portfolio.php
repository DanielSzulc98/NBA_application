<?php
/**
 * The template for homepage posts with "Portfolio" style
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

	// Show filters
	$tornados_cat          = tornados_get_theme_option( 'parent_cat' );
	$tornados_post_type    = tornados_get_theme_option( 'post_type' );
	$tornados_taxonomy     = tornados_get_post_type_taxonomy( $tornados_post_type );
	$tornados_show_filters = tornados_get_theme_option( 'show_filters' );
	$tornados_tabs         = array();
	if ( ! tornados_is_off( $tornados_show_filters ) ) {
		$tornados_args           = array(
			'type'         => $tornados_post_type,
			'child_of'     => $tornados_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $tornados_taxonomy,
			'pad_counts'   => false,
		);
		$tornados_portfolio_list = get_terms( $tornados_args );
		if ( is_array( $tornados_portfolio_list ) && count( $tornados_portfolio_list ) > 0 ) {
			$tornados_tabs[ $tornados_cat ] = esc_html__( 'All', 'tornados' );
			foreach ( $tornados_portfolio_list as $tornados_term ) {
				if ( isset( $tornados_term->term_id ) ) {
					$tornados_tabs[ $tornados_term->term_id ] = $tornados_term->name;
				}
			}
		}
	}
	if ( count( $tornados_tabs ) > 0 ) {
		$tornados_portfolio_filters_ajax   = true;
		$tornados_portfolio_filters_active = $tornados_cat;
		$tornados_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters tornados_tabs tornados_tabs_ajax">
			<ul class="portfolio_titles tornados_tabs_titles">
				<?php
				foreach ( $tornados_tabs as $tornados_id => $tornados_title ) {
					?>
					<li><a href="<?php echo esc_url( tornados_get_hash_link( sprintf( '#%s_%s_content', $tornados_portfolio_filters_id, $tornados_id ) ) ); ?>" data-tab="<?php echo esc_attr( $tornados_id ); ?>"><?php echo esc_html( $tornados_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$tornados_ppp = tornados_get_theme_option( 'posts_per_page' );
			if ( tornados_is_inherit( $tornados_ppp ) ) {
				$tornados_ppp = '';
			}
			foreach ( $tornados_tabs as $tornados_id => $tornados_title ) {
				$tornados_portfolio_need_content = $tornados_id == $tornados_portfolio_filters_active || ! $tornados_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $tornados_portfolio_filters_id, $tornados_id ) ); ?>"
					class="portfolio_content tornados_tabs_content"
					data-blog-template="<?php echo esc_attr( tornados_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( tornados_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $tornados_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $tornados_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $tornados_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $tornados_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $tornados_cat ); ?>"
					data-need-content="<?php echo ( false === $tornados_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $tornados_portfolio_need_content ) {
						tornados_show_portfolio_posts(
							array(
								'cat'        => $tornados_id,
								'parent_cat' => $tornados_cat,
								'taxonomy'   => $tornados_taxonomy,
								'post_type'  => $tornados_post_type,
								'page'       => 1,
								'sticky'     => $tornados_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		tornados_show_portfolio_posts(
			array(
				'cat'        => $tornados_cat,
				'parent_cat' => $tornados_cat,
				'taxonomy'   => $tornados_taxonomy,
				'post_type'  => $tornados_post_type,
				'page'       => 1,
				'sticky'     => $tornados_sticky_out,
			)
		);
	}

	tornados_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'tornados_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
