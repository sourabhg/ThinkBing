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
$uid = $cookie['uid'];

?>

<html>
<head>
<title>Think Binghamton Test Page</title>
<style type="text/css">
body
{
background-color:#0DEFFF;
}
</style>

</head>
<body>
<img border="0" src="logo-thinks.gif" alt="Pulpit rock" width="317" height="69" />

<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({appId: 'FACEBOOK_APP_ID', status: true, cookie: true, xfbml: true});
  FB.Event.subscribe('auth.sessionChange', function(response) {
    if (response.session) {
      // A user has logged in, and a new cookie has been saved
	  
    } else {
      // The user has logged out, and the cookie has been cleared
    }
  });
</script>
<h1>Think Binghamton Advocacy</h1>
<form method="post" action="api_connect.php">
    Enter State and/or Zip code
	<table cellpadding="1" border="0">
		<tr>
		<td>State</td>
		<td><input type="state" id="state" name="state" value="" /></td>
		<td>Zip </td>
		<td><input type="zip"  id="senate" name="zip" value="" /></td>
		</tr>
		<td>&nbsp; </td>
		<td><input type="submit" value="Find Your Senator" /></td>
		</tr>
	</table>
 </form>

<?php if ($uid): ?>
     
    <a href="<?php echo $logoutUrl ?>"><img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif"></a>
    <?php endif ?>
	
</body>
</html>

<script>
	  var user = '<?php echo $cookie ?>';
       //alert(user);
	   
	  /*if(user!=''){
	  //alert('<?php echo $logoutUrl ?>');
	    window.location = "http://research.binghamton.edu/RAD/students/FacebookTest/facebook-php-sdk/examples/addbunumber.php";
	  } else {
	    window.location = "http://research.binghamton.edu/RAD/students/FacebookTest/facebook-php-sdk/examples/";
	  }*/
    </script>

