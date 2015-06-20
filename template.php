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
}

function tkn01_preprocess_page(&$variables) {
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
