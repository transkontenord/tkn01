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
  // Page suggestions
  if (isset($variables['node'])) {
    $suggestion = 'page__' . str_replace('-', '--', $variables['node']->type);
    $variables['theme_hook_suggestions'][] = $suggestion;
  }
  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main_menu'));
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }
}

function tkn01_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav navbar-right">' .$variables['tree'] . '</ul>';
}
