<?php include ("sqlinclude.php"); ?>
<?php 
$nosubmenu=0;

$basedir='d:/data/web/';

?>
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
.style8 {	font-family: Arial, Helvetica, sans-serif;
	color: #006600;
}
-->
</style>
</head>

<body <?php include ($basedir."header_rollover_script.php"); ?> >
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
              <p><a href="../Advocate/admin.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../Advocate/subscriberlist.php"> Subscriber List </a></p>
              <h2 class="style8">Campaign List<br/>
     </h2>
              <table width="700" border="0" cellpadding="4" cellspacing="1"  >
  <caption>
	  <br />
	  <strong>List of Previous Campaigns	  </strong><br />
	  <br />
  </caption>
       <tr>
         <td width="5" class="TableCol2"><b>No</b></td>
         <td width="100" class="TableCol2"><b>Campaign Name</b></td>
         <td width="52" class="TableCol2"><b>Date Created</b></td>
         <td width="38" class="TableCol2"><b>Governor</b></td>
         <td width="38" class="TableCol2"><b>Chancellor</b></td>
         <!-- <th width="82" scope="col"><p><b>Higher Assembly</b></p>
          <p></p></td>
         <td width="70" scope="col"><p><b>Higher Senator</b></p>
          <p></p></td> -->
         <td width="38" class="TableCol2"><b>Local Assembly</b>
        </td>
         <td width="38" class="TableCol2"><b>Local Senator</b>
         </td>
         <td width="200" class="TableCol2"><b>Subject</b></td>
		 <td width="30" class="TableCol2"><b>No Of Messages Sent</b></td>
       </tr>
       		<?php
		// Make a MySQL Connection
		//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
		//mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		$result = mysql_query("SELECT * FROM  advocacy_updates WHERE 1 LIMIT 0 , 30")
		or die(mysql_error());  
        
		
		// store the record of the "example" table into $row
		
		// Print out the contents of the entry 
		while ($row = mysql_fetch_array( $result )) {
		echo "<tr>"; 
		$idd = $row['campaign_id'];
		
		echo "<td  width=\"5\" class=\"TableCol2\"><a href=detail.php?campaign_id=".$idd.">".$idd."</a></td>";
		
		//echo "<th width='\"24'\" scope='\"col'\">".$row['campaign_id']."</th>";
		echo "<td width='\"24'\" class=\"TableCol2\">".$row['campaign_name']."</td>";
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\">".$row['update_time']."</p></td>";
		echo "<td width='\"24'\" class=\"TableCol2\" ><p font-size=\"8px\">".$row['governer_flag']."</p></td>";
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\">".$row['chancellor_flag']."</p></td>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['higher_assembly']."</th>";
	//	echo "<th width='\"24'\" scope='\"col'\">".$row['higher_senator']."</th>";
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\">".$row['local_assembly']."</p></td>";
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\">".$row['local_senator']."</p></td>";
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\">".$row['subject']."</p></td>";
		$result1 = mysql_query("SELECT sum( to_msg ) AS count1 FROM advocacy_count WHERE campaign_id = ".$row['campaign_id']." ")
		or die(mysql_error()); 
		while ($row1 = mysql_fetch_array( $result1 )) {
		$total = $total +  $row1['count1'];
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\">".$row1['count1']."</p></td>";
		//$idd = $row['campaign_id'];
		}
		//echo "<th width='\"24'\" scope='\"col'\">".$row['subject']."</th>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['subject']."</th>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['Mails Sent Count']."</th>";
		
		}
		$num_rows = mysql_num_rows($result);
		
		if($num_rows != 0 )
		{
		echo "<td width='\"24'\" class=\"TableCol2\"><p font-size=\"8px\"><a href=admin.php?campaign_id=".$idd.">Edit</a></p></td>";
		}
		echo "</tr>"; 
		
		?>
    </table>
     
<p><b>Total Messages Sent : <?php echo $total; ?> </b></p>
     </form>
    
              </p>
              <h1>&nbsp;</h1>
              
              <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p style="margin-bottom: 0">&nbsp;</p>
      </div>
          </div>       </td>
          
          </tr>
        <tr>
        
         
       
        </tr>  
      </table>      
      
     
      <?php include ($basedir."footer_sub.php"); ?></td>
  </tr>
</table>
</div>
</body>
</html>

