<?php include ("sqlinclude.php"); ?>
<?php

//$conn = mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin");
$cu = 'Y';
$result = mysql_query("SELECT * FROM pix where curr = '".$cu."' ");
$t_pic = "https://Research.binghamton.edu/ResearchAdvancement/projects/Advocate/uploads/";
while($row=mysql_fetch_array($result))
{
  $title = $row['title']; 
  $heading = $row['heading'];
  $name_pic = $row['name_pic'];
}
require '../src/facebook.php';
$name_pic1 =  $t_pic . $name_pic;


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
	          <img style="padding-top: -10px; float: left;"
                    src="'.$name_pic1.'"
                    alt="Photograph of staff in science lab."
                    width="250"
                    height="228"/> 
	   </td>  
       
	   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	   
       <td>
                 <br/>
               <h3 align="left"><span class="style10">'.$heading.'</span></h3> 

               
                 <p class="style10"> '.$title.' </p>
				 
				 <br/>
				<br/>
				<br/>
				
				
				 <a href="fillform.php">
				<img type="image" src="take_action.gif" alt="Submit"></a> 

                 </form>	  
                     </a>
				 
      </td>
 
				 
</tr>
			
 
<tr>                                
                 
		<td>  
		
		        <form name="frm" method="post" action="fillform.php">
		</td>
		
</tr>

<tr>
                    
					   <br />
					   <br />
					   <br />
					   
	
       <td>
	                              
				 
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