<?php
$ch = $_POST['chk'];
echo $ch;

$con = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
mysql_select_db("advocacy_admin");

mysql_query("UPDATE pix SET curr = 'N' WHERE curr = 'Y'");

$qu1 = "UPDATE pix SET curr = 'Y' WHERE pid = '$ch'";
echo $qu1;


if (!mysql_query($qu1))
  {
  //die('Error: ' . mysql_error());
     header("Location: welarchive.php");
  }
 else
  {
     header("Location: welarchive.php");
	 
  }
?>