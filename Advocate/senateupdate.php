<?php include ("sqlinclude.php"); ?>
<html>
<head>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <label> <br />
  Select the option <br />
  <br />
  <select name="Tselect" id="Tselect">
    <option>Assembly</option>
    <option>Senate</option>
    <option selected> </option>
  </select>
  </label>
  <label>
  <input type="submit" name="submit" id="submit" value="Submit" />
  </label>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?php
if(isset($_POST['submit']))
	{
	     echo "<table width='\"700'\" border='\"0'\" cellpadding='\"4'\" cellspacing='\"1'\"  >";
		 echo "<tr>";
         echo "<td width='\"5'\" class='\"TableCol2'\"><b>District No</b></td>";
         echo "<td width='\"100'\" class='\"TableCol2'\"><b>Name</b></td>";
         echo "<td width='\"52'\" class='\"TableCol2'\"><b>Email-ID</b></td>";
		 echo "</tr>";
	  if($_POST['Tselect'] == "Senate")
	  {
	  $result11 = mysql_query("select * from advocacy_sen ORDER BY d_code")
		or die(mysql_error());  
		
		 while($ress = mysql_fetch_array($result11))
	   {
	     $dcode = $ress['d_code'];
		 $datab = "advocacy_sen";
		 echo "<tr>";
		 echo "<td width='\"24'\" class=\"TableCol2\">".$ress['d_code']."</td>";
		 echo "<td width='\"24'\" class=\"TableCol2\">".$ress['name']."</td>";
		 echo "<td width='\"24'\" class=\"TableCol2\">".$ress['email_id']."</td>";
		 if($dcode != "")
		 {
		 echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\"><a href=supdate.php?d_code=".$dcode."&house=".$datab.">Edit</a></p></td>";
		 }
		 echo "</tr>";
	     
	   }
		
	  // echo "<p> Senate </p>";
	  }
	  if($_POST['Tselect'] == "Assembly")
	  {
	   $result11 = mysql_query("select * from advocacy_asm ORDER BY d_code")
		or die(mysql_error());  
		
		 while($ress = mysql_fetch_array($result11))
	   {
	     $dcode = $ress['d_code'];
		 $datab = "advocacy_asm";
		 echo "<tr>";
		 echo "<td width='\"24'\" class=\"TableCol2\">".$ress['d_code']."</td>";
		 echo "<td width='\"24'\" class=\"TableCol2\">".$ress['name']."</td>";
		 echo "<td width='\"24'\" class=\"TableCol2\">".$ress['email_id']."</td>";
		 if($dcode != "")
		 {
		 echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\"><a href=supdate.php?d_code=".$dcode."&house=".$datab." >Edit</a></p></td>";
		 }
		 echo "</tr>";
	     
	   }
	  }
	  echo "</table>";
	}

?>
	
</body>
</html>