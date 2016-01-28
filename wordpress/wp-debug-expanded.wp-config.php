// All Pantheon Environments.
if (defined('PANTHEON_ENVIRONMENT')) {
  //Wordpress debug settings in development environments.
  if (!in_array(PANTHEON_ENVIRONMENT, array('test', 'live'))) {
    // Debugging enabled.
    if (!defined( 'WP_DEBUG' )) {
    define( 'WP_DEBUG', true );
    }
    define( 'WP_DEBUG_LOG', true ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', true );
  }
  // Wordpress debug settings in test and live environments.
  else {
    // Debugging disabled.
    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);
  }
}
