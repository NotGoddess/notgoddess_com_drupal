<?php

// @codingStandardsIgnoreFile

/**
 * @file
 * Drupal site-specific configuration file.
 *
 * IMPORTANT NOTE:
 * This file does nothing other than include the shared and local settings
 * located in DOCROOT/config/drupal8/sites/SITENAME/
 * DO NOT MAKE SETTINGS CHANGES HERE.
 *
 */

/**
 * Load shared settings from outside the web root.
 * If none (e.g. new install) include the default file.
 */
if (file_exists($app_root . '/../config/drupal8/' . $site_path . '/settings.php')) {
  include $app_root . '/../config/drupal8/' . $site_path . '/settings.php';
}
else {
  include $app_root . '/' . $site_path . '/default.settings.php';
}
