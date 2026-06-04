<?php
require_once('wp-load.php');

$user = get_user_by('login', 'dr.benali'); // replace with a real user or just get any user
if (!$user) {
    $users = get_users(array('number' => 1));
    $user = $users[0];
}

$reset_key = get_password_reset_key( $user );
if (is_wp_error($reset_key)) {
    echo "ERROR: " . $reset_key->get_error_message() . "\n";
} else {
    echo "KEY: " . $reset_key . "\n";
}

$url = add_query_arg( array(
    'show-reset-form' => 'true',
    'action' => 'newaccount',
    'key'    => $reset_key,
    'id'     => $user->ID,
    'login'  => $user->user_login
), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) );

echo "URL: " . $url . "\n";
