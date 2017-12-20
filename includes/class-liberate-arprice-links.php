<?php
class Liberate_ARPrice_Links{

	//ARPrice wraps button link URLs in a JavaScript function, so strip that out
	function change_arprice_button_links( $html, $table_id ) {
		//remove the arp_redirect() function that wraps onclick URLs
		$pattern = '/onclick=\'arp_redirect\("([^"]+)"[^\)]+\);\'/';
		$replacement = 'onclick="$1"';
		$stripped_onclicks = preg_replace( $pattern, $replacement, $html );

		//now, insert location.href='' unless the onclick attribute does not start with http
		$pattern = '/onclick="(http[^"]+)"/';
		$replacement = 'onclick="location.href=\'$1\'"';
		return preg_replace( $pattern, $replacement, $stripped_onclicks );
	}

	function hooks() {
		//filter the output of ARPrice tables to change the onclick attributes of buttons
		add_filter( 'arp_postdisplay_pricingtable_filter', array( $this, 'change_arprice_button_links' ), 10, 2 );
	}
}
