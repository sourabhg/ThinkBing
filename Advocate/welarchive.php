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
.style5 {color: #0000FF}
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
              <p><a href="welcomec.php">Back</a></p>
              <form name="form1" method="post" action="warchup.php">
   
  <h3 class="style5">Archived Welcome Messages</h3>
  <p class="style5">&nbsp;</p>
  <table width="700" border="0" cellpadding="4" cellspacing="1" >
  <tr>
  <th width="183" class="TableCol2">Heading</th>
  <th width="417" class="TableCol2">Welcome Text</th>
  <th width="72" class="TableCol2">Current </th>
  </tr>
  <?php
   //mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
   //mysql_select_db("advocacy_admin") or die(mysql_error());
   $result = mysql_query("SELECT * FROM pix ");

   while($row=mysql_fetch_array($result))
  {
    $title = $row['title']; 
    $heading = $row['heading'];
    $curr = $row['curr'];
	$pid = $row['pid'];
	echo("<tr>");
    echo("<td class=\"TableCol2\">");
    echo "$heading";
    echo("</td>");
    echo("<td class=\"TableCol2\">");
    echo "$title";
    echo("</td>");
    echo("<td class=\"TableCol2\">");
	if($curr == "Y")
	{
	 
	 echo ('<input type="radio" name="chk" id="chk" value="'.$pid.'" checked/>');
	}
	else
	{
	 echo ('<input type="radio" name="chk" id="chk" value="'.$pid.'"/>');
	}
    echo("</td>");
	//echo("<td class=\"TableCol2\">");
	$num_rows = mysql_num_rows($result);
	
	if($num_rows != 0 )
		{
		echo "<td class=\"TableCol2\"><p font-size=\"8px\"><a href=welcomec.php?pid=".$pid.">Edit</a></p></td>";
		}
		//echo "</tr>"; 
//    echo("<input onClick="return checkedBox('curr');" type="checkbox" name="curr" id="curr"");
    echo("</td>");
    echo("</tr>");
	$ch = "";
	
  }
  ?>
  </table>
  <p>
    <label>
    <input type="submit" name="Update" id="Update" value="update">
    </label>
    <p>
      
      <br />
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

