<?php

/**
 * Class to handle the SportsPress configuration page
 */

if( ! defined( 'ABSPATH' ) ) {
    return;
}

class LSFS_Admin_Events {

    public function __construct() {
        add_action( 'restrict_manage_posts', array( $this, 'filters' ) );
        add_filter( 'parse_query', array( $this, 'filters_query' ) );
    }

    /**
     * Adding LSFS Filters
     *
     * @return void
     */
    public function filters() {
        global $typenow, $wp_query;

	    if ( $typenow != 'sp_event' )
	    	return;

        $today = isset( $_REQUEST['events_today'] ) ? 1 : 0;
        echo '<label for="lsfs_events_today"><input ' . checked( $today, 1, false ) . ' id="lsfs_events_today" name="events_today" type="checkbox" class="sp-tablenav-input" value="1">' . __( 'Today Events', 'live-scores-for-sportspress' ) . '</label>';

    }

    /**
	 * Filter in admin based on options
	 *
	 * @param mixed $query
	 */
	public function filters_query( $query ) {
		global $typenow, $wp_query;

	    if ( $typenow == 'sp_event' ) {

	    	if ( ! empty( $_GET['events_today'] ) ) {
                $current_timestamp = time();

                $offset = get_option( 'gmt_offset' ) * 3600;

                $local_time = $current_timestamp + $offset;

                $today = getdate( $local_time );

		    	$query->query_vars['date_query'] = array(
                    array(
                        'year'  => $today['year'],
                        'month' => $today['mon'],
                        'day'   => $today['mday'],
                    ),
                );
		    }
		}
	}
}

new LSFS_Admin_Events();