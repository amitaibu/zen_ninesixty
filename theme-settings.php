<?php
// $Id: theme-settings.php,v 1.1 2009/06/26 00:33:40 duvien Exp $

// Include the definition of zen_settings() and zen_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'zen') . '/theme-settings.php';


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

  /*
   * Create the form using Forms API: http://api.drupal.org/api/6
   */
  $form = array();

  /* -- Load debug css - 960 grid */
  $form['zen_ninesixty_debug'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Activate 960 Grid system image'),
    '#default_value' => $settings['zen_ninesixty_debug'],
    '#description'   => t("Load grid image into page layout using the debug.css"),
  );


  // Add the base theme's settings.
  $form += zen_settings($saved_settings, $defaults);

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the base stylesheet.

  // Return the form
  return $form;
}
