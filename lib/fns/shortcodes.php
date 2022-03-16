<?php
namespace myndyou\shortcodes;
use function myndyou\utilities\{get_alert};
use function myndyou\fns\templates\{render_template,template_exists};

/**
 * Returns a link to the Schedule a Consultation page.
 *
 * Filter this link by adding `?consultant=` to the URL with the
 * value equal to the consultant we want to use. Defaults to
 * `/schedule-a-consultation/`.
 *
 * @return     string  URL to the Schedule a Consultation page.
 */
function consultation_link(){
  $consultant = get_query_var( 'consultant', '' );
  $contact = get_query_var( 'contact', '' );
  $cntct = get_query_var( 'cntct', '' );

  if( !empty( $consultant ) )
    $switch_var = $consultant;
  if( !empty( $contact ) )
    $switch_var = $contact;
  if( !empty( $cntct ) )
    $switch_var = $cntct;

  switch( $switch_var ){
    case 'ejay':
      $link = 'schedule-a-consultation-with-ejay';
      break;

    case 'kathy':
    case 'ko':
      $link = 'schedule-a-consultation-with-kathy';
      break;

    default:
      $link = 'schedule-a-consultation';
      break;
  }
  return site_url( $link );
}
add_shortcode( 'consultation_link', __NAMESPACE__ . '\\consultation_link' );

/**
 * Displays the Team Member CPT.
 *
 * @param      array  $atts {
 *   @type  string  $type     Filter the Team Members by the `staff_type` taxonomy.
 *   @type  string  $template Specify the template for displaying the Team Members.
 *   @type  int     $cols     Number of columns for the display.
 *   @type  bool    $center   Center align content. Defaults to `false`.
 * }
 *
 * @return     string  HTML for a Team Member listing.
 */
function team_members( $atts ){
  $args = shortcode_atts([
    'type'      => null,
    'template'  => null,
    'cols'      => null,
    'center'    => false,
  ], $atts );

  if ( $args['center'] === 'false' ) $args['center'] = false; // just to be sure...
  $args['center'] = (bool) $args['center'];

  static $already_run = false;

  wp_enqueue_style( 'myndyou' );

  $query_args = [
    'post_type'   => 'team_member',
    'orderby'     => 'menu_order',
    'sort_order'  => 'ASC',
    'numberposts' => -1,
  ];

  if( $args['type'] ){
    $query_args['tax_query'][] = [
      'taxonomy'  => 'staff_type',
      'field'     => 'slug',
      'terms'      => $args['type'],
    ];
  }
  $team_members = get_posts( $query_args );

  $data = [];

  $data['cols'] = ( is_numeric( $args['cols'] ) && is_int( $args['cols'] ) )? intval( 12/$args['cols'] ) : 3 ;
  $data['center'] = ( $args['center'] )? ' center-md' : '' ;

  if( $team_members ){
    foreach( $team_members as $member ){
      $data['team_members'][] = [
        'name'      => $member->post_title,
        'name_esc'  => esc_attr( $member->post_title ),
        'title'     => get_field( 'title', $member->ID ),
        'tagline'   => get_field( 'tagline', $member->ID ),
        'bio'       => get_field( 'bio', $member->ID ),
        'image'     => get_the_post_thumbnail_url( $member->ID, 'full' ),
        'link'      => get_permalink( $member->ID ),
      ];
    }
  }
  $template = ( ! is_null( $args['template'] ) && template_exists( $args['template'] ) )? $args['template'] : 'team-members' ;
  $html = render_template( $template, $data );

  return $html;
}
add_shortcode( 'team_members', __NAMESPACE__ . '\\team_members' );
