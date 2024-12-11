# MyndYou Extras #
**Contributors:** [thewebist](https://profiles.wordpress.org/thewebist/)  
**Donate link:** https://mwender.com/  
**Tags:** shortcodes  
**Requires at least:** 6.4.0  
**Tested up to:** 6.7.1  
**Requires PHP:** 8.1  
**Stable tag:** 0.7.0  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

Extras for the MyndYou website.

## Description ##

This plugin provides extra functionality for the MyndYou website.

# Team Members CPT Shortcode #

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

# JSON Files Prefetching #

This plugin automatically generates `<link rel="prefetch">` tags for all JSON files in the Media Library. This helps improve page performance by prefetching JSON resources that may be needed on the frontend.

Features:
* Queries all JSON files from the Media Library.
* Outputs prefetch tags in the `<head>` of the frontend pages.
* Caches results using the WP Transient API to minimize database queries.
* Automatically refreshes the cache when a new JSON file is uploaded.

## Changelog ##

### 0.7.0 ###
* Adding prefetching for JSON files.

### 0.6.3 ###
* Updating CSS classes on Team Members from `col-md-3` to `col-sm-3 col-xs-6`. This means we have 4 columns of Team Members at tablet and larger screen sizes and 2 columns at sizes below tablet.
 
### 0.6.2 ###
* Adding `center` attribute to `[team_members]`.

### 0.6.1 ###
* Adding comma between "Staff Types" listing in Team Members CPT admin column.

### 0.6.0 ###
* Adding SCSS processing to `package.json`.
* Adding Flexbox Grid CSS.

### 0.5.4 ###
* Adding `cntct` as a query variable option for parsing by the `[consultation_link /]` shortcode.
* Adding `ko` as query variable value for triggering Kathy's consult request link.

### 0.5.3 ###
* Adding `kathy` as an option for the `[consultation_link/]` shortcode.

### 0.5.2 ###
* Adding option to use `contact` as query variable for `[consultation_link]` shortcode.

### 0.5.1 ###
* Updating Composer dependencies.

### 0.5.0 ###
* Adding `[consultation_link]` shortcode.

### 0.4.0 ###
* Team Members listing

### 0.3.0 ###
* Adding event time to registration link.

### 0.2.0 ###
* Adding "Past Event" logic to `[webinar_registration_link]`.
* Adding Elementor button style for `[webinar_registration_link]`.

### 0.1.0 ###
* Initial implementation of the `[webinar_registration_link]` shortcode.
