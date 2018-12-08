<?php

/**
 * @file
 * Include file to Put Drupal in development mode.
 *
 * WARNING: Do not change the config in this file!
 *          All configuration is located in settings.local.php.
 */

/****************************************************************************
 * PHP debug (show all errors).
 ****************************************************************************/

// Change error reporting based on the "drupal_debug" get variable.
$drupal_debug = FALSE;
if (isset($_GET['drupal_debug'])) {
  $drupal_debug = (bool) $_GET['drupal_debug'];
}

// Change error reporting behaviour except when running drush.
if (!empty($drupal_debug_forced) || ($drupal_debug && php_sapi_name() !== 'cli')) {
  $config['system.logging']['error_level'] = 'verbose';

  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);

  // Don't let Drupal handle errors & exceptions.
  restore_error_handler();
  restore_exception_handler();
}


/******************************************************************************
 * Theme debug (no cache, show errors).
 ******************************************************************************/

// Change the theme debug based on the "drupal_theme_debug" get variable.
$drupal_theme_debug = FALSE;
if (isset($_GET['drupal_theme_debug'])) {
  $drupal_theme_debug = (bool) $_GET['drupal_theme_debug'];
}

// Disable caching and preprocess.
if (!empty($drupal_theme_debug_forced) || $drupal_theme_debug) {
  $settings['container_yamls'][] = $app_root . '/../local/development.services.yml';

  $config['system.performance']['css']['preprocess'] = FALSE;
  $config['system.performance']['js']['preprocess'] = FALSE;

  $settings['cache']['bins']['render'] = 'cache.backend.null';
  $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
}
