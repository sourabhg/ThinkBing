<?php
    
	//By Saurabh Bidkar
	//Creates application instance and establishes session.
	
	require './facebook.php';
	$fbconfig['appid']  = '124452614271145';
	$fbconfig['api']    = '38088123a03d6e64734b77a392cc1a82';
	$fbconfig['secret'] = '470a66b06b33ba542a7ccae76bcb93e6';
	
	$fbconfig['appBaseUrl'] = 'http://apps.facebook.com/bingresearch';
	$fbconfig['baseUrl'] = 'http://research.binghamton.edu/RAD/students/gmaps/facebook';
	
	$facebook = new Facebook(array(
	  'appId'  => $fbconfig['appid'],
	  'secret' => $fbconfig['secret'],
	  'cookie' => true,
	));
	
	$session = $facebook->getSession();
	$loginUrl = $facebook->getLoginUrl(array(
											'canvas'    => 1,
											'fbconnect' => 0,
											'cancel_url'=> 'http://www.facebook.com',
											'req_perms' => 'user_location,email,publish_stream'));
	$logoutUrl = $facebook->getLogoutUrl();													
	
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
