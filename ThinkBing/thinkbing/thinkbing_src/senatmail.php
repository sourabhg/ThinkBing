<?php include ("sqlinclude.php"); ?>
<?php
session_start();
$query_string = "";
$base = 'http://xml.amazon.com/onca/xml3';
$addr = mysql_real_escape_string($_POST['street']);
$zip   = mysql_real_escape_string($_POST['zip']);
$signmeup = mysql_real_escape_string($_POST['signmeup']);
$zipcode   = mysql_real_escape_string($_SESSION['zipcode11']);
$city = mysql_real_escape_string($_POST['city']);
$disid=52;
$apikey="";
$addres=$addr."+".$city."+"."NY"."+".$zip;
$address=urlencode($addres);

/*-------- Generating District codes ------------*/
$temp=$addr."%2C".$zip;
$add=urlencode("$address".","."$zipcode");
$senateurl="http://www.nysenate.gov/nyss_senator_search/";
$queryurl=$senateurl.$add;
//echo "$queryurl";
echo "<br>";

$html=file_get_contents($queryurl);
//$response=file_get_contents("$queryurl");
//echo "$response";

$peices=array();
//Parse it. Here we use loadHTML as a static method
//to parse the HTML and create the DOM object in one go.
@$dom = DOMDocument::loadHTML($html);
//Init the XPath object
$xpath = new DOMXpath($dom);
//Query the DOM
$links = $xpath->query( '//div[contains(@class, "item-list")]' );

if (!is_null($links)) {
  foreach ($links as $link) {
    //echo "<br/>[". $link->nodeName. "]";
	
	$nodes = $link->childNodes;
    foreach ($nodes as $node) {
      $str=" ".$node->nodeValue." ";
	  }
	  }
	  }
	  
	 echo"<br />";
     //echo "$str";   //Contains federal,state and assembly district code
	 //echo"<br />";
     $peices = explode(" ", $str);
    // echo"<br />";
    // echo"<br />";
    // echo"<br />";
    // echo "<br>Assembly Code : "."$peices[7]";   //Assembly District code
	// echo "<br />";
	// echo "<br />";
	for ($index=0;$index<strlen($peices[7]);$index++) { 
    if(isNumber($peices[7][$index])) 
        $asm_code .= $peices[7][$index];   // asm district code
   
       } 
      //$asm_code  = strtok($peices[7],"  ");
	  //echo $asm_code;
	  //echo "Length of the string = ".strlen($asm_code); 
	  //echo "hi";
	  for ($index=0;$index<strlen($peices[5]);$index++) { 
    if(isNumber($peices[5][$index])) 
        $state_code .= $peices[5][$index];   // state district code
   
       } 
	   
	   //echo $state_code;
	   //echo "<br>State district code is : $state_code"; 
      // echo "<br />";




/*---------------------------------------------------*/

$baseURL= "http://services.sunlightlabs.com/api/legislators.allForZip?apikey=55108096b5694b51b6980b31099e663b&zip=$zip";
$output = file_get_contents("$baseURL");
//echo $output;
//echo "it is code";
//echo $state_code;
//echo "it is code";
//echo $peices[7];
//echo asm_code;
//$conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$result_asm = mysql_query("select * from advocacy_asm where d_code = '".$asm_code."'")
		or die(mysql_error());
	while ($rowasm = mysql_fetch_array( $result_asm )) {
  // echo $rowasm['name'];
   $asm_name =  $rowasm['name'];
}	
//$result_asm = "select * from advocacy_asm where d_code = '".$asm_code."'";
//echo $result_asm;		
//mysql_close($conn);	

//$conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$result_sen = mysql_query("select * from advocacy_sen where d_code = '".$state_code."'")
		or die(mysql_error());  
//$result_sen = "select * from advocacy_sen where d_code = '".$state_code."'";
//echo $result_sen;
//echo $asm_name;
while ($rowsen = mysql_fetch_array( $result_sen )) {
  //echo "here";
  //echo $row11['email_id'];
   $sen_name =  $rowsen['name'];
}	
//echo $sen_name;
//mysql_close($conn);		
//$baseURL2=
//"http://api.nytimes.com/svc/politics/v3/ny/legislative/senate/$state_code/current.xml?api-key=e61b30f1502e1229a843ca3574c9679a:13:61280248";
//$output2 = file_get_contents("$baseURL2");
//echo "<br>$output2";

//$response=simplexml_load_file($baseURL2);

//$fname=$response->results->member->first_name;	
//$mname=$response->results->member->middle_name;
//$lname=$response->results->member->last_name;
//$senator_name=$lname.", ".$fname;
//echo "First Name : "."$fname";
//echo "Middle Name : "."$mname";
//echo "Last Name : "."$lname";
//echo "Name of State Senator is  : "."$senator_name";

//$baseURL3=
//"http://api.nytimes.com/svc/politics/v2/ny/legislative/assembly/$peices[7]/current.xml?api-key=e61b30f1502e1229a843ca3574c9679a:13:61280248";

//$response1=simplexml_load_file($baseURL3);



//$rfname=$response1->results->member->first_name;	
//$rmname=$response1->results->member->middle_name;
//$rlname=$response1->results->member->last_name;
//$representative_name=$rlname.", ".$rfname;

//$output3 = file_get_contents("$baseURL3");
//echo "<br>$output3";


//$json_a=json_decode($output,true);


//$array_length=count($json_a[response][legislators]);

// $firstname_array = array ();
 //$middlename_array = array ();
 //$lastname_array = array ();
 //$email_array=array();
 
 
//foreach($json_a[response][legislators] as $p)
//{

//$firstname_array[] = $p[legislator][firstname];
//$middlename_array[] = $p[legislator][middlename];
//$lastname_array[] = $p[legislator][lastname];

//$title_array[]=$p[legislator][title];

//}


/*$latlongURL="http://maps.googleapis.com/maps/api/geocode/xml?address=$address&sensor=false";
$response=simplexml_load_file($latlongURL);

$lati=$response->result->geometry->location->lat;	
$longitude=$response->result->geometry->location->lng;

echo "$lat";
echo "$long"; */


function isNumber($c) { 
    return preg_match('/[0-9]/', $c); 
} 
      

?>
<?php
session_start();
$sname = $_POST['name'];
$_SESSION['store_name'] = $sname;
$sind = $_POST['industry'];

$stitle = $_POST['title'];

$sstreet = $_POST['street'];

$scity = $_POST['city'];

$sstate = $_POST['State'];

$szip = $_POST['zip'];

$scountry = $_POST['country'];

$sthings1 = $_POST['affiliation1'];

$sthings2 = $_POST['affiliation2'];

$sthings3 = $_POST['affiliation3'];

$sthings4 = $_POST['affiliation4'];

$sthings5 = $_POST['affiliation5'];

$sthings6 = $_POST['affiliation6'];

$sthings7 = $_POST['affiliation7'];
$sthings8 = $_POST['affiliation8'];
$sthings9 = $_POST['affiliation9'];
$sthings10 = $_POST['affiliation10'];
$sgyear = $_POST['graduated'];
$NYstate = $_POST['State'];
$_SESSION['fsname'] = $sname;
$_SESSION['fsind'] = $sind;
$_SESSION['fstitle'] = $stitle;
$_SESSION['fsstreet'] = $sstreet;
$_SESSION['fscity'] = $scity;
$_SESSION['fsstate'] = $sstate;
$_SESSION['fszip'] = $szip;
$_SESSION['fscountry'] = $scountry;
$_SESSION['fsthings1'] = $sthings1;
$_SESSION['fsthings2'] = $sthings2;
$_SESSION['fsthings3'] = $sthings3;
$_SESSION['fsthings4'] = $sthings4;
$_SESSION['fsthings5'] = $sthings5;
$_SESSION['fsthings6'] = $sthings6;
$_SESSION['fsthings7'] = $sthings7;
$_SESSION['fsthings8'] = $sthings8;
$_SESSION['fsthings9'] = $sthings9;
$_SESSION['fsthings10'] = $sthings10;
$_SESSION['fsgyear'] = $sgyear;
$_SESSION['mail_list'] = $signmeup;

//echo "<p> '$signmeup' </p>";
//$iamny = $_SESSION['iam_ny'];
if($NYstate == "NY")
{
 $iamny = "yes";
}
else
{
 $iamny = "no";
}

//echo $_SESSION['fsgyear'] = $sgyear;

?>

<link href="../../../gmaps/css/coolBlues.css" rel="stylesheet" type="text/css" />
<html>
<head>
<style type="text/css"> 

.style9 {font-weight: bold; color:#FFFFFF; background-color:#6D86B4;}


</style>
<style type="text/css"> 

.style7 {border-color: #6D86B4; border-width:thin}


</style>
<style type="text/css">

.style10 {font-family: Arial, Helvetica, sans-serif}
</style>

</head>
<body>

<div align="left"><img border="0" src="Think_FB_header.gif" alt="Pulpit rock" width="722" height="69" /></div> 
<form action="mailsend.php" method="post" id="form"> 

<p><img src="recipients.gif" width="722" height="27"></p>
<p>
    <?php

//$conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");

//$query1="SELECT * FROM advocacy_updates ORDER BY campaign_id DESC LIMIT 1" 

$result = mysql_query("SELECT * FROM advocacy_updates ORDER BY campaign_id DESC LIMIT 1");

while($row=mysql_fetch_array($result))
{
$c_id=$row['campaign_id']; 
$c_name=$row['campaign_name'];
$g_flag = $row['governer_flag'];
$ch_flag = $row['chancellor_flag'];
$ha_flag = $row['higher_assembly'];
$hs_flag = $row['higher_senator'];
$la_flag = $row['local_assembly'];
$ls_flag = $row['local_senator'];
$def_sub = $row['subject'];
$def_templ = $row['message'];

//echo $def_templ;
//echo $user;

//echo $pass;
}

$_SESSION['camp_id'] = $c_id;
$g_name = "Cuomo, Andrew";
$ch_name = "Zimpher, Nancy";
//echo $hs_flag;
//echo $la_flag;
//mysql_close($conn);

if($g_flag == "Y")
{
// echo "here";
 //echo('<div><input type="radio" name="group1" value="'.$g_name.'">'.$g_name.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Governor </div> ');
 echo('<div class="style10"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="yes" name="govern" value="'.$g_name.'"/> '.$g_name.' </div>');
}
if($ch_flag == "Y")
{
  //echo('<div><input type="radio" name="group1" value="'.$ch_name.'">'.$ch_name.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chancellor </div> ');
  echo('<div class="style10"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="yes" name="chancl" value="'.$ch_name.'"/> '.$ch_name.' </div>');
}
// foreach ($json_a[response][legislators] as $p)
//{

  // if($p[legislator][title]=="Sen")
  // if($hs_flag == "Y") {
  //echo('<div><input type="radio" name="group1" value=" '.$p[legislator][lastname].' '.", ".' '.$p[legislator][firstname].'">'.$p[legislator][firstname].' '.$p[legislator][middlename].''.$p[legislator][lastname].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U.S. Senator </div> ');

  //}
//}

if($iamny == "yes") {
if($ls_flag == "Y") {
//echo('<div><input type="radio" name="group1" value="'.$sen_name.'">'.$sen_name.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Local Senator </div> ');
echo('<div class="style10"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="yes" name="sen" value="'.$sen_name.'"/> '.$sen_name.' </div>');
}


}



?>
    <!--<legend class="style9">Your US Representatives</legend>--> 
    <?php 
 
 
  //foreach ($json_a[response][legislators] as $p)
//{

  // if($p[legislator][title]=="Rep")
  // if($ha_flag == "Y") {
//echo('<div><input type="radio" name="group1" value="'.$p[legislator][lastname].' '.", ".' '.$p[legislator][firstname].'">'.$p[legislator][firstname].' '.$p[legislator][middlename].''.$p[legislator][lastname].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; US Representative  </div>');

  //  }
//}
//echo $iamny
 if($iamny == "yes") {
 if($la_flag == "Y") {
 //echo('<div><input type="radio" name="group1" value="'.$asm_name.'">'.$asm_name.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Local  Assembly  </div> ');
 echo('<div class="style10"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="yes" name="asm" value="'.$asm_name.'"/> '.$asm_name.' </div>');
}
 }
 
 
// $conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$result_custom = mysql_query("SELECT * FROM advocacy_custom where d_code = ".$c_id);
while($row_custom=mysql_fetch_array($result_custom)) {
echo('<div class="style10"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked="yes" name="custom[]" value="'.$row_custom['name'].'"/> '.$row_custom['name'].' </div>');

}
 ?>
</p>
<p><img src="subject.gif" width="722" height="27"></p>
<p> 
&nbsp;&nbsp;&nbsp;&nbsp;<input name="subject" type="text" id="subject" value="<?php echo $def_sub ?>" size="100" width="500"/> 

</p> 

<p><img src="message.gif" width="722" height="27"></p>
<p><br />
    &nbsp;&nbsp;&nbsp;&nbsp;<textarea class="style10" name="msgbody" id="msgbody" cols="70" rows="8" >
<?php echo $def_templ ?>
      </textarea>
    <br />
  
</p>
<p> 
    
</p> 

<p> 
<input type="image" src="sendemail.gif" alt="Submit "> </a>
</p> 
</form> 
</body>
</html> 

<p align="center"></p>
