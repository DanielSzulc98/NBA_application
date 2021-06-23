<?php
/**
 * Adding a Metabox to the SP Events for Live Scorers
 */

if( ! defined( 'ABSPATH' ) ) {
    return;
}

class LSFS_Meta_Box_SP_Event_Scorers {
    
     /**
     * Output the metabox
     */
    public static function output( $post ) {
        $post_id = $post->ID;
        $teams = get_post_meta( $post_id, 'sp_team' );
        $scorers = get_post_meta( $post_id, 'lsfs_scorers', true );

        $performances = array();
		$default_performance = sp_get_main_performance_option();
        $perf_args = array(
            'post_type' => 'sp_performance',
            'numberposts' => -1,
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key'     => '_lsfs_in_scorers',
                    'value'   => '1',
                    'compare' => '='
                ),
            ),
        );
        $performances_posts = get_posts( $perf_args );
        if ( $performances_posts ) {
            $performances = wp_list_pluck( $performances_posts, 'post_title', 'post_name' );
        }
       
        if ( ! isset( $performances[ $default_performance ] ) ) {
            $perf_default_args = array(
                'post_type' => 'sp_performance',
                'name'  => $default_performance
            );
            $performance = get_posts( $perf_default_args );

            if ( $performance ) {
                $performances[ $default_performance ] = $performance[0]->post_title;
            }
        }


        if ( ! $scorers ) { 
            $scorers = array();
        }
        
        if ( $teams ) {
            echo '<p><em>' . esc_html__( 'This will also update the box score and event results for you. Refresh to see the change.', 'live-scores-for-sportspress' ) . '</em></p>';
            foreach ( $teams as $team_id ) {
                $team_players_query = array(
                    'post_type'   => 'sp_player',
                    'post_status' => 'publish',
                    'meta_key'    => 'sp_current_team',
                    'meta_value' => $team_id,
                    'posts_per_page' => -1,
                );
    
                $team_players = new WP_Query( $team_players_query );
                $team_scorers = isset( $scorers[ $team_id ] ) ? $scorers[ $team_id ] : array();
                
                ?>
                <div class="lsfs-team-scorers">
                    <h3><?php echo get_the_title( $team_id ); ?></h3>
                    <div class="lsfs-live-scorers-form">
                        <input type="hidden" name="lsfs_team_id" value="<?php echo $team_id; ?>" />
                        <input type="hidden" name="lsfs_event_id" value="<?php echo $post_id; ?>" />
                        <input type="hidden" name="lsfs_action" value="add_scorer" />
                        <select name="lsfs_team_player_id">
                            <option value="0"><?php _e( 'Create New Player', 'live-scores-for-sportspress' ); ?></option>
                            <?php
                            if( $team_players->have_posts() ) {
                                while( $team_players->have_posts() ) {
                                    $team_players->the_post();
                                    echo '<option value="' . get_the_id() . '">' . get_the_title() . '</option>';
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </select>
                        <input type="text" name="lsfs_team_player_new" placeholder="<?php _e( 'Insert new Player Name', 'live-scores-for-sportspress' ); ?>" />
                        <br/>
                        <?php
                            if ( count( $performances ) === 1 ) {
                                ?>
                                <input type="hidden" name="lsfs_performance" value="<?php echo $default_performance; ?>" />
                                <?php
                            } else {
                                ?>
                                <label for="lsfs_team_player_id_<?php echo esc_attr( $team_id ); ?>">
                                <strong><?php esc_html_e( 'Performance', 'live-scores-for-sportspress' ); ?></strong>
                                <select name="lsfs_performance">
                                    <?php
                                    foreach ( $performances as $performance_slug => $performance_title ) {
                                        ?>
                                        <option <?php selected( $default_performance, $performance_slug, true ); ?> value="<?php echo esc_attr( $performance_slug ); ?>"><?php echo esc_html( $performance_title ); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </label>
                                <input type="hidden" name="lsfs_performance" value="<?php echo $default_performance; ?>" />
                                <?php
                            }
                        ?>
                        <input type="number" name="lsfs_team_player_points" placeholder="<?php _e( 'Enter Points', 'live-scores-for-sportspress' ); ?>" value="1" />
                        <input type="number" name="lsfs_team_player_minute" placeholder="<?php _e( 'Enter Minute', 'live-scores-for-sportspress' ); ?>" />
                       
                        <?php do_action( 'lsfs_scorers_form_before_button', $team_id , $post_id ); ?>
                        <button type="button" name="lsfs_team_player_score_submit" class="button button-default lsfs-submit-scorer"><?php _e( 'Submit Scorer', 'cfootball' ); ?></button>
                    </div>
                    <div class="lsfs-team-scorers-list <?php if ( ! $team_scorers ) { ?>hidden<?php } ?>">
                        <table class="form-table"> 
                            <thead> 
                                <tr>
                                    <td>
                                        <strong><?php _e( 'Scorer', 'live-scores-for-sportspress' ); ?></strong>
                                    </td>
                                    <td>
                                        <strong><?php _e( 'Minute', 'live-scores-for-sportspress' ); ?></strong>
                                    </td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if( $team_scorers ) {
                                    $count = 0;
                                    foreach ( $team_scorers as $row => $team_scorer ) {
                                        if( ! isset( $team_scorer['row'] ) ) {
                                            $team_scorer['row'] = $count;
                                            $team_scorers[ $row ] = $team_scorer;
                                        }
                                        $count++;
                                    }
                                    foreach ( $team_scorers as $team_scorer ) {
                                        $name_arr = explode( ' ', $team_scorer['name'] );
                                        $surname  = array_pop( $name_arr );
                                        $name     = '';
                                        if( $name_arr ) {
                                            $_name = array_map( function( $name_part ){
                                                return substr( $name_part, 0, 1 ) . '.';
                                            }, $name_arr );
                                            $name = implode( ' ', $_name ) . ' ';
                                        }
    
                                        echo '<tr><td>' . $name . $surname . '</td><td>' . $team_scorer['minute'] . '\'' . '</td><td><button type="button" class="button button-default button-small lsfs-remove-scorer" data-row="' . $team_scorer['row'] . '" data-team="' . $team_id . '" data-event="' . $post_id . '">X</button></td></tr>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
        } else {
            _e( 'No Teams Selected. Please add Teams to this Match.', 'cfootball' );
        } 
    }

    /**
     * Saving the metabox
     */
    public static function save( $post_id, $post ) {}
}