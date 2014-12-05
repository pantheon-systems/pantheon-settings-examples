<?php
/**
 * @file
 * Redis configuration.
 * @link http://helpdesk.getpantheon.com/customer/portal/articles/401317
 */

// Use Redis for caching in every Pantheon environment.
if (defined('PANTHEON_ENVIRONMENT')) {
  // If you store your redis module in a different location, like
  // sites/all/modules/contrib/redis remember to update this location.
  $conf['cache_backends'][] = 'sites/all/modules/redis/redis.autoload.inc';
  // Redis cache configuration.
  $conf['redis_client_interface'] = 'PhpRedis';
  $conf['cache_default_class'] = 'Redis_Cache';
  $conf['cache_prefix'] = array('default' => 'pantheon-redis');
  // Do not use Redis for cache_form (no performance difference).
  $conf['cache_class_cache_form'] = 'DrupalDatabaseCache';

  // Higher performance for smaller page counts. This technique does not execute
  // full Drupal bootstrapping and does not invoke the database, which ignores
  // database checks such as Drupal's IP blacklist.
  if (FALSE) {
    // High performance - no hook_boot(), no hook_exit(), ignores Drupal IP
    // blacklists.
    $conf['page_cache_without_database'] = TRUE;
    $conf['page_cache_invoke_hooks'] = FALSE;
    // Explicitly set page_cache_maximum_age as database won't be available.
    $conf['page_cache_maximum_age'] = 900;
  }
  // Higher hit rate for larger page counts. This technique avoids evictions due
  // to redis space limitations when your site has a large quantity of pages to
  // cache. Will conflict with the first which skips the database entirely; do
  // not use both at the same time.
  else if (FALSE) {
    // Use the database for cached HTML.
    $conf['cache_class_cache_page'] = 'DrupalDatabaseCache';
  }
}
