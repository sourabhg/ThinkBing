<?php 

	require '../src/facebook.php';

	// Create our Application instance (replace this with your appId and secret).
	$facebook = new Facebook(array(
	  'appId'  => '108635402526995',
	  'secret' => '3f5d6411e89258afe37cecb8e39a0f79',
	  'cookie' => true,
	));

$session = $facebook->getSession();

	$me = null;
	
	if($session){
		try {
			$uid = $facebook->getUser();
			$me = $facebook->api('/me');
		} catch (FacebookApiException $e) {
			error_log($e);
		}
    }
?>