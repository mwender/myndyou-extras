<?php

namespace myndyou\enqueues;

function enqueue_scripts(){
  $css_filename = MYDU_PLUGIN_PATH . 'lib/' . MYDU_CSS_DIR . '/main.css';
  if( file_exists( $css_filename ) )
      wp_enqueue_style( 'myndyou', MYDU_PLUGIN_URL . 'lib/' . MYDU_CSS_DIR . '/main.css', ['hello-elementor','elementor-frontend'], filemtime( $css_filename ) );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );

/**
 * Custom styles for the WP Admin
 */
function custom_admin_styles(){
  wp_enqueue_style( 'myndyou-admin-styles', MYDU_PLUGIN_URL . 'lib/css/admin.css', null, filemtime( MYDU_PLUGIN_PATH . 'lib/css/admin.css' ) );
}
add_action( 'admin_head', __NAMESPACE__ . '\\custom_admin_styles' );