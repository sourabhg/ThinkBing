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

<title>Binghamton University | Division of Research | Research Advancement</title>

<link href="/css/research.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="/scripts/research.js"></script>
<title>Campaign Monitor</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>

<body <?php include ($basedir."header_rollover_script.php"); ?>>

<?php 
session_start();
		$id = $_GET["campaign_id"];
		$_SESSION['title_stat'] = "" ;
		if(!is_null($id)) 
		 {
			mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
			mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		$result = mysql_query("SELECT * FROM  advocacy_updates WHERE campaign_id = ".$id)
		or die(mysql_error());  
		//echo $id;
		$row = mysql_fetch_array( $result );
		$valtext = "Update";
		$msg ="Updated";
		}
		else
		{
	    $msg ="Added";
		$valtext = "Add";
		}
		$msg1 = $_SESSION['msgg'];
//		echo $msg;
		
?>
<div class="headerOuter">
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="960" valign="top">
    
    <?php include ($basedir."headernew.php"); ?>
    <?php include ("../../subheader.php"); ?>
    

    
      <table width="960" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td width="192" valign="top" bgcolor="#FFFFFF"><?php include ("../../RAsubmenu.php"); ?></td>
          <td width="568" valign="top" bgcolor="#FFFFFF">
          
          
          <div class="contentWrapOffices">
            <div class="bc"><span class="bc2"><a href="/" title="Home">Home</a></span><span class="bc2">|</span><span class="bc2"><a href="/ResearchAdvancement/">Research Advancement</a></span><span class="bc2">|</span><span class="bc2"><a href="index.php">Think Bing Admin</a></span><span class="bc2"></div>
  
  <div class="content">
   
    <div align="center">
      <h4>Record <?php echo $msg1; ?> successfully
        
      </h4>
    </div>
    <h1>&nbsp;</h1>
	<p><a href="list.php">View Statistics</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="welcomec.php">Change Welcome Information</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></p>
	
    <form id="form1" name="form1" method="post" action="submit.php">
<label><strong>Campaign Name </strong>&nbsp;&nbsp;&nbsp;
   <input type="text" name="username" id="username" size="60" value="<?php echo $row['campaign_name'] ?>"/>
	   <input type="hidden" name="campaign_id" id="campaign_id" value="<?php echo $row['campaign_id'] ?>"/>
      </label>
      <br/>
	  
      <br/>
     <table width="279" border="1" cellpadding="5" bordercolor="#000000">
	   <tr>
         <td colspan="2"><strong>Select recipients</strong></td>
       </tr>
       <tr>
         <td width="192">Governor</td>
         <td width="20"><input onClick="return checkedBox('governorFlag');" type="checkbox" name="governorFlag" id="governorFlag"
		 value="<?php  echo $row['governer_flag']; if($row['governer_flag']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?>/></td>
       </tr>
       <tr>
         <td>Chancellor</td>
         <td><input onClick="return checkedBox('chancellorFlag');" type="checkbox" name="chancellorFlag" id="chancellorFlag" value="<?php echo $row['chancellor_flag']; if($row['chancellor_flag']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
       </tr>
      <!-- <tr>
         <td><label>Higher Assembly</label>
           <label> </label></td>
         <td><input onClick="return checkedBox('higherAssemblyFlag');" type="checkbox" name="higherAssemblyFlag" id="higherAssemblyFlag" value="<?php echo $row['higher_assembly']; if($row['higher_assembly']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
       </tr>
       <tr>
         <td>Higher Senator 
    </td>
         <td><input onClick="return checkedBox('higherSenatorFlag');" type="checkbox" name="higherSenatorFlag" id="higherSenatorFlag" value="<?php echo $row['higher_senator']; if($row['higher_senator']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
       </tr> -->
       <tr>
         <td>Local Assembly 
          <label> </label></td>
         <td><input onClick="return checkedBox('localAssembly');" type="checkbox" name="localAssembly" id="localAssembly" value="<?php echo $row['local_assembly']; if($row['local_assembly']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
       </tr>
       <tr>
         <td>Local Senator 
          <label> &nbsp;</label></td>
         <td><input onClick="return checkedBox('localSenator');" type="checkbox" name="localSenator" id="localSenator" value="<?php echo $row['local_senator']; if($row['local_senator']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
       </tr>
     </table>
     <label><br />
     <br />
     <strong>Subject 
     &nbsp;</strong>&nbsp;&nbsp;&nbsp;
     <input type="text" name="subject" id="subject" size="60" value="<?php echo $row['subject'] ?>" />
     <br />
     <br />
     <br />
	 </label>
	 <strong>
     <label>
     Message</strong>     <br />
	 
     <br />
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="message" id="message" cols="60" rows="30" ><?php echo $row['message'] ?></textarea>
     <br />
     <br />
     <input type="submit" name="addNew" id="addNew" value="<?php echo $valtext ?>" />
     <br />
     <br />
     <br />
     <br />
     <label>
    </form>
   
    <p><a href="list.php">View Statistics</a></p>
  <!-- end #mainContent --></div>
<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
         <p style="margin-bottom: 0">&nbsp;</p>

          </div>          </td>
          <td width="200" valign="top" bgcolor="#FFFFFF">
          
        <?php include ("../../contact.php"); ?>          </td>
        </tr>
      </table>      
      
      
      <?php include ($basedir."footer_sub.php"); ?></td>
  </tr>
</table>
  
<!-- end #container --></div>
</body>
</html>

<script type="text/javascript">
function checkedBox(element)
  {
    var elementData = document.getElementById(element);
	if(elementData.checked)
	  {
		elementData.value = "Y";
	   } else {
	    elementData.value = "N";
	  }	   
  }
</script>