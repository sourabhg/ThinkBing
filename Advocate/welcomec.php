<?php 
$nosubmenu=0;

$basedir='d:/data/web/';

?>

<?php include ("sqlinclude.php"); ?>
<?php 
//session_start();
        $title_stat = "";
		$id = $_GET["pid"];
		if(!is_null($id)) 
		 {
			//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
			//mysql_select_db("advocacy_admin") or die(mysql_error());
   //        $result = mysql_query("SELECT * FROM pix ");
		// Retrieve all the data from the "example" table
		$result = mysql_query("SELECT * FROM  pix WHERE pid = ".$id)
		or die(mysql_error());  
		//$result1 = mysql_query("SELECT * FROM  advocacy_custom WHERE d_code = ".$id)
		//or die(mysql_error());  
		$row = mysql_fetch_array( $result );
		$buttext = "Update";
		}
		else
		{
		$buttext = "Add";
		}
		
		
		//$dm = $_SESSION['msgg'];
		//echo $dm;
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
<?php
session_start();

$title_stat = $_SESSION['title_stat'];
?>
<style type="text/css">
<!--
.style5 {color: #0000FF}
.style6 {color: #666666}
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
              <p align="left" class="style1"><a href="admin.php">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;</p>
              <h3 align="left" class="style5"><span class="style6">Add New Welcome information OR <a href="welarchive.php" class="style6">Change Current</a></span> &nbsp;</h3>
              <h4>
  <?php echo $title_stat; ?> </p> 
</h4>
<form name="form1" method="post" action="subwe.php" enctype="multipart/form-data">
  <label><br>
 <!-- <button>Upload File</button> -->
  </label>
  <p>
    <label for="file">Select an image to upload :</label>&nbsp;&nbsp;&nbsp;&nbsp; 
    <input type="file" name="userfile" id="file" />
    <br />
  </p>
  <label><br />
  Enter the Title<br />
  </label>
  <br />
   <input type="hidden" name="pd" id="pd" value="<?php echo $row['pid'] ?>"/>
  <input name="heading" type="text" id="heading" size="50" value="<?php echo $row['heading']?>"/> 
  <br />
  <br />
  Enter the Welcome Text<br />
  <br />
  <textarea name="textarea" id="textarea" cols="50" rows="10" ><?php echo $row['title']?> </textarea>
  <br>
  <br>
  <br>
  <input type="submit" name="Submit" id="Submit" value="<?php echo $buttext ?>">
</form>
              <h1>&nbsp;</h1>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p style="margin-bottom: 0">&nbsp;</p>
      </div>
      <?php
	  $_SESSION['title_stat'] = "";
	  
	  ?>
          </div>          </td>
          </tr>
      </table>      
      
      
      <?php include ($basedir."footer_sub.php"); ?></td>
      
  </tr>
</table>
</div>
</body>
</html>

