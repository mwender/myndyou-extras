<?php
namespace myndyou\shortcodes;
use function myndyou\utilities\{get_alert};
use function myndyou\fns\templates\{render_template,template_exists};

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
function team_members( $atts ){
  $args = shortcode_atts([
    'type'      => null,
    'template'  => null,
    'cols'      => null,
  ], $atts );

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
  if( $args['cols'] ){
    switch( $args['cols'] ){
      case 2:
        $data['cols'] = 'two-cols';
        break;
    }
  }

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
  if ( \Elementor\Plugin::$instance->editor->is_edit_mode() && ! $already_run ){
    $html.= '<style>' . file_get_contents( MYDU_PLUGIN_PATH . 'lib/css/myndyou.css' ) . '</style>';
    $already_run = true;
  }
  return $html;
}
add_shortcode( 'team_members', __NAMESPACE__ . '\\team_members' );
