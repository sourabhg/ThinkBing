
<?php

$conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
mysql_select_db("advocacy_admin");

$result = mysql_query("SELECT * FROM pix ORDER BY pid DESC LIMIT 1");

while($row=mysql_fetch_array($result))
{
  $title = $row['title']; 
}
require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '108635402526995',
  'secret' => '3f5d6411e89258afe37cecb8e39a0f79',
  'cookie' => true,
));

$session = $facebook->getSession();

$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}

if ($uid) {
 $logoutUrl=$facebook->getlogoutUrl();
  $Header = "Tell Your Story";
  echo(' <html>
  <head>
<style type="text/css">
<style type="text/css">

.style10 {font-family: Arial, Helvetica, sans-serif}
</style>

<!--
.style3 {font-family: "Times New Roman", Times, serif}
-->
</style>
<style type="text/css">

.style10 {font-family: Arial, Helvetica, sans-serif}
</style>
<script language="JavaScript">
  function showhidefield()
  {
    if (document.frm.chkbox.checked)
    {
      document.getElementById("addr").style.visibility = "visible";
      document.frm.chkbox.value = "yes";	  
    }
    else
    {
      document.getElementById("addr").style.visibility = "hidden";
	  document.frm.chkbox.value = "no";
    }
  }
</script>
</head>
<body>


 <table border="0" cellspacing="0" cellpadding="3" width="100%" align="center">
 <tr>
  <img border="0" src="Think_FB_header.gif" alt="Pulpit rock" width="722" height="69" />
 </tr>
  <tr>
    <td>
	 <h3 align="center"><span class="style10">Tell Your Story</span></h3> 
	<img style="padding-top: -20px; float: left;"
                    src="main_image.gif"
                    alt="Photograph of staff in science lab."
                    width="250"
                    height="228"/> 
	</td> 
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td>


 
                 <p > '.$title.' </p>
 </td>
				 
			
				 
</tr>
		<tr>
                  <p> 
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <td> <form name="frm" method="post" action="fillform.php"></td></tr>
				  <tr>
    <td></td>
				 
                    
					   <br />
					   <br />
					   <br />
					  

	<p>
	
</br>
</br>
</br>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<td><a href="fillform.php">
				
                        <img type="image" 
                             src="take_action.gif"
                             alt="Submit"
                             ></a> 

                     							 </form>	  
                     </a> 
                 </p></td></tr>
  <tr>
   
    
    </tr>
  </table>
</div>
 </body></html>');
} else {
  $loginUrl = $facebook->getLoginUrl();
 }
?>