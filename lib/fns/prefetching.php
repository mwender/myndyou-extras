<?php
namespace myndyou\prefetching;

/**
 * Add prefetching markup for all JSON files in the Media Library to the frontend,
 * with results cached using the Transient API.
 */
function add_json_prefetching() {
  // Attempt to get cached JSON file URLs
  $cached_json_files = get_transient( 'prefetch_json_files' );

  // If no cache exists, query and regenerate it
  if ( false === $cached_json_files ) {
    // Query attachments for JSON files
    $args = array(
      'post_type'      => 'attachment',
      'post_mime_type' => 'application/json',
      'post_status'    => 'inherit',
      'posts_per_page' => -1,
    );

    $json_files = get_posts( $args );
    $cached_json_files = array();

    // Collect URLs
    foreach ( $json_files as $file ) {
      $file_url = wp_get_attachment_url( $file->ID );
      if ( $file_url ) {
        $cached_json_files[] = $file_url;
      }
    }

    // Cache the results for a week (or another interval as needed)
    set_transient( 'prefetch_json_files', $cached_json_files, WEEK_IN_SECONDS );
  }

  // Output prefetch links
  foreach ( $cached_json_files as $file_url ) {
    echo '<link rel="prefetch" href="' . esc_url( $file_url ) . '" />';
  }
}
add_action( 'wp_head', __NAMESPACE__ . '\\add_json_prefetching' );

/**
 * Clear the JSON files cache when a new JSON file is uploaded.
 *
 * @param int $post_id The attachment ID.
 */
function clear_json_prefetching_cache_on_upload( $post_id ) {
  // Check if the uploaded file is a JSON file
  $post_mime_type = get_post_mime_type( $post_id );
  if ( 'application/json' === $post_mime_type ) {
    delete_transient( 'prefetch_json_files' );
  }
}
add_action( 'add_attachment', __NAMESPACE__ . '\\clear_json_prefetching_cache_on_upload' );
