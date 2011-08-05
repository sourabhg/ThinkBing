<?php
//Modified by Sid @ Fri 17 Sep 2010 

require '../src/facebook.php';

# Creating the facebook object
$facebook = new Facebook(array(
    'appId'  => '108635402526995',
    'secret' => '3f5d6411e89258afe37cecb8e39a0f79',
    'cookie' => true
	
));

# Let's see if we have an active session
$session = $facebook->getSession();

if(!empty($session)) {
    # Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
    try{
        $uid = $facebook->getUser();
        $user = $facebook->api('/me');
    } catch (Exception $e){}

    if(!empty($user)){
	    # User info ok? Let's print it (Here we will be adding the login and registering routines)
        //print_r($user);
    } else {
	    # For testing purposes, if there was an error, let's kill the script
        die("There was an error.");
    }
} else {
    # There's no active session, let's generate one
    $login_url = $facebook->getLoginUrl(array('canvas'    => 1,
											'fbconnect' => 0,
											'cancel_url'=> 'https://www.facebook.com',
											'req_perms' => 'user_location,email,publish_stream'));
	echo '<script type="text/javascript">parent.location = "'.$login_url.'";</script>';
	
    //header("Location: ".$login_url);
	//window.frames[iframeName].location = url; 
	//echo '<script type="text/javascript">parent.location = "'.$logoutUrl.'";</script>';
}
  $logoutUrl = $facebook->getLogoutUrl();
  

?>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>Think Bing</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #00611C;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    
	<div id="fb-root"></div>
    <script>
	  window.fbAsyncInit = function() {
		FB.init({appId: '108635402526995', status: true, cookie: true, xfbml: true});
		FB.Canvas.setAutoResize(true);
	     FB.Event.subscribe('auth.login', function() {
			if (response.session) {
			  // A user has logged in, and a new cookie has been saved
			  
			} else {
			  // The user has logged out, and the cookie has been cleared
			}
		  });
	  
	  };
	  
	  (function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
		document.getElementById('fb-root').appendChild(e);
	  }());
    </script>
   
    <?php if ($user) { echo ('<script type="text/javascript">window.location.href="https://research.binghamton.edu/ResearchAdvancement/projects/ThinkBing/thinkbing/thinkbing_src/main.php";</script>'); } ?>
	
    <?php if (!$login_url) { ?>
    <h1><a href="https://apps.facebook.com/thinkbing">Think Bing</a></h1>
	 <fb:login-button> Goto Think Bing</fb:login-button>
    <?php  } ?>
	
    <?php if ($me) { ?>
    <a href="<?php echo $logoutUrl; ?>">
      <img src="https://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif">
    </a>
    <?php  } ?>

    
  </body>
</html>
