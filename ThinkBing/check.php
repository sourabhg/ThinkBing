<?php

define('FACEBOOK_APP_ID', '108635402526995');
define('FACEBOOK_SECRET', '3f5d6411e89258afe37cecb8e39a0f79');

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