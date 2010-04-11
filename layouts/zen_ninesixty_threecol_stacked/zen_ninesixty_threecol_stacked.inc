<?php
// $Id: zen_ninesixty_threecol_stacked.inc,v 1.1 2010/04/11 08:42:36 amitaibu Exp $

// Plugin definition
$plugin = array(
  'title' => t('Three column stacked - Zen 960'),
  'icon' => 'zen_ninesixty_threecol_stacked.png',
  'theme' => 'zen_ninesixty_threecol_stacked',
  // The theme that will be used on the panels "content" page.
  'admin theme' => 'zen_ninesixty_threecol_stacked_admin',
  'panels' => array(
    'top' => t('Top'),
    'left' => t('Left side'),
    'middle' => t('Middle column'),
    'right' => t('Right side'),
    'bottom' => t('Bottom'),
  ),
);