<?php
/**
 * Plugin Name: Liberate ARPrice Links
 * Plugin URI: https://coreysalzano.com/
 * Description: Enables JavaScript in ARPrice pricing table button links.
 * Version: 1.1.0
 * Author: Corey Salzano
 * Author URI: https://profiles.wordpress.org/salzano
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

class Liberate_ARPrice_Links_Runner{

	function include_dependencies(){
		include_once( 'includes/class-liberate-arprice-links.php' );
	}

	function run() {
		$this->include_dependencies();
		$liberator = new Liberate_ARPrice_Links();
		$liberator->hooks();
	}
}
$liberate_23490867958324 = new Liberate_ARPrice_Links_Runner();
$liberate_23490867958324->run();
