<?php
/**
 * @file
 * Local development database settings. Great for MAMP, XAMP, etc. in /private.
 */
if (!defined('PANTHEON_ENVIRONMENT')) {
  // Database.
  $databases['default']['default'] = array(
    'database' => 'yourlocaldb',
    'username' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'driver' => 'mysql',
    'port' => 3306,
    'prefix' => '',
  );
}