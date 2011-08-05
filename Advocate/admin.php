<?php 
$nosubmenu=0;

$basedir='d:/data/web/';

?>
<?php include ("sqlinclude.php"); ?>
<?php

session_start();
$_SESSION['title_stat'] = "" ;
if(isset($_POST['Add'])) {
test();
}

 function test(){
         echo ("<p> new </p>");
		 }
		 


 
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
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=150,width=543','resizable=no');
	
	return false;
}

// -->
</script>

</script>

<SCRIPT language="javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
           
 
            var cell2 = row.insertCell(0);
            var element3 = document.createElement("input");
            element3.type = "text";
			element3.setAttribute("name", "ccname[]");
		    element3.setAttribute("name", "ccname[]");
			element3.setAttribute("value", "Name");
			element3.setAttribute("onclick", "this.value=''");
			element3.style.color='#555';
            cell2.appendChild(element3);
			
 
            var cell3 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
			element2.setAttribute("name", "ccemail[]");
			element2.setAttribute("value", "Email-ID");
			element2.setAttribute("onclick", "this.value=''");
			element2.style.color='#555';
		
            cell3.appendChild(element2);
            
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>
<style type="text/css">
<!--
.style1 {
	color: #000099;
	font-weight: bold;
}
.style2 {color: #000099}
-->
</style>
</head>

<body <?php include ($basedir."header_rollover_script.php"); ?> >
<?php 
//session_start();
		$id = $_GET["campaign_id"];
		if(!is_null($id)) 
		 {
			//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
			//mysql_select_db("advocacy_admin") or die(mysql_error());

		// Retrieve all the data from the "example" table
		$result = mysql_query("SELECT * FROM  advocacy_updates WHERE campaign_id = ".$id)
		or die(mysql_error());  
		$result1 = mysql_query("SELECT * FROM  advocacy_custom WHERE d_code = ".$id)
		or die(mysql_error());  
		$row = mysql_fetch_array( $result );
		$valtext = "Update";
		}
		else
		{
		$valtext = "Add";
		}
		
		
		$dm = $_SESSION['msgg'];
		//echo $dm;
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
            <div class="bc"><span class="bc2"><a href="/" title="Home">Home</a></span><span class="bc2">|</span><span class="bc2"><a href="/ResearchAdvancement">Research Advancement</a></span><span class="bc2">|</span><span class="bc2"><a href="#">Subpage</a></span></div>
            <div class="content">
                  <p><a href="list.php">View Statistics</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="welcomec.php">Change Welcome Information</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"> Logout</a></p>
                  <h2 class="style2">Add New Campaign</h2>
                  <p class="style1">&nbsp;</p>
                  <h3 class="style1"> 
                    <?php  echo "$dm"; ?> 
                    <?php $_SESSION['msgg']="" ?>
    </h3>
                  <form id="form1" name="form1" method="post" action="submit.php">
<label><strong> Campaign Name</strong> &nbsp;&nbsp;&nbsp;
 <input type="text" name="username" id="username" size="60" value="<?php echo $row['campaign_name'] ?>"/>
	   <input type="hidden" name="campaign_id" id="campaign_id" value="<?php echo $row['campaign_id'] ?>"/>
      </label>
      <br/>
	  
      <br/>
     <table width="279" border="0" cellpadding="0" bordercolor="#000000">
	   <tr>
         <td colspan="2"><strong>Select recipients</strong></td>
       </tr>
       <tr>
         
         <td width="20"><input onClick="return checkedBox('governorFlag');" type="checkbox" name="governorFlag" id="governorFlag"
		 value="<?php  echo $row['governer_flag']; if($row['governer_flag']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?>/></td>
         <td width="253">Governor</td>
       </tr>
       <tr>
         
         <td><input onClick="return checkedBox('chancellorFlag');" type="checkbox" name="chancellorFlag" id="chancellorFlag" value="<?php echo $row['chancellor_flag']; if($row['chancellor_flag']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
         <td>Chancellor</td>
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
         
         <td><input onClick="return checkedBox('localAssembly');" type="checkbox" name="localAssembly" id="localAssembly" value="<?php echo $row['local_assembly']; if($row['local_assembly']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
         <td width="253">Local Assembly</td>
       </tr>
       <tr>

         <td><input onClick="return checkedBox('localSenator');" type="checkbox" name="localSenator" id="localSenator" value="<?php echo $row['local_senator']; if($row['local_senator']=='Y')  { $m="checked"; }  else   {  $m=""; } ?>" <?php echo $m?> /></td>
         <td width="253">Local Senator </td>
       </tr>
     </table>
      
       
     <p>
       <INPUT type="button" value="Add Custom Recipients" onClick="addRow('dataTable')" />
       <!-- <INPUT type="button" value="-" onClick="deleteRow('dataTable')" /> -->
      </p>
      
     <TABLE id="dataTable" width="350px" border="0">
       
        <?PHP 
		if(!is_null($id)) {
		while($row1=mysql_fetch_array($result1))
		{
		    echo  ('<TR>
            
            <TD> <INPUT type="text" name="ccname[]" value='.$row1['name'].'> </TD>
            <TD> <INPUT type="text" name="ccemail[]" value='.$row1['email_id'].'> </TD>
			
        </TR>');
		}
		
		}
		?>
        </TABLE>
   
     <p><strong>Subject</strong><br/>
          <br/>
&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" name="subject" id="subject" size="60" value="<?php echo $row['subject'] ?>" />
       
           <br />
       
           </label>
       
       
             <strong>Message</strong>    <br />
             <br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <textarea name="message" id="message" cols="57" rows="15" ><?php echo $row['message'] ?></textarea>
       <br />
       <br />
       <input type="submit" name="addNew" id="addNew" value="<?php echo $valtext ?>" />
       <br />
       <br />
       <br />
       <br />
       <label>
        </p>
      </p>
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