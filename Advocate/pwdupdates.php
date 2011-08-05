<?php include ("sqlinclude.php"); ?>
<?php
//$con = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$username=mysql_real_escape_string($_POST['user']);
$oldpassword1=mysql_real_escape_string($_POST['oldpass']);
$newpassword1=mysql_real_escape_string($_POST['newpass']);
$renewpassword=mysql_real_escape_string($_POST['renewpass']);
$newpassword = md5($newpassword1);
$oldpassword = md5($oldpassword1);
if($newpassword1!=$renewpassword){
header("Location: errpwdch.php");
}
else{

$result = mysql_query("SELECT * FROM advocacy_advpwd where uname ='".$username."' and pwd='".$oldpassword."'");
if($row=mysql_fetch_array($result))
{


 $query1="UPDATE advocacy_advpwd set pwd = '".$newpassword."' where uname='".$username."'";
  
    echo $query1;
	if (!mysql_query($query1))
  {
  die('Error: ' . mysql_error());
  header("Location: errpwdch.php");
  }
 else
  {
    
    header("Location: index.php");
  }

}
else{
 header("Location: errpwdch.php");
}
}
/*$num=mysql_num_rows($result);
//echo $num; 
for($i=1;$i<=$num; $i++){

if($username == $user && $oldpassword==$pass)
{
 $query1="UPDATE advpwd set pwd = '".$newpassword."' where uname='".$user."'";
  
    echo $query1;
	if (!mysql_query($query1))
  {
  die('Error: ' . mysql_error());
  header("Location: errpwdch.php");
  }
 else
  {
    
     header("Location: index.php");
  }


 
}
else if($oldpassword != $pass ||$username != $user )
{
//echo("Please Enter Correct Username and Password ...");
//alert("Please Enter Correct Username and Password ...");
  header("Location: errpwdch.php");
//echo $password;
}
}


}
*/
mysql_close($con)
?>