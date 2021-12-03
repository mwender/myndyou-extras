<?php

namespace myndyou\wpquery;

/**
 * Adds variables to WP Query
 *
 * @param      array $qvars  The query variables
 *
 * @return     array  Filtered query variables
 */
function consultation_query_vars( $qvars ){
  $qvars[] = 'consultant';
  $qvars[] = 'contact';
  $qvars[] = 'cntct';
  return $qvars;
}
add_filter( 'query_vars', __NAMESPACE__ . '\\consultation_query_vars' );