<?php
/**
 * Performance details
 */

if( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * Performance details
 */
class LSFS_Performance {
    /**
     * LSFS_Performance Constructor
     */
    public function __construct() {
        add_action( 'sportspress_meta_box_performance_details', array( $this, 'add_performance_live_details' ) );

		add_action( 'sportspress_process_sp_performance_meta', array( $this, 'save_performance' ), 20, 2 );
    }

    /**
     * Save performance details
     *
     * @param [type] $post_id
     * @param [type] $post
     * @return void
     */
    public function save_performance( $post_id, $post ) {
    
        if ( isset( $_POST['lsfs_in_scorers'] ) ) {
            update_post_meta( $post_id, '_lsfs_in_scorers', '1' );
        } else {
            delete_post_meta( $post_id, '_lsfs_in_scorers' );
        }
    }

    /**
     * Adding Live Details to Performance
     *
     * @param WP_Post $post
     * @return void
     */
    public function add_performance_live_details( $post ) {
    
        if ( ! $post ) {
            return;
        }

        $id = absint( $post->ID );
        $live_score = absint( get_post_meta( $id, '_lsfs_in_scorers', true ) );

        ?>
        <div id="sp_lsfs_in_scorers">
            <label for="lsfs_in_scorers">
                <input name="lsfs_in_scorers" id="lsfs_in_scorers" type="checkbox" value="1" <?php checked( $live_score, 1, true ); ?>>
                <strong><?php esc_html_e( 'Can be added in Live Scorers', 'live-scores-for-sportspress' ); ?></strong>
            </label>
        </div>
        <?php
    }
}

return new LSFS_Performance();