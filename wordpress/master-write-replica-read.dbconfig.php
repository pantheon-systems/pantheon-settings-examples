<?php
/**
 * Use HyperDB to just use the replica for frontend reads.
 * Register the master server to HyperDB
 */
$wpdb->add_database( array(
	'host'     => DB_HOST,
	'user'     => DB_USER,
	'password' => DB_PASSWORD,
	'name'     => DB_NAME,
	'write'    => 1, // master server takes write queries
	'read'     => is_admin() || empty( $_ENV['REPLICA_DB_HOST'] ) ? 1 : 0, // ... but only takes read queries in the admin if the replica is available
) );
/**
 * Register replica database server if it's available in this environment
 */
if ( ! empty( $_ENV['REPLICA_DB_HOST'] ) && ! is_admin() ) {
	$wpdb->add_database(array(
		'host'     => $_ENV['REPLICA_DB_HOST'] . ':' . $_ENV['REPLICA_DB_PORT'],
		'user'     => $_ENV['REPLICA_DB_USER'],
		'password' => $_ENV['REPLICA_DB_PASSWORD'],
		'name'     => $_ENV['REPLICA_DB_NAME'],
		'write'    => 0, // replica doesn't take write queries
		'read'     => 1, // ... but it does take read queries
	));
}
// That's it!
