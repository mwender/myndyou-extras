<?php
/**
 * Plugin Name:     MyndYou Extras
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Various extensions for the MyndYou website
 * Author:          TheWebist
 * Author URI:      https://mwender.com
 * Text Domain:     myndyou-extras
 * Domain Path:     /languages
 * Version:         0.7.0
 *
 * @package         myndyou_Extras
 */

// Your code starts here.
$css_dir = ( stristr( site_url(), '.local' ) || SCRIPT_DEBUG )? 'css' : 'css/dist' ;
define( 'MYDU_CSS_DIR', $css_dir );
define( 'MYDU_DEV_ENV', stristr( site_url(), '.local' ) );
define( 'MYDU_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MYDU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load Composer dependencies
require_once 'vendor/autoload.php';

// Load required files
require_once( MYDU_PLUGIN_PATH . 'lib/fns/admin-custom-columns.php' );
require_once( MYDU_PLUGIN_PATH . 'lib/fns/enqueues.php' );
require_once( MYDU_PLUGIN_PATH . 'lib/fns/prefetching.php' );
require_once( MYDU_PLUGIN_PATH . 'lib/fns/shortcodes.php' );
require_once( MYDU_PLUGIN_PATH . 'lib/fns/templates.php' );
require_once( MYDU_PLUGIN_PATH . 'lib/fns/utilities.php' );
require_once( MYDU_PLUGIN_PATH . 'lib/fns/wpquery.php' );

/**
 * Enhanced logging.
 *
 * @param      string  $message  The log message
 */
function uber_log( $message = null ){
  static $counter = 1;

  $bt = debug_backtrace();
  $caller = array_shift( $bt );

  if( 1 == $counter )
    error_log( "\n\n" . str_repeat('-', 25 ) . ' STARTING DEBUG [' . date('h:i:sa', current_time('timestamp') ) . '] ' . str_repeat('-', 25 ) . "\n\n" );
  error_log( "\n" . $counter . '. ' . basename( $caller['file'] ) . '::' . $caller['line'] . "\n" . $message . "\n---\n" );
  $counter++;
}