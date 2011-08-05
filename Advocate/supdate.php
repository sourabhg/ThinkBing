<?php include ("sqlinclude.php"); ?>
<?php
$id = $_GET["d_code"];
$hos = $_GET["house"];
echo $id;
echo $hos;
$res11 = "select * from ".$hos." where d_code = '".$id."'";
//echo $res11;
$result11 = mysql_query("select * from ".$hos." where d_code = '".$id."' ORDER BY d_code ASC")
		or die(mysql_error());  

		
?>

<form id="form1" name="form1" method="post" action="">
  <?php
  while($ress = mysql_fetch_array($result11)){
  echo "<label>";
  echo "<input type='\"text'\" name='\"name'\" id='\"name'\" value='".$ress['name']."' />";
  echo "</label>";
  echo "<label>";
  echo " <input type='\"text'\" name='\"email'\" id='\"email'\" value='".$ress['email_id']."'/>";
  echo "</label>";
  echo "<label>";
  }
  ?>
  <input type="submit" name="Update" id="Update" value="Update" />
  </label>
  <label>
 
  </label>
</form>

