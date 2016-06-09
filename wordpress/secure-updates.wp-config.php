/** Restrict Auto Updating features in admin */
if (defined('PANTHEON_ENVIRONMENT')) {
  // Never edit PHP via the web. Even in Dev
  define( 'DISALLOW_FILE_EDIT', true );
  // Background updates must be done ony in Dev
  if (!in_array(PANTHEON_ENVIRONMENT, array('test', 'live'))) {
		define( 'AUTOMATIC_UPDATER_DISABLED', true );
    define( 'WP_AUTO_UPDATE_CORE', false );
  }
}
