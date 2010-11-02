<?php
// $Id: theme-settings.php,v 1.1.8.3 2010/04/27 08:36:16 amitaibu Exp $

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'zen_starter') . '/theme-settings.php';

  // TODO: Remove if statement when http://drupal.org/node/782380 is committed.
if (file_exists('./' . drupal_get_path('theme', 'ninesixty') . '/theme-settings.php')) {
  include_once './' . drupal_get_path('theme', 'ninesixty') . '/theme-settings.php';
}

/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array.
 */
function zen_ninesixty_settings($saved_settings) {
  // Get the default values from the .info file.
  $defaults = zen_theme_get_default_settings('zen_ninesixty');

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  $form = array();

  // Add Zen settings.
  $form += zen_settings($saved_settings, $defaults);

  // Remove some of the base theme's settings.
  // We don't need to select the base stylesheet, as we are already using 960.
  unset($form['themedev']['zen_layout']);

  // TODO: Remove if statement when http://drupal.org/node/782380 is committed.
  if (function_exists('ninesixty_settings')) {
    // Add Ninesixty settings.
    $form += ninesixty_settings($saved_settings, $defaults);
  }

  // Return the form
  return $form;
}