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

function tkn01_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav">' .$variables['tree'] . '</ul>';
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
function tkn01_preprocess_contact_site_form(&$vars) {
  $vars['contact'] = drupal_render_children($vars['form']);
}
