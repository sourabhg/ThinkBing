<?php

define('FACEBOOK_APP_ID', 'your application id');
define('FACEBOOK_SECRET', 'your application secret');

function get_facebook_cookie($app_id, $application_secret) {
    $args = array();
    parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
    ksort($args);
    $payload = '';
    foreach ($args as $key => $value) {
        if ($key != 'sig') {
            $payload .= $key . '=' . $value;
        }
    }
    if (md5($payload . $application_secret) != $args['sig']) {
      return null;
    }
    return $args;
}

$cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);
echo 'The ID of the current user is ' . $cookie['uid'];

?>