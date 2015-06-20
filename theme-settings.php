<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form
 * @param $form_state
 *   The form state.
 */
function tkn01_form_system_theme_settings_alter(&$form, &$form_state){
  $form['tkn01_settings']['tabs']['google_map'] = array(
    '#type' => 'fieldset',
    '#title' => t('Goole Map'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['tkn01_settings']['tabs']['google_map']['google_map_js'] = array(
    '#type' => 'checkbox',
    '#title' => t('Include Google Map javascript code'),
    '#default_value' => theme_get_setting('google_map_js','tkn01'),
  );

  $form['tkn01_settings']['tabs']['google_map']['google_map_latitude'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Latitude'),
    '#description' => t('For example 42.275667'),
    '#default_value' => theme_get_setting('google_map_latitude','tkn01'),
    '#size' => 10,
    '#maxlength' => 10,
  );

  $form['tkn01_settings']['tabs']['google_map']['google_map_longitude'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Longitude'),
    '#description' => t('For example -2.275667'),
    '#default_value' => theme_get_setting('google_map_longitude','tkn01'),
    '#size' => 10,
    '#maxlength' => 10,
  );

  $form['tkn01_settings']['tabs']['google_map']['google_map_zoom'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Zoom'),
    '#description' => t('For example 16'),
    '#default_value' => theme_get_setting('google_map_zoom','tkn01'),
    '#size' => 5,
    '#maxlength' => 10,
  );

  $form['tkn01_settings']['tabs']['google_map']['google_map_canvas'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Map Canvas Id'),
    '#description' => t('Set the Google Map Id. For example map-canvas'),
    '#default_value' => theme_get_setting('google_map_canvas','tkn01'),
  );

}
