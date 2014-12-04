<?php
/**
 * @file
 * Redirects in code.
 * @link http://helpdesk.getpantheon.com/customer/portal/articles/368354
 */

// Require www in live environment.
if (isset($_SERVER['PANTHEON_ENVIRONMENT']) && $_SERVER['PANTHEON_ENVIRONMENT'] == 'live') {
  if ($_SERVER['HTTP_HOST'] == 'yoursite.com') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://www.yoursite.com'. $_SERVER['REQUEST_URI']);
    exit;
  }
}

// Require SSL in live environment. Remove FALSE to use.
if (FALSE && isset($_SERVER['PANTHEON_ENVIRONMENT']) && $_SERVER['PANTHEON_ENVIRONMENT'] === 'live') {
  if (!isset($_SERVER['HTTP_X_SSL']) || $_SERVER['HTTP_X_SSL'] != 'ON') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: https://www.yoursite.com'. $_SERVER['REQUEST_URI']);
    exit;
  }
}

// Require both SSL and www in live environment. Use an alternative, but not
// in addition to the first method. Remove FALSE to use.
if (FALSE && isset($_SERVER['PANTHEON_ENVIRONMENT']) && $_SERVER['PANTHEON_ENVIRONMENT'] === 'live') {
  if ($_SERVER['HTTP_HOST'] == 'yoursite.com' || !isset($_SERVER['HTTP_X_SSL']) || $_SERVER['HTTP_X_SSL'] != 'ON' ) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://www.yoursite.com'. $_SERVER['REQUEST_URI']);
    exit;
  }
}

// 301 Redirect from /old to /new.
if ($_SERVER['REQUEST_URI'] == '/old') {
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: /new');
  exit;
}
