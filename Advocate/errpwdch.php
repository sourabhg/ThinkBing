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
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: small}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; }
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
<form id="form1" name="form1" method="post" action="../Advocate/pwdupdates.php">
  <label> <span class="style2"><span class="style3"><br />
  User Name </span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </span>&nbsp; &nbsp;&nbsp;
  <input type="text" name="user" id="username" />
  </label>
  <br/>
  <br/>
  <label><span class="style4">Old Password </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" name="oldpass" id="password2" />
  </label>
  <br/>
  <br/>
  <label><span class="style4">New Password </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" name="newpass" id="password" />
  </label>
  <br/>
  <br/>
  <label><span class="style4">Retype Password</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="password" name="renewpass" id="password" />
  </label>
  <br/>
  <h5 style="color:black">
    <p>Incorrect input, Please Try Again</p>
  </h5>
  <p align="left">
    <label for="Go"></label>
    <input type="submit" name="Submit" id="Submit" value="Change"/>
  </p>
</form>
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

