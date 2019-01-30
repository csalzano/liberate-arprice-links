=== Liberate ARPrice Links ===
Contributors: salzano
Tags: arprice, pricing table
Requires at least: 3.0.1
Tested up to: 4.9.1
Stable tag: 1.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables JavaScript in ARPrice pricing table button links.

== Description ==

This plugin modifies the way the ARPrice plugin makes buttons link to URLs. The default behavior of ARPrice wraps all links with a JavaScript function, called `arp_redirect(),` in the `onclick` attribute of <button> elements. This design prevents users from entering JavaScript instead of a URL, and this plugin removes that limitation.

If a URL is provided, that URL is assigned to `location.href` to allow links to continue working without the redirect function. If JavaScript is entered as a button's link, that JavaScript will be inserted directly into the button's `onclick` attribute.

I wrote this plugin while trying to make our ARPrice tables cooperate with a specific WooCommerce implementation.

== Installation ==

1. Upload the `liberate-arprice-links` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.1.0 =
* [Added] Adds a feature that removes some CSS that sets a font-family on buttons.
* [Added] Adds a feature that removes pixel dimensions set on buttons.

= 1.0.0 =
* First build