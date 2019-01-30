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
		$new_html = preg_replace( $pattern, $replacement, $stripped_onclicks );


		//Also remove some CSS that sets a font-family on buttons
		$new_html = str_replace(
			'.arp_price_table_119 #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton, .arp_price_table_119 #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton .bestPlanButton_text{font-family:Abel;font-size:20px; font-weight: bold;}',
			'.arp_price_table_119 #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton{font-family:inherit;font-size:16px;font-weight:bold;padding:.518em 1em;}',
			$new_html
		);

		//use some regex to delete some CSS
		//this removes the pixel dimensions set on the buttons
		$pattern = '/\.arp_price_table_\d\d\d? #ArpPricingTableColumns \.ArpPricingTableColumnWrapper\.style_column_\d \.bestPlanButton, \.arp_price_table_\d\d\d? #ArpPricingTableColumns \.ArpPricingTableColumnWrapper\.style_column_\d \.bestPlanButton{width:\d+px;height:\d+px;}/';
		$new_html = preg_replace( $pattern, '', $new_html );

		return $new_html;
	}

	function hooks() {
		//filter the output of ARPrice tables to change the onclick attributes of buttons
		add_filter( 'arp_postdisplay_pricingtable_filter', array( $this, 'change_arprice_button_links' ), 10, 2 );
	}
}
