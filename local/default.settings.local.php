<?php

/**
 * @file
 * Local settings overrides.
 *
 * Use this file to override settings & config for local development.
 *
 * INSTALLATION
 *
 * Make a copy of this file in the local directory and name that copy
 * settings.local.php.
 *
 * Add following line to the web/sites/default/settings.php file to include this
 * config file.
 *
 * <code>
 * $local_settings_file = $app_root . '/../local/settings.local.php';
 * if (file_exists($local_settings_file)) {
 *   include $local_settings_file;
 * }
 * </code>
 */

/**
 * Debugging.
 *
 * Debugging is by default disabled in Drupal.
 * The changes trough this config file add 2 options to enable debugging:
 *
 * 1. Use GET parameters
 *
 * Enable debugging by adding GET parameters to the URL:
 * - ?drupal_debug : Enable PHP debugging.
 * - ?drupal_theme_debug : Enable Theme debugging and disable theme caching.
 *
 * 2. Use Settings parameters
 *
 * Force debugging (always on) by setting the settings.php variables:
 * - $drupal_debug_forced : Always enable PHP debugging (all requests).
 * - $drupal_theme_debug_forced : Always enable theme debugging, always disable
 *   theme cache.
 *
 * NOTE : don't forget to rebuild cache after changing the debug settings!
 */
$drupal_debug_forced = TRUE;
$drupal_theme_debug_forced = TRUE;

/**
 * Database connection.
 */
$databases['default']['default'] = array (
  'database' => '',
  'username' => '',
  'password' => '',
  'prefix' => '',
  'host' => '',
  'port' => '',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

/**
 * File paths.
 */
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = $app_root . '/../local/files/private';
$config['system.file']['path']['temporary'] = $app_root . '/../local/files/tmp';

/**
 * Configuration directory.
 */
$config_directories['sync'] = $app_root . '/../config/sync';

/**
 * Stop Drupal from complaining about host patterns.
 *
 * Set/Add the proper domain regex(es).
 */
$settings['trusted_host_patterns'] = [
  '.+\drupal\.cms$',
];

/**
 * Load the debug settings file.
 */
require_once __DIR__ . '/settings.debug.php';
