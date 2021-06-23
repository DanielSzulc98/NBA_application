<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.14
 */
$tornados_header_video = tornados_get_header_video();
$tornados_embed_video  = '';
if ( ! empty( $tornados_header_video ) && ! tornados_is_from_uploads( $tornados_header_video ) ) {
	if ( tornados_is_youtube_url( $tornados_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $tornados_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php tornados_show_layout( tornados_get_embed_video( $tornados_header_video ) ); ?></div>
		<?php
	}
}
