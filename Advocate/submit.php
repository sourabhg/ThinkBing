<?php include ("sqlinclude.php"); ?>
<?php
//include_once "admin.php"; 
session_start();
//$con = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");

$campaign_id = mysql_real_escape_string($_POST['campaign_id']);
//echo "ht".$campaign_id;
$cname = mysql_real_escape_string($_POST['username']);
$g_flag = mysql_real_escape_string($_POST['governorFlag']);
$ch_flag =  mysql_real_escape_string($_POST['chancellorFlag']);
$ha_flag = mysql_real_escape_string($_POST['higherAssemblyFlag']);
$hs_flag = mysql_real_escape_string($_POST['higherSenatorFlag']);
$la_flag = mysql_real_escape_string($_POST['localAssembly']);
$ls_flag = mysql_real_escape_string($_POST['localSenator']);
$sub = mysql_real_escape_string($_POST['subject']);
$msg = mysql_real_escape_string($_POST['message']);
$ccname1 = $_POST['ccname'];
$ccemail1= $_POST['ccemail'];
echo $ch_flag;
//$countr = count($_POST['ccname']);
//echo $countr;
//$addresses = array('spam@cyberpromo.net', 'abuse@example.com');
//echo $ch_flag;
if($g_flag == "Y")
{
 $g_flag = mysql_real_escape_string("Y");
}
else
{
  $g_flag = mysql_real_escape_string("N");
}
if($ch_flag == "Y")
{
 $ch_flag = mysql_real_escape_string("Y");
}
else
{
  $ch_flag = mysql_real_escape_string("N");
}
if($ha_flag == "Y")
{
 $ha_flag = mysql_real_escape_string("Y");
}
else
{
  $ha_flag = mysql_real_escape_string("N");
}
if($hs_flag == "Y")
{
 $hs_flag = mysql_real_escape_string("Y");
}
else
{
  $hs_flag = mysql_real_escape_string("N");
}
if($la_flag == "Y")
{
 $la_flag = mysql_real_escape_string("Y");
}
else
{
  $la_flag = mysql_real_escape_string("N");
}
if($ls_flag == "Y")
{
 $ls_flag = mysql_real_escape_string("Y");
}
else
{
  $ls_flag = mysql_real_escape_string("N");
}

/*
FOLLOWING IS FOR UPDATE
$campaign_id 
*/

if(strcmp($campaign_id,""))
  {
	$query1="UPDATE advocacy_updates set campaign_name = '".$cname."',
	governer_flag = '".$g_flag."',
	chancellor_flag = '".$ch_flag."',
	higher_assembly = '".$ha_flag."',
	higher_senator = '".$hs_flag."',
	local_assembly = '".$la_flag."',
	local_senator = '".$ls_flag."',
	subject = '".$sub."',
	message = '".$msg."'
	where campaign_id = ".$campaign_id;
   $_SESSION['msgg'] = "Record Updated Successfully";
    mysql_query($query1) or die ('Error Updating DB'.mysql_error());
	
   $query_del="delete from advocacy_custom where d_code = ".$campaign_id;
   mysql_query($query_del) ;
   
   foreach($ccname1 as $a => $b){
   //echo "$ccemail1[$a] <br/>";
   if(!empty($ccemail1[$a]) and !empty($ccname1[$a]))
   
   {
   
    $query_add="insert into advocacy_custom(name,d_code,email_id)values('".$ccname1[$a]."','".$campaign_id."','".$ccemail1[$a]."')";
   //echo $query_add;
    mysql_query($query_add) or die ('Error Updating DB'.mysql_error());
   }
   //echo $query1;
  
  }
  


//    echo $query1;
  }
else 
  {  
//echo "hello";
//echo $ch_flag;
//echo $ha_flag;
$query1="insert into advocacy_updates(campaign_name,governer_flag,chancellor_flag,higher_assembly,higher_senator,local_assembly,local_senator,subject,message) values ('".$cname."','".$g_flag."','".$ch_flag."','".$ha_flag."','".$hs_flag."','".$la_flag."','".$ls_flag."','".$sub."','".$msg."')";
//echo $query1;
mysql_query($query1) or die ('Error Updating DB'.mysql_error());

     $_SESSION['msgg'] = "Record Added Successfully";
	 $result = mysql_query("SELECT * FROM advocacy_updates ORDER BY campaign_id DESC LIMIT 1");

while($row=mysql_fetch_array($result))
{
$c_id=$row['campaign_id']; 

}

	foreach($ccname1 as $a => $b){
   echo "$ccname1[$a]  - $ccemail1[$a]<br />";
   if(!empty($ccemail1[$a]) and !empty($ccname1[$a])){
   $query1="insert into advocacy_custom(name,d_code,email_id)values('".$ccname1[$a]."','".$c_id."','".$ccemail1[$a]."')";
   mysql_query($query1) or die ('Error Updating DB'.mysql_error());
   }
  }
}

//echo $query1;

/*if (!mysql_query($query1))
  {
  die('Error: ' . mysql_error());
  header("Location: erroradmin.php");
  }
 else
  {
  */  
     header("Location: admin.php");
	 
  //}


mysql_close($con)

?>

