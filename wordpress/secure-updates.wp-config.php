/** Never edit PHP via the web. Even in Dev */
if (defined( 'PANTHEON_ENVIRONMENT' ) && !defined( 'DISALLOW_FILE_EDIT' )) {
  define( 'DISALLOW_FILE_EDIT', true );
}
