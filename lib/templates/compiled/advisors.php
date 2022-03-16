<?php
use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array();
    $partials = array();
    $cx = array(
        'flags' => array(
            'jstrue' => false,
            'jsobj' => false,
            'jslen' => false,
            'spvar' => true,
            'prop' => false,
            'method' => false,
            'lambda' => false,
            'mustlok' => false,
            'mustlam' => false,
            'mustsec' => false,
            'echo' => false,
            'partnc' => false,
            'knohlp' => false,
            'debug' => isset($options['debug']) ? $options['debug'] : 1,
        ),
        'constants' => array(),
        'helpers' => isset($options['helpers']) ? array_merge($helpers, $options['helpers']) : $helpers,
        'partials' => isset($options['partials']) ? array_merge($partials, $options['partials']) : $partials,
        'scopes' => array(),
        'sp_vars' => isset($options['data']) ? array_merge(array('root' => $in), $options['data']) : array('root' => $in),
        'blparam' => array(),
        'partialid' => 0,
        'runtime' => '\LightnCandy\Runtime',
    );
    
    $inary=is_array($in);
    return '<div class="row'.htmlspecialchars((string)(($inary && isset($in['center'])) ? $in['center'] : null), ENT_QUOTES, 'UTF-8').'">
'.LR::sec($cx, (($inary && isset($in['team_members'])) ? $in['team_members'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);return '  <div class="item col-md-'.htmlspecialchars((string)((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['cols'])) ? $cx['scopes'][count($cx['scopes'])-1]['cols'] : null), ENT_QUOTES, 'UTF-8').'">
    <a href="'.htmlspecialchars((string)(($inary && isset($in['link'])) ? $in['link'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlspecialchars((string)(($inary && isset($in['name_esc'])) ? $in['name_esc'] : null), ENT_QUOTES, 'UTF-8').'"><img src="'.htmlspecialchars((string)(($inary && isset($in['image'])) ? $in['image'] : null), ENT_QUOTES, 'UTF-8').'" alt="'.htmlspecialchars((string)(($inary && isset($in['name_esc'])) ? $in['name_esc'] : null), ENT_QUOTES, 'UTF-8').'"/></a>
    <h3><a href="'.htmlspecialchars((string)(($inary && isset($in['link'])) ? $in['link'] : null), ENT_QUOTES, 'UTF-8').'" title="'.htmlspecialchars((string)(($inary && isset($in['name_esc'])) ? $in['name_esc'] : null), ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars((string)(($inary && isset($in['name'])) ? $in['name'] : null), ENT_QUOTES, 'UTF-8').'</a></h3>
    <p class="tagline">'.htmlspecialchars((string)(($inary && isset($in['tagline'])) ? $in['tagline'] : null), ENT_QUOTES, 'UTF-8').'</p>
  </div>
';}).'</div>';
};
?>