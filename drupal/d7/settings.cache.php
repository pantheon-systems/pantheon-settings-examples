<?php
/**
 * @file
 * Drupal cache configuration.
 * @link http://helpdesk.getpantheon.com/customer/portal/articles/408428
 */

if (defined('PANTHEON_ENVIRONMENT')) {
  // Drupal caching in development environments.
  if (!in_array(PANTHEON_ENVIRONMENT, array('test', 'live'))) {
    // Anonymous caching.
    $conf['cache'] = 0;
    // Block caching - disabled.
    $conf['block_cache'] = 0;
    // Expiration of cached pages - none.
    $conf['page_cache_maximum_age'] = 0;
    // Aggregate and compress CSS files in Drupal - off.
    $conf['preprocess_css'] = 0;
    // Aggregate JavaScript files in Drupal - off.
    $conf['preprocess_js'] = 0;
  }
  // Drupal caching in test and live environments.
  else {
    // Anonymous caching - enabled.
    $conf['cache'] = 1;
    // Block caching - enabled.
    $conf['block_cache'] = 1;
    // Expiration of cached pages - 15 minutes.
    $conf['page_cache_maximum_age'] = 900;
    // Aggregate and compress CSS files in Drupal - on.
    $conf['preprocess_css'] = 1;
    // Aggregate JavaScript files in Drupal - on.
    $conf['preprocess_js'] = 1;
  }
  // Minimum cache lifetime - always none.
  $conf['cache_lifetime'] = 0;
  // Cached page compression - always off.
  $conf['page_compression'] = 0;
}
