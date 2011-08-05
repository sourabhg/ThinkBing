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
              <p><a href="admin.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="list.php"> View Statistics </a></p>
              <h3 class="style1">View Subscriber List</h3>
              <table width="700" border="0" align="left" cellpadding="4" cellspacing="1" >
     
     <br />
     <br />
     <br />
      <form id="form1" name="form1" method="post" action="<?php echo $PHP_SELF; ?>">
     <label>Search By Campaign Name : </label>&nbsp;&nbsp;
     <input name="cname" type="text" id="cname" value="<?php echo $row['campaign_name'] ?>" size="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <input type="submit" name="Search"  value="Search" size="60">
     
     <?php 
	 
	 $cname = $_POST['cname'];
	 
	 if($cname!="")
	 {
	 
	
	 $cname_flag=true;
	  //echo " Campaign Name entered is  "."$cname" ;
     }   
	 else{
	 $cname_flag=false;
	 }
	 ?> 
     <br />
     <br />
  <caption>
	  List of Subscribers 
      <br />
	  </caption>
       <tr>
         <th width="5" class="TableCol2">Campaign Id</span></th>
         <th width="100" class="TableCol2">Campaign Name</span></th>
         <th width="50" class="TableCol2">Name</span></th>
          <th width="100" class="TableCol2">Address</span></th>
         <th width="50" class="TableCol2">Email Id</span></th>
        
         
       </tr>
       		<?php
		// Make a MySQL Connection
		//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
		//mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		//$result = mysql_query("SELECT * FROM `advocacy_maillist` WHERE 1")
		//or die(mysql_error());  
        if($cname_flag==false)
		{
		$result1=mysql_query("SELECT advocacy_maillist.campaign_id,advocacy_updates.campaign_name,advocacy_maillist.name,advocacy_maillist.email_id FROM advocacy_maillist,advocacy_updates WHERE advocacy_updates.campaign_id =advocacy_maillist.campaign_id")
		or die(mysql_error());
		
		// store the record of the "example" table into $row
		
		// Print out the contents of the entry 
		
		while ($row1=mysql_fetch_array($result1) ) {
		$tempname =  '"' . $row1[name] . '"';
		//$q1 = "SELECT street,city,state,zip,country FROM form WHERE name = ".$tempname;
		//echo "<p> $q1 </p>";
		$result11=mysql_query("SELECT street,city,state,zip,country FROM form WHERE name = ".$tempname )
		or die(mysql_error());
		$tempname = "";
		while ($res1 = mysql_fetch_array($result11) ) {
		$addr = $res1['street'] . "," .$res1['city'] . "," .$res1['state'] . "," . $res1['country'] . "," . $res1['zip'] ;
		}
		echo "<tr>"; 
		$idd = $row1['campaign_id'];
		echo "<td  class=\"TableCol2\"><a href=detail.php?campaign_id=".$idd.">".$idd."</a></td>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['campaign_id']."</th>";
		$campaignname=$row1['campaign_name'];
		echo "<td  class=\"TableCol2\">".$campaignname."</td>";
		
		echo "<td class=\"TableCol2\">".$row1['name']."</td>";
		
		echo "<td class=\"TableCol2\">".$addr."</td>";
		echo "<td class=\"TableCol2\">".$row1['email_id']."</td>";
		//$result1 = mysql_query("SELECT sum( to_msg ) AS count1 FROM advocacy_count WHERE campaign_id = ".$row['campaign_id']." ")
		//or die(mysql_error()); 
		
		
		}
		
		echo "</tr>";
		
		}
		else if($cname_flag==true)
		{
		$result2=mysql_query("SELECT advocacy_maillist.campaign_id,advocacy_updates.campaign_name,advocacy_maillist.name,advocacy_maillist.email_id FROM advocacy_maillist,advocacy_updates WHERE advocacy_updates.campaign_id =advocacy_maillist.campaign_id AND advocacy_updates.campaign_name='".$cname."'")
		or die(mysql_error());
		
		//echo "Campaign Name entered is " . "$cname";
	//	echo "Query Succesful";
		
		while ($row2=mysql_fetch_array($result2) ) {
		echo "<tr>"; 
		$idd = $row2['campaign_id'];
		echo "<th width='\"24'\" class=\"TableCol2\"><a href=detail.php?campaign_id=".$idd.">".$idd."</a></th>";
		//echo "<th width='\"24'\" scope='\"col'\">".$row['campaign_id']."</th>";
		$campaignname=$row2['campaign_name'];
		echo "<th width='\"24'\" class=\"TableCol2\">".$campaignname."</th>";
		
		echo "<th width='\"24'\" class=\"TableCol2\">".$row2['name']."</th>";
		echo "<th width='\"24'\" class=\"TableCol2\">".$row2['email_id']."</th>";
		
		//$result1 = mysql_query("SELECT sum( to_msg ) AS count1 FROM advocacy_count WHERE campaign_id = ".$row['campaign_id']." ")
		//or die(mysql_error()); 
		
		
		}
		
		echo "</tr>";
		
		}
		 
		
		?>
        
    </table>
    
</br>
     </br>
    
  <label><br />
     <br />
     </label>
    </form>
   <br/>
	
	<br/>
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
<br/>
</div>

</body>
</html>

