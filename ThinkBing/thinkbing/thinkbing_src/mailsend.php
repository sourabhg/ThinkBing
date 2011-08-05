<!-- Code By Sourabh Gandhe -->
<html>
<head>

<script src=”https://static.ak.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php” type=”text/javascript”></script>

</head>

<body>
<table cellpadding=0 cellspacing=0 width=100% border=0>
<tr>
<td align=center valign=top>
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js"></script>
<?php 

include ("sqlinclude.php");

//include_once "main.php";
session_start();
require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '108635402526995',
  
  'secret' => '3f5d6411e89258afe37cecb8e39a0f79',
  'cookie' => true,
));

$session = $facebook->getSession();
$fbconfig['appBaseUrl'] = 'https://apps.facebook.com/thinkbing/confirm.php';
//$fbconfig['baseUrl'] = 'http://research.binghamton.edu/RAD/students/gmaps/facebook';
$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
	$fbme = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}

if ($uid) {
 $logoutUrl=$facebook->getlogoutUrl(); 
 

 }

$Subject=$_POST['subject'];
$Message=$_POST['msgbody'];
$esub = mysql_real_escape_string($_POST['subject']); 
$emsg = mysql_real_escape_string($_POST['msgbody']); 
//echo $esub;
$email=$fbme['email'];
//echo $email;
//echo "$userEmail"; 

$To = 'rad@binghamton.edu'; 

//$Subject = nl2br ($esub); 
//$Message = nl2br ($emsg);





$email_from = $email;
//echo $email_from;
$from = "From:";
$headers = $from . " " . $email_from;
//$headers .= 'From: $email_from  ' . "\r\n";
$to_count;
$mail_list = $_SESSION['mail_list'];
$store_name = $_SESSION['store_name'];

$iname = mysql_real_escape_string($_SESSION['fsname']);
$iind = mysql_real_escape_string($_SESSION['fsind']);
$ititle = mysql_real_escape_string($_SESSION['fstitle']);
$istreet = mysql_real_escape_string($_SESSION['fsstreet']);
$icity = mysql_real_escape_string($_SESSION['fscity']);
$istate = mysql_real_escape_string($_SESSION['fsstate']);
$izip = mysql_real_escape_string($_SESSION['fszip']);
$icountry = mysql_real_escape_string($_SESSION['fscountry']);
$things1 = mysql_real_escape_string($_SESSION['fsthings1']) ;
$things2 = mysql_real_escape_string($_SESSION['fsthings2']);
$things3 = mysql_real_escape_string($_SESSION['fsthings3']);
$things4 = mysql_real_escape_string($_SESSION['fsthings4']);
$things5 = mysql_real_escape_string($_SESSION['fsthings5']);
$things6 = mysql_real_escape_string($_SESSION['fsthings6']);
$things7 = mysql_real_escape_string($_SESSION['fsthings7']);
$things8 = mysql_real_escape_string($_SESSION['fsthings8']);
$things9 = mysql_real_escape_string($_SESSION['fsthings9']);
$things10 = mysql_real_escape_string($_SESSION['fsthings10']);
$gyear = mysql_real_escape_string($_SESSION['fsgyear']);
$grop1 = mysql_real_escape_string($_POST['group1']);
$senat0 = mysql_real_escape_string($_POST['govern']);
$senat1 = mysql_real_escape_string($_POST['chancl']);
$senat2 = mysql_real_escape_string($_POST['sen']);
$senat3 = mysql_real_escape_string($_POST['asm']);
$box=$_POST['custom'];




$query1="insert into form (name,industry,job,street,city,state,zip,country,affl_student,affl_pstudent,affl_alumnus,affl_com,affl_ind,affl_fac,affl_staff,affl_ret,affl_donor,affl_friend,gy) values ('".$iname."','".$iind."','".$itittle."','".$istreet."','".$icity."','".$istate."','".$izip."','".$icountry."','".$things1."','".$things2."','".$things3."','".$things4."','".$things5."','".$things6."','".$things7."','".$things8."','".$things9."','".$things10."','".$gyear."')";

//echo $query1;


mysql_query($query1) or die ('Error Updating DB'.mysql_error());
//$conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$my_array=array();
//echo "Inserted";
while (list ($key,$val) = @each ($box)) { 
//echo "$val";
$query_c = "SELECT * FROM advocacy_custom where name = '$val'";
//echo "<p> '$query_c' </p> ";
$result_cus = mysql_query($query_c);
//echo "$query_c";
while($row_custom = mysql_fetch_array($result_cus)) {
  //echo (''.$row_custom['email_id'].'');
  //echo "here";
  $mto = $row_custom['email_id'];
  
  //echo $mto;
   
  //echo (''.$row_custom['email_id'].'');
 }
 mail($mto, $Subject, $Message, $headers);
  $to_count = $to_count + 1;
} 

//echo $senat0;

if($senat0=="")
{
 //echo "I am here";
}
else
{
  //echo "gng here";
  $result11 = mysql_query("select * from advocacy_sen where name = '".$senat0."'")
		or die(mysql_error());  
		$to_count = $to_count + 1;
//$equery="select email_id from advocacy_emails where name = '".$grop1."'";
//mysql_query($equery) or die ('Error Updating DB'.mysql_error());
//echo "mail id ";
  while ($row11 = mysql_fetch_array( $result11 )) {
  //echo "here";
  //echo $row11['email_id'];
   $mid0 =  $row11['email_id'];
    mail($mid0, $Subject, $Message, $headers);
 }
}
if($senat1=="")
{
 //echo "in 1 ";
}
else
{
 $result11 = mysql_query("select * from advocacy_sen where name = '".$senat1."'")
		or die(mysql_error());  
//$equery="select email_id from advocacy_emails where name = '".$grop1."'";
//mysql_query($equery) or die ('Error Updating DB'.mysql_error());
$to_count = $to_count + 1;
while ($row11 = mysql_fetch_array( $result11 )) {
  //echo "here";
  //echo $row11['email_id'];
   $mid1 =  $row11['email_id'];
    mail($mid1, $Subject, $Message, $headers);
}
}
if($senat2=="")
{
 //echo "in 2";
}
else
{
 $result11 = mysql_query("select * from advocacy_sen where name = '".$senat2."'")
		or die(mysql_error());  
//$equery="select email_id from advocacy_emails where name = '".$grop1."'";
//mysql_query($equery) or die ('Error Updating DB'.mysql_error());
$to_count = $to_count + 1;
while ($row11 = mysql_fetch_array( $result11 )) {
  //echo "here";
  //echo $row11['email_id'];
   $mid2 =  $row11['email_id'];
    mail($mid2, $Subject, $Message, $headers);
}
}
if ($senat3=="")
{
 //echo "in 3";
}
else
{
 $result11 = mysql_query("select * from advocacy_asm where name = '".$senat3."'")
		or die(mysql_error());  
//$equery="select email_id from advocacy_emails where name = '".$grop1."'";
//mysql_query($equery) or die ('Error Updating DB'.mysql_error());
$to_count = $to_count + 1;
while ($row11 = mysql_fetch_array( $result11 )) {
  //echo "here";
  //echo $row11['email_id'];
   $mid3 =  $row11['email_id'];
    mail($mid3, $Subject, $Message, $headers);
 }
}
//echo $grop1;
//echo $gyear;
//echo $things;
//changes 

//echo $senat;
//echo "none";
//echo $senat1;

//echo "select email_id from advocacy_emails where name = '".$grop1."'";
//echo $mid0;
//echo $mid0;
//echo $mid1;
//echo $mid2;
//echo $mid3;
$mid_cat = mysql_real_escape_string($mto .' '. $mid0 . '  ' . $mid1 . '  ' . $mid2 . '  ' . $mid3);
//echo $mid_cat;
//echo $mid;
$ccid = mysql_real_escape_string($_SESSION['camp_id']);
//echo "<p> '$mail_list' </p>";
if($mail_list == "y")
{
  $query11="insert into advocacy_maillist(campaign_id,name,email_id) values (".$ccid.",'".$store_name."','".$email_from."')";
  mysql_query($query11) or die ('Error Updating DB'.mysql_error());
  
}
$query1="insert into advocacy_count(campaign_id,msg_from,msg_to,msg,to_msg) values (".$ccid.",'".$email_from."','".$mid_cat."','".$emsg."',".$to_count.")";
mysql_query($query1) or die ('Error Updating DB'.mysql_error());

mysql_close($conn);

?>


  
<script>
    
    FB.init({
     appId  : '108635402526995',
	 session : <?php echo json_encode($session); ?>,
     status : true, // check login status
     cookie : true, // enable cookies to allow the server to access the session
     xfbml  : true  // parse XFBML
   });	
							FB.ui(
								   {
									 method: 'stream.publish',
									 display: 'dialog',
									 message: 'I just sent a message on behalf of Binghamton University.',
									 attachment: {
									    media: [ {
											type: 'image',
											//src: 'http://research.binghamton.edu/RAD/students/gmaps/images/gmap_B.png',
											src: 'https://research.binghamton.edu/ResearchAdvancement/projects/ThinkBing/thinkbing/thinkbing_src/Think_75x75_logopng.png',
											href: 'https://apps.facebook.com/thinkbing'
										} ],
										name: 'Think Binghamton',
										caption: 'Advocate for Binghamton University.',
										description: ('Use this tool to send messages to your' +
													  ' legislators.'),
										href: 'https://apps.facebook.com/thinkbing'
									 },
									 user_message_prompt: 'Share your thoughts about ThinkBing'
								   },
								   function(response) {
										if (response && response.post_id) {
										
										//response.redirect(main.php);
										
										    // $facebook->redirect($facebook->get_facebook_url() . '/main.php');
											//alert('Post was published.');
										} else {
											//alert('Post was not published.');
										}
										//$confirmURI = "confirm.php";
										top.location.href = "<?php echo $fbconfig['appBaseUrl']; ?>";
										
									}
									
							  );
							  
//response.redirect(main.php);
						</script>
		</div>
</td>
</tr>
</table>

</body>
</html>