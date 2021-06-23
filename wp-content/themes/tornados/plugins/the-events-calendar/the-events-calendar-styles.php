<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'tornados_tribe_events_get_css' ) ) {
	add_filter( 'tornados_filter_get_css', 'tornados_tribe_events_get_css', 10, 2 );
	function tornados_tribe_events_get_css( $css, $args ) {
		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
			
.tribe-events-list .tribe-events-list-event-title {
	{$fonts['h3_font-family']}
}

#tribe-events .tribe-events-button,
.tribe-events-button,
.tribe-events-cal-links a,
.tribe-events-sub-nav li a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
#tribe-bar-form button, #tribe-bar-form a,
.tribe-events-read-more {
	{$fonts['button_font-family']}
	{$fonts['button_letter-spacing']}
}
.tribe-events-list .tribe-events-list-separator-month,
.tribe-events-calendar thead th {
    
}
.tribe-events-schedule, .tribe-events-schedule h2 {
	{$fonts['h5_font-family']}
}
#tribe-bar-form input, #tribe-events-content.tribe-events-month,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title,
#tribe-mobile-container .type-tribe_events,
.tribe-events-list-widget ol li .tribe-event-title {
	{$fonts['p_font-family']}
}
.tribe-events-loop .tribe-event-schedule-details,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dt,
#tribe-mobile-container .type-tribe_events .tribe-event-date-start {
	{$fonts['info_font-family']};
}

CSS;
		}

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars         = $args['vars'];
			$css['vars'] .= <<<CSS


CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Filters bar */
#tribe-bar-form {
	color: {$colors['text_dark']};
}
#tribe-bar-form input[type="text"] {
	color: {$colors['input_text']};
	border-color: {$colors['input_bd_color']} !important;
}
#tribe-bar-form input[type="text"]:focus {
    color: {$colors['input_dark']};
    border-color: {$colors['input_bd_hover']} !important;
}

.datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover {
	color: {$colors['text_link']};
	background: {$colors['text_dark']};
}

/* Content */
.tribe-events-calendar thead th {
	color: {$colors['extra_dark']};
	background: {$colors['extra_bg_color']} !important;
}
.tribe-events-calendar thead th + th:before {
	background: {$colors['extra_bd_color']};
}
#tribe-events-content .tribe-events-calendar td,
#tribe-events-content .tribe-events-calendar th {
	border-color: {$colors['alter_bd_color']} !important;
}
.tribe-events-calendar td div[id*="tribe-events-daynum-"],
.tribe-events-calendar td div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_dark']};
}
.tribe-events-calendar td.tribe-events-othermonth {
	color: {$colors['alter_light']};
	background: {$colors['alter_bd_hover']} !important;
}
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text']};
}
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"], .tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_light']};
}
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_link']};
}
.tribe-events-calendar td.tribe-events-present:before {
	border-color: {$colors['text_link']};
}
.tribe-events-calendar .tribe-events-has-events:after {
	background-color: {$colors['text']};
}
.tribe-events-calendar .mobile-active.tribe-events-has-events:after {
	background-color: {$colors['bg_color']};
}
#tribe-events-content .tribe-events-calendar td,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a {
	color: {$colors['text']};
}
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a:hover {
	color: {$colors['text_link']};
}
#tribe-events-content .tribe-events-calendar td.mobile-active,
#tribe-events-content .tribe-events-calendar td.mobile-active:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
#tribe-events-content .tribe-events-calendar td.mobile-active div[id*="tribe-events-daynum-"] {
	background-color: {$colors['bg_color']};
}
#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*="tribe-events-daynum-"] a,
.tribe-events-calendar .mobile-active div[id*="tribe-events-daynum-"] a {
	background-color: transparent;
	color: {$colors['bg_color']};
}
.events-archive.events-gridview #tribe-events-content table .type-tribe_events {
	border-color: {$colors['alter_bd_color']};
}
#tribe-mobile-container .type-tribe_events~.type-tribe_events {
    border-color: {$colors['bd_color']};
}

/* Tooltip */
.recurring-info-tooltip,
.tribe-events-calendar .tribe-events-tooltip,
.tribe-events-week .tribe-events-tooltip,
.tribe-events-shortcode.view-week .tribe-events-tooltip,
.tribe-events-tooltip .tribe-events-arrow {
	color: {$colors['alter_text']};
	background: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
}
#tribe-events-content .tribe-events-tooltip .summary { 
	color: {$colors['bg_color']};
	background: {$colors['extra_bg_color']};
}
.tribe-events-tooltip .tribe-event-duration {
	color: {$colors['extra_dark']};
}
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] {
    color: {$colors['text_link']} !important;
}

/* Events list */
.tribe-events-list-separator-month {
	color: {$colors['text_dark']};
}
.tribe-events-list-separator-month:after {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .type-tribe_events + .type-tribe_events,
.tribe-events-day .tribe-events-day-time-slot + .tribe-events-day-time-slot + .tribe-events-day-time-slot {
	border-color: {$colors['bd_color']};
}
.tribe-events-list-separator-month span {
	background-color: {$colors['bg_color']};	
}
.tribe-events-list .tribe-events-event-cost span {
	color: {$colors['inverse_link']};
	border-color: {$colors['text_link']};
	background: {$colors['text_link']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a {
	color: {$colors['alter_link']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a:hover {
	color: {$colors['alter_hover']};
}
.tribe-mobile .tribe-events-list .tribe-events-venue-details {
	border-color: {$colors['alter_bd_color']};
}

.single-tribe_events #tribe-events-footer,
.tribe-events-day #tribe-events-footer,
.events-list #tribe-events-footer,
.tribe-events-map #tribe-events-footer,
.tribe-events-photo #tribe-events-footer {
	border-color: {$colors['bd_color']};	
}

/* Events day */
.tribe-events-day .tribe-events-day-time-slot h5,
.tribe-events-day .tribe-events-day-time-slot .tribe-events-day-time-slot-heading {
	color: {$colors['extra_dark']};
	background: {$colors['extra_bg_color']};
}



/* Single Event */
.single-tribe_events .tribe-events-venue-map {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_hover']};
	background: {$colors['alter_bg_hover']};
}
.single-tribe_events .tribe-events-schedule .tribe-events-cost {
	color: {$colors['text_dark']};
}
.single-tribe_events .type-tribe_events {
	border-color: {$colors['bd_color']};
}





.tribe-bar-submit:before,
.tribe-bar-mini .tribe-bar-submit:before {
    color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.tribe-bar-submit:hover:before,
.tribe-bar-mini .tribe-bar-submit:hover:before {
    color: {$colors['inverse_hover']};
	background-color: {$colors['text_dark']};
}


#tribe-bar-views-toggle,
#tribe-bar-views .tribe-bar-views-option {
    color: {$colors['input_text']} !important;
	border-color: {$colors['input_bd_color']} !important;
	background-color: {$colors['input_bg_color']} !important;
}
#tribe-bar-views-toggle:hover,
#tribe-bar-views .tribe-bar-views-option:hover {
    color: {$colors['input_dark']} !important;
    border-color: {$colors['input_bd_hover']} !important;
}

#tribe-events-content .tribe-events-calendar td {
    background-color: {$colors['alter_bd_hover']};
}

.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*="tribe-events-daynum-"] > a,
.tribe-events-calendar td div[id*="tribe-events-daynum-"], 
.tribe-events-calendar td div[id*="tribe-events-daynum-"] > a, 
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"], 
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a, 
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"], 
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] > a {
    background-color: {$colors['alter_bg_hover']};
    color: {$colors['text_dark']};
}
.tribe-events-calendar td.tribe-events-othermonth.tribe-events-future div[id*="tribe-events-daynum-"] > a {
     color: {$colors['text']};
}

.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] {
    color: {$colors['text']};
}

.single-tribe_events #tribe-events-content .tribe-events-event-meta dt {
    color: {$colors['text']};
}

.tribe-event-tags,
.tribe-events-sub-nav li a {
    color: {$colors['text_link']};
}
.tribe-events-sub-nav li a:hover {
    color: {$colors['text_hover']};
}

#tribe-bar-form.tribe-bar-collapse #tribe-bar-collapse-toggle {
    color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
#tribe-bar-form.tribe-bar-collapse #tribe-bar-collapse-toggle:hover {
    color: {$colors['inverse_hover']};
	background-color: {$colors['text_dark']};
}

.datepicker table tr td.active.active:hover, .datepicker table tr td span.active.active:hover {
    color: {$colors['inverse_link']};
}
.datepicker table tr td span.active:hover, .datepicker table tr td span.active:hover.active {
    background-color: {$colors['text_link']};
}



#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*=tribe-events-daynum-] {
    color: {$colors['text_dark']};
}
.tribe-events-calendar td.tribe-events-othermonth.mobile-active.mobile-active.tribe-events-has-events:after {
    background-color: {$colors['text_link']};
}



CSS;
		}

		return $css;
	}
}

