<?php include ("sqlinclude.php"); ?>
<?php
//$con = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$username=mysql_real_escape_string($_POST['user']);
$password1=mysql_real_escape_string($_POST['pass']);
//First lets get the username and password from the user
$password = md5($password1);

$result = mysql_query("SELECT * FROM advocacy_advpwd where uname ='".$username."' and pwd='".$password."'");
if($row=mysql_fetch_array($result))
{
header("Location: admin.php");
}
else{
header("Location: index2.php");
}
/*
$num=mysql_num_rows($result);
//echo $num; 
for($i=1;$i<=$num; $i++){

if($username == $user && $password==$pass)
{
 //echo "in here    ";
 header("Location: admin.php");
}
else if($password != $pass ||$username != $user )
{
//echo("Please Enter Correct Username and Password ...");
//alert("Please Enter Correct Username and Password ...");
  header("Location: index2.php");
//echo $password;
}
}*/
mysql_close($con)
?>