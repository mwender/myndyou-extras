=== MyndYou Extras ===
Contributors: TheWebist
Donate link: https://mwender.com/
Tags: shortcodes
Requires at least: 5.7
Tested up to: 5.8.2
Requires PHP: 7.4
Stable tag: 0.6.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Extras for the MyndYou website.

== Description ==

This plugin provides extra functionality for the MyndYou website.

=== Team Members CPT Shortcode ===

Add `[team_members]` to list the Team Member CPT.

```
/**
 * Displays the Team Member CPT.
 *
 * @param      array  $atts {
 *   @type  string  $type     Filter the Team Members by the `staff_type` taxonomy.
 *   @type  string  $template Specify the template for displaying the Team Members.
 *   @type  int     $cols     Number of columns for the display.
 * }
 *
 * @return     string  HTML for a Team Member listing.
 */
```

== Changelog ==

= 0.6.2 =
* Adding `center` attribute to `[team_members]`.

= 0.6.1 =
* Adding comma between "Staff Types" listing in Team Members CPT admin column.

= 0.6.0 =
* Adding SCSS processing to `package.json`.
* Adding Flexbox Grid CSS.

= 0.5.4 =
* Adding `cntct` as a query variable option for parsing by the `[consultation_link /]` shortcode.
* Adding `ko` as query variable value for triggering Kathy's consult request link.

= 0.5.3 =
* Adding `kathy` as an option for the `[consultation_link/]` shortcode.

= 0.5.2 =
* Adding option to use `contact` as query variable for `[consultation_link]` shortcode.

= 0.5.1 =
* Updating Composer dependencies.

= 0.5.0 =
* Adding `[consultation_link]` shortcode.

= 0.4.0 =
* Team Members listing

= 0.3.0 =
* Adding event time to registration link.

= 0.2.0 =
* Adding "Past Event" logic to `[webinar_registration_link]`.
* Adding Elementor button style for `[webinar_registration_link]`.

= 0.1.0 =
* Initial implementation of the `[webinar_registration_link]` shortcode.
