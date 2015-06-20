<?php

/**
 * @file
 * template.php
 */

function tkn01_preprocess_html(&$variables) {
  if ($variables['head_title_array'] && !empty($variables['head_title_array']) && drupal_is_front_page()) {
    $variables['head_title_array']['title'] = t('Home');
    $variables['head_title'] = join(' | ', $variables['head_title_array']);
  }

  // Google Map
  if (theme_get_setting('google_map_js', 'tkn01')) {
    drupal_add_js('jQuery(document).ready(function($) {
      var map;
      var myLatLon;
      var myZoom;
      var marker;
    });', array('type' => 'inline', 'scope' => 'header'));

    drupal_add_js('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array('type' => 'external', 'scope' => 'header', 'group' => 'JS_THEME'));
    $google_map_latitude = theme_get_setting('google_map_latitude','tkn01');
    drupal_add_js(array('tkn01' => array('google_map_latitude' => $google_map_latitude)), 'setting');
    $google_map_longitude = theme_get_setting('google_map_longitude','tkn01');
    drupal_add_js(array('tkn01' => array('google_map_longitude' => $google_map_longitude)), 'setting');
    $google_map_zoom = (int) theme_get_setting('google_map_zoom','tkn01');
    $google_map_canvas = theme_get_setting('google_map_canvas','tkn01');
    drupal_add_js(array('tkn01' => array('google_map_canvas' => $google_map_canvas)), 'setting');

    drupal_add_js('jQuery(document).ready(function($) {
      if ($("#'.$google_map_canvas.'").length) {
        myLatLon = new google.maps.LatLng(Drupal.settings.tkn01[\'google_map_latitude\'],Drupal.settings.tkn01[\'google_map_longitude\']);
        myZoom = '.$google_map_zoom.';

        function initialize() {
          var mapOptions = {
            zoom: myZoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: myLatLon,
            scrollwheel: false
          };

          map = new google.maps.Map(document.getElementById(Drupal.settings.tkn01[\'google_map_canvas\']),mapOptions);

          marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: myLatLon
          });
 
          google.maps.event.addDomListener(window, "resize", function() {
            map.setCenter(myLatLon);
          });

        }

        google.maps.event.addDomListener(window, "load", initialize);

      }
      });',array('type' => 'inline', 'scope' => 'header'));
  }
}

function tkn01_preprocess_page(&$variables) {
  $active_trail = menu_get_active_trail();
  $news = ['News', 'Noticias','Contact','Contacto'];
  if (isset($variables['node'])) {
    $node = $variables['node'];
    // Page suggestions
    $suggestion = 'page__' . str_replace('-', '--', $node->type);
    $variables['theme_hook_suggestions'][] = $suggestion;
    // Page banner
    if ($node->type == 'page' && !empty($node->field_page_banner)) {
      $banner = field_get_items('node',$node,'field_page_banner');
      $banner = image_style_url('page_banner', $banner[0]['uri']);
      $variables['banner'] = $banner;
    }
  }

  if (!drupal_is_front_page() && in_array($active_trail[1]['title'], $news)) {
    $variables['banner'] = base_path() . path_to_theme() . '/a/i/banner01.jpg';
  }
  if (drupal_is_front_page()) {
    $variables['banner'] = base_path() . path_to_theme() . '/a/i/banner01.jpg';
  }

  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }
}

function tkn01_preprocess_node(&$variables) {
  $node = $variables['node'];
    if ($node->type == 'post' && !empty($node->field_imagen)) {
      $foto = field_get_items('node',$node,'field_imagen');
      $foto = image_style_url('page_banner', $foto[0]['uri']);
      $variables['foto'] = $foto;
    }
}

function tkn01_preprocess_block(&$variables) {
  $block = $variables['block'];
  if ($block->bid === 'locale-language') {
    $variables['classes_array'][] = 'pull-right';
  }
}

function tkn01_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav">' .$variables['tree'] . '</ul>';
}

/**
 * Language switcher
 *
 * https://www.drupal.org/node/1369090#comment-6553128
 * https://www.drupal.org/node/1369090#comment-7421510
 * https://www.drupal.org/node/1369090#comment-7628147
 */
function tkn01_links__locale_block(&$variables) {
  $variables['attributes']['class'][] = 'list-inline';
  foreach($variables['links'] as $language => $langInfo) {
    $abbr = $langInfo['language']->language;
    $name = $langInfo['language']->native;
    $variables['links'][$language]['title'] = '<abbr title="' . $name . '">' . $abbr . '</abbr>';
    $variables['links'][$language]['html'] = TRUE;
  }
  $content = theme_links($variables);
  return $content;
}

/**
 * Contact template
 * http://www.lightrains.com/blog/theme-contact-form-drupal-7#gsc.tab=0
 */
function tkn01_theme() {
  return array(
    'contact_site_form' => array(
      'render element' => 'form',
      'template' => 'contact-site-form',
      'path' => drupal_get_path('theme', 'tkn01').'/templates',
    ),
  );
}
function tkn01_preprocess_contact_site_form(&$variables) {
  $variables['contact'] = drupal_render_children($variables['form']);
}
