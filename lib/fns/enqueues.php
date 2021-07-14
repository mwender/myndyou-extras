<?php

namespace myndyou\enqueues;

function enqueue_scripts(){
  wp_register_style( 'myndyou', MYDU_PLUGIN_URL . 'lib/css/myndyou.css', null, filemtime( MYDU_PLUGIN_PATH . 'lib/css/myndyou.css' ) );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );

/**
 * Custom styles for the WP Admin
 */
function custom_admin_styles(){
  wp_enqueue_style( 'myndyou-admin-styles', plugin_dir_url( __FILE__ ) . '../css/admin.css', null, filemtime( plugin_dir_path( __FILE__ ) . '../css/admin.css' ) );
}
add_action( 'admin_head', __NAMESPACE__ . '\\custom_admin_styles' );