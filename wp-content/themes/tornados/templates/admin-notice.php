<?php
/**
 * The template to display Admin notices
 *
 * @package WordPress
 * @subpackage TORNADOS
 * @since TORNADOS 1.0.1
 */

$tornados_theme_obj = wp_get_theme();
?>
<div class="tornados_admin_notice tornados_welcome_notice update-nag">
	<?php
	// Theme image
	$tornados_theme_img = tornados_get_file_url( 'screenshot.jpg' );
	if ( '' != $tornados_theme_img ) {
		?>
		<div class="tornados_notice_image"><img src="<?php echo esc_url( $tornados_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'tornados' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="tornados_notice_title">
		<?php
		echo sprintf(
			// Translators: Add theme name and version to the 'Welcome' message
			esc_html__( 'Welcome to %1$s v.%2$s', 'tornados' ),
			$tornados_theme_obj->name . ( TORNADOS_THEME_FREE ? ' ' . esc_html__( 'Free', 'tornados' ) : '' ),
			$tornados_theme_obj->version
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="tornados_notice_text">
		<p class="tornados_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $tornados_theme_obj->description ) );
			?>
		</p>
		<p class="tornados_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'tornados' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="tornados_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=tornados_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'tornados' );
			?>
		</a>
		<?php		
		// Dismiss this notice
		?>
		<a href="#" class="tornados_hide_notice"><i class="dashicons dashicons-dismiss"></i> <span class="tornados_hide_notice_text"><?php esc_html_e( 'Dismiss', 'tornados' ); ?></span></a>
	</div>
</div>
