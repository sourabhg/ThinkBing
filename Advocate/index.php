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
            <div class="bc"><span class="bc2"><a href="/" title="Home">Home</a></span><span class="bc2">|</span><span class="bc2"><a href="/ResearchAdvancement">Research Advancement</a></span></div>
            <div class="content">
                    
              
              
              <p><a href="pwdch.php">Change Password </a></p>
              <h3>Think Binghamton Admin</h3>
              <p>&nbsp;</p>
              <form id="form1" name="form1" method="post" action="checkpwd.php">
      <label>
      <div align="left">User Name &nbsp;&nbsp;&nbsp;
        <input type="text" name="user" id="username" />
      </div>
      </label> 
      <div align="left"><br/>
          <br/>
      </div>
     
      <div align="left">Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" name="pass" id="password" />
      </div>
     
	 
       
      </p>
      <p align="left">
        <input type="submit" name="Submit" id="Submit" value="Submit" />
        <!-- <h4 align="center"><a href="pwdch.php">Change Password </a></h4> -->
        
      </p>
    </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      
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

