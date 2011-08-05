<?php 
$nosubmenu=0;

$basedir='d:/data/web/';

?>
<?php include ("sqlinclude.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />

<title>Binghamton University | Division of Research | Research Advancement | Subpage</title>

<link href="/css/research.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="/scripts/research.js"></script>
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>

<body <?php include ($basedir."header_rollover_script.php"); ?> >
<?php 
		$id = $_GET["campaign_id"];
		
		if(!is_null($id)) 
		 {
			//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
			//mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		$result = mysql_query("SELECT * FROM  advocacy_count WHERE campaign_id = ".$id)
		or die(mysql_error());  
         		
		$row = mysql_fetch_array( $result );
		
		
		}
		
		
?>
<div class="headerOuter">
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="960" valign="top">
    
    <?php include ($basedir."headernew.php"); ?>
    <?php include ($basedir."ResearchAdvancement/subheader.php"); ?>
    

    
      <table width="960" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td width="192" valign="top" bgcolor="#FFFFFF"><?php include ($basedir."researchadvancement/RAsubmenu.php"); ?></td>
          <td valign="top" bgcolor="#FFFFFF">
          
          
          <div class="contentWrapOffices">
            <div class="bc"><span class="bc2"><a href="/" title="Home">Home</a></span><span class="bc2">|</span><span class="bc2"><a href="/ResearchAdvancement">Research Advancement</a></span><span class="bc2">|</span><span class="bc2"><a href="index.php">Think Bing Admin</a></span><span class="bc2"></div>
            <div class="content">
                  
                <p><a href="admin.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="list.php" >View Statistics</a></p>
                <h3 class="style1">View Campaign Details</h3>
                <table width="700" border="0" cellpadding="4" cellspacing="1">
      <?php
		// Make a MySQL Connection
		//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
		//mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		$result_c = mysql_query("SELECT * FROM  advocacy_updates WHERE campaign_id = ".$id)
		or die(mysql_error());  
		$row_c = mysql_fetch_array( $result_c );
		$cam_name = $row_c['campaign_name'];
		//mysql_close($conn);
		//echo "<p>".$cam_name."</p>";
  ?>
      <caption>
        <strong><br />
        Details for the <?php echo $cam_name ?>        </strong>
      </caption>
	  <tr>
        <th width="25" class="TableCol1"><div align="center"><b>Sender</b></div></th>
	    <th width="25" class="TableCol1"><b>Reciever</b></th>
	    <th width="100" class="TableCol1"><b>Message</b></th>
	    <!-- <th width="82" scope="col"><p><b>Higher Assembly</b></p>
          <p></p></th>
         <th width="70" scope="col"><p><b>Higher Senator</b></p>
          <p></p></th> -->
        <th width="25" class="TableCol1"><p><b>Timestamp</b></p>
            <p></p></th>
      </tr>
      <?php
		// Make a MySQL Connection
		//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
		//mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		$result = $result = mysql_query("SELECT * FROM  advocacy_count WHERE campaign_id = ".$id)
		or die(mysql_error());  
        
		
		// store the record of the "example" table into $row
		
		// Print out the contents of the entry 
		while ($row = mysql_fetch_array( $result )) {
		echo "<tr>"; 
		//$idd = $row['campaign_id'];
		//echo "<th width='\"24'\" scope='\"col'\"><a href=detail.php?campaign_id=".$idd.">".$idd."</a></th>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['campaign_id']."</th>";
		echo "<td  class=\"TableCol1\">".$row['msg_from']."</td>";
		echo "<td  width=\"25\" class=\"TableCol1\" >".$row['msg_to']." </td>";
		echo "<td  width=\"100\" class=\"TableCol1\">".$row['msg']."</td>";
		echo "<td  class=\"TableCol1\">".$row['u_time']."</td>";
	//	echo "<th width='\"24'\" scope='\"col'\">".$row['higher_senator']."</th>";
	//	echo "<th width='\"24'\" scope='\"col'\">".$row['local_assembly']."</th>";
	//	echo "<th width='\"24'\" scope='\"col'\">".$row['local_senator']."</th>";
	//	echo "<th width='\"24'\" scope='\"col'\">".$row['subject']."</th>";
		//$result1 = mysql_query("SELECT count( campaign_id ) AS count1 FROM advocacy_count WHERE campaign_id = ".$row['campaign_id']." ")
	//	or die(mysql_error()); 
		//while ($row1 = mysql_fetch_array( $result1 )) {
		//echo "<th width='\"24'\" scope='\"col'\">".$row1['count1']."</th>";
		//$idd = $row['campaign_id'];
		//}
		//echo "<th width='\"24'\" scope='\"col'\">".$row['subject']."</th>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['Mails Sent Count']."</th>";
		
		}
		//echo "<th width='\"24'\" scope='\"col'\"><a href=admin.php?campaign_id=".$idd.">Edit</a></th>";
		echo "</tr>"; 
		
		?>
    </table>
<label><br />
     <br />
     </label>
    </form>
              <h1>&nbsp;</h1>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p style="margin-bottom: 0">&nbsp;</p>
      </div>
          </div>          </td>
          </tr>
      </table>      
      
      
      <?php include ($basedir."footer_sub.php"); ?></td>
  </tr>
</table>
</div>
</body>
</html>

