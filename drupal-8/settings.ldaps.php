<?php
/**
 * @file
 * LDAPS configuration. Assumes certificate is in /private.
 * @link http://helpdesk.getpantheon.com/customer/portal/articles/1219468#ldaps
 */

// LDAP - specify file that contains the TLS CA Certificate.
// Can also be used to provide intermediate certificate to trust remote servers.
$tls_cacert = __DIR__ . '/../../private/ca.crt';
if (!file_exists($tls_cacert)) {
  die($tls_cacert . ' CA cert does not exist');
}
putenv("LDAPTLS_CACERT=$tls_cacert");

// LDAP - specify file that contains the client certificate.
$tls_cert = __DIR__ . '/../../private/client.crt';
if (!file_exists($tls_cert)) {
  die($tls_cert . ' client cert does not exist');
}
putenv("LDAPTLS_CERT=$tls_cert");

// LDAP - specify file that contains private key w/o password for TLS_CERT.
$tls_key = __DIR__ . '/../../private/client.key';
if (!file_exists($tls_key)) {
  die($tls_key . ' client key does not exist');
}
putenv("LDAPTLS_KEY=$tls_key");

// LDAP - Never perform server certificate check in a TLS session.
putenv('LDAPTLS_REQCERT=never');