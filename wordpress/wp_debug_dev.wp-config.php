/**
 * For developers: WordPress debugging mode.
 *
 * Sets WP_DEBUG to true on if on a development environment.
 *
 */
    if ( in_array( $_ENV['PANTHEON_ENVIRONMENT'], array( 'test', 'live' ) ) && ! defined( 'WP_DEBUG', false ) ) {
      define('WP_DEBUG', false);
    }
    else  
      define( 'WP_DEBUG', true );
