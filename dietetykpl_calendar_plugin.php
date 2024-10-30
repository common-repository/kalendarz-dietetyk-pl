<?php
/*
Plugin Name: Kalendarz Dietetyk.pl
Plugin URI: http://wordpress.org/plugins/dietetyk_pl_calendar/
Description: Aby dodać kalendarz dietetyka umieść jego alias pomiędzy nawiasami przy src w shortcode: [dpc_dietetyk src=""]. Alias jest końcowką adresu na platformie https://dietetyk.pl. Przykład: [dpc_dietetyk src="adam.kowalski"]
Version: 1.0
Author: Spotbeans
Author URI: http://spotbeans.com/
License: GPLv3
*/

function dpc_dietetykpl_calendar( $atts ) {
    $baseUrl = 'https://dietetyk.pl/kalendarz-online?alias=';
    $logo = '<img class="dpc-logo" src="' . plugin_dir_url( __FILE__ ) . 'images/logo_dietetyk.svg' . '" alt="dietetyk">';

	$calendar = '<a href="https://dietetyk.pl">' . $logo . '</a>';

    
	$calendar .= '<iframe';
    
    foreach( $atts as $attr => $value ) {
			if ( $value != '' ) { 
				$calendar .= ' ' . esc_attr( $attr ) . '="' . $baseUrl . esc_attr($value) . '" width="100%" height="400px" frameBorder="0"';
			} else { 
				$calendar .= ' ' . esc_attr( $attr );
			}
		}
    
	$calendar .= '></iframe>';
    
    $calendar .= '
    <style> 
    .dpc-logo {
        width: 120px;
    }
    </style>
    ';
	return $calendar;
}
add_shortcode( 'dpc_dietetyk', 'dpc_dietetykpl_calendar' );

