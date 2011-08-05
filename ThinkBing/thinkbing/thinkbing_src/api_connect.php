<?php
$base = 'http://xml.amazon.com/onca/xml3';
$query_string = "";
$state = $_POST['state'];
$state = mysql_real_escape_string($state);
$district   = $_POST['zip'];
$district = mysql_real_escape_string($district);
$newline="\n";

$apikey="";

$baseURL0=
"http//api.nytimes.com/svc/politics/v2/ny/legislative/assembly/23/current.xml?api-key=e61b30f1502e1229a843ca3574c9679a:13:61280248"

//$baseURL= "http://services.sunlightlabs.com/api/legislators.allForZip?apikey=55108096b5694b51b6980b31099e663b&zip=$district";
//$baseURL1= "http://services.sunlightlabs.com/api/legislators.getList?apikey=55108096b5694b51b6980b31099e663b&lastname=Schumer";

$nyURL="$baseURL$apikey";
$output0 = file_get_contents("$baseURL0");
//$output = file_get_contents("$baseURL");
//$output1 = file_get_contents("$baseURL1");
echo "$output0";
//echo "$output1";
$json_a=json_decode($output,true);
$json_array=json_decode($output1,true);

$array_length=count($json_a[response][legislators]);
 
//echo " $array_length";
 
 $firstname_array = array ();
 $middlename_array = array ();
 $lastname_array = array ();
 $email_array=array();

echo ' Your Senators are :    ';

foreach($json_a[response][legislators] as $p)
{

$firstname_array[] = $p[legislator][firstname];
$middlename_array[] = $p[legislator][middlename];
$lastname_array[] = $p[legislator][lastname];
$title_array[]=$p[legislator][title];

if($p[legislator][title]=="Sen")

echo '

 '.$p[legislator][firstname].' '.$p[legislator][middlename].' '.$p[legislator][lastname].' '.$p[legislator][title].' '.','. '



';

}

//echo "\n";

echo " \n Your Representatives are     ";

foreach($json_a[response][legislators] as $p)
{

if($p[legislator][title]=="Rep")

echo '

 '.$p[legislator][firstname].' '.$p[legislator][middlename].' '.$p[legislator][lastname].' '.$p[legislator][title].' '.','.'



';




}





foreach($json_array[response][legislators] as $p)
{

$lname_array[] = $p[legislator][lastname];
$email_array[] = $p[legislator][email];



//echo '

// '.$p[legislator][lname].' '.$p[legislator][email].' 



//';



}



echo "$email_array[0]";
//echo "$lastname_array[2]";

   
	echo (' <html> 
<body>
<form method="post" action="mailsend.php">
<table cellpadding="1" border="0">
<tr>
<td>

<tr><td>
<textarea name="message" rows="30" cols="50">
</textarea></tr></td>
<tr><td>
<form> <input type="submit" value="Send Mail" /> </form> 
</body></tr></td>
</table>
</form>
</html>');

	
	
	
?>